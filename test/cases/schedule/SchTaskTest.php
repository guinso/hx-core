<?php 
class SchTaskTest extends PHPUnit_Framework_TestCase {
	
	
	public function testCreateTask()
	{
		$id = '1';
		
		$className = "SampleClass";
		
		$functionName = "sampleFunction";
		
		$status = \Hx\Schedule\TaskInterface::ENABLE;
		
		$description = '....';
		
		$month = "12";
		
		$day = "*";
		
		$weekday = "*/16";
		
		$hour = "0";
		
		$minute = "6";
		
		$task = new \Hx\Schedule\Task(
			$id, 
			$className, 
			$functionName, 
			$description, 
			$status, 
			$month, $day, $weekday, $hour, $minute
		);
		
		$this->assertEquals($id, $task->getId());
		
		$this->assertEquals($className, $task->getClassName());
		
		$this->assertEquals($functionName, $task->getFunctionName());
		
		$this->assertEquals($status, $task->getStatus());
		
		$this->assertEquals($description, $task->getDescription());
		
		$this->assertEquals($month, $task->getMonth());
		
		$this->assertEquals($day, $task->getDay());
		
		$this->assertEquals($weekday, $task->getWeekday());
		
		$this->assertEquals($hour, $task->getHour());
		
		$this->assertEquals($minute, $task->getMinute());
	}
}
?>