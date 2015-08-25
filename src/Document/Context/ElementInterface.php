<?php 
namespace Hx\Document\Context;

interface ElementInterface {
	
	public function getElementName();
	
	public function removeChild(\Hx\Document\Context\ElementInterface $element);
	
	public function removeChildByIndex($index);
	
	public function getChildrenByIndex($index);
	
	public function getChildrenCount();
}
?>