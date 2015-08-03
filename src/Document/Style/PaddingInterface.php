<?php 
namespace Hx\Document\Style;

interface PaddingInterface {
	
	public function getTop();
	
	public function setTop($value);
	
	public function getBottom();
	
	public function setBottom($value);
	
	public function getLeft();
	
	public function setLeft($value);
	
	public function getRight();
	
	public function setRight($value);
	
	public function setAll($value);
	
	public function reset();
}
?>