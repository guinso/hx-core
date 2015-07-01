<?php 
class EmailAdaptorMock implements \Hx\Email\AdaptorInterface {
	private $mail;
		
	public function sent(\Hx\Email\MailInterface $mail)
	{
		$this->mail = $mail;
	}
		
	public function getMail()
	{
		return $this->mail;
	}
}

class EmailServiceTest extends PHPUnit_Framework_TestCase {

	public function testCreate()
	{
		$mockAdaptor = $this->getMockBuilder("\Hx\Email\AdaptorInterface")->getMock();
		
		$mockQueue = $this->getMockBuilder("\Hx\Email\Queue\QueueInterface")->getMock();
		
		$emailService = new \Hx\Email\EmailService(
			$mockAdaptor, $mockQueue
		);
		
		$this->assertInstanceOf("\Hx\Email\EmailService", $emailService);
	}

	 public function testEmailServiceSentEmail()
	 {
		$mockMail = $this->getMockBuilder("\Hx\Email\Mail")->getMock();
		
		$mockAdaptor = new EmailAdaptorMock();
		 
		$mockQueue = $this->getMockBuilder("\Hx\Email\Queue\QueueInterface")->getMock();
		
		$emailService = new \Hx\Email\EmailService(
			$mockAdaptor, $mockQueue
		);
		 
		$emailService->sent($mockMail);
		
		$this->assertEquals($mockMail, $mockAdaptor->getMail());
	 }
}
?>