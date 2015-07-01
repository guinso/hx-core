<?php 
namespace Hx\Email;

interface AdaptorInterface {
	public function sent(MailInterface $mail);
}
?>