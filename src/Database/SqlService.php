<?php 
namespace Hx\Database;

class SqlService implements SqlServiceInterface {
	
	private $db;
	
	public function __construct(\Hx\Database\DbInterface $db)
	{
		$this->db = $db;
	}
	
	public function createSelectSql()
	{
		return new \Hx\Database\Sql\Select($this->db);
	}
	
	public function createInsertSql()
	{
		return new \Hx\Database\Sql\Insert($this->db);
	}
	
	public function createUpdateSql()
	{
		return new \Hx\Database\Sql\Update($this->db);
	}
}
?>