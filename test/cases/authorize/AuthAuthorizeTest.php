<?php 
class AuthAuthorizeTest extends PHPUnit_Framework_TestCase {
	
	public function testCreate()
	{
		HxUnitTestService::runSql(
			__DIR__ . DIRECTORY_SEPARATOR . 'access.sql');
		
		$repo = new \Hx\Authorize\Repo\DbRepository(
			new \Hx\Database\SqlService(
				new \Hx\Database\SimpleDb(HxUnitTestService::getPdo())
			),
			new \Hx\Authenticate\Repo\DbMapper(
				'account', 'username', 'status', 'session', 'password', 'id', 'role_id'),
			new \Hx\Authorize\Repo\AccessDbMapper(
				'access', 'id', 'role_id', 'can_access', 'criteria_id'),
			new \Hx\Authorize\Repo\CriteriaDbMapper(
				'access_criteria', 'id', 'name', 'group_id')
		);
		
		$authorize = new \Hx\Authorize\Authorize($repo);
		
		$userId = 'A0000000001';
		$adminId = 'A0000000002';
		
		$result = $authorize->isAuthorize('create user', $userId);
		$this->assertFalse($result);
		
		$result = $authorize->isAuthorize('create user', $adminId);
		$this->assertTrue($result);
		
		$result = $authorize->isAuthorizeArray(array('view user', 'update user'), $userId);
		$this->assertTrue($result);
		
		$result = $authorize->isAuthorizeArray(array('create user', 'update user'), $userId);
		$this->assertFalse($result);
	}
	
	public function testGetList()
	{
		HxUnitTestService::runSql(
		__DIR__ . DIRECTORY_SEPARATOR . 'access.sql');
	
		$repo = new \Hx\Authorize\Repo\DbRepository(
				new \Hx\Database\SqlService(
						new \Hx\Database\SimpleDb(HxUnitTestService::getPdo())
				),
				new \Hx\Authenticate\Repo\DbMapper(
						'account', 'username', 'status', 'session', 'password', 'id', 'role_id'),
				new \Hx\Authorize\Repo\AccessDbMapper(
						'access', 'id', 'role_id', 'can_access', 'criteria_id'),
				new \Hx\Authorize\Repo\CriteriaDbMapper(
						'access_criteria', 'id', 'name', 'group_id')
		);
	
		$authorize = new \Hx\Authorize\Authorize($repo);
	
		$userId = 'A0000000001';
		$adminId = 'A0000000002';
	
		$accesses = $authorize->getAccessList($userId);
		
		$found = $this->hasFound($accesses, 'view user');
		$this->assertTrue($found, 'view user not found');
		
		$found = $this->hasFound($accesses, 'create user');
		$this->assertTrue($found, 'create user not found');
		
		$found = $this->hasFound($accesses, 'update user');
		$this->assertTrue($found, 'update user not found');
		
	}
	
	private function hasFound(array $arr, $name)
	{
		$found = false;
		
		foreach($arr as $x)
		{
			if ($x->getName() == $name)
				$found = true;
		}
		
		return $found;
	}
}
?>