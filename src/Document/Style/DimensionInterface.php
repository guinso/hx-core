<?php 
namespace Hx\Document\Style;

interface DimensionInterface {
	
	public function getX();
	
	public function setX($value);
	
	public function getY();
	
	public function setY($value);
	
	public function getWidth();
	
	public function setWidth($value);
	
	public function getHeight();
	
	public function setHEight($value);
	
	public function reset();
}
?>