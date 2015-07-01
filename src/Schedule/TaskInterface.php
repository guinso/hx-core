<?php 
namespace Hx\Schedule;

interface TaskInterface {
	const ENABLE = 1;
	const DISABLE = 2;
	
	public function getId();
	
	public function getClassName();
	
	public function getFunctionName();
	
	public function getDescription();
	
	public function getStatus();
	
	public function getMonth();
	
	public function getDay();
	
	public function getWeekday();
	
	public function getHour();
	
	public function getMinute();
}
?>