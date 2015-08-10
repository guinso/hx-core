<?php 
namespace Hx\Document\Component;

trait ElementTrait {
	
	private $tags;
	
	public function getChildren()
	{
		return $tags;
	}
	
	public function removeChild(\Hx\Document\Component\ElementInterface $child)
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