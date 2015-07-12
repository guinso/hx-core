<?php 
namespace Hx\Email\Queue;

interface DbMapperInterface {
	
	public function getTable();
	
	public function getId();
	
	public function getStatus();
	
	public function getFailCnt();
	
	public function getLastUpdate();
	
	public function getGuid();
	
	public function getSubject();
	
	public function getMessage();
	
	public function getTos();
	
	public function getCcs();
	
	public function getBccs();
	
	public function getAttachments();
}
?>