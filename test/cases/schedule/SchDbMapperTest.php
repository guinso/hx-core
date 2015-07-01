<?php 
class SchDbMapperTest extends PHPUnit_Framework_TestCase {
	
	public function testCreate()
	{
		$tableName = "schedule";
		$id = "id";
		$className = "class_name";
		$functionName = 'function_name';
		$description = 'description';
		$status = 'status';
		$month = "month";
		$day = "day";
		$weekday = "weekday";
		$hour = 'hour';
		$minute = 'minute';
		
		$mapper = new \Hx\Schedule\Repo\DbMapper(
			$tableName, 
			$id, 
			$className, 
			$functionName, 
			$description, 
			$status, 
			$month, 
			$day, 
			$weekday, 
			$hour, 
			$minute
		);
		
		$this->assertEquals($tableName, $mapper->getTable());
		
		$this->assertEquals($id, $mapper->getId());
		
		$this->assertEquals($className, $mapper->getClassName());
		
		$this->assertEquals($functionName, $mapper->getFunctionName());
		
		$this->assertEquals($description, $mapper->getDescription());
		
		$this->assertEquals($status, $mapper->getStatus());
		
		$this->assertEquals($month, $mapper->getMonth());
		
		$this->assertEquals($day, $mapper->getDay());
		
		$this->assertEquals($weekday, $mapper->getWeekday());
		
		$this->assertEquals($hour, $mapper->getHour());
		
		$this->assertEquals($minute, $mapper->getMinute());
	}
}
?>