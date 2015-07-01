<?php
class Rex {
	public static function koko() {}

	public static function gogo() {}
} 

class ReXmlLoaderTest extends PHPUnit_Framework_TestCase {
	
	public function testCeate()
	{
		$loader = new \Hx\Route\MapLoader\XmlMapLoader(new \Hx\File\File());
	}
	
	public function testLoad()
	{
		$loader = new \Hx\Route\MapLoader\XmlMapLoader(new \Hx\File\File());
		
		$content = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 
			'recipe' . DIRECTORY_SEPARATOR . 'sample.xml');
		
		$x = $loader->loadString($content);
		
		$this->assertEquals(3, count($x));
	}
	
	public function testLoadFile()
	{
		$loader = new \Hx\Route\MapLoader\XmlMapLoader(new \Hx\File\File());
	
		$x = $loader->loadFile(__DIR__ . DIRECTORY_SEPARATOR . 'recipe' . DIRECTORY_SEPARATOR . 'sample.xml');
	
		$this->assertEquals(3, count($x));
	}
	
	public function testLoadDir()
	{
		$loader = new \Hx\Route\MapLoader\XmlMapLoader(new \Hx\File\File());
	
		$x = $loader->loadDir(__DIR__ . DIRECTORY_SEPARATOR . 'recipe');
	
		$this->assertEquals(6, count($x));
	}
}
?>