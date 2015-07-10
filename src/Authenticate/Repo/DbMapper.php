<?php 
namespace Hx\Authenticate\Repo;

class DbMapper implements DbMapperInterface {
	
	private $tableName, $username, $status, $session, $password, $id, $roleId;
	
	public function __construct(
		$tableName, $username, $status, 
		$session, $password, $id, $roleId)
	{
		$this->tableName = $tableName;
		
		$this->username = $username;
		
		$this->status = $status;
		
		$this->session = $session;
		
		$this->password = $password;
		
		$this->id = $id;
		
		$this->roleId = $roleId;
	}
	
	public function getTable()
	{
		return $this->tableName;
	}
	
	public function getUsername()
	{
		return $this->username;
	}
	
	public function getStatus()
	{
		return $this->status;
	}
	
	public function getSession()
	{
		return $this->session;
	}
	
	public function getPassword()
	{
		return $this->password;
	}
	
	public function getId()
	{
		return $this->id;
	}
	
	public function getRoleId()
	{
		return $this->roleId;
	}
}
?>