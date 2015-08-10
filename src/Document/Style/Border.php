<?php 
namespace Hx\Document\Style;

class Border implements BorderInterface {
	
	private $leftLine, $rightLine, $topLine, $bottomLine;
	
	public function __construct()
	{
		$this->leftLine = new \Hx\Document\Style\Line();
		$this->rightLine = new \Hx\Document\Style\Line();
		$this->topLine = new \Hx\Document\Style\Line();
		$this->bottomLine = new \Hx\Document\Style\Line();
		
		$this->reset();
	}
	
	public function getLeft()
	{
		return $this->leftLine;
	}
	
	public function getRight()
	{
		return $this->rightLine;
	}
	
	public function getTop()
	{
		return $this->topLine;
	}
	
	public function getBottom()
	{
		return $this->bottomLine;
	}
	
	public function setAllWidth($width)
	{
		$this->bottomLine->setWidth($width);
		$this->topLine->setWidth($width);
		$this->leftLine->setWidth($width);
		$this->rightLine->setWidth($width);
	}
	
	public function setAllCap($cap)
	{
		$this->bottomLine->setCap($cap);
		$this->topLine->setCap($cap);
		$this->leftLine->setCap($cap);
		$this->rightLine->setCap($cap);
	}
	
	public function setAllJoin($join)
	{
		$this->bottomLine->setJoin($join);
		$this->topLine->setJoin($join);
		$this->leftLine->setJoin($join);
		$this->rightLine->setJoin($join);
	}
	
	public function setAllColor($red, $green, $blue)
	{
		$this->bottomLine->getColor()->setRGB($red, $green, $blue);
		$this->topLine->getColor()->setRGB($red, $green, $blue);
		$this->leftLine->getColor()->setRGB($red, $green, $blue);
		$this->rightLine->getColor()->setRGB($red, $green, $blue);
	}
	
	public function setAllColorByHex($hex)
	{
		$this->bottomLine->getColor()->setFromHex($hex);
		$this->topLine->getColor()->setFromHex($hex);
		$this->leftLine->getColor()->setFromHex($hex);
		$this->rightLine->getColor()->setFromHex($hex);
	}
	
	public function reset()
	{
		$this->leftLine->reset();
		$this->rightLine->reset();
		$this->topLine->reset();
		$this->bottomLine->reset();
	}
}
?>