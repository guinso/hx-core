<?php 
$rootDir = dirname(__DIR__);

date_default_timezone_set("Asia/Kuala_Lumpur");

include_once $rootDir . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'autoloader.php';

class HxUnitTestService {
	
	private static $pdo;
	
	public static function getTestRootPath()
	{
		return __DIR__;
	}
	
	public static function getPdo()
	{
		if (empty($pdo))
		{
			self::$pdo = new PDO(
				"mysql:dbname=phpunit;host=localhost;charset=utf8mb4", 
				"root", 
				"123456789");
			
			self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			self::$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		}
		
		return self::$pdo;
	}
	
	public static function rebuildDatabase()
	{
		$pdo = self::getPdo();
		
		$pdo->exec(file_get_contents(
			self::getTestRootPath() . DIRECTORY_SEPARATOR . 'sample.sql'));
	}
	
	public static function runSql($filepath)
	{
		$pdo = self::getPdo();
		
		$pdo->exec(file_get_contents($filepath));
	}
}
?>