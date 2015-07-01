<?php 
class FiTextLoaderTest extends PHPUnit_Framework_TestCase {
	
	public function testLoadFile()
	{
		$expected = "asd";
		
		$loader = new \Hx\File\Loader\TextFileLoader();
		
		$result = $loader->load(__DIR__ . DIRECTORY_SEPARATOR . 'sample.txt', array());
		
		$this->assertEquals($expected, $result);
	}
}
?>