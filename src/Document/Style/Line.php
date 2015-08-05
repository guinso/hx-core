<?php 
namespace Hx\Document\Style;

class Line implements LineInterface {

	private $width, $cap, $join, $color;
	
	public function __construct()
	{
		$this->color = new \Hx\Document\Style\Rgb(0, 0, 0);
		
		$this->reset();
	}
	
	public function getWidth()
	{
		return $this->width;
	}
	
	public function setWidth($value)
	{
		if (is_double($value) === false)
			throw new \Hx\Document\DocumentException(
				"Line width only accept decimal: $value");
		else 
			$this->width = $value;
	}
	
	public function getCap()
	{
		return $this->cap;
	}
	
	public function setCap($cap)
	{
		if ($cap == \Hx\Document\Style\LineInterface::CAP_BUTT ||
			$cap == \Hx\Document\Style\LineInterface::CAP_ROUND ||
			$cap == \Hx\Document\Style\LineInterface::CAP_SQUARE)
				$this->cap = $cap;
			else
				throw new \Hx\Document\DocumentException(
					"Invalid line cap value detected: $cap");
	}
	
	public function getJoin()
	{
		return $this->join;
	}
	
	public function setJoin($join)
	{
		if ($join == \Hx\Document\Style\LineInterface::JOIN_BEVEL ||
			$join == \Hx\Document\Style\LineInterface::JOIN_MITER ||
			$join == \Hx\Document\Style\LineInterface::JOIN_ROUND)
			$this->join = $join;
		else 
			throw new \Hx\Document\DocumentException(
				"Invalid line join value detected: $join");
	}
	
	public function getColor()
	{
		return $this->color;
	}
	
	public function reset()
	{
		$this->width = 1;
		
		$this->cap = \Hx\Document\Style\LineInterface::CAP_SQUARE;
		
		$this->join = \Hx\Document\Style\LineInterface::JOIN_BEVEL;
		
		$this->color->reset();
	}
}
?>