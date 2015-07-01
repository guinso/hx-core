<?php 
namespace Hx\Authenticate\Repo;

class XmlRepository implements \Hx\Authenticate\RepositoryInterface {
	
	private $filePath, $xmlDoc;
	
	public function __construct($filepath)
	{
		if (!file_exists($filepath))
			Throw new \Hx\Authenticate\LoginException(
				"File not found: $filepath");
		
		if (!is_readable($filepath))
			Throw new \Hx\Authenticate\LoginException(
				"File is not readable: $filepath");
		
		$this->filePath = $filepath;
		
		$this->reload();
	}
	
	private function reload()
	{
		$this->xmlDoc = simplexml_load_file($this->filePath);
		
		if ($this->xmlDoc === false)
			Throw new \Hx\Authenticate\LoginException(
				"Fail to load xml file: {$this->filePath}");
	}

	public function getUser($username)
	{
		$nodes = $this->xmlDoc->xpath("/accounts/account");
		
		$result = null;
		
		foreach ($nodes as $node)
		{
			if ((string) $node->username == $username)
				$result = new \Hx\Authenticate\User(
					(string) $node->username, 
					(string) $node->password, 
					intval($node->status), 
					(string) $node->session,
					(string) $node->id,
					(string) $node->roleId
				);
		}
		
		return $result;
	}
	
	public function getUserBySessionId($sessionId)
	{
		if (empty($sessionId))
			return null;
		
		$nodes = $this->xmlDoc->xpath("/accounts/account");
		
		$result = null;
		
		foreach ($nodes as $node)
		{
			if ((string) $node->session == $sessionId)
				$result = new \Hx\Authenticate\User(
					(string) $node->username,
					(string) $node->password,
					intval($node->status),
					(string) $node->session,
					(string) $node->id
				);
		}
		
		return $result;
	}
	
	public function updateStatus(\Hx\Authenticate\UserInterface $user)
	{
		$nodes = $this->xmlDoc->xpath("/accounts/account");
		
		$found = false;
		
		$arr = array();
		
		foreach($nodes as $node)
		{
			if ($node->username == $user->getUsername())
			{
				$found = true;
				
				$arr[] = new \Hx\Authenticate\User(
					$user->getUsername(), 
					(string) $node->password, 
					$user->getStatus(), 
					$user->getSession(),
					(string) $node->id,
					(string) $node->roleId);
			}
			else 
			{
				$arr[] = new \Hx\Authenticate\User(
					(string) $node->username,
					(string) $node->password,
					intval($node->status),	
					(string) $node->session,
					(string) $node->id,
					(string) $node->roleId);
			}
		}
		
		if (!$found)
			Throw new \Hx\Authenticate\LoginException(
				"Update status rejected, " . 
				"there is no such user {$user->getUsername()}.");
		else 
			$this->save($arr);
	}
	
	private function save(array $users)
	{
		$generalBuffer = '';
		
		foreach($users as $user)
		{
			$generalBuffer .= 
				"	<account>\n" .
				"		<id>{$user->getId()}</id>\n" .
				"		<username>{$user->getUsername()}</username>\n" .
				"		<password>{$user->getPassword()}</password>\n" .
				"		<status>{$user->getStatus()}</status>\n" .
				"		<session>{$user->getSession()}</session>\n" .
				"		<roleId>{$user->getRoleId()}</roleId>" .
				"	</account>\n";
		}
		
		$buffer = "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>\n" .
			"<accounts>\n" . $generalBuffer . "</accounts>";
		
		file_put_contents($this->filePath, $buffer);
		
		$this->reload();
	}
}
?>