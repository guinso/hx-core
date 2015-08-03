<?php 
namespace Hx\Document\Component;

interface ElementInterface {
	
	public function getDimension();
	
	public function render();
	
	public function getName();
	
	public function addChild(\Hx\Document\Component\ElementInterface $element);
	
	public function removeChild(\Hx\Document\Component\ElementInterface $element);
	
	public function removeChildByIndex($index);
	
	public function getChildren();
}
?>