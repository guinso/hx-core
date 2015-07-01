<?php 
class EmailItemTest extends PHPUnit_Framework_TestCase {
	
	public function testCreate()
	{
		$mail = new \Hx\Email\Mail(
			array('john' => 'john@koko.net'),
			array(),
			array(),
			"John mail",
			"content.....",
			array('sample attachment' => __DIR__ . DIRECTORY_SEPARATOR . 'sample.txt')
		);
		
		$id = 'A0000000004';
		
		$item = new \Hx\Email\Queue\Item(
			$mail, 
			\Hx\Email\Queue\ItemInterface::PENDING, 
			$id, 
			0
		);
		
		$this->assertEquals($id, $item->getId());
		
		$this->assertEquals($mail, $item->getMail());
	}
}
?>