<?php 
namespace Hx\Document\Render;

class ComponentContainer implements ComponentContainerInterface {
	
	private $componentContainer;
	
	public function __construct(
		\Hx\Document\Render\ComponentContainerInterface $componentContainer)
	{
		$this->componentContainer = $componentContainer;
	}

	public function getComponentByName($elementName)
	{
		return $this->componentContainer
			->getComponentByName($elementName);
	}
	
	public function getComponentByElement(
		\Hx\Document\Context\ElementInterface $contextElement)
	{
		return $this->componentContainer
			->getComponentByElement($contextElement);
	}
}
?>