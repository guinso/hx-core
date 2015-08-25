<?php 
namespace Hx\Document\Render\Component;

class BottomRender implements \Hx\Document\Render\Component\BottomRenderInterface {
	
	private $engine, $containerReader;
	
	public function __construct(
		\Hx\Document\Engine\PdfEngineInterface $pdfEngine,
		\Hx\Document\Render\ComponentContainerReaderInterface $containerReader)
	{
		$this->engine = $pdfEngine;	
		
		$this->containerReader = $containerReader;
	}
	
	public function getComponentName()
	{
		return 'bottom';	
	}
	
	public function calculateBoxSize(\Hx\Document\Context\ElementInterface $element)
	{
		if( $element instanceof \Hx\Document\Context\Component\BottomInterface)
			return $this->calculateBottom($element);
		else 
			throw new \Hx\Document\DocumentException(
				"Bottom render only accept instance of type " . 
				"\\Hx\\Document\\Context\\Component\\BottomInterface only.");
	}
	
	public function calculateBottom(\Hx\Document\Context\Component\BottomInterface $bottom)
	{
		$height = 0;
		$width = 0;
		
		$padding = $bottom->getPadding();
		$margin = $bottom->getMargin();
		
		$childrenCount = $bottom->getChildrenCount();
		for($i = 0; $i < $childrenCount; $i++)
		{
			$tag = $bottom->getChildrenByIndex($i);
			//TODO recursive calculate is through render container
			$tagBoxSize = $tag->calculateBoxSize();
				
			$width += $tagBoxSize->getwidth();
				
			if ($tagBoxSize->getHeight() > $height)
				$height = $tagBoxSize->getHeight();
		}
	
		$height +=
			$padding->getTop() +
			$padding->getBottom() +
			$margin->getTop() +
			$margin->getBottom();
	
		$width +=
			$padding->getLeft() +
			$padding->getRight() +
			$margin->getLeft() +
			$margin->getRight();
		
		return new \Hx\Document\Render\Box($width, $height);
	}
	
	public function render(
		\Hx\Document\Context\ElementInterface $element, 
		\Hx\Document\Engine\PdfEngineInterface $pdfEngine)
	{
		if($element instanceof \Hx\Document\Context\Component\BottomInterface)
			$this->renderBottom($element, $pdfEngine);
		else	
			throw new \Hx\Document\DocumentException(
				"Bottom render only accept instance of type " .
				"\\Hx\\Document\\Context\\Component\\BottomInterface only to render.");
	}
	
	private function renderBottom(
		\Hx\Document\Context\Component\BottomInterface $bottom,
		\Hx\Document\Engine\PdfEngineInterface $pdfEngine)
	{
		throw new \Hx\Document\DocumentException("Not implement yet.");
	}
}
?>