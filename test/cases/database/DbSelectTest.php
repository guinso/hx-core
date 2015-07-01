<?php 
class DbSelectTest extends PHPUnit_Framework_TestCase {
	
	public function testSelect()
	{
		$db = new \Hx\Database\SimpleDb(HxUnitTestService::getPdo());
		
		$db->runSqlFile(__DIR__ . DIRECTORY_SEPARATOR . 'account.sql');
		
		$selectSql = new \Hx\Database\Sql\Select($db);
		
		$raw = $selectSql->reset()
			->table('account')
			->select('*')
			->where('username = :username')
			->param(':username', 'user')
			->order('id')
			->execute();
		
		$this->assertEquals(1, $raw->rowCount());
	}
}
?>