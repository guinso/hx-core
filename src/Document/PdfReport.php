<?php 
namespace Hx\Document;

class PdfReport implements \Hx\Document\ReportInterface {
	
	private $engine;
	
	public function __construct(\Hx\Document\PdfEngineInterface $engine)
	{
		$this->engine = $engine;
	}
	
	public function generateFile(\Hx\Document\ContentInterface $content, $option)
	{
		//TODO generate PDF
		
		throw new \Hx\Document\DocumentException("not implement yet.");
	}
}
?>