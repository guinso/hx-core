<?php 
namespace Hx\Document\Style;

class Font implements FontInterface {
	
	private $fontFamily, $size, $style, $color;
	
	public function __construct()
	{
		$this->color = new \Hx\Document\Style\Rgb(0, 0, 0);
		
		$this->reset();
	}
	
	public function getFontFamily()
	{
		return $this->fontFamily;
	}
	
	public function setFontFamily($fontFamily)
	{
		$this->fontFamily = $fontFamily;
	}
	
	public function getFontStyle()
	{
		return $this->style;
	}
	
	public function setFontStyle($fontStyle)
	{
		if ($fontStyle >= \Hx\Document\Style\FontInterface::STYLE_NORMAL && 
			$fontStyle <= (
				\Hx\Document\Style\FontInterface::STYLE_NORMAL |
				\Hx\Document\Style\FontInterface::STYLE_BOLD |
				\Hx\Document\Style\FontInterface::STYLE_ITALIC |
				\Hx\Document\Style\FontInterface::STYLE_UNDERLINE))
			$this->style = $fontStyle;
		else 
			throw new \Hx\Document\DocumentException(
				"Font style input not compliance: $fontStyle");
	}
	
	public function getFontSize()
	{
		return $this->size;
	}
	
	public function setFontSize($size)
	{
		if (is_int($size) === false)
			throw new \Hx\Document\DocumentException(
				"Font size value is not integer: $size");
		else
			$this->size = $size;
	}
	
	public function getFontColor()
	{
		return $this->color;
	}
	
	public function reset()
	{
		$this->setFontFamily('arial');
		
		$this->setFontSize(8);
		
		$this->setFontStyle(
			\Hx\Document\Style\FontInterface::STYLE_NORMAL);
		
		$this->color->reset();
	}
}
?>