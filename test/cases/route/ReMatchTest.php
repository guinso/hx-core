<?php 
class ReMatchTest extends PHPUnit_Framework_TestCase {
	
	public function testCreate()
	{
		$args = array('skjdfhr');
		
		$uri = "/gogo";
		
		$method = 'get';
		
		$className = 'Gong';
		
		$functionName = 'Geng';
		
		$outputFormat = 'json';
		
		$static = true;
		
		$info = new \Hx\Route\Info(
			$uri, $method, 
			$className, $functionName, 
			$outputFormat, $static);
		
		$match = new \Hx\Route\Match($info, $args);
		
		$this->assertEquals($className, $match->getClassName());
		
		$this->assertEquals($functionName, $match->getFunctionName());
		
		$this->assertEquals($outputFormat, $match->getOutputFormat());
		
		$this->assertEquals($static, $match->isStaticCall());
		
		$this->assertEquals($args, $match->getArgs());
	}
}
?>