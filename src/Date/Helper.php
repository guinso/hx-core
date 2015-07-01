<?php 
namespace Hx\Date;

class Helper implements HelperInterface {
	
	private $dateFormat, $datetimeFormat;
	
	public function __construct(
		$dateFormat = 'Y-m-d', 
		$datetimeFormat = 'Y-m-d H:i:s')
	{
		$this->dateFormat = $dateFormat;
		
		$this->datetimeFormat = $datetimeFormat;
	}
	
	/**
	 * Get current Date
	 */
	public function getCurrentDate() 
	{
		return date($this->dateFormat);
	}
	
	/**
	 * Get current Date and Time
	 */
	public function getCurrentDatetime() 
	{
		return date($this->datetimeFormat);
	}
	
	/**
	 * Get date based on week span, which will always be on Monday
	 * @param integer $weekSpan
	 */
	public function getDateFromWeekSpan($weekSpan) 
	{
		$w = $weekSpan % 52;
		
		if ($w == 0)
			$w = 52;
	
		$y = floor($weekSpan / 52);
		
		$date = new \DateTime();
		
		$date->setISODate($y, $w);
		
		return $date->format($this->dateFormat);
	}
	
	/**
	 * Calculate weekspan based on ISO-8601
	 * @param String $date
	 */
	public function getWeekSpan($date) 
	{
		$timestamp = strtotime($date);
		
		$w = date('W', $timestamp);
		
		$y = date('o', $timestamp);
	
		return $w + $y * 52;
	}
	
	/**
	 * backward date to Monday
	 * @param String $date
	 */
	public function offsetToMonday($date) 
	{
		$datetime = new \DateTime($date);
		$diff = date('N', strtotime($date)) - 1;
	
		$dateInterval = new \DateInterval("P".$diff."D");
		$datetime->sub($dateInterval);
	
		return $datetime->format($this->dateFormat);
	}
	
	public function offsetDate($date, $diff) 
	{
		$datetime = new \DateTime($date);
	
		if ($diff < 0) {
			$diff *= -1;
			$dateInterval = new \DateInterval("P".$diff."D");
			$datetime->sub($dateInterval);
		} else {
			$dateInterval = new \DateInterval("P".$diff."D");
			$datetime->add($dateInterval);
		}
	
		return $datetime->format($this->dateFormat);
	}
	
	public function getLastDayOfMonth($date) 
	{
		$x =  date('Y-m-t', strtotime($date));
		
		return date($this->dateFormat, strtotime($x));
	}
	
	public function getDateRange($month, $year) 
	{
		$fromDate = date($this->dateFormat, strtotime($year . '-' . $month . '-1'));
		
		$toDate = $this->getLastDayOfMonth($year . '-' . $month . '-1');
		
		$carryFwdDate = $this->offsetDate($fromDate, -1);
	
		return array(
			'fromDate' => $fromDate,
			'toDate' => $toDate,
			'carryFwdDate' => $carryFwdDate
		);
	}
}
?>