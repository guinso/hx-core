<?php 
namespace Hx\Document;

interface StateInterface {
	
	public function reset();
	
	public function getMargin();
	
	public function getPadding();
	
	public function getDimension();
	
	public function getFone();
	
	public function getLine();
}
?>