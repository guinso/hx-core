<?php 
namespace Hx\Document\Render\Component;

class ColumnRender implements \Hx\Document\Render\Component\ColumnRenderInterface {
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
		return 'col';
	}
	
	public function calculateBoxSize(\Hx\Document\Context\Component\ColumnInterface $element)
	{
		if( $element instanceof \Hx\Document\Context\Component\ColumnInterface)
			return $this->calculateColumn($element);
		else
			throw new \Hx\Document\DocumentException(
				"Bottom render only accept instance of type " .
				"\\Hx\\Document\\Context\\Component\\ColumnInterface only.");
	}
	
	public function calculateColumn(\Hx\Document\Context\Component\ColumnInterface $column)
	{
		$width = $height = 0;
		
		$width = $column->getWidth();
		
		$padding = $column->getPadding();
		$margin = $column->getMargin();
		
		$childCount = $column->getChildrenCount();
		for($i=0; $i < $childCount; $i++)
		{
		$tag = $column->getChildrenByIndex($i);
		//TODO call render container to recursive calculate box size
		$tagBoxSize = $tag->calculateBoxSize();
		
		$height += $tagBoxSize->getHeight();
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