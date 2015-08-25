<?php 
namespace Hx\Document\Render;

interface ComponentContainerReaderInterface {
	
	public function getComponentByName($elementName);
	
	public function getComponentByElement(\Hx\Document\Context\ElementInterface $contextElement);
}
?>