<?php 
namespace Hx\Document\Style;

interface LineInterface {
	const CAP_BUTT = 1;
	const CAP_ROUND = 2;
	const CAP_SQUARE = 4;
	
	const JOIN_MITER = 1;
	const JOIN_ROUND = 2;
	const JOIN_BEVEL = 4;

	public function getWidth();
	
	public function setWidth($value);
	
	public function getCap();
	
	public function setCap($cap);
	
	public function getJoin();
	
	public function setJoin($join);
	
	public function getColor();
	
	public function reset();
}
?>