<?php 
namespace Hx\Document\Render\Component;

interface ColumnRenderInterface extends \Hx\Document\Render\ComponentInterface {
	
	public function calculateColumn(\Hx\Document\Context\Component\ColumnInterface $column);
}
?>