<?php 
namespace Hx\Document\Render;

class RenderService implements RenderServiceInterface {
	
	private $pdfEngine, $componentContainer;
	
	public function __construct(\Hx\Document\Engine\PdfEngineInterface $pdfEngine, \Hx\Document\Render\ComponentContainerInterface $componentContainer)
	{
		$this->pdfEngine = $pdfEngine;
		
		$this->componentContainer = $componentContainer;
	}
	
	private function calculatePageQty(\Hx\Document\Context\ContextInterface $context)
	{
		
	}
	
	public function render(\Hx\Document\Context\ContextInterface $context)
	{
		
	}
	
	private function calculateContextElementSize(\Hx\Document\Context\ElementInterface $contextElement)
	{
		
	}
}
?>