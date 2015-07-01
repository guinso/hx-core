<?php 
class SoapParamTest extends PHPUnit_Framework_TestCase {
	
	public function testCreate()
	{
		$name = "foo";
		
		$value = "bar";
		
		$config = array('qwe' => 123, 'coco' => 'qoqo');
		
		$param = new \Hx\Soap\Client\Param($name, $value, $config);
		
		$this->assertEquals($name, $param->getName());
		
		$this->assertEquals($value, $param->getValue());
		
		$this->assertEquals($config, $param->getConfig());
	}
}
?>