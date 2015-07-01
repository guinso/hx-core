<?php 
namespace Hx\Schedule;

interface ScheduleInterface {
	
	/**
	 * Run all match task with current server time
	 */
	public function run();
	
	/**
	 * Manually run a single task regardless time matching
	 * @param string $id	<p>task ID</p>
	 */
	public function manualRun(\Hx\Schedule\TaskInterface $task);
}
?>