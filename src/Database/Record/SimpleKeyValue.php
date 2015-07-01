<?php 
namespace Hx\Database\Record;

class SimpleKeyValue implements KeyValueInterface {
	
	private $selectSql, $insertSql, $updateSql;
	
	private $nextId;
	
	private $tableName;
	
	public function __construct(
		\Hx\Database\SqlServiceInterface $sqlService,
		\Hx\Database\Record\IdInterface $nextId)
	{
		$this->tableName = 'key_value';
		
		$this->nextId = $nextId;
		
		$this->selectSql = $sqlService->createSelectSql();
		
		$this->insertSql = $sqlService->createInsertSql();
		
		$this->updateSql = $sqlService->createUpdateSql();
		
		$this->intializeSql();
	}
	
	private function intializeSql()
	{
		$this->selectSql
			->reset()
			->table($this->tableName)
			->select('*')
			->where('key_pair = :key');
		
		$this->updateSql
			->reset()
			->table($this->tableName)
			->column('value', ':value')
			->where('key_pair = :key');
	}
	
	public function get($key, $defaultValue)
	{
		$raw = $this->selectSql->reset(
			\Hx\Database\Sql\SelectInterface::RESET_PARAM)
			->param(':key', $key)
			->execute();

		if ($raw->rowCount() > 0)
		{
			$row = $raw->fetch();
			
			return unserialize($row['value']);
		}
		else
			return $defaultValue;
	}
	
	public function set($key, $value)
	{
		if ($this->keyExists($key))
		{
			$this->updateSql
				->reset(\Hx\Database\Sql\UpdateInterface::RESET_PARAM)
				->param(':key', $key)
				->param(':value', serialize($value))
				->execute();
		}
		else 
		{
			$this->insertSql
				->reset()
				->table($this->tableName)
				->column('id', ':id')
				->column('key_pair', ':key')
				->column('value', ':value')
				->param(':id', $this->nextId->getNextId($this->tableName, 'id'))
				->param(':key', $key)
				->param(':value', serialize($value))
				->execute();
		}
	}
	
	private function keyExists($key)
	{
		$raw = $this->selectSql->reset(
			\Hx\Database\Sql\SelectInterface::RESET_PARAM)
			->param(':key', $key)
			->execute();
		
		return $raw->rowCount() > 0;
	}
}
?>