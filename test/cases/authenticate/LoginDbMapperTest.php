<?php 
class LoginDbMapperTest extends PHPUnit_Framework_TestCase {
	
	public function testCreate()
	{
		$table = 'account';
		
		$username = 'username';
		
		$password = 'password';
		
		$session = 'session';
		
		$status = 'status';
		
		$roleId = 'role_id';
		
		$id = 'id';
		
		$mapper = new \Hx\Authenticate\Repo\DbMapper(
			$table, $username, $status, $session, $password, $id, $roleId);
		
		$this->assertEquals($table, $mapper->getTable());
		
		$this->assertEquals($username, $mapper->getUsername());
		
		$this->assertEquals($password, $mapper->getPassword());
		
		$this->assertEquals($session, $mapper->getSession());
		
		$this->assertEquals($status, $mapper->getStatus());
		
		$this->assertEquals($roleId, $mapper->getRoleId());
		
		$this->assertEquals($id, $mapper->getId());
	}
}
?>