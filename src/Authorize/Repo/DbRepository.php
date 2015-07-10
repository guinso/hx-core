<?php 
namespace Hx\Authorize\Repo;

class DbRepository implements RepositoryInterface {
	
	private $selectNameSql, $selectListSql;
	private $tableName, $acessTableName, $userTableName;
	
	public function __construct(\Hx\Database\SqlServiceInterface $sqlService)
	{
		$this->selectListSql = $sqlService->createSelectSql();
		
		$this->selectNameSql = $sqlService->createSelectSql();
		
		$this->tableName = 'access';
		
		$this->acessTableName = 'function';
		
		$this->userTableName = 'account';
		
		$this->prepareSql();
	}
	
	private function prepareSql()
	{
		$this->selectNameSql->reset()
			->table("{$this->tableName} a")
			->select('a.*')
			->join('JOIN', "{$this->acessTableName} b", 'a.function_id = b.id')
			->join('JOIN', "{$this->userTableName} c", 'a.role_id = c.role_id')
			->where('b.name = :name')
			->where('c.id = :userId');
		
		$this->selectListSql->reset()
			->table("{$this->tableName} a")
			->select("a.*")
			->join('JOIN', "{$this->acessTableName} b", 'a.function_id = b.id')
			->join('JOIN', "{$this->userTableName} c", 'a.role_id = c.role_id')
			->where('c.id = :userId');
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
				$row['id'], 
				$row['name'], 
				$row['is_accessible'] == 1, 
				$row['role_id']
			);
	}
}
?>