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
	
	public function getTable();
	
	public function getId();
	
	public function getRoleId();
	
	public function getCanAccess();
	
	public function getCriteriaId();
}
?>