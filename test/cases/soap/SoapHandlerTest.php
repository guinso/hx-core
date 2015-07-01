<?php 
class SoapHandlerTest extends PHPUnit_Framework_TestCase {
	
	public function testSend()
	{
		$mockAdaptor = $this->getMockBuilder("\Hx\Soap\Client\AdaptorInterface")->getMock();
		
		$handler = new \Hx\Soap\Client\Handler($mockAdaptor);
		
		$handler->sent("sample/url", array('asd' => 123, 'awe' => 'dfrt'));
	}
}
?>