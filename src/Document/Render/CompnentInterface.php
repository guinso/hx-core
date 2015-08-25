<?php 
namespace Hx\Document\Render;

interface ComponentInterface {
	
	public function getComponentName();
	
	public function calculateBoxSize(
		\Hx\Document\Context\ElementInterface $element);
	
	public function render(
		\Hx\Document\Context\ElementInterface $element, 
		\Hx\Document\Engine\PdfEngineInterface $pdfEngine);
}
?>