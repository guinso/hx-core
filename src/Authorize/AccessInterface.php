<?php 
namespace Hx\Authorize;

interface AccessInterface {
	
	public function getId();
	
	public function getName();
	
	public function isAccessible();
	
	public function getRoleId();
}
?>