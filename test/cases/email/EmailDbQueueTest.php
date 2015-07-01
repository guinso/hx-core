<?php 
class EmailDbQueueTest extends PHPUnit_Framework_TestCase {
	
	public function testGetHead()
	{
		HxUnitTestService::runSql(
			__DIR__ . DIRECTORY_SEPARATOR . 'emailQueue.sql');
		
		$pdo = HxUnitTestService::getPdo();
		
		$db = new \Hx\Database\SimpleDb($pdo);
		
		$queue = new \Hx\Email\Queue\DbQueue(
			new \Hx\Database\SqlService($db), 
			new \Hx\Database\Record\AlphaNumericId(
				new \Hx\Database\Sql\Select($db), 'A', 10)
		);
		
		$item = $queue->getHead();
		
		$mail = $item->getMail();
		
		$this->assertEquals(\Hx\Email\Queue\ItemInterface::PENDING, $item->getStatus());
		
		$this->assertEquals("Kelopok", $mail->getSubject());
	}
	
	public function testUpdateHead()
	{
		HxUnitTestService::runSql(
			__DIR__ . DIRECTORY_SEPARATOR . 'emailQueue.sql');
		
		$pdo = HxUnitTestService::getPdo();
		
		$db = new \Hx\Database\SimpleDb($pdo);
		
		$queue = new \Hx\Email\Queue\DbQueue(
				new \Hx\Database\SqlService($db),
				new \Hx\Database\Record\AlphaNumericId(
						new \Hx\Database\Sql\Select($db), 'A', 10)
		);
		
		$item = $queue->getHead();
		
		$item->setStatus(\Hx\Email\Queue\ItemInterface::SENT_FAIL);
		
		$queue->updateHead($item);
		
		$id = $item->getId();
		
		$raw = $db->runSql("SELECT * FROM email_queue WHERE id = '$id'");
		
		$this->assertEquals(1, $raw->rowCount(), "Email queue ID $id not found.");
		
		$row = $raw->fetch();
		
		$this->assertEquals(\Hx\Email\Queue\ItemInterface::SENT_FAIL, intval($row['status']));
	}
	
	public function testAddQueue()
	{
		HxUnitTestService::runSql(
		__DIR__ . DIRECTORY_SEPARATOR . 'emailQueue.sql');
		
		$pdo = HxUnitTestService::getPdo();
		
		$db = new \Hx\Database\SimpleDb($pdo);
		
		$queue = new \Hx\Email\Queue\DbQueue(
				new \Hx\Database\SqlService($db),
				new \Hx\Database\Record\AlphaNumericId(
						new \Hx\Database\Sql\Select($db), 'A', 10)
		);
		
		$queue->addTail(new \Hx\Email\Queue\Item(
			new \Hx\Email\Mail(
				array('john' => 'john@koko.net'),
				array(),
				array(),
				"John mail",
				"content.....",
				array('sample attachment' => __DIR__ . DIRECTORY_SEPARATOR . 'sample.txt')
			), 
			\Hx\Email\Queue\ItemInterface::PENDING, 
			'A0000000004', 
			0)
		);
		
		$raw = $db->runSql("SELECT * FROM email_queue");
		
		$this->assertEquals(4, $raw->rowCount());
	}
}
?>