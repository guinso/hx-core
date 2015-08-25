<?php 
namespace Hx\Document\Render;

class State implements \Hx\Document\StateInterface {
	
	private $margin, $padding, $dimension, $font, $line, $backgroundColor;
	
	public function __construct(
		\Hx\Document\Style\MarginInterface $margin,
		\Hx\Document\Style\PaddingInterface $padding, 
		\Hx\Document\Style\DimensionInterface $dimension,
		\Hx\Document\Style\LineInterface $line,
		\Hx\Document\Style\FontInterface $font,
		\Hx\Document\Style\RgbInterface $backgroundColor) {
		
		$this->margin = $margin;
		
		$this->padding = $padding;
		
		$this->dimension = $dimension;
		
		$this->font = $font;
		
		$this->line = $line;
		
		$this->backgroundColor = $backgroundColor;
	}
	
	public function __clone()
	{
		return new \Hx\Document\Render\State(
			clone $this->getMargin(), 
			clone $this->getPadding(), 
			clone $this->getDimension(), 
			clone $this->getLine(),
			clone $this->getFont(), 
			clone $this->getBackgroundColor()
		);
	}
	
	public function reset()
	{
		$this->dimension->reset();
		
		$this->font->reset();
		
		$this->line->reset();
		
		$this->margin->reset();
		
		$this->padding->reset();
	}
	
	public function getMargin()
	{
		return $this->margin;
	}
	
	public function getPadding()
	{
		return $this->padding;
	}
	
	public function getDimension()
	{
		return $this->dimension;
	}
	
	public function getFont()
	{
		return $this->font;
	}
	
	public function getLine()
	{
		return $this->line;
	}
	
	public function getBackgroundColor()
	{
		return $this->backgroundColor;
	}
}
?>