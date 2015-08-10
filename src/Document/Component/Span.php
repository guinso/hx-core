<?php 
namespace Hx\Document\Component;

class Span implements SpanInterface {
	
	use \Hx\Document\Component\ElementTrait;
	
	private $text, $padding, $margin, $fontStyle, $borderStyle;
	private $verticalAlign, $textAlign, $isTextWrap;
	private $boxSize, $width, $height, $textBlockSize;
	
	public function __construct()
	{
		$this->tags = array();
		
		$this->text = '';
		
		$this->padding = new \Hx\Document\Style\Padding();
		
		$this->margin = new \Hx\Document\Style\Margin();
		
		$this->fontStyle = new \Hx\Document\style\Font();
		
		$this->borderStyle = new \Hx\Document\Style\Border();
		
		$this->verticalAlign = \Hx\Document\Component\SpanInterface::VALIGN_NORMAL;
		
		$this->textAlign = \Hx\Document\Component\SpanInterface::TEXT_ALIGN_LEFT;
		
		$this->isTextWrap = true;
		
		$this->width = 0;
		
		$this->height = 0;
		
		$this->boxSize = new \Hx\Document\Component\Box(0, 0);
		
		$this->textBlockSize = new \Hx\Document\Component\Box(0, 0);
	}
	
	public function calculateBoxSize()
	{
		throw new \Hx\Document\DocumentException("not implement yet.");
	}
	
	private function calculateTextBlock()
	{
		throw new \Hx\Document\DocumentException("not implement yet.");
		
		return $this->textBlockSize;
	}
	
	public function render(\Hx\Document\Engine\PdfEngineInterface $pdfEngine)
	{
		throw new \Hx\Document\DocumentException("not implement yet.");
	}
	
	public function getElementName()
	{
		return 'span';
	}
	
	public function getFontStyle()
	{
		return $this->fontStyle;
	}
	
	public function getText()
	{
		return $this->text;
	}
	
	public function setText($text)
	{
		$this->text = $text;
	}
	
	public function getVerticalAlign()
	{
		return $this->verticalAlign;
	}
	
	public function setVerticalAlign($vAlign)
	{
		if ($vAlign === \Hx\Document\Component\SpanInterface::VALIGN_NORMAL || 
				$vAlign === \Hx\Document\Component\SpanInterface::VALIGN_TOP ||
				$vAlign === \Hx\Document\Component\SpanInterface::VLAIGN_BOTTOM)
			$this->verticalAlign = $vAlign;
		else 
			throw new \Hx\Document\DocumentException(
				"Only accept predefiend vertical align value: $vAlign");
	}
	
	public function getTextAlign()
	{
		return $this->textAlign;
	}
	
	public function setTextAlign($align)
	{
		if ($vAlign === \Hx\Document\Component\SpanInterface::TEXT_ALIGN_CENTRE ||
			$vAlign === \Hx\Document\Component\SpanInterface::TEXT_ALIGN_LEFT ||
			$vAlign === \Hx\Document\Component\SpanInterface::TEXT_LAIGN_RIGHT)
				$this->textAlign = $align;
		else
			throw new \Hx\Document\DocumentException(
				"Only accept predefiend text align value: $align");
	}
	
	public function isTextWrap()
	{
		return $this->isTextWrap;
	}
	
	public function setTextWrap($isTextWrap)
	{
		if (is_bool($isTextWrap))
			$this->isTextWrap = $isTextWrap;
		else 
			throw new \Hx\Document\DocumentException(
				"Text wrap only accept boolean value: $isTextWrap");
	}
	
	public function getMargin()
	{
		return $this->margin;
	}
	
	public function getPadding()
	{
		return $this->padding;
	}
	
	public function getBorder()
	{
		return $this->borderStyle;
	}
	
	public function getWidth()
	{
		return $this->width;
	}
	
	public function setWidth($width)
	{
		if (is_int($width) || is_double($width))
			$this->width = $width;
		else
			throw new \Hx\Document\DocumentException(
				"Width value must be decimal: $width");
	}
	
	public function getHeight()
	{
		return $this->height;
	}
	
	public function setHeight($height)
	{
		if (is_int($height) || is_double($height))
			$this->height = $height;
		else
			throw new \Hx\Document\DocumentException(
				"Height value must be decimal: $height");
	}
}
?>