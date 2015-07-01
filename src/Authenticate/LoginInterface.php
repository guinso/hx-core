<?php 
namespace Hx\Authenticate;

interface LoginInterface {
	
	/**
	 * <p>Attempt login</p>
	 * @param string $username
	 * @param string $password
	 * @return boolean	<p>True is success, and vice versa</p>
	 */
	public function login($username, $password);
	
	/**
	 * <p>logout current login user<br/>Do nothing if not login at all</p>
	 */
	public function logout();

	/**
	 * check is login or not
	 * @return boolean
	 */
	public function isLogin();
	
	/**
	 * Get current logined username
	 * @return string	<p>username</p>
	 */
	public function getCurrentUser();
}
?>