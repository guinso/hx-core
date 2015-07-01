<?php 
namespace Hx\Authorize;

class Access implements AccessInterface {
	
	private $id, $name, $isAccessible, $roleId;
	
	public function __construct($id, $name, $isAccessible, $roleId)
	{
		$this->id = $id;
		
		$this->name = $name;
		
		$this->isAccessible = $isAccessible;
		
		$this->roleId = $roleId;
	}
	
	public function getId()
	{
		return $this->id;
	}
	
	public function getName()
	{
		return $this->name;
	}
	
	public function isAccessible()
	{
		return $this->isAccessible;
	}
	
	public function getRoleId()
	{
		return $this->roleId;
	}
}
?>