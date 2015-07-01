<?php 
class ReFoo {
	public static function koko() {}
}

class ReBar {
	public static function gogo() {}
}

class ReMapperTest extends PHPUnit_Framework_TestCase {
	
	public function testCreate()
	{
		$maps = array(
			new \Hx\Route\Info('/asd', 'get', 'ReFoo', 'koko', 'none'),
			new \Hx\Route\Info('/qwe/(\w+)', 'get', 'ReBar', 'gogo', 'json'),
		);
		
		$mapper = new \Hx\Route\Mapper($maps);
	}
	
	public function testFind()
	{
		$infoA = new \Hx\Route\Info('/asd', 'get', 'ReFoo', 'koko', 'none');
		
		$infoB = new \Hx\Route\Info('/qwe/(\w+)', 'get', 'ReBar', 'gogo', 'json');
		
		$maps = array($infoA, $infoB);
	
		$mapper = new \Hx\Route\Mapper($maps);
		
		$x = $mapper->find('/asd', 'get');
		
		$this->assertEquals($infoA->getClassName(), $x->getClassName());
		
		$y = $mapper->find('/qwe/dfr123', 'get');
		
		$this->assertEquals($infoB->getClassName(), $y->getClassName());
	}
}
?>