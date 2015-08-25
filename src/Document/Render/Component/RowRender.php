<?php 
namespace Hx\Document\Render\Component;

class RowRender implements \Hx\Document\Render\Component\RowRenderInterface {
	
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
		return 'row';	
	}
	
	public function calculateBoxSize(\Hx\Document\Context\ElementInterface $element)
	{
		if( $element instanceof \Hx\Document\Context\Component\RowInterface)
			return $this->calculateRow($element);
		else
			throw new \Hx\Document\DocumentException(
				"Bottom render only accept instance of type " .
				"\\Hx\\Document\\Context\\Component\\RowInterface only.");
	}
	
	public function calculateRow(\Hx\Document\Context\Component\RowInterface $row)
	{
		$height = 0;
		$width = 0;
		
		$padding = $row->getPadding();
		$margin = $row->getMargin();
		
		$childrenCount = $row->getChildrenCount();
		for($i = 0; $i < $childrenCount; $i++)
		{
			$tag = $row->getChildrenByIndex($i);
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
	
	public function render(\Hx\Document\Engine\PdfEngineInterface $pdfEngine)
	{
		throw new \Hx\Document\DocumentException("Not implement yet.");
	}
}
?>