<?php 
class IcContainer extends PHPUnit_Framework_TestCase {
	
	public function testCreate()
	{
		$rules = array(
			'asd' => $this->getMockBuilder('\Hx\IocContainer\RuleInterface')->getMock(),
			'qwe' => $this->getMockBuilder('\Hx\IocContainer\RuleInterface')->getMock(),
		);
		
		$ioc = new \Hx\IocContainer\IocContainer($rules);
	}
	
	public function testResolve()
	{
		$dir = dirname(HxUnitTestService::getTestRootPath());
		
		$loader = new \Hx\IocContainer\RuleLoader\XmlRuleLoader(
			new \Hx\File\File(), $dir);
		
		$rules = $loader->loadDir(
			__DIR__ . DIRECTORY_SEPARATOR . 'recipe');
		
		$ioc = new \Hx\IocContainer\IocContainer($rules);
		
		//test service and clojure
		$serviceX = $ioc->resolve('\Hx\IocContainer\IocContainerInterface');
		
		$serviceY = $ioc->resolve('\Hx\IocContainer\IocContainerInterface');
		
		$this->assertNotNull($serviceX);
		
		$this->assertEquals(
			$serviceX, 
			$serviceY, 
			"Should return same instance for service rule");
		
		
		//test with param
		$withParam = $ioc->resolve("\Hx\Logger\LoggerInterface");
		
		$this->assertNotNull($withParam, "Should return Logger class");
		
		//test non service
		$normalA = $ioc->resolve('\Hx\File\FileInterface');
		
		$normalB = $ioc->resolve('\Hx\File\FileInterface');
		
		$this->assertNotSame($normalA, $normalB, "Should return different instance");
	}
}
?>