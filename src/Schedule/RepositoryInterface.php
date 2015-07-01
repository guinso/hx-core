<?php 
namespace Hx\Schedule;

interface RepositoryInterface {
	
	public function getById($id);
	
	public function getAll($status);
}
?>