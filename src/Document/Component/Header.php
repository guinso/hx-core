<?php 
namespace Hx\Document\Component;

class Header implements HeaderInterface {
	
	use \Hx\Document\Component\ElementTrait;
	
	private $boxSize;
	
	public function __construct()
	{
		$this->tags = array();
		
		$this->boxSize = new \Hx\Document\Component\Box(0, 0);
	}
	
	public function calculateBoxSize()
	{
		$this->boxSize->setWidth(0);
		$this->boxSize->setHeight(0);
	
		foreach($this->tags as $tag)
		{
			$tagBoxSize = $tag->calculateBoxSize();
	
			if ($tagBoxSize->getWidth() > $this->boxSize->getWidth())
				$this->boxSize->setWidth($tagBoxSize->getWidth());
	
			$this->boxSize->setHeight(
					$this->boxSize->getHeight() + $tagBoxSize->getHeight());
		}
	
		return $this->boxSize;
	}
	
	public function render(\Hx\Document\Engine\PdfEngineInterface $pdfEngine)
	{
		throw new \Hx\Document\DocumentException("Not implement yet");
	}
	
	public function getElementName()
	{
		return 'header';
	}
	
	public function insertRow(\Hx\Document\Component\RowInterface $row)
	{
		$this->tags[] = $row;
	}
}
?>