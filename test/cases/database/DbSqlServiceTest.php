<?php 
class DbSqlServiceTest extends PHPUnit_Framework_TestCase {
	
	public function testCreate()
	{
		$db = new \Hx\Database\SimpleDb(HxUnitTestService::getPdo());
		
		$sqlService = new \Hx\Database\SqlService($db);
		
		$select = $sqlService->createSelectSql();
		
		$this->assertInstanceOf("\Hx\Database\Sql\SelectInterface", $select);
		
		$insert = $sqlService->createInsertSql();
		
		$this->assertInstanceOf("\Hx\Database\Sql\InsertInterface", $insert);
		
		$update = $sqlService->createUpdateSql();
		
		$this->assertInstanceOf("\Hx\Database\Sql\UpdateInterface", $update);
	}
}
?>