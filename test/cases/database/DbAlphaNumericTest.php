<?php 
class DbAlphaNumericTest extends PHPUnit_Framework_TestCase {
	
	public function testGetLatestId()
	{
		$db = new \Hx\Database\SimpleDb(HxUnitTestService::getPdo());
		
		$db->runSqlFile(__DIR__ . DIRECTORY_SEPARATOR . 'account.sql');
		
		$alphaNumeric = new \Hx\Database\Record\AlphaNumericId(
			new \Hx\Database\Sql\Select($db), 
			'A', 
			10
		);
		
		$nextId = $alphaNumeric->getNextId('account', 'id');
		
		$this->assertEquals('A0000000003', $nextId);
	}
}
?>