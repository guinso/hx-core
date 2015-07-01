<?php 
namespace Hx\Date;

interface HelperInterface {
	/**
	 * Get current Date
	 */
	public function getCurrentDate();
	
	/**
	 * Get current Date and Time
	 */
	public function getCurrentDatetime();
	
	/**
	 * Get date based on week span, which will always be on Monday
	 * @param integer $weekSpan
	 */
	public function getDateFromWeekSpan($weekSpan);
	
	/**
	 * Calculate weekspan based on ISO-8601
	 * @param String $date
	 */
	public function getWeekSpan($date);
	
	/**
	 * backward date to Monday
	 * @param String $date
	 */
	public function offsetToMonday($date);
	
	public function offsetDate($date, $diff);
	
	public function getLastDayOfMonth($date);
	
	public function getDateRange($month, $year);
}
?>