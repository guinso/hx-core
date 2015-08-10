<?php 
namespace Hx\Document\Component;

class Row implements RowInterface {
	
	use \Hx\Document\Component\ElementTrait;
	
	private $padding, $margin, $boxSize;
	
	public function __construct()
	{
		$this->tags = array();
		
		$this->padding = new \Hx\Document\Style\Padding();
		
		$this->margin = new \Hx\Document\Style\Margin();
		
		$this->boxSize = new \Hx\Document\Component\Box(0, 0);
	}
	
	public function calculateBoxSize()
	{
		$height = 0;
		$width = 0;
		
		foreach($this->tags as $tag)
		{
			$tagBoxSize = $tag->calculateBoxSize();
			
			$width += $tagBoxSize->getwidth();
			
			if ($tagBoxSize->getHeight() > $height)
				$height = $tagBoxSize->getHeight();
		}
		
		$this->boxSize->setHeight(
			$height +
			$this->padding->getTop() +
			$this->padding->getBottom() +
			$this->margin->getTop() +
			$this->margin->getBottom()
		);
		
		$this->boxSize->setWidth(
			$width +
			$this->padding->getLeft() +
			$this->padding->getRight() +
			$this->margin->getLeft() +
			$this->margin->getRight()
		);
		
		return $this->boxSize;
	}
	
	public function render(\Hx\Document\Engine\PdfEngineInterface $pdfEngine)
	{
		throw new \Hx\Document\DocumentException("not implement yet.");
	}
	
	public function getElementName()
	{
		return 'row';
	}
	
	public function getPadding()
	{
		return $this->padding;
	}
	
	public function getMargin()
	{
		return $this->margin;
	}
	
	public function insertColumn(\Hx\Document\Component\ColumnInterface $col)
	{
		$this->tags[] = $col;
	}
}
?>