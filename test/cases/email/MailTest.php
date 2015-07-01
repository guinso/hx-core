<?php 

class EmailTest extends PHPUnit_Framework_TestCase {
	
	public function testCreate() 
	{
		$to = array("john" => "john@abc.com", "Mary" => "mary@abc.com");
		$cc = array("admin" => "admin@abc.com", "ben" => "benjamin@qwe.net");
		$bcc = array("master" => "master_kong@abc.com");
		
		$subject = "title";
		
		$message = "sample message";
		
		$attachment = array('filename1' => "pathA");
		
		$mail = new \Hx\Email\Mail(
			$to, $cc, $bcc, $subject, $message, $attachment
		);
		
		$this->assertInstanceOf("\Hx\Email\Mail", $mail, "Fail to create \Hx\Email\Mail instance");
		
		$this->assertEquals($to, $mail->getTo(), "Mail 'To' not equal");
		
		$this->assertEquals($cc, $mail->getCc(), "Mail 'Cc' not equal");
		
		$this->assertEquals($bcc, $mail->getBcc(), "Mail 'Bcc' not equal");
		
		$this->assertEquals($subject, $mail->getSubject(), "Mail 'Subject' not equal");
		
		$this->assertEquals($message, $mail->getMessage(), "Mail 'Message' not equal");
		
		$this->assertEquals($attachment, $mail->getAttachment());
	}
	
	public function testSet()
	{
		$to = array("john" => "john@abc.com", "Mary" => "mary@abc.com");
		$cc = array("admin" => "admin@abc.com", "ben" => "benjamin@qwe.net");
		$bcc = array("master" => "master_kong@abc.com");
	
		$subject = "title";
	
		$message = "sample message";
	
		$attachment = array('filename1' => "pathA");
	
		$mail = new \Hx\Email\Mail(
				array(), array(), array(), '', '', array()
		);
		
		$mail->setAttachment($attachment);
		
		$mail->setBcc($bcc);
		
		$mail->setCc($cc);
		
		$mail->setMessage($message);
		
		$mail->setSubject($subject);
		
		$mail->setTo($to);
	
		$this->assertInstanceOf("\Hx\Email\Mail", $mail, "Fail to create \Hx\Email\Mail instance");
	
		$this->assertEquals($to, $mail->getTo(), "Mail 'To' not equal");
	
		$this->assertEquals($cc, $mail->getCc(), "Mail 'Cc' not equal");
	
		$this->assertEquals($bcc, $mail->getBcc(), "Mail 'Bcc' not equal");
	
		$this->assertEquals($subject, $mail->getSubject(), "Mail 'Subject' not equal");
	
		$this->assertEquals($message, $mail->getMessage(), "Mail 'Message' not equal");
	
		$this->assertEquals($attachment, $mail->getAttachment());
	}
}
?>