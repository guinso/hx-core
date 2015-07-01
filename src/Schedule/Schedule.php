<?php 
namespace Hx\Schedule;

class Schedule implements ScheduleInterface {
	
	private $repo;
	
	public function __construct(
		\Hx\Schedule\RepositoryInterface $repo)
	{
		$this->repo = $repo;
	}
	
	/**
	 * Run all match task with current server time
	 */
	public function run()
	{
		$arr = $this->repo->getAll(\Hx\Schedule\Task::ENABLE);
		
		$month = intval(date('m'));
		
		$weekday = intval(date('w'));
		
		$day = intval(date('j')); //no leading zero
		
		$hour = intval(date('G'));
		
		$minute = intval(date('i'));
		
		foreach ($arr as $key => $task)
		{
			if (!is_a($task, "\Hx\Schedule\TaskInterface"))
				Throw new \Hx\Schedule\ScheduleException(
					"Array item $key is not instace of \Hx\Schedule\TaskInterface");
				
			if ($this->isMatch($month, $task->getMonth()) &&
				$this->isMatch($day, $task->getDay()) &&
				$this->isMatch($weekday, $task->getWeekday()) &&
				$this->isMatch($hour, $task->getHour()) &&
				$this->isMatch($minute, $task->getMinute()))
					$this->manualRun($task);
		}
	}
	
	/**
	 * Manually run a single task regardless time matching
	 * @param string $id	<p>task ID</p>
	 */
	public function manualRun(\Hx\Schedule\TaskInterface $task)
	{
		$exec = (empty($task->getClassName())? '' : $task->getClassName() . "::" ) . 
			$task->getFunctionName() . "();";
		
		try 
		{
			eval($exec);
		}
		catch(\Exception $ex)
		{
			throw new \Hx\Schedule\ScheduleException(
				"Fail to run schedule {$task->getId()}", -1, $ex);
		}
	}
	
	/**
	 * Check time unit value match with task schedule
	 * @param string $timeUnitValue	<p>example 1,2,45</p>
	 * @param string $expression	<p>example *, 34, *\/10</p>
	 * @return boolean
	 */
	private static function isMatch($timeUnitValue, $expression)
	{
		$hasWildCard = strpos($expression, '*') !== false;
		
		$x = str_replace('*', $timeUnitValue, $expression);
		
		$y = eval('return doubleval(' . $x . ');');
	
		if (empty($y))
			$y = 0;
	
		return $timeUnitValue == $y || ($hasWildCard && ($y * 1000 % 1000) == 0);
	}
}
?>