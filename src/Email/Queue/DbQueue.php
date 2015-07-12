<?php 
namespace Hx\Email\Queue;

class DbQueue implements QueueInterface {

	private $sqlService, $nextIdService, $maxFailCount;
		
	private $select, $insert, $update, $mapper;
	
	public function __construct(
		\Hx\Database\SqlServiceInterface $sqlService,
		\Hx\Database\Record\IdInterface $nextIdService,
		\Hx\Email\Queue\DbMapperInterface $mapper)
	{
		$this->maxFailCount = 3;
		
		$this->sqlService = $sqlService;
		
		$this->nextIdService = $nextIdService;
		
		$this->select = $this->sqlService->createSelectSql();
		
		$this->insert = $this->sqlService->createInsertSql();
		
		$this->update = $this->sqlService->createUpdateSql();
		
		$this->mapper = $mapper;
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
			->table($this->mapper->getTable())
			->column($this->mapper->getId(), ':id')
			->column($this->mapper->getStatus(), ':status')
			->column($this->mapper->getFailCnt(), ':failCnt')
			->column($this->mapper->getLastUpdate(), ':date')
			->column($this->mapper->getGuid(), ':guid')
			->column($this->mapper->getSubject(), ':subject')
			->column($this->mapper->getMessage(), ':msg')
			->column($this->mapper->getTos(), ":tos")
			->column($this->mapper->getCcs(), ':ccs')
			->column($this->mapper->getBccs(), ':bccs')
			->column($this->mapper->getAttachments(), ':attchs')
			->param(':id', $this->nextIdService->getNextId($this->mapper->getTable(), 'id'))
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
			->table($this->mapper->getTable())
			->select('*')
			->where("{$this->mapper->getGuid()} = :guid")
			->param(':guid', $queueItem->getId())
			->execute();
		
		return $raw->rowCount() > 0;
	}
	
	public function getHead()
	{
		$raw = $this->select->reset(
				\Hx\Database\Sql\SelectInterface::RESET_PARAM |
				\Hx\Database\Sql\SelectInterface::RESET_SQL)
			->table($this->mapper->getTable())
			->select('*')
			->order($this->mapper->getId())
			->where("({$this->mapper->getStatus()} = 1 OR 
				({$this->mapper->getStatus()} = 3 AND 
				 {$this->mapper->getFailCnt()} < :maxFailCnt
				))")
			->param(':maxFailCnt', $this->maxFailCount)
			->execute();
		
		$row = $raw->fetch();
		
		if (empty($row['id']))
			return null;
		else 
		{
			return new \Hx\Email\Queue\Item(
				new \Hx\Email\Mail(
					unserialize($row[$this->mapper->getTos()]),
					unserialize($row[$this->mapper->getCcs()]),
					unserialize($row[$this->mapper->getBccs()]),
					$row[$this->mapper->getSubject()],
					$row[$this->mapper->getMessage()],
					unserialize($row[$this->mapper->getAttachments()])
				), 
				intval($row[$this->mapper->getStatus()]), 
				$row[$this->mapper->getId()], 
				intval($row[$this->mapper->getFailCnt()])
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
				->table($this->mapper->getTable())
				->where("{$this->mapper->getId()} = :id")
				->column($this->mapper->getStatus(), ':status')
				->column($this->mapper->getFailCnt(), ':failCnt')
				->column($this->mapper->getLastUpdate(), ':date')
				->param(':id', $head->getId())
				->param(':status', intval($queueItem->getStatus()))
				->param(':failCnt', intval($queueItem->getFailCount()))
				->param(':date', date('Y-m-d h:i:s'))
				->execute();
		}
	}
}
?>