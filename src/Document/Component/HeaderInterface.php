<?php 
namespace Hx\Document\Component;

interface HeaderInterface extends \Hx\Document\Component\ElementInterface {
	
	public function insertRow(\Hx\Document\Component\RowInterface $row);
	
}
?>