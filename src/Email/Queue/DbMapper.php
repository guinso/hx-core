<?php 
namespace Hx\Email\Queue;

class DbMapper implements DbMapperInterface {
	
	private $table, $id, $status, $failCnt, $lastUpdate;
	private $guid, $subject, $msg, $tos, $ccs, $bccs, $attchs;
	
	public function __construct($tableName, $id, $status, $failCnt, $lastUpdate, $guid,
		$subject, $msg, $tos, $ccs, $bccs, $attchs)
	{
		$this->table = $tableName;
		
		$this->id = $id;
		
		$this->status = $status;
		
		$this->failCnt = $failCnt;
		
		$this->lastUpdate = $lastUpdate;
		
		$this->guid = $guid;
		
		$this->subject = $subject;
		
		$this->msg = $msg;
		
		$this->tos = $tos;
		
		$this->ccs = $ccs;
		
		$this->bccs = $bccs;
		
		$this->attchs = $attchs;
	}
	
	public function getTable()
	{
		return $this->table;
	}
	
	public function getId()
	{
		return $this->id;
	}
	
	public function getStatus()
	{
		return $this->status;
	}
	
	public function getFailCnt()
	{
		return $this->failCnt;
	}
	
	public function getLastUpdate()
	{
		return $this->lastUpdate;
	}
	
	public function getGuid()
	{
		return $this->guid;
	}
	
	public function getSubject()
	{
		return $this->subject;
	}
	
	public function getMessage()
	{
		return $this->msg;
	}
	
	public function getTos()
	{
		return $this->tos;
	}
	
	public function getCcs()
	{
		return $this->ccs;
	}
	
	public function getBccs()
	{
		return $this->bccs;
	}
	
	public function getAttachments()
	{
		return $this->attchs;
	}
}
?>