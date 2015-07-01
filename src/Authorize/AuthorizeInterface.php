<?php 
namespace Hx\Authorize;

interface AuthorizeInterface {
	
	const MODE_AND = 1;
	const MODE_OR = 2;
	
	/**
	 * Check user weather have rights to access or not
	 * @param 	string 	$accessName	<p>accsss name</p>
	 * @param 	string 	$userId		<p>user id, format depends on system design</p>
	 * @return	boolean
	 */
	public function isAuthorize($accessName, $userId);
	
	/**
	 * Check targeted userId is accessible to following access items
	 * @param 	array 	$accessNames	<p>list of access name(s)</p>
	 * @param 	string 	$userId			<p>user id</p>
	 * @param 	integer $options		<p>authorize options:</p>
	 * 									<ul>
	 * 										<li>AND mode</li>
	 * 										<li>OR mode</li>
	 * 									</ul>
	 * @return	boolean
	 */
	public function isAuthorizeArray(array $accessNames, $userId, $options);
	
	/**
	 * Get all access list based on targeted user ID
	 * @param 	string 	$userId
	 * @return	array	<p>key value pair (string - boolean)</p>
	 */
	public function getAccessList($userId);
}
?>