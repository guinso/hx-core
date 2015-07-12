<?php 
class EmailDbMapperTest extends PHPUnit_Framework_TestCase {
	public function testCreate()
	{
		$tableName = 'email_queue';
		$id = 'id';
		$status = 'status';
		$failCnt = 'fail_cnt';
		$lastUpdate = 'last_update';
		$guid = 'guid';
		$subject = 'subject';
		$msg = 'msg';
		$tos = 'tos';
		$ccs = 'ccs';
		$bccs = 'bccs';
		$attchs = 'attchs';
		
		$mapper = new \Hx\Email\Queue\DbMapper(
			$tableName, $id, $status, $failCnt, $lastUpdate, $guid, 
			$subject, $msg, $tos, $ccs, $bccs, $attchs);
		
		$this->assertEquals($tableName, $mapper->getTable());
		
		$this->assertEquals($id, $mapper->getId());
		
		$this->assertEquals($status, $mapper->getStatus());
		
		$this->assertEquals($failCnt, $mapper->getFailCnt());
		
		$this->assertEquals($lastUpdate, $mapper->getLastUpdate());
		
		$this->assertEquals($guid, $mapper->getGuid());
		
		$this->assertEquals($subject, $mapper->getSubject());
		
		$this->assertEquals($msg, $mapper->getMessage());
		
		$this->assertEquals($tos, $mapper->getTos());
		
		$this->assertEquals($ccs, $mapper->getCcs());
		
		$this->assertEquals($bccs, $mapper->getBccs());
		
		$this->assertEquals($attchs, $mapper->getAttachments());
	}
}
?>