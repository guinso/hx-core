<?php 
namespace Hx\Database;

interface SqlServiceInterface {
	
	public function createSelectSql();
	
	public function createInsertSql();
	
	public function createUpdateSql();
}
?>