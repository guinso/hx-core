<?php 
namespace Hx\Document\Style;

class Rgb implements RgbInterface {
	
	private $red, $green, $blue;
	
	public function __construct($red, $green, $blue)
	{
		$this->setRGB($red, $green, $blue);
	}
	
	public function getRed()
	{
		return $this->red;
	}
	
	public function getGreen()
	{
		return $this->green;
	}
	
	public function getBlue()
	{
		return $this->blue;
	}
	
	public function setRGB($red, $green, $blue)
	{
		if ($this->isValidRgbValue($red) === false)
			throw new \Hx\Document\DocumentException(
				"Red is not a valid color value: $red");
		
		if ($this->isValidRgbValue($green) === false)
			throw new \Hx\Document\DocumentException(
				"Green is not a valid color value: $green");
		
		if ($this->isValidRgbValue($blue) === false)
			throw new \Hx\Document\DocumentException(
				"Blue is not a valid color value: $blue");
		
		$this->red = $red;
		
		$this->green = $green;
		
		$this->blue = $blue;
	}
	
	private function isValidRgbValue($value)
	{
		return is_int($value) && $value >= 0 && $value <= 255;
	}
	
	public function getHex()
	{
		return dechex($this->red) . dechex($this->green) . dechex($this->blue);
	}
	
	public function setFromHex($hex)
	{
		if (preg_match("/^#(([a-f]{6})|([a-f]{3}))$/", strtolower($hex)) !== 1)
			throw new \Hx\Document\DocumentException(
				"Input value is not a valid hex value: $hex");
		
		$hex = str_replace("#", "", $hex);
		
		if (strlen($hex) == 3) {
			$this->setRGB(
				intval(hexdec(substr($hex,0,1).substr($hex,0,1))), 
				intval(hexdec(substr($hex,1,1).substr($hex,1,1))), 
				intval(hexdec(substr($hex,2,1).substr($hex,2,1)))
			);
			
		} elseif (strlen($hex) == 6) {
			$this->setRGB(
				intval(hexdec(substr($hex,0,2))), 
				intval(hexdec(substr($hex,2,2))), 
				intval(hexdec(substr($hex,4,2)))
			);
		}
	}
	
	public function reset()
	{
		$this->setRGB(0, 0, 0);
	}
}
?>