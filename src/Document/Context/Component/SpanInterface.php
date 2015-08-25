<?php 
namespace Hx\Document\Context\Component;

interface SpanInterface extends \Hx\Document\Context\ElementInterface {
	
	const VALIGN_NORMAL = 0;
	const VALIGN_TOP = 1;
	const VLAIGN_BOTTOM = 2;
	
	const TEXT_ALIGN_LEFT = 0;
	const TEXT_ALIGN_CENTRE = 1;
	const TEXT_LAIGN_RIGHT = 2;
	
	public function getFontStyle();
	
	public function getText();
	
	public function setText($text);
	
	public function getVerticalAlign();
	
	public function setVerticalAlign($vAlign);
	
	public function getTextAlign();
	
	public function setTextAlign($align);
	
	public function isTextWrap();
	
	public function setTextWrap($isTextWrap);
	
	public function getMargin();
	
	public function getPadding();
	
	public function getBorder();
	
	public function getWidth();
	
	public function setWidth($width);
	
	public function getHeight();
	
	public function setHeight($height);
}
?>