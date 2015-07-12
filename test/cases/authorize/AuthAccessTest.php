<?php 
class AuthAccessTest extends PHPUnit_Framework_TestCase {
	
	public function testCreate()
	{
		$id = '1';
		$name = 'can read';
		$isAccessible = true;
		$roleId = '1';
		
		$access = new \Hx\Authorize\Access($id, $name, $isAccessible, $roleId);
		
		$this->assertEquals($id, $access->getId());
		
		$this->assertEquals($name, $access->getName());
		
		$this->assertEquals($isAccessible, $access->isAccessible());
		
		$this->assertEquals($roleId, $access->getRoleId());
	}
}
?>