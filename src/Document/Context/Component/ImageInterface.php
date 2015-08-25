<?php 
namespace Hx\Document\Context\Component;

interface ImageInterface extends \Hx\Document\Context\ElementInterface {
	
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