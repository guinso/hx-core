<?php 
class SchScheduleTest extends PHPUnit_Framework_TestCase {
	
	public function testCreate()
	{
		$mockRepo = $this->getMockBuilder('\Hx\Schedule\RepositoryInterface')->getMock();
		
		$sch = new \Hx\Schedule\Schedule($mockRepo);
	}
	
	public function testManualRun()
	{
		$dupFilePath = __DIR__ . DIRECTORY_SEPARATOR . 'dupSample.txt';
		
		if (file_exists($dupFilePath))
			unlink($dupFilePath);
		
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
		
		$sch = new \Hx\Schedule\Schedule($repo);
		
		$task = $repo->getById("A0000000002");
		
		$sch->manualRun($task);
		
		$this->assertTrue(file_exists($dupFilePath), "Fail to run dupFile");
	}
	
	public function testRun()
	{
		$dupFilePath = __DIR__ . DIRECTORY_SEPARATOR . 'dupSample.txt';
		
		$dupFile2Path = __DIR__ . DIRECTORY_SEPARATOR . 'dupAsd.txt';
		
		if (file_exists($dupFilePath))
			unlink($dupFilePath);
		
		if (file_exists($dupFile2Path))
			unlink($dupFile2Path);
		
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
		
		$sch = new \Hx\Schedule\Schedule($repo);
		
		$sch->run();
		
		$this->assertTrue(file_exists($dupFilePath) && file_exists($dupFile2Path));
	}
	
	public static function dupFile()
	{
		copy(
			__DIR__ . DIRECTORY_SEPARATOR . 'sample.txt', 
			__DIR__ . DIRECTORY_SEPARATOR . 'dupSample.txt');
	}
	
	public static function dupFile2()
	{
		copy(
			__DIR__ . DIRECTORY_SEPARATOR . 'asd.txt',
			__DIR__ . DIRECTORY_SEPARATOR . 'dupAsd.txt');
	}
}
?>