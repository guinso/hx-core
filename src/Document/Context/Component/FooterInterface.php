<?php 
namespace Hx\Document\Context\Component;

interface FooterInterface extends \Hx\Document\Context\ElementInterface {
	
	public function insertRow(\Hx\Document\Context\Component\RowInterface $row);
	
}
?>