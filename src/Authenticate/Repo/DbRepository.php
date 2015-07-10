<?php 
namespace Hx\Authenticate\Repo;

class DbRepository implements \Hx\Authenticate\RepositoryInterface {
	
	private $sqlService, $selectSessionSql, $selectUsernameSql, $updateSql;
	
	private $dbMapper;
	
	public function __construct(
		\Hx\Database\SqlServiceInterface $sqlService, 
		\Hx\Authenticate\Repo\DbMapperInterface $dbMapper)
	{
		$this->dbMapper = $dbMapper;
		
		$this->sqlService = $sqlService;
		
		$this->selectSessionSql = $sqlService->createSelectSql();
		
		$this->selectUsernameSql = $sqlService->createSelectSql();
		
		$this->updateSql = $sqlService->createUpdateSql();
		
		$this->initSql();
	}
	
	private function initSql()
	{
		$this->selectUsernameSql->reset()
			->table($this->dbMapper->getTable())
			->select('*')
			->where($this->dbMapper->getUsername() . ' = :username');
		
		$this->selectSessionSql->reset()
			->table($this->dbMapper->getTable())
			->select('*')
			->where($this->dbMapper->getSession() . ' = :session');
	}
	
	public function getUser($username)
	{
		$raw = $this->selectUsernameSql
			->reset(\Hx\Database\Sql\SelectInterface::RESET_PARAM)
			->param(':username', $username)
			->execute();
		
		if ($raw->rowCount() > 0)
			return $this->createUser($raw->fetch());
		else 
			return null;
	}
	
	public function getUserBySessionId($sessionId)
	{
		if (empty($sessionId))
			return null;
		
		$raw = $this->selectSessionSql
			->reset(\Hx\Database\Sql\SelectInterface::RESET_PARAM)
			->param(':session', $sessionId)
			->execute();
		
		if ($raw->rowCount() > 0)
			return $this->createUser($raw->fetch());
		else
			return null;
	}
	
	private function createUser($row)
	{
		return new \Hx\Authenticate\User(
			$row[$this->dbMapper->getUsername()], 
			$row[$this->dbMapper->getPassword()], 
			intval($row[$this->dbMapper->getStatus()]),
			$row[$this->dbMapper->getSession()],
			$row[$this->dbMapper->getId()],
			$row[$this->dbMapper->getRoleId()]
		);
	}
	
	public function updateStatus(\Hx\Authenticate\UserInterface $user)
	{
		$this->updateSql->reset()
			->table($this->dbMapper->getTable())
			->where($this->dbMapper->getUsername() . ' = :username')
			->column($this->dbMapper->getStatus(), ':status')
			->column($this->dbMapper->getSession(), ':session')
			->param(':username', $user->getUsername())
			->param(':status', intval($user->getStatus()))
			->param(':session', $user->getSession())
			->execute();
	}
}
?>