<?php 
class IcXmlRuleLoaderTest extends PHPUnit_Framework_TestCase {
	
	public function testCreate()
	{
		$dir = __DIR__;
		
		$loader = new \Hx\IocContainer\RuleLoader\XmlRuleLoader(
			new \Hx\File\File(), $dir);
		
		$this->assertEquals($dir, $loader->getRootDir());
	}
	
	public function testLoad()
	{
		$dir = HxUnitTestService::getTestRootPath();
		
		$loader = new \Hx\IocContainer\RuleLoader\XmlRuleLoader(
			new \Hx\File\File(), $dir);
		
		$content = file_get_contents(
			__DIR__ . DIRECTORY_SEPARATOR . 'recipe' . DIRECTORY_SEPARATOR . 'core.xml');
		
		$rules = $loader->loadString($content);
		
		$this->assertEquals(4, count($rules));
		
		$this->assertNotNull($rules['\Hx\IocContainer\IocContainerInterface']);
	}
	
	public function testLoadFile()
	{
		$dir = HxUnitTestService::getTestRootPath();
	
		$loader = new \Hx\IocContainer\RuleLoader\XmlRuleLoader(
				new \Hx\File\File(), $dir);

		$rules = $loader->loadFile(
			__DIR__ . DIRECTORY_SEPARATOR . 'recipe' . DIRECTORY_SEPARATOR . 'core.xml');
	
		$this->assertEquals(4, count($rules));
	
		$this->assertNotNull($rules['\Hx\IocContainer\IocContainerInterface']);
	}
	
	public function testLoadDir()
	{
		$dir = HxUnitTestService::getTestRootPath();
	
		$loader = new \Hx\IocContainer\RuleLoader\XmlRuleLoader(
				new \Hx\File\File(), $dir);
	
		$rules = $loader->loadDir(
			__DIR__ . DIRECTORY_SEPARATOR . 'recipe');
	
		$this->assertEquals(8, count($rules));
	
		$this->assertNotNull($rules['\Hx\IocContainer\IocContainerInterface']);
		
		$this->assertNotNull($rules['\Hx\Route\MapLoader\XmlMapLoader']);
	}
}
?>