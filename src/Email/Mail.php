<?php 
namespace Hx\Email;

class Mail implements MailInterface {
	
	private $tos, $ccs, $bccs;
	
	private $subject, $message;
	
	private $attachment;
	
	public function __construct(
		$to = array(),
		$cc = array(),
		$bcc = array(),
		$subject = "",
		$message = "",
		$attachment = array())
	{
		$this->tos = $to;
		
		$this->ccs = $cc;
		
		$this->bccs = $bcc;
		
		$this->subject = $subject;
		
		$this->message = $message;
		
		$this->attachment = $attachment;
	}
	
	public function getTo()
	{
		return $this->tos;
	}
	
	public function getCc()
	{
		return $this->ccs;
	}
	
	public function getBcc()
	{
		return $this->bccs;
	}
	
	public function getSubject()
	{
		return $this->subject;
	}
	
	public function getMessage()
	{
		return $this->message;
	}
	
	public function getAttachment()
	{
		return $this->attachment;
	}
	
	//********** Setter **************
	
	/**
	 * set targeted people to be sent
	 * @param array $to	<p>Format: 'name' - 'email address'</p>
	*/
	public function setTo(array $to)
	{
		$this->tos = $to;
	}
	
	/**
	 * Set carbon copy
	 * @param array $bcc	<p>Format: 'name' - 'email address'</p>
	*/
	public function setCc(array $cc)
	{
		$this->ccs = $cc;
	}
	
	/**
	 * Set Blue carbon copy
	 * @param array $bcc	<p>Format: 'name' - 'email address'</p>
	*/
	public function setBcc(array $bcc)
	{
		$this->bccs = $bcc;
	}
	
	/**
	 * Set email title
	 * @param string $subject
	*/
	public function setSubject($subject)
	{
		$this->subject = $subject;
	}
	
	/**
	 * Set email message
	 * @param string $message
	*/
	public function setMessage($message)
	{
		$this->message = $message;
	}
	
	/**
	 * Set attachment
	 * @param array $attachment	<p>Format: 'attachment name' - 'absolute file path of attachment'</p>
	*/
	public function setAttachment(array $attachment)
	{
		$this->attachment = $attachment;
	}
}
?>