<?php 
namespace Hx\Document\Component;

interface ColumnInterface extends \Hx\Document\Component\ElementInterface {
	
	public function getWidth();
	
	public function setWidth($width);
	
	public function getPadding();
	
	public function getMargin();
	
	public function insertSpan(
		\Hx\Document\Component\SpanInterface $span);
	
	public function insertImage(
		\Hx\Document\Component\ImageInterface $image);
	
	public function insertHorizontalLineBreak(
		\Hx\Document\Component\HorizontalLineBreakInterface $hr);
	
	public function insertRow(
		\Hx\Document\Component\RowInterface $row);
}
?>