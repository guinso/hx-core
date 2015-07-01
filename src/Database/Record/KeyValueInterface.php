<?php 
namespace Hx\Database\Record;

interface KeyValueInterface {
	
	public function get($key, $defaultValue);
	
	public function set($key, $value);
}
?>