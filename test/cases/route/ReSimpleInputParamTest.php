<?php 
class ReSimpleInputParamtest extends PHPUnit_Framework_TestCase {
	
	public function testCreate()
	{
		$data = array('asd' => 123);
		
		$args = array('a', 'df', 'r');
		
		$param = new \Hx\Route\InputParam\SimpleInputParam($data, $args);
		
		$this->assertEquals($data, $param->getData());
		
		$this->assertEquals($args, $param->getArgs());
	}
}
?>