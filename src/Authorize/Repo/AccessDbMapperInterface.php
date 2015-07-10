<?php 
namespace Hx\Authorize\Repo;

interface AccessDbMapperInterface {
	
	public function getTable();
	
	public function getId();
	
	public function getRoleId();
	
	public function getCanAccess();
	
	public function getCriteriaId();
}
?>