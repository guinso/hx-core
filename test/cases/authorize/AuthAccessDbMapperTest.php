<?php 
class AuthAccessDbMapperTest extends PHPUnit_Framework_TestCase {
	
	public function testCreate()
	{
		$table = 'access';
		$id = 1;
		$roleId = 3;
		$canAccess = false;
		$criteriaId = 1;
		
		$mapper = new \Hx\Authorize\Repo\AccessDbMapper(
			$table, $id, $roleId, $canAccess, $criteriaId);
		
		$this->assertEquals($table, $mapper->getTable());
		
		$this->assertEquals($id, $mapper->getId());
		
		$this->assertEquals($roleId, $mapper->getRoleId());
		
		$this->assertEquals($canAccess, $mapper->getCanAccess());
		
		$this->assertEquals($criteriaId, $mapper->getCriteriaId());
	}
}
?>