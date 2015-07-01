<?php 
class DbUpdateTest extends PHPUnit_Framework_TestCase {
	
	public function testUpdate()
	{
		$db = new \Hx\Database\SimpleDb(HxUnitTestService::getPdo());
		
		$db->runSqlFile(__DIR__ . DIRECTORY_SEPARATOR . 'account.sql');
		
		$updateSql = new \Hx\Database\Sql\Update($db);
		
		$updateSql->reset()
			->table('account')
			->column('status', 1)
			->where('username = :username')
			->param(':username', 'admin')
			->execute();
		
		$selectSql = new \Hx\Database\Sql\Select($db);
		
		$raw = $selectSql->reset()
			->table('account')
			->select('*')
			->where('username = :username')
			->param(':username', 'admin')
			->execute();
		
		$row = $raw->fetch();
		
		$this->assertEquals(1, intval($row['status']));
	}
}
?>