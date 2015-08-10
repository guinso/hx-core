<?php 
namespace Hx\Document\Component;

class Box implements  BoxInterface {
	
	private $width, $height;
	
	public function __construct($width, $height)
	{
		$this->width = 0;
		
		$this->height = 0;
	}
	
	public function setWidth($width)
	{
		$this->width = $width;
	}
	
	public function setHeight($height)
	{
		$this->height = $height;
	}
	
	public function getWidth()
	{
		return $this->width;
	}
	
	public function getHeight()
	{
		return $this->height;
	}
}
?>