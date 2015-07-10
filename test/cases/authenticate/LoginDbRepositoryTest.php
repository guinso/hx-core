<?php 
class LoginDbRepositoryTest extends PHPUnit_Framework_TestCase {
	
	public function testCreate()
	{
		HxUnitTestService::runSql(
			__DIR__ . DIRECTORY_SEPARATOR . 'account.sql');
		
		$table = 'account';
		$username = 'username';
		$password = 'password';
		$session = 'session';
		$status = 'status';
		$roleId = 'role_id';
		$id = 'id';
		
		$repo = new \Hx\Authenticate\Repo\DbRepository(
			new \Hx\Database\SqlService(
				new \Hx\Database\SimpleDb(HxUnitTestService::getPdo())
			),
			new \Hx\Authenticate\Repo\DbMapper(
				$table, $username, $status, $session, $password, $id, $roleId)
		);
		
		$user = $repo->getUser('user');
		
		$this->assertNotNull($user);
		
		$admin = $repo->getUserBySessionId("ga563ab68c");
		
		$this->assertNotNull($admin);
		
		$this->assertEquals('admin', $admin->getUsername());
		
		$repo->updateStatus($user);
	}
}
?>