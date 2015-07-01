<?php 
class EmailQueueItemTest extends PHPUnit_Framework_TestCase {
	
	public function testCreate()
	{
		$mailMockBuilder = $this->getMockBuilder("\Hx\Email\MailInterface");
		
		
		$status = \Hx\Email\Queue\ItemInterface::PENDING;
		
		$id = uniqid();
		
		$failCnt = 0;
		
		$mailMock = $mailMockBuilder->getMock();
		
		$queueItem = new \Hx\Email\Queue\Item(
			$mailMock, 
			$status, 
			$id, 
			$failCnt);
		
		$this->assertEquals($mailMock, $queueItem->getMail());
		
		$this->assertEquals($status, $queueItem->getStatus());
		
		$this->assertEquals($failCnt, $queueItem->getFailCount());
		
		$this->assertEquals($id, $queueItem->getId());
		
		//test update fail
		$newFailStatus = \Hx\Email\Queue\ItemInterface::SENT_FAIL;
		
		$queueItem->setStatus($newFailStatus);
		
		$this->assertEquals($newFailStatus, $queueItem->getStatus());
		
		$this->assertEquals(1, $queueItem->getFailCount());
		
		//test update pass
		$newPassStatus = \Hx\Email\Queue\ItemInterface::SENT_PASS;
		
		$queueItem->setStatus($newPassStatus);
		
		$this->assertEquals($newPassStatus, $queueItem->getStatus());
	}
}
?>