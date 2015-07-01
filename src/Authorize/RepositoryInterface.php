<?php 
namespace Hx\Authorize;

interface RepositoryInterface {
	
	public function getByName($accessName, $userId);
	
	public function getList($userId);
}
?>