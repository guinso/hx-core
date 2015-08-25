<?php 
namespace Hx\Document\Context\Component;

class Bottom implements \Hx\Document\Context\Component\BottomInterface {
	
	use \Hx\Document\Context\ElementTrait;

	public function __construct()
	{
		$this->tags = array();
	}
	
	public function getElementName()
	{
		return 'bottom';
	}
	
	public function insertRow(\Hx\Document\Context\Component\RowInterface $row)
	{
		$this->tags[] = $row;
	}
}
?>