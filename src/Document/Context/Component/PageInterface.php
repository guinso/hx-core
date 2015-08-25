<?php 
namespace Hx\Document\Context\Component;

interface PageInterface extends \Hx\Document\Context\ElementInterface {
	
	public function insertRow(\Hx\Document\Context\Component\RowInterface $row);
	
	public function insertBottomRow(\Hx\Document\Context\Component\BottomInterface $bottomRow);
}
?>