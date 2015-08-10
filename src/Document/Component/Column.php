<?php 
namespace Hx\Document\Component;

class Column implements ColumnInterface {
	
	private $width, $padding, $margin, $boxSize;
	
	use \Hx\Document\Component\ElementTrait;
	
	public function __construct()
	{
		$this->tags = array();
		
		$this->width = 0;
		
		$this->padding = new \Hx\Document\Style\Padding();
		
		$this->margin = new \Hx\Document\Style\Margin();
		
		$this->boxSize = new \Hx\Document\Component\Box(0, 0);
	}
	
	public function calculateBoxSize()
	{
		$this->boxSize->setWidth($this->width);
		
		$tagsHeight = 0;
		
		foreach($this->tags as $tag)
		{
			$tagBoxSize = $tag->calculateBoxSize();
			
			$tagsHeight += $tagBoxSize->getHeight();
		}
		
		$this->boxSize->setHeight(
			$tagsHeight + 
			$this->padding->getTop() + 
			$this->padding->getBottom() +
			$this->margin->getTop() +
			$this->margin->getBottom()
		);
		
		$this->boxSize->setWidth(
			$this->width + 
			$this->padding->getLeft() + 
			$this->padding->getRight() +
			$this->margin->getLeft() +
			$this->margin->getRight()
		);
		
		return $this->boxSize;
	}
	
	public function render(
		\Hx\Document\Engine\PdfEngineInterface $pdfEngine)
	{
		throw new \Hx\Document\DocumentException("not implement yet.");
	}
	
	public function getElementName()
	{
		return 'col';
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
				"Width only accept numeric value: $width");
	}
	
	public function getPadding()
	{
		return $this->padding;
	}
	
	public function getMargin()
	{
		return $this->margin;
	}
	
	public function insertSpan(
		\Hx\Document\Component\SpanInterface $span)
	{
		$this->tags[] = $span;
	}
	
	public function insertImage(
		\Hx\Document\Component\ImageInterface $image)
	{
		$this->tags[] = $image;
	}
	
	public function insertHorizontalLineBreak(
		\Hx\Document\Component\HorizontalLineBreakInterface $hr)
	{
		$this->tags[] = $hr;
	}
	
	public function insertRow(
		\Hx\Document\Component\RowInterface $row)
	{
		$this->tags[] = $row;
	}
}
?>