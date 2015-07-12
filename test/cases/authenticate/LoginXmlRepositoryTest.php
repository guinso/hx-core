<?php 
class LoginXmlRepositoryTest extends PHPUnit_Framework_TestCase {
	
	public function testRead()
	{
		$repo = new \Hx\Authenticate\Repo\XmlRepository(
			__DIR__ . DIRECTORY_SEPARATOR . 'account-read.xml');
		
		$user = $repo->getUser('admin');
		
		$this->assertNotNull($user, "fail to read account XML");
		
		$this->assertEquals("admin", $user->getUsername(), "fail to find by username");
	}
	
	public function testSave()
	{
		$oriFile = __DIR__ . DIRECTORY_SEPARATOR . 'account-read.xml';
		
		$dupFile = __DIR__ . DIRECTORY_SEPARATOR . 'account-read-dub.xml';
		
		copy($oriFile, $dupFile);
		
		$repo = new \Hx\Authenticate\Repo\XmlRepository($dupFile);
		
		$repo->updateStatus(new \Hx\Authenticate\User(
			'user', '', \Hx\Authenticate\UserInterface::LOGIN, '', 1, 1));
		
		$user = $repo->getUser('user');
		
		$this->assertEquals(
			\Hx\Authenticate\UserInterface::LOGIN, 
			$user->getStatus(), 
			"fail to update status");
	}
}
?>