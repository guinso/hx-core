<?php 
namespace Hx\Email\Queue;

interface QueueInterface {
	
	public function addTail(ItemInterface $queueItem);
	
	public function getHead();
	
	public function updateHead(ItemInterface $queueItem);
}
?>