<?php 
namespace Hx\Document\Style;

interface RgbInterface {
	
	public function getRed();
	
	public function getGreen();
	
	public function getBlue();
	
	public function setRGB($red, $green, $blue);
	
	public function getHex();
	
	public function setFromHex($hex);
	
	public function reset();
}
?>