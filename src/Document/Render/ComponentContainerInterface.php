<?php 
namespace Hx\Document\Render;

interface ComponentContainerInterface {
	
	public function setComponent(\Hx\Document\Render\ComponentInterface $renderComponent);
	
	public function removeComponentByName($elementName);
	
	public function getComponentByName($elementName);
	
	public function getComponentByElement(\Hx\Document\Context\ElementInterface $contextElement);
}
?>