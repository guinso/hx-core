<?php 
class DateHelperTest extends PHPUnit_Framework_TestCase {
	
	public function testDateformat()
	{
		$helper = new \Hx\Date\Helper('Y-m-d', 'Y-m-d H:i:s');
		
		$this->assertEquals(date('Y-m-d'), $helper->getCurrentDate());
		
		$this->assertEquals(date('Y-m-d H:i:s'), $helper->getCurrentDatetime());
	}
	
	public function testDateFromWeekspan()
	{
		$helper = new \Hx\Date\Helper('Y-m-d', 'Y-m-d H:i:s');
		
		$weekspan = 2015 * 52 + 27;
		
		$date = "2015-06-29";
		
		$this->assertEquals($date, $helper->getDateFromWeekSpan($weekspan));
	}
	
	public function testWeekSpan()
	{
		$helper = new \Hx\Date\Helper('Y-m-d', 'Y-m-d H:i:s');
		
		$date = "2015-06-29";
		
		$expectedWeekspan = 2015 * 52 + 27;
		
		$this->assertEquals($expectedWeekspan, $helper->getWeekSpan($date));
	}
	
	public function testOffsetMonday()
	{
		$helper = new \Hx\Date\Helper('Y-m-d', 'Y-m-d H:i:s');
		
		$expectedDate = "2015-06-29";
		
		$this->assertEquals($expectedDate, $helper->offsetToMonday("2015-06-30"));
	}
	
	public function testOffsetDate()
	{
		$helper = new \Hx\Date\Helper('Y-m-d', 'Y-m-d H:i:s');
		
		$date = "2015-06-28";
		
		$this->assertEquals("2015-06-30", $helper->offsetDate($date, 2));
		
		$this->assertEquals("2015-06-26", $helper->offsetDate($date, -2));
	}
	
	public function testLastdayMonth()
	{
		$helper = new \Hx\Date\Helper('Y-m-d', 'Y-m-d H:i:s');
		
		$expectedDate = "2015-06-30";
		
		$this->assertEquals($expectedDate, $helper->getLastDayOfMonth('2015-06-27'));
	}
	
	public function testDateRange()
	{
		$helper = new \Hx\Date\Helper('Y-m-d', 'Y-m-d H:i:s');
		
		$result = $helper->getDateRange(6, 2015);
		
		$this->assertEquals($result['fromDate'], "2015-06-01");
		
		$this->assertEquals($result['toDate'], "2015-06-30");
		
		$this->assertEquals($result['carryFwdDate'], "2015-05-31");
	}
}
?>