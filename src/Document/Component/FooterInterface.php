<?php 
namespace Hx\Document\Component;

interface FooterInterface extends \Hx\Document\Component\ElementInterface {
	
	public function insertRow(\Hx\Document\Component\RowInterface $row);
	
}
?>