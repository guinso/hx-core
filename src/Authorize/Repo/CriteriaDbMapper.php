<?php 
namespace Hx\Authorize\Repo;

class CriteriaDbMapper implements CriteriaDbMapperInterface {
	
	private $tableName, $id, $name, $groupId;
	
	public function __construct($tableName, $id, $name, $groupId)
	{
		$this->tableName = $tableName;
		
		$this->id = $id;
		
		$this->name = $name;
		
		$this->groupId = $groupId;
	}
	
	public function getTable()
	{
		return $this->tableName;	
	}
	
	public function getId()
	{
		return $this->id;
	}
	
	public function getName()
	{
		return $this->name;
	}
	
	public function getGroupId()
	{
		return $this->groupId;
	}
}
?>