<?php 
class UserTest extends PHPUnit_Framework_TestCase {
	
	public function testCreate()
	{
		$username = "john";
		
		$password = "123456789";
		
		$status = \Hx\Authenticate\UserInterface::LOGIN;
		
		$session = '42765abg83ed';
		
		$id = '1';
		
		$roleId = "4";
		
		$user = new \Hx\Authenticate\User(
			$username, $password, $status, $session, $id, $roleId);
		
		$this->assertEquals($username, $user->getUsername());
		
		$this->assertEquals($password, $user->getPassword());
		
		$this->assertEquals($status, $user->getStatus());
		
		$this->assertEquals($session, $user->getSession());
		
		$this->assertEquals($id, $user->getId());
		
		$this->assertEquals($roleId, $user->getRoleId());
	}
}
?>