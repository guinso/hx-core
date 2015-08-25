<?php 
namespace Hx\Document\Context\Component;

class Row implements RowInterface {
	
	use \Hx\Document\Context\ElementTrait;
	
	private $padding, $margin;
	
	public function __construct()
	{
		$this->tags = array();
		
		$this->padding = new \Hx\Document\Style\Padding();
		
		$this->margin = new \Hx\Document\Style\Margin();
	}
	
	public function getElementName()
	{
		return 'row';
	}
	
	public function getPadding()
	{
		return $this->padding;
	}
	
	public function getMargin()
	{
		return $this->margin;
	}
	
	public function insertColumn(\Hx\Document\Context\Component\ColumnInterface $col)
	{
		$this->tags[] = $col;
	}
}
?>