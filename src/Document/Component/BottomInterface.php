<?php 
namespace Hx\Document\Component;

interface BottomInterface extends \Hx\Document\Component\ElementInterface {
	
	public function insertRow(\Hx\Document\Component\RowInterface $row);
}
?>