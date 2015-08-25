<?php 
namespace Hx\Document\Context\Component;

interface RowInterface extends \Hx\Document\Context\ElementInterface {
	
	public function getPadding();
	
	public function getMargin();
	
	public function insertColumn(\Hx\Document\Context\Component\ColumnInterface $col);
}
?>