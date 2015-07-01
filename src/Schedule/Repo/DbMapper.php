<?php 
namespace Hx\Schedule\Repo;

class DbMapper implements DbMapperInterface {
	
	private $table, $id, $className, $functionName, $description, $status;
	
	private $month, $day, $weekday, $hour, $minute;
	
	public function __construct(
		$tableName, 
		$id, $className, $functionName, $description, 
		$status, 
		$month, $day, $weekday, $hour, $minute)
	{
		$this->table = $tableName;
		
		$this->id = $id;
		
		$this->className = $className;
		
		$this->functionName = $functionName;
		
		$this->description = $description;
		
		$this->status = $status;
		
		$this->month = $month;
		
		$this->day = $day;
		
		$this->weekday = $weekday;
		
		$this->hour = $hour;
		
		$this->minute = $minute;
	}
	
	/**
	 * get data table mapping name
	 */
	public function getTable()
	{
		return $this->table;
	}
	
	/**
	 * get data column 'id' mapping name
	 */
	public function getId()
	{
		return $this->id;
	}
	
	/**
	 * get data column 'classname' mapping name
	 */
	public function getClassName()
	{
		return $this->className;
	}
	
	/**
	 * get data column 'function_name' mapping name
	 */
	public function getFunctionName()
	{
		return $this->functionName;
	}
	
	/**
	 * get data column 'description' mapping name
	 */
	public function getDescription()
	{
		return $this->description;
	}
	
	/**
	 * get data column 'status' mapping name
	 */
	public function getStatus()
	{
		return $this->status;
	}
	
	/**
	 * get data column 'month' mapping name
	 */
	public function getMonth()
	{
		return $this->month;
	}
	
	/**
	 * get data column 'day' mapping name
	 */
	public function getDay()
	{
		return $this->day;
	}
	
	/**
	 * get data column 'weekday' mapping name
	 */
	public function getWeekday()
	{
		return $this->weekday;
	}
	
	/**
	 * get data column 'hour' mapping name
	 */
	public function getHour()
	{
		return $this->hour;
	}
	
	/**
	 * get data column 'minute' mapping name
	 */
	public function getMinute()
	{
		return $this->minute;
	}
}
?>