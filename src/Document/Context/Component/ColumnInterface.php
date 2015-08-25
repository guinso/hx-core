<?php 
namespace Hx\Document\Context\Component;

interface ColumnInterface extends \Hx\Document\Context\ElementInterface {
	
	public function getWidth();
	
	public function setWidth($width);
	
	public function getPadding();
	
	public function getMargin();
	
	public function insertSpan(
		\Hx\Document\Context\Component\SpanInterface $span);
	
	public function insertImage(
		\Hx\Document\Context\Component\ImageInterface $image);
	
	public function insertHorizontalLineBreak(
		\Hx\Document\Context\Component\HorizontalLineBreakInterface $hr);
	
	public function insertRow(
		\Hx\Document\Context\Component\RowInterface $row);
}
?>