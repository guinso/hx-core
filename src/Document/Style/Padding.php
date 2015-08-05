<?php 
namespace Hx\Document\Style;

class Padding implements PaddingInterface {
	
	private $top, $bottom, $left, $right;
	
	public function __construct()
	{
		$this->reset();
	}
	
	public function getTop()
	{
		return $this->top;
	}
	
	public function setTop($value)
	{
		$this->top = $value;
	}
	
	public function getBottom()
	{
		return $this->bottom;
	}
	
	public function setBottom($value)
	{
		$this->bottom = $value;
	}
	
	public function getLeft()
	{
		return $this->left;
	}
	
	public function setLeft($value)
	{
		$this->left = $value;
	}
	
	public function getRight()
	{
		return $this->right;
	}
	
	public function setRight($value)
	{
		$this->right = $value;
	}
	
	public function setAll($value)
	{
		$this->setBottom($value);
		
		$this->setLeft($value);
		
		$this->setRight($value);
		
		$this->setTop($value);
	}
	
	public function reset()
	{
		$this->top = 0;
		
		$this->bottom = 0;
		
		$this->left = 0;
		
		$this->right = 0;
	}
}
?>