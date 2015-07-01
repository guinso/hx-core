<?php 
class ClassParserTest extends PHPUnit_Framework_TestCase {
	
	public function testParse()
	{
		$content = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . "sample.txt");
		
		$parser = new \Hx\Parser\SimpleClassParser();
		
		$result = $parser->loadString($content);
		
		$expected = array(
			"\Jojo\Koko" => array(
				'Gem' => 'class'
			)
		);
		
		$this->assertEquals($expected, $result);
	}
	
	public function testParseFile()
	{
		$content = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . "sample2.txt");
	
		$parser = new \Hx\Parser\SimpleClassParser();
	
		$result = $parser->loadString($content);
	
		$expected = array(
			"\Jojo\Popo" => array(
				'Gong' => 'interface'
			)
		);
	
		$this->assertEquals($expected, $result);
	}
}
?>