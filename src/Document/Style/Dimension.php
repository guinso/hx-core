<?php 
namespace Hx\Document\Style;

class Dimension implements DimensionInterface {
	
	private $x, $y, $width, $height;
	
	public function __construct()
	{
		$this->reset();
	}
	
	public function getX()
	{
		return $this->x;
	}
	
	public function setX($value)
	{
		$this->x = $value;
	}
	
	public function getY()
	{
		return $this->y;
	}
	
	public function setY($value)
	{
		$this->y = $value;
	}
	
	public function getWidth()
	{
		return $this->width;
	}
	
	public function setWidth($value)
	{
		$this->width = $value;
	}
	
	public function getHeight()
	{
		return $this->height;
	}
	
	public function setHeight($value)
	{
		$this->height = $value;
	}
	
	public function reset()
	{
		$this->setX(0);
		
		$this->setY(0);
		
		$this->setHeight(1);
		
		$this->setWidth(1);
	}
}
?>