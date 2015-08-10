<?php 
namespace Hx\Document\Component;

interface ImageInterface extends \Hx\Document\Component\ElementInterface {
	
	public function getImageSourcePath();
	
	public function setImageSourcePath($sourcePath);
	
	public function getWidth();
	
	public function setWidth($width);
	
	public function getHeight();
	
	public function setHeight($height);
	
	public function getMargin();
	
	public function getPadding();
}
?>