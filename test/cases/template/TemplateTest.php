<?php 
class MockTemplateEngine implements \Hx\Template\EngineInterface {
	
	public function transform(Array $data, $template)
	{
		return serialize($data) . $template;
	}
}

class TemplateTest extends PHPUnit_Framework_TestCase {
	
	public function testGenerate()
	{
		$template = new \Hx\Template\Template(new MockTemplateEngine());
		
		$tpl = "123 456 789";
		
		$data = array('asd' => 123, 'aqwe' => 'koko');
		
		$result = $template->generateFromString($data, $tpl);
		
		$this->assertEquals(serialize($data) . $tpl, $result);
	}
	
	public function testGenerateByFile()
	{
		$template = new \Hx\Template\Template(new MockTemplateEngine());
	
		$tplFile = __DIR__ . DIRECTORY_SEPARATOR . 'sample.tpl';
		
		$data = array('asd' => 123, 'aqwe' => 'koko');
	
		$result = $template->generate($data, $tplFile);
	
		$this->assertEquals(serialize($data) . file_get_contents($tplFile), $result);
	}
}
?>