<?php 
namespace Hx\Email;

class EmailService implements EmailServiceInterface {
	
	private $adaptor, $queue;
	
	public function __construct(AdaptorInterface $adaptor, \Hx\Email\Queue\QueueInterface $queue)
	{
		$this->adaptor = $adaptor;
		
		$this->queue = $queue;
	}
	
	public function sent(MailInterface $mail)
	{
		$this->adaptor->sent($mail);
	}

	public function addQueue(MailInterface $mail)
	{
		$this->queue->addTail(new \Hx\Email\Queue\Item($mail));
	}
	
	public function runQueue()
	{
		$item = $this->queue->getHead();
		
		if (!empty($item))
		{
			try 
			{
				$this->adaptor->sent($item->getMail());
				
				$item->setStatus(\Hx\Email\Queue\ItemInterface::SENT_PASS);
					
				$this->queue->updateHead($item);
			}
			catch (\Hx\Email\EmailException $ex)
			{
				$item->setStatus(\Hx\Email\Queue\ItemInterface::SENT_FAIL);
					
				$this->queue->updateHead($item);
				
				throw new \Exception($ex->getMessage(), 0, $ex);
			}
		}
	}
	
}
?>