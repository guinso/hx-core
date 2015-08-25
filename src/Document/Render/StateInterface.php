<?php 
namespace Hx\Document\Render;

interface StateInterface {
	
	public function reset();
	
	public function getMargin();
	
	public function getPadding();
	
	public function getDimension();
	
	public function getFont();
	
	public function getLine();
	
	public function getBackgroundColor();
}
?>