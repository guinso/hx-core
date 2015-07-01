<?php 
class DbKeyValueTest extends PHPUnit_Framework_TestCase {
	
	public function testRead()
	{
		$db = new \Hx\Database\SimpleDb(HxUnitTestService::getPdo());
		
		$db->runSqlFile(__DIR__ . DIRECTORY_SEPARATOR . 'keyvalue.sql');
		
		$keyvalue = new \Hx\Database\Record\SimpleKeyValue(
			new \Hx\Database\SqlService($db), 
			new \Hx\Database\Record\AlphaNumericId(
				new \Hx\Database\Sql\Select($db), 'A', 10)
		);
		
		$value = $keyvalue->get('secret', '');
		
		$this->assertEquals('sample text', $value);
	}
	
	public function testWriteNew()
	{
		$db = new \Hx\Database\SimpleDb(HxUnitTestService::getPdo());
		
		$db->runSqlFile(__DIR__ . DIRECTORY_SEPARATOR . 'keyvalue.sql');
		
		$keyvalue = new \Hx\Database\Record\SimpleKeyValue(
			new \Hx\Database\SqlService($db),
			new \Hx\Database\Record\AlphaNumericId(
				new \Hx\Database\Sql\Select($db), 'A', 10)
		);
		
		//new key
		$keyvalue->set('koko', 123);
		
		$value = $keyvalue->get('koko', '');
		
		$this->assertEquals(123, $value);
	}
	
	public function testWriteExist()
	{
		$db = new \Hx\Database\SimpleDb(HxUnitTestService::getPdo());
	
		$db->runSqlFile(__DIR__ . DIRECTORY_SEPARATOR . 'keyvalue.sql');
	
		$keyvalue = new \Hx\Database\Record\SimpleKeyValue(
				new \Hx\Database\SqlService($db),
				new \Hx\Database\Record\AlphaNumericId(
						new \Hx\Database\Sql\Select($db), 'A', 10)
		);

		$keyvalue->set('secret', 'zxcasdqwe');
	
		$value = $keyvalue->get('secret', '');
	
		$this->assertEquals('zxcasdqwe', $value);
	}
}
?>