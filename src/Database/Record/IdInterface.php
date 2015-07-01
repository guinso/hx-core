<?php 
namespace Hx\Database\Record;

interface IdInterface {
	
	public function getNextId($tableName, $columnName);
}
?>