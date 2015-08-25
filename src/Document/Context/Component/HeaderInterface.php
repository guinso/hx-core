<?php 
namespace Hx\Document\Context\Component;

interface HeaderInterface extends \Hx\Document\Context\ElementInterface {
	
	public function insertRow(\Hx\Document\Context\Component\RowInterface $row);
	
}
?>