<?php 
namespace Hx\Document\Component;

class Image implements ImageInterface {
	
	use \Hx\Document\Component\ElementTrait;
	
	private $sourcePath, $width, $height, $margin, $padding, $boxSize;
	
	public function __construct()
	{
		$this->tags = array();
		
		$this->sourcePath = '';
		
		$this->width = 0;
		
		$this->height = 0;
		
		$this->margin = new \Hx\Document\Style\Margin();
		
		$this->padding = new \Hx\Document\Style\Padding();
		
		$this->boxSize = new \Hx\Document\Component\Box(0, 0);
	}
	
	public function calculateBoxSize()
	{
		$this->boxSize->setWidth(
			$this->width +
			$this->margin->getLeft() +
			$this->margin->getRight() +
			$this->padding->getLeft() + 
			$this->padding->getRight()
		);
		
		$this->boxSize->setHeight(
			$this->height +
			$this->margin->getTop() +
			$this->margin->getBottom() +
			$this->padding->getTop() +
			$this->padding->getBottom()		
		);
		
		return $this->boxSize;
	}
	
	public function render(\Hx\Document\Engine\PdfEngineInterface $pdfEngine)
	{
		throw new \Hx\Document\DocumentException("not implement yet.");
	}
	
	public function getElementName()
	{
		return 'img';
	}
	
	public function getImageSourcePath()
	{
		return $this->sourcePath;
	}
	
	public function setImageSourcePath($sourcePath)
	{
		if (file_exists($sourcePath) && is_readable($sourcePath))
			$this->sourcePath = $sourcePath;
		else 
			throw new \Hx\Document\DocumentException(
				"Provided image source path is inaccessible: $sourcePath");
	}
	
	public function getWidth()
	{
		return $this->width;
	}
	
	public function setWidth($width)
	{
		if (is_int($width) || is_double($width))
			$this->width = $width;
		else 
			throw new \Hx\Document\DocumentException(
				"Width value must be decimal: $width");
	}
	
	public function getHeight()
	{
		return $this->height;
	}
	
	public function setHeight($height)
	{
		if (is_int($height) || is_double($height))
			$this->height = $height;
		else
			throw new \Hx\Document\DocumentException(
				"Height value must be decimal: $height");
	}
	
	public function getMargin()
	{
		return $this->margin;
	}
	
	public function getPadding()
	{
		return $this->padding;
	}
}
?>