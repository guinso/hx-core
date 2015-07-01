<?php 
namespace Hx\Authenticate\Login;

class CookieLogin implements LoginInterface {
	
	private $repo, $guid;
	
	private $period;
	
	public function __construct(RepositoryInterface $repo, $guid)
	{
		session_start();
		
		$this->guid = $guid;
		
		$this->repo = $repo;
		
		$this->period = 365 * 24 * 3600; //one year
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
		
		if (!empty($user) && $user->getPassword() == $password)
		{
			$this->logout();
			
			$this->createToken($username);
			
			$this->repo->updateStatus(
				$username, 
				\Hx\Authenticate\UserInterface::LOGIN,
				$this->getTokenValue());
			
			return true;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * <p>logout current login user<br/>Do nothing if not login at all</p>
	 */
	public function logout()
	{
		if ($this->isLogin())
		{
			$this->deleteToken();
			
			$this->repo->updateStatus(
				$this->getCurrentUser()->getUsername(), 
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
		$user = $this->repo->getUserBySessionId($this->getTokenValue());
		
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

	private function createToken($username)
	{
		$raw = $username . \Ig\Config::getGuid() . session_id() . time();
		
		$hash = md5($raw);
		
		//cookie will expired after one year starting current server time
		setcookie($this->getTokenKey(), $hash, time() + $this->period);
	}
	
	private function deleteToken()
	{
		setcookie($this->getTokenKey(), '', time() - 3600); // 1 hour ealier
	}
	
	private function getTokenValue()
	{
		if (isset($_COOKIE[$this->getTokenKey()]))
			return $_COOKIE[$this->getTokenKey()];
		else 
			return '';
	}
}
?>