<?php 
namespace Hx\Email\Queue;

class Item implements ItemInterface {
	private $id, $status, $mail, $failCount;
	
	public function __construct(
		\Hx\Email\MailInterface $mail, 
		$status = self::PENDING, 
		$id = null,
		$failCount = 0)
	{
		if (is_null($id))
			$this->id = uniqid();
		else 
			$this->id = $id;
		
		$this->setStatus($status);
		
		$this->mail = $mail;
		
		$this->failCount = $failCount;
	}
	
	public function getId()
	{
		return $this->id;
	}
	
	public function getStatus()
	{
		return $this->status;
	}
	
	public function getMail()
	{
		return $this->mail;
	}
	
	public function getFailCount()
	{
		return $this->failCount;
	}
	
	public function setStatus($status)
	{
		if ($status != self::PENDING && 
			$status != self::SENT_FAIL && 
			$status != self::SENT_PASS)
			Throw new \Hx\Email\EmailException("Unknown email queue item status: $status");
		else 
		{
			$this->status = $status;
			
			if ($status == self::SENT_FAIL)
				$this->failCount++;
		}
	}
}
?>