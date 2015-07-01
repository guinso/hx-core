<?php 
class DbSimpleDbTest extends PHPUnit_Framework_TestCase {
	
	public function testCreate()
	{
		$db = new \Hx\Database\SimpleDb(HxUnitTestService::getPdo());
		
		$this->assertEquals(HxUnitTestService::getPdo(), $db->getPdo());
	}
	
	public function testRunSqlFile()
	{
		$db = new \Hx\Database\SimpleDb(HxUnitTestService::getPdo());
		
		$db->runSqlFile(
			__DIR__ . DIRECTORY_SEPARATOR . 'account.sql');
	}
	
	public function testRunSql()
	{
		$db = new \Hx\Database\SimpleDb(HxUnitTestService::getPdo());
		
		$raw = $db->runSql(
			"SELECT * FROM account WHERE username = :username", 
			array(':username' => 'user')
		);
		
		$this->assertEquals(1, $raw->rowCount(), "Fail to run SQL query");
	}
}
?>