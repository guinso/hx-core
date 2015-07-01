<?php 
namespace Hx\Schedule\Repo;

interface DbMapperInterface {
	
	/**
	 * get data table mapping name
	 */
	public function getTable();
	
	/**
	 * get data column 'id' mapping name
	 */
	public function getId();
	
	/**
	 * get data column 'classname' mapping name
	 */
	public function getClassName();
	
	/**
	 * get data column 'function_name' mapping name
	 */
	public function getFunctionName();
	
	/**
	 * get data column 'description' mapping name
	 */
	public function getDescription();
	
	/**
	 * get data column 'status' mapping name
	 */
	public function getStatus();
	
	/**
	 * get data column 'month' mapping name
	 */
	public function getMonth();
	
	/**
	 * get data column 'day' mapping name
	 */
	public function getDay();
	
	/**
	 * get data column 'weekday' mapping name
	 */
	public function getWeekday();
	
	/**
	 * get data column 'hour' mapping name
	 */
	public function getHour();
	
	/**
	 * get data column 'minute' mapping name
	 */
	public function getMinute();
}
?>