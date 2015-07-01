<?php 
namespace Hx\Email;

interface EmailServiceInterface {
	
	/**
	 * Sent an email message
	 * @return 	boolean	sent email result
	 */
	public function sent(MailInterface $mail);
	
	/**
	 * Add email into a queue in order to defer for late time deliver
	 */
	public function addQueue(MailInterface $mail);
	
	/**
	 * Run first awaiting email queue and discard it once successfully sent
	 * @return boolean	sent email result
	 */
	public function runQueue();
}
?>