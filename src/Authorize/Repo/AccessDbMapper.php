<?php 
namespace Hx\Authorize\Repo;

class AccessDbMapper implements AccessDbMapperInterface {
	
	private $table, $id, $roleId, $canAccess, $criteriaId;
	
	public function __construct($table, $id, $roleId, $canAccess, $criteriaId)
	{
		$this->table = $table;
		
		$this->id = $id;
		
		$this->roleId = $roleId;
		
		$this->canAccess = $canAccess;
		
		$this->criteriaId = $criteriaId;
	}
	
	public function getTable()
	{
		return $this->table;
	}
	
	public function getId()
	{
		return $this->id;
	}
	
	public function getRoleId()
	{
		return $this->roleId;
	}
	
	public function getCanAccess()
	{
		return $this->canAccess;
	}
	
	public function getCriteriaId()
	{
		return $this->criteriaId;
	}
}
?>