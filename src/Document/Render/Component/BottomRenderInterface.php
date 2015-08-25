<?php 
namespace Hx\Document\Render\Component;

interface BottomRenderInterface extends \Hx\Document\Render\ComponentInterface {
	
	public function calculateBottom(\Hx\Document\Context\Component\BottomInterface $bottom);
}
?>