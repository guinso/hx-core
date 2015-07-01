<?php 
class SchDbRepoTest extends PHPUnit_Framework_TestCase {
	
	public function testCreate()
	{
		$repo = new \Hx\Schedule\Repo\DbRepository(
			new \Hx\Database\SqlService(
				new \Hx\Database\SimpleDb(HxUnitTestService::getPdo())
			), 
			$this->getMockBuilder('\Hx\Schedule\Repo\DbMapperInterface')->getMock()
		);
	}
	
	public function testGetById()
	{
		HxUnitTestService::runSql(
			__DIR__ . DIRECTORY_SEPARATOR . 'schedule.sql');
		
		$db = new \Hx\Database\SimpleDb(HxUnitTestService::getPdo());
		
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
		
		$repo = new \Hx\Schedule\Repo\DbRepository(
			new \Hx\Database\SqlService($db),
			new \Hx\Schedule\Repo\DbMapper(
				$tableName, $id,
				$className, $functionName,
				$description, $status,
				$month, $day, $weekday, $hour, $minute)
		);
		
		$firstId = 'A0000000001';
		
		$task = $repo->getById($firstId);
		
		$this->assertEquals($firstId, $task->getId());
	}
	
	public function testGetAll()
	{
		HxUnitTestService::runSql(
			__DIR__ . DIRECTORY_SEPARATOR . 'schedule.sql');
		
		$db = new \Hx\Database\SimpleDb(HxUnitTestService::getPdo());
		
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
		
		$repo = new \Hx\Schedule\Repo\DbRepository(
			new \Hx\Database\SqlService($db),
			new \Hx\Schedule\Repo\DbMapper(
					$tableName, $id,
					$className, $functionName,
					$description, $status,
					$month, $day, $weekday, $hour, $minute)
		);
		
		$raw = $repo->getAll(null);
		
		$this->assertEquals(3, COUNT($raw));
		
		$raw2 = $repo->getAll(\Hx\Schedule\TaskInterface::DISABLE);
		
		$this->assertEquals(0, COUNT($raw2));
	}
}
?>