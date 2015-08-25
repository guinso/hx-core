<?php 
namespace Hx\Document\Context\Component;

class Column implements ColumnInterface {
	
	private $width, $padding, $margin;
	
	use \Hx\Document\Context\ElementTrait;
	
	public function __construct()
	{
		$this->tags = array();
		
		$this->width = 0;
		
		$this->padding = new \Hx\Document\Style\Padding();
		
		$this->margin = new \Hx\Document\Style\Margin();
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
		\Hx\Document\Context\Component\SpanInterface $span)
	{
		$this->tags[] = $span;
	}
	
	public function insertImage(
		\Hx\Document\Context\Component\ImageInterface $image)
	{
		$this->tags[] = $image;
	}
	
	public function insertHorizontalLineBreak(
		\Hx\Document\Context\Component\HorizontalLineBreakInterface $hr)
	{
		$this->tags[] = $hr;
	}
	
	public function insertRow(
		\Hx\Document\Context\Component\RowInterface $row)
	{
		$this->tags[] = $row;
	}
}
?>