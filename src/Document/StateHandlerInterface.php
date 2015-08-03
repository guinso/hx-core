<?php 
namespace Hx\Document;

interface StateHandlerInterface {
	
	public function pushByObject(\Hx\Document\StateInterface $state);
	
	public function push();
	
	public function pop();
	
	public function reset();
	
	public function getState();
}
?>