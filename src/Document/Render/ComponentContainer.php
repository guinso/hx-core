<?php 
namespace Hx\Document\Render;

class ComponentContainer implements ComponentContainerInterface {
	
	private $lookupTable;
	
	public function __construct()
	{
		$this->lookupTable = array();
	}
	
	public function setComponent(\Hx\Document\Render\ComponentInterface $renderComponent)
	{
		$this->lookupTable[$renderComponent->getComponentName()] = $renderComponent;
	}
	
	public function removeComponentByName($elementName)
	{
		if (array_key_exists($elementName, $this->lookupTable))
			unset($this->lookupTable[$elementName]);
		else 
			throw new \Hx\Document\DocumentException(
				"Remove render component rejected, element $elementName not found in container.");
	}
	
	public function getComponentByName($elementName)
	{
		if (array_key_exists($elementName, $this->lookupTable))
			return $this->lookupTable[$elementName];
		else 
			throw new \Hx\Document\DocumentException(
				"Get render component rejected, element $elementName not found in container.");
	}
	
	public function getComponentByElement(\Hx\Document\Context\ElementInterface $contextElement)
	{
		return $this->getComponentByName(
			$contextElement->getElementName()
		);
	}
}
?>