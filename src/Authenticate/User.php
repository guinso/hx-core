<?php 
namespace Hx\Authenticate;

class User implements UserInterface {

	private $username, $password, $status, $session, $id, $roleId;
	
	public function __construct(
		$username, 
		$password, 
		$status, 
		$session, 
		$id,
		$roleId) 
	{
		$this->username = $username;
		
		$this->password = $password;
		
		$this->status = $status;
		
		$this->session = $session;
		
		$this->id = $id;
		
		$this->roleId = $roleId;
	}
	
	public function getId()
	{
		return $this->id;
	}
	
	public function getUsername()
	{
		return $this->username;
	}
	
	public function getPassword()
	{
		return $this->password;
	}
	
	public function getStatus()
	{
		return $this->status;
	}
	
	public function getSession()
	{
		return $this->session;
	}
	
	public function getRoleId()
	{
		return $this->roleId;
	}
}
?>