<?php 
class AuthDbRepositoryTest extends PHPUnit_Framework_TestCase {
	
	public function testGetByName()
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
		
		$access = $repo->getByName('create user', 'A0000000001');
		$this->assertEquals('create user', $access->getName());
		$this->assertEquals('A0000000001', $access->getRoleId());
		$this->assertEquals(false, $access->isAccessible());
		
		$access = $repo->getByName('create user', 'A0000000002');
		$this->assertEquals('create user', $access->getName());
		$this->assertEquals('A0000000002', $access->getRoleId());
		$this->assertEquals(true, $access->isAccessible());
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
	
		$accesses = $repo->getList('A0000000001');
		
		foreach($accesses as $access)
		{
			$name = $access->getName();
			
			if ($name == 'view user')
				$this->assertEquals(true, $access->isAccessible());
			else if ($name == 'create user')
				$this->assertEquals(false, $access->isAccessible());
			else if ($name == 'update user')
				$this->assertEquals(false, $access->isAccessible());
			else 
				Throw new Exception("unknown access criteria $name");
		}
	}
}
?>