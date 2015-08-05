<?php 
namespace Hx\Document;

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