<?php 
namespace Hx\Document\Style;

interface BorderInterface {
	public function getLeft();
	
	public function getRight();
	
	public function getTop();
	
	public function getBottom();
	
	public function setAllWidth($width);
	
	public function setAllCap($cap);
	
	public function setAllJoin($join);
	
	public function setAllColor($red, $green, $blue);
	
	public function setAllColorByHex($hex);
	
	public function reset();
}
?>