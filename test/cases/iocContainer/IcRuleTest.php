<?php 
class IcRuleTest extends PHPUnit_Framework_TestCase {
	
	public function testCreate()
	{
		$className = 'qwe';
		
		$instanceClassName = 'zxc';
		
		$isService = false;
		
		$args = array();
		
		$rules = array(
			$this->getMockBuilder('\Hx\IocContainer\RuleInterface')->getMock(),
			$this->getMockBuilder('\Hx\IocContainer\RuleInterface')->getMock(),
		);
		
		$clojure = null;
		
		$rule = new \Hx\IocContainer\Rule(
			$className, $instanceClassName, $isService, $args, $rules, $clojure);
		
		$this->assertEquals($className, $rule->getClassName());
		
		$this->assertEquals($instanceClassName, $rule->getInstanceClassName());
		
		$this->assertEquals($isService, $rule->isService());
		
		$this->assertEquals($args, $rule->getPrimitiveArgs());
		
		$this->assertEquals($rules, $rule->getSubRules());
		
		$this->assertEquals($clojure, $rule->getClosure());
	}
}
?>