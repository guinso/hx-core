<?php 
namespace Hx\Document\Context\Component;

class HorizontalLineBreak implements HorizontalLineBreakInterface {
	
	use \Hx\Document\Context\ElementTrait;
	
	private $lineStyle, $padding, $margin, $width, $boxSize;
	
	public function __construct()
	{
		$this->tags = array();
		
		$this->lineStyle = new \Hx\Document\Style\Line();
		
		$this->padding = new \Hx\Document\Style\Padding();
		
		$this->margin = new \Hx\Document\Style\Margin();
		
		$this->width = 0;
		
		$this->boxSize = new \Hx\Document\Context\Component\Box(0, 0);
	}
	
	public function calculateBoxSize()
	{
		$this->boxSize->setWidth(
			$this->width + 
			$this->padding->getLeft() + 
			$this->padding->getRight() + 
			$this->margin->getLeft() + 
			$this->margin->getRight()
		);
		
		$this->boxSize->setHeight(
			$this->lineStyle->getWidth() + 
			$this->padding->getTop() +
			$this->padding->getBottom() +
			$this->margin->getTop() +
			$this->margin->getBottom()
		);
		
		return $this->boxSize;
	}
	
	public function render(\Hx\Document\Engine\PdfEngineInterface $pdfEngine)
	{
		throw new \Hx\Document\DocumentException("Not implement yet");
	}
	
	public function getElementName()
	{
		return 'hr';
	}
	
	public function getLineStyle()
	{
		return $this->lineStyle;
	}
	
	public function getPadding()
	{
		return $this->padding;
	}
	
	public function getMargin()
	{
		return $this->margin;
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
				"Horizontal line break width only accept decimal value: $width");
	}
}
?>