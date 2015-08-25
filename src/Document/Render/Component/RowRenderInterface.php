<?php 
namespace Hx\Document\Render\Component;

interface RowRenderInterface extends \Hx\Document\Render\ComponentInterface {
	
	public function calculateRow(\Hx\Document\Context\Component\RowInterface $row);
}
?>