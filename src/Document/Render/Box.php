<?php 
namespace Hx\Document\Render;

class Box implements  BoxInterface {
	
	private $width, $height;
	
	public function __construct($width, $height)
	{
		$this->width = 0;
		
		$this->height = 0;
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