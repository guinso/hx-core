<?php 
namespace Hx\Document\Component;

interface ElementInterface {
	
	public function calculateBoxSize();
	
	public function render(\Hx\Document\Engine\PdfEngineInterface $pdfEngine);
	
	public function getElementName();
	
	public function removeChild(\Hx\Document\Component\ElementInterface $element);
	
	public function removeChildByIndex($index);
	
	public function getChildren();
}
?>