<?php 
namespace Hx\Authenticate;

interface RepositoryInterface {

	public function getUser($username);
	
	public function getUserBySessionId($sessionId);
	
	public function updateStatus(\Hx\Authenticate\UserInterface $user);
}
?>