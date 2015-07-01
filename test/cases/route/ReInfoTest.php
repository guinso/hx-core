<?php 
class ReInfoTest extends PHPUnit_Framework_TestCase {
	
	public function testCreate()
	{
		$uri = "/gogo";
		
		$method = 'get';
		
		$className = 'Gong';
		
		$functionName = 'Geng';
		
		$outputFormat = 'json';
		
		$static = false;
		
		$info = new \Hx\Route\Info($uri, $method, $className, $functionName, $outputFormat, $static);
		
		$this->assertEquals($uri, $info->getUri());
		
		$this->assertEquals($method, $info->getReqMethod());
		
		$this->assertEquals($className, $info->getClassName());
		
		$this->assertEquals($functionName, $info->getFunctionName());
		
		$this->assertEquals($outputFormat, $info->getOutputFormat());
		
		$this->assertEquals($static, $info->isStaticCall());
	}
}
?>