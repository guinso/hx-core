<?php 
namespace Hx\Document\Component;

interface RowInterface extends \Hx\Document\Component\ElementInterface {
	
	public function getPadding();
	
	public function getMargin();
	
	public function insertColumn(\Hx\Document\Component\ColumnInterface $col);
}
?>