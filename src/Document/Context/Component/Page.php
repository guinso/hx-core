<?php 
namespace Hx\Document\Context\Component;

class Page implements PageInterface {
	
	use \Hx\Document\Context\ElementTrait;
	
	private $boxSize;
	
	public function __construct()
	{
		$this->tags = array();
		
		$this->boxSize = new \Hx\Document\Context\Component\Box(0, 0);
	}
	
	public function calculateBoxSize()
	{
		$maxWidth = 0;
		$height = 0;
		
		foreach ($this->tags as $tag)
		{
			$tagBoxSize = $tag->calculateBoxSize();
			
			if ($tagBoxSize->getWidth() > $maxWidth)
				$maxWidth = $tagBoxSize->getWidth();
			
			$height += $tagBoxSize->getHeight();
		}
		
		$this->boxSize->setWidth($maxWidth);
		
		$this->boxSize->setHeight($height);
	}
	
	public function render(\Hx\Document\Engine\PdfEngineInterface $pdfEngine)
	{
		throw new \Hx\Document\DocumentException("not implement yet.");
	}
	
	public function getElementName()
	{
		return 'row';
	}
	
	public function insertRow(\Hx\Document\Context\Component\RowInterface $row)
	{
		$this->tags[] = $row;
	}
	
	public function insertBottomRow(\Hx\Document\Context\Component\BottomInterface $bottomRow)
	{
		$this->tags[] = $bottomRow;
	}
}
?>