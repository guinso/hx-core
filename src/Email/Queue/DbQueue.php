<?php 
namespace Hx\Email\Queue;

class DbQueue implements QueueInterface {

	private $sqlService, $nextIdService, $maxFailCount;
	
	private $tableName;
	
	private $select, $insert, $update;
	
	public function __construct(
		\Hx\Database\SqlServiceInterface $sqlService,
		\Hx\Database\Record\IdInterface $nextIdService)
	{
		$this->maxFailCount = 3;
		
		$this->sqlService = $sqlService;
		
		$this->nextIdService = $nextIdService;
		
		$this->tableName = 'email_queue';
		
		$this->select = $this->sqlService->createSelectSql();
		
		$this->insert = $this->sqlService->createInsertSql();
		
		$this->update = $this->sqlService->createUpdateSql();
	}
	
	public function addTail(ItemInterface $queueItem)
	{
		//check record exists or not
		if ($this->isExists($queueItem))
			Throw new \Hx\Email\EmailException(
				"Cannot add queue item, ID {$queueItem->getId()} already exists.");
		
		$this->insert->reset(
			\Hx\Database\Sql\InsertInterface::RESET_PARAM |
			\Hx\Database\Sql\InsertInterface::RESET_SQL
		);
		
		$raw = $this->insert
			->table($this->tableName)
			->column('id', ':id')
			->column('status', ':status')
			->column('fail_cnt', ':failCnt')
			->column('last_update', ':date')
			->column('guid', ':guid')
			->column('subject', ':subject')
			->column('msg', ':msg')
			->column('tos', ":tos")
			->column('ccs', ':ccs')
			->column('bccs', ':bccs')
			->column('attchs', ':attchs')
			->param(':id', $this->nextIdService->getNextId($this->tableName, 'id'))
			->param(':status', $queueItem->getStatus())
			->param(':failCnt', $queueItem->getFailCount())
			->param(':date', date('Y-m-d h:s:i'))
			->param(':guid', $queueItem->getId())
			->param(':subject', $queueItem->getMail()->getSubject())
			->param(':msg', $queueItem->getMail()->getMessage())
			->param(':tos', serialize($queueItem->getMail()->getTo()))
			->param(':ccs', serialize($queueItem->getMail()->getCc()))
			->param(':bccs', serialize($queueItem->getMail()->getBcc()))
			->param(':attchs', serialize($queueItem->getMail()->getAttachment()))
			->execute();
	}
	
	private function isExists(ItemInterface $queueItem)
	{
		$raw = $this->select->reset()
			->table($this->tableName)
			->select('*')
			->where('guid = :guid')
			->param(':guid', $queueItem->getId())
			->execute();
		
		return $raw->rowCount() > 0;
	}
	
	public function getHead()
	{
		$raw = $this->select->reset(
				\Hx\Database\Sql\SelectInterface::RESET_PARAM |
				\Hx\Database\Sql\SelectInterface::RESET_SQL)
			->table($this->tableName)
			->select('*')
			->order('id')
			->where("(status = 1 OR (status = 3 AND fail_cnt < :maxFailCnt))")
			->param(':maxFailCnt', $this->maxFailCount)
			->execute();
		
		$row = $raw->fetch();
		
		if (empty($row['id']))
			return null;
		else 
		{
			return new \Hx\Email\Queue\Item(
				new \Hx\Email\Mail(
					unserialize($row['tos']),
					unserialize($row['ccs']),
					unserialize($row['bccs']),
					$row['subject'],
					$row['msg'],
					unserialize($row['attchs'])
				), 
				intval($row['status']), 
				$row['id'], 
				intval($row['fail_cnt'])
			);
		}
	}

	public function updateHead(ItemInterface $queueItem)
	{
		$head = $this->getHead();
		
		if ($head->getId() != $queueItem->getId())
			Throw new \Hx\Email\EmailException(
				"Cannot update email queue, ID not same. head ID: " . 
				"{$head->getId()}, update ID: {$queueItem->getId()}");
		else 
		{
			$this->update->reset(
					\Hx\Database\Sql\UpdateInterface::RESET_PARAM |
					\Hx\Database\Sql\UpdateInterface::RESET_SQL)
				->table($this->tableName)
				->where('id = :id')
				->column('status', ':status')
				->column('fail_cnt', ':failCnt')
				->column('last_update', ':date')
				->param(':id', $head->getId())
				->param(':status', intval($queueItem->getStatus()))
				->param(':failCnt', intval($queueItem->getFailCount()))
				->param(':date', date('Y-m-d h:i:s'))
				->execute();
		}
	}
}
?>