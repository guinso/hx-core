<?php 
namespace Hx\Document\Style;

interface FontInterface {
	
	const STYLE_NORMAL = 0;
	const STYLE_BOLD = 1;
	const STYLE_ITALIC = 2;
	const STYLE_UNDERLINE = 4;
	
	public function getFontFamily();
	
	public function setFontFamily($fontFamily);
	
	public function getFontStyle();
	
	public function setFontStyle($fontStyle);
	
	public function getFontSize();
	
	public function setFontSize($size);
	
	public function getFontColor();
	
	public function reset();
}
?>