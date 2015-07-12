<?php 
class AuthCriteriaDbMapperTest extends PHPUnit_Framework_TestCase {
	public function testCreate()
	{
		$tableName = 'access_criteria';
		$id = '1';
		$name = 'asd';
		$groupId = '3';
		
		$mapper = new \Hx\Authorize\Repo\CriteriaDbMapper(
			$tableName, $id, $name, $groupId);
		
		$this->assertEquals($tableName, $mapper->getTable());
		
		$this->assertEquals($id, $mapper->getId());
		
		$this->assertEquals($name, $mapper->getName());
		
		$this->assertEquals($groupId, $mapper->getGroupId());
	}
}
?>