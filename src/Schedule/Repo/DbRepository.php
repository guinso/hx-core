<?php 
namespace Hx\Schedule\Repo;

class DbRepository implements \Hx\Schedule\RepositoryInterface {
	
	private $selectSql, $selectAllSql, $updateSql;
	
	private $mapper;
	
	public function __construct(
		\Hx\Database\SqlServiceInterface $sqlService,
		\Hx\Schedule\Repo\DbMapperInterface $mapper)
	{
		$this->mapper = $mapper;
		
		$this->selectSql = $sqlService->createSelectSql();
		
		$this->selectAllSql = $sqlService->createSelectSql();
		
		$this->updateSql = $sqlService->createUpdateSql();
	}
	
	public function getById($id)
	{
		$this->selectSql->reset()
			->table($this->mapper->getTable())
			->select('*')
			->where("{$this->mapper->getId()} = :id")
			->param(':id', $id);
		
		$raw = $this->selectSql->execute();
		
		if ($raw->rowCount() > 0)
			return $this->createTaskObj($raw->fetch());
		else 
			return null;
	}
	
	public function getAll($status)
	{
		if (!empty($status) &&  
			($status != \Hx\Schedule\TaskInterface::DISABLE &&
			$status != \Hx\Schedule\TaskInterface::ENABLE))
			Throw new \Hx\Schedule\ScheduleException(
				"Invalid status parameter value detected: $status");
		
		$this->selectAllSql->reset()
			->table($this->mapper->getTable())
			->select('*');
		
		if (!empty($status))
			$this->selectAllSql
				->where("{$this->mapper->getStatus()} = :status")
				->param(':status', $status);
		
		$raw = $this->selectAllSql->execute();
		
		$result = array();
		
		foreach ($raw as $row)
			$result[] = $this->createTaskObj($row);
		
		return $result;
	}
	
	private function createTaskObj($row)
	{
		if (!empty($row[$this->mapper->getId()]))
			return new \Hx\Schedule\Task(
				$row[$this->mapper->getId()], 
				$row[$this->mapper->getClassName()], 
				$row[$this->mapper->getFunctionName()], 
				$row[$this->mapper->getDescription()], 
				intval($row[$this->mapper->getStatus()]), 
				$row[$this->mapper->getMonth()], 
				$row[$this->mapper->getDay()], 
				$row[$this->mapper->getWeekday()], 
				$row[$this->mapper->getHour()],
				$row[$this->mapper->getMinute()]
			);
		else 
			return null;
	}
}
?>