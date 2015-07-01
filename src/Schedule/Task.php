<?php 
namespace Hx\Schedule;

class Task implements TaskInterface {
	
	private $id, $className, $functionName, $description, $status;
	
	private $month, $day, $weekday, $hour, $minute;
	
	private $timePattern;
	
	public function __construct(
		$id, 
		$className, 
		$functionName, 
		$description, 
		$status, 
		$month, $day, $weekday, $hour, $minute)
	{
		//pattern examples:
		//1. 12
		//2. *
		//3. */16
		$this->timePattern = "#^([0-9]+)|(\*)|(\*/[0-9]+)$#";
		
		$this->id = $id;
		
		$this->className = $className;
		
		$this->functionName = $functionName;
		
		$this->description = $description;
		
		$this->status = $status;
		
		if ($this->isTimePatternMatch($month))
			$this->month = $month;
		else 
			Throw new \Hx\Schedule\ScheduleException(
				"Month value not compliant with permitted pattern, $month");
		
		if ($this->isTimePatternMatch($day))
			$this->day = $day;
		else
			Throw new \Hx\Schedule\ScheduleException(
					"Day value not compliant with permitted pattern, $day");
		
		if ($this->isTimePatternMatch($weekday))
			$this->weekday = $weekday;
		else
			Throw new \Hx\Schedule\ScheduleException(
				"Weekday value not compliant with permitted pattern, $weekday");
		
		if ($this->isTimePatternMatch($hour))
			$this->hour = $hour;
		else
			Throw new \Hx\Schedule\ScheduleException(
				"Hour value not compliant with permitted pattern, $hour");
		
		if ($this->isTimePatternMatch($minute))
			$this->minute = $minute;
		else
			Throw new \Hx\Schedule\ScheduleException(
				"Minute value not compliant with permitted pattern, $minute");
	}
	
	private function isTimePatternMatch($input)
	{
		$x = preg_match($this->timePattern, $input);
		
		if ($x === false)
			Throw new \Hx\Schedule\ScheduleException(
				"There is problem to run regex, input: $input");
		else 
			return $x == 1;
	}
	
	public function getId()
	{
		return $this->id;
	}
	
	public function getClassName()
	{
		return $this->className;
	}
	
	public function getFunctionName()
	{
		return $this->functionName;
	}
	
	public function getDescription()
	{
		return $this->description;
	}
	
	public function getStatus()
	{
		return $this->status;
	}
	
	public function getMonth()
	{
		return $this->month;
	}
	
	public function getDay()
	{
		return $this->day;
	}
	
	public function getWeekday()
	{
		return $this->weekday;
	}
	
	public function getHour()
	{
		return $this->hour;
	}
	
	public function getMinute()
	{
		return $this->minute;
	}
}
?>