<?php 
namespace Hx\Document\Context\Component;

interface HorizontalLineBreakInterface {
	
	public function getLineStyle();
	
	public function getPadding();
	
	public function getMargin();
	
	public function getWidth();
	
	public function setWidth($width);
}
?>