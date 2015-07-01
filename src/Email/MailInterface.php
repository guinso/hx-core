<?php 
namespace Hx\Email;

interface MailInterface {

	//*********** Getter *************
	
	public function getTo();
	
	public function getCc();
	
	public function getBcc();
	
	public function getSubject();
	
	public function getMessage();
	
	public function getAttachment();
	
	//********** Setter **************
	
	/**
	 * set targeted people to be sent
	 * @param array $to	<p>Format: 'name' - 'email address'</p>
	 */
	public function setTo(array $to);
	
	/**
	 * Set carbon copy
	 * @param array $bcc	<p>Format: 'name' - 'email address'</p>
	 */
	public function setCc(array $cc);
	
	/**
	 * Set Blue carbon copy
	 * @param array $bcc	<p>Format: 'name' - 'email address'</p>
	 */
	public function setBcc(array $bcc);
	
	/**
	 * Set email title
	 * @param string $subject
	 */
	public function setSubject($subject);
	
	/**
	 * Set email message
	 * @param string $message
	 */
	public function setMessage($message);
	
	/**
	 * Set attachment
	 * @param array $attachment	<p>Format: 'attachment name' - 'absolute file path of attachment'</p>
	 */
	public function setAttachment(array $attachment);
}
?>