<?php 
namespace Hx\Authenticate\Repo;

interface DbMapperInterface {
	
	public function getTable();
	
	public function getUsername();
	
	public function getStatus();
	
	public function getSession();
	
	public function getPassword();
	
	public function getId();
	
	public function getRoleId();
}
?>