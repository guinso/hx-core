<?php 
namespace Hx\Document\Context;

trait ElementTrait {
	
	private $tags;
	
	public function getChildrenByIndex($index)
	{
		if (is_int($int) && $index >= 0 && count($this->tags) > $index)
			return $this->tags[$index];
		else
			throw new \Hx\Document\DocumentException(
				"Cannot get context component by index: $index.");
	}
	
	public function getChildrenCount()
	{
		return count($this->tags);
	}
	
	public function removeChild(\Hx\Document\Context\ElementInterface $child)
	{
		$index = -1;
		
		for($i=0; $i< count($this->tags); $i++)
			if ($this->tags[$i] === $child)
				$index = $i;
			
		if ($i != -1)
			$this->removeChildByIndex($index);
		else
			Throw new \Hx\Document\DocumentException(
				"Remove child rejected, there is no mtching child found.");
	}
	
	public function removeChildByIndex($index)
	{
		$count = count($this->tags);
		
		if ($count > $index)
			$this->tags = array_splice($this->tags, $index, 1);
		else
			Throw new \Hx\Document\DocumentException(
				"Remove child rejected, index $index is not in range.");
	}
}
?>