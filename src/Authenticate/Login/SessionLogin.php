<?php 
namespace Hx\Authenticate\Login;

class SessionLogin implements LoginInterface {
	
	private $repo, $guid;
	
	public function __construct(\Hx\Authenticate\RepositoryInterface $repo, $guid)
	{
		if (empty(session_id()))
		{
			if (!session_start())
				Throw new \Hx\Authenticate\LoginException("Fail try to start server session");
		}
		
		$this->repo = $repo;
		
		$this->guid = $guid;
	}
	
	/**
	 * <p>Attempt login</p>
	 * @param string $username
	 * @param string $password
	 * @return boolean	<p>True is success, and vice versa</p>
	 */
	public function login($username, $password)
	{
		$user = $this->repo->getUser($username);
		
		if ($user->getPassword() == $password)
		{
			$this->logout();
			
			$_SESSION[$this->getTokenKey()] = $username;
			
			$this->repo->updateStatus(
				$username, 
				\Hx\Authenticate\UserInterface::LOGIN, 
				'');
			
			return true;
		}
		else 
			return false;
	}
	
	/**
	 * <p>logout current login user<br/>Do nothing if not login at all</p>
	 */
	public function logout()
	{
		if ($this->isLogin())
		{
			$user = $this->getCurrentUser();
			
			unset($_SESSION[$this->getTokenKey()]);
			
			$this->repo->updateStatus(
				$user->getUsername(), 
				\Hx\Authenticate\UserInterface::LOGOUT, 
				'');
		}
	}

	/**
	 * check is login or not
	 * @return boolean
	 */
	public function isLogin()
	{
		return $this->getCurrentUser()->getStatus() == 
			\Hx\Authenticate\UserInterface::LOGIN;
	}
	
	/**
	 * Get current logined username
	 * @return string	<p>username</p>
	 */
	public function getCurrentUser()
	{
		$username = $_SESSION[$this->getTokenKey()];
		
		$user = $this->repo->getUser($username);
		
		if (empty($user))
			return new \Hx\Authenticate\User(
				'anonymous', 
				'', 
				\Hx\Authenticate\UserInterface::LOGOUT,
				'');
		else 
			return $user;
	}
	
	private function getTokenKey()
	{
		return "hx-login-" . $this->guid;
	}
}
?>