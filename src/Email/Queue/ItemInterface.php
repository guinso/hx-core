<?php 
namespace Hx\Email\Queue;

interface ItemInterface {
	
	const PENDING = 1;
	
	const SENT_PASS = 2;
	
	const SENT_FAIL = 3;
	
	public function getId();
	
	public function getStatus();
	
	/**
	 * Return MailInterface instance
	 */
	public function getMail();
	
	public function getFailCount();
	
	public function setStatus($status);
}
?>