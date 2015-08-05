<?php 
namespace Hx\Document;

class StateHandler implements \Hx\Document\StateHandlerInterface {
	
	private $stack;
	
	public function __construct()
	{
		$this->stack = array();
		
		$this->reset();
	}
	
	public function pushByObject(\Hx\Document\StateInterface $state)
	{
		if (array_search($state, $this->stack) !== false)
			throw new \Hx\Document\DocumentException(
				"Push state rejected. Targeted state already found in state stack.");
		else
		{
			array_push($this->stack, $state);
			
			return $state;
		}
	}
	
	public function push()
	{
		throw new \Hx\Document\DocumentException("not implement initialize style objects yet.");
		
		//TODO allocate new style objects...
		$newState = new \Hx\Document\State(
			$margin, 
			$padding, 
			$dimension, 
			$font);
		
		array_push($this->stack, $newState);
		
		return $newState;
	}
	
	public function pop()
	{
		if (count($this->stack) < 2)
			throw new \Hx\Document\DocumentException(
				"Pop state rejected, there is no more state allow to pop.");
		
		return array_shift($this->stack);
	}
	
	public function reset()
	{
		array_splice($this->stack);
		
		return $this->push();
	}
	
	public function getState()
	{
		return array_pop($this->stack);
	}
	
}
?>