<?php 
class DbInsertTest extends PHPUnit_Framework_TestCase {
	
	public function testInsert()
	{
		$db = new \Hx\Database\SimpleDb(HxUnitTestService::getPdo());
		
		$db->runSqlFile(__DIR__ . DIRECTORY_SEPARATOR . 'account.sql');
		
		$insertSql = new \Hx\Database\Sql\Insert($db);
		
		$insertSql->reset()
			->table('account')
			->column('id', ':id')
			->column('username', ':username')
			->column('password', ':pwd')
			->column('status', ":status")
			->column('session', ':session')
			->column('role_id', ':roleId')
			->param(':id', 'A0000000003')
			->param(':username', 'ben')
			->param(':pwd', '123qwe')
			->param(':status', 1)
			->param(':session', '2348wft')
			->param(':roleId', 'A0000000001')
			->execute();
		
		$selectSql = new \Hx\Database\Sql\Select($db);
		
		$raw = $selectSql->reset()
			->table('account')
			->select('*')
			->execute();
		
		$this->assertEquals(3, $raw->rowCount());
	}
}
?>