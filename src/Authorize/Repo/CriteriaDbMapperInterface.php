<?php 
namespace Hx\Authorize\Repo;

interface CriteriaDbMapperInterface {
	
	public function getTable();
	
	public function getId();
	
	public function getName();
	
	public function getGroupId();
}
?>