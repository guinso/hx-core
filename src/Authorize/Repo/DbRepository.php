<?php 
namespace Hx\Authorize\Repo;

class DbRepository implements \Hx\Authorize\RepositoryInterface {
	
	private $selectNameSql, $selectListSql;
	private $userDbMapper, $accessDbMapper, $criteriaDbMapper;
	
	public function __construct(
		\Hx\Database\SqlServiceInterface $sqlService,
		\Hx\Authenticate\Repo\DbMapperInterface $userDbMapper,
		\Hx\Authorize\Repo\AccessDbMapperInterface $accessDbMapper,
		\Hx\Authorize\Repo\CriteriaDbMapperInterface $criteriaDbMapper)
	{
		$this->selectListSql = $sqlService->createSelectSql();
		
		$this->selectNameSql = $sqlService->createSelectSql();
		
		$this->userDbMapper = $userDbMapper;
		
		$this->accessDbMapper = $accessDbMapper;
		
		$this->criteriaDbMapper = $criteriaDbMapper;
		
		$this->prepareSql();
	}
	
	private function prepareSql()
	{
		$this->selectNameSql->reset()
			->table("{$this->accessDbMapper->getTable()} a")
			->select('a.*')
			->select("b.{$this->criteriaDbMapper->getName()} AS name")
			->join('JOIN', 
				"{$this->criteriaDbMapper->getTable()} b", 
				"a.{$this->accessDbMapper->getCriteriaId()} = b.{$this->criteriaDbMapper->getId()}")
			->join('JOIN', 
				"{$this->userDbMapper->getTable()} c", 
				"a.{$this->accessDbMapper->getRoleId()} = c.{$this->userDbMapper->getRoleId()}")
			->where("b.{$this->criteriaDbMapper->getName()} = :name")
			->where("c.{$this->userDbMapper->getId()} = :userId");
		
		$this->selectListSql->reset()
			->table("{$this->accessDbMapper->getTable()} a")
			->select("a.*")
			->select("b.{$this->criteriaDbMapper->getName()} AS name")
			->join('JOIN', 
				"{$this->criteriaDbMapper->getTable()} b", 
				"a.{$this->accessDbMapper->getCriteriaId()} = b.{$this->criteriaDbMapper->getId()}")
			->join('JOIN', 
				"{$this->userDbMapper->getTable()} c", 
				"a.{$this->accessDbMapper->getRoleId()} = c.{$this->userDbMapper->getRoleId()}")
			->where("c.{$this->userDbMapper->getId()} = :userId");
	}
	
	public function getByName($accessName, $userId)
	{
		$this->selectNameSql
			->reset(\Hx\Database\Sql\SelectInterface::RESET_PARAM)
			->param(':name', $accessName)
			->param(':userId', $userId);
		
		$raw = $this->selectNameSql->execute();
		
		if ($raw->rowCount() > 0)
			return $this->getFormatObj($raw->fetch());
		else
			return null;
	}
	
	public function getList($userId)
	{
		$this->selectListSql
			->reset(\Hx\Database\Sql\SelectInterface::RESET_PARAM)
			->param(':userId', $userId);
		
		$raw = $this->selectListSql->execute();
		
		$result = array();
		
		foreach ($raw as $row)
			$result[] = $this->getFormatObj($row);
		
		return $result;
	}
	
	private function getFormatObj($row)
	{
		if (empty($row['id']))
			return null;
		else 
			return new \Hx\Authorize\Access(
				$row[$this->accessDbMapper->getId()], 
				$row['name'], 
				$row[$this->accessDbMapper->getCanAccess()] == 1, 
				$row[$this->accessDbMapper->getRoleId()]
			);
	}
}
?>