<?php 
namespace Hx\Authorize;

class Authorize implements AuthorizeInterface {
	
	private $repo;
	
	public function __construct(\Hx\Authorize\RepositoryInterface $repo)
	{
		$this->repo = $repo;
	}
	
	public function isAuthorize($accessName, $userId)
	{
		$access = $this->repo->getByName($accessName, $userId);
		
		if (empty($access))
			return false;
		else
			return $access->isAccessible();
	}

	public function isAuthorizeArray(
		array $accessNames, 
		$userId, 
		$options = self::MODE_OR)
	{
		if ($options !== self::MODE_AND && $options !== self::MODE_OR)
			throw new \AuthorizeException(
				"Invalid authorize option detected: $options");
			
		$arr = $this->repo->getList($userId);
		
		$result = 0;
		
		foreach($arr as $tmp)
		{			
			if (in_array($tmp->getName(), $accessNames))
			{
				if ($options == self::MODE_AND)
					$result = $result & ($tmp->isAccessible()? 1:0);
				else
					$result = $result | ($tmp->isAccessible()? 1:0);
			}
		}
		
		return $result != 0;
	}
	
	public function getAccessList($userId)
	{
		return $this->repo->getList($userId);
	}
}
?>