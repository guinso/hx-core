<?php 
namespace Hx\Authenticate;

interface UserInterface {
	const LOGIN = 1;
	const LOGOUT = 2;
	
	public function getId();
	
	public function getUsername();
	
	public function getPassword();
	
	public function getStatus();
	
	public function getSession();
	
	public function getRoleId();
}
?>