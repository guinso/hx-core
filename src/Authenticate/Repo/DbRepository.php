<?php 
namespace Hx\Authenticate\Repo;

class DbRepository implements \Hx\Authenticate\RepositoryInterface {
	
	private $tableName, $sqlService, $selectSessionSql, $selectUsernameSql, $updateSql;
	
	public function __construct(\Hx\Database\SqlServiceInterface $sqlService)
	{
		$this->sqlService = $sqlService;
		
		$this->selectSessionSql = $sqlService->createSelectSql();
		
		$this->selectUsernameSql = $sqlService->createSelectSql();
		
		$this->updateSql = $sqlService->createUpdateSql();
		
		$this->tableName = 'account';
		
		$this->initSql();
	}
	
	private function initSql()
	{
		$this->selectUsernameSql->reset()
			->table($this->tableName)
			->select('*')
			->where('username = :username');
		
		$this->selectSessionSql->reset()
			->table($this->tableName)
			->select('*')
			->where('session = :session');
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
			$row['username'], 
			$row['password'], 
			intval($row['status']),
			$row['session'],
			$row['id'],
			$row['role_id']
		);
	}
	
	public function updateStatus(\Hx\Authenticate\UserInterface $user)
	{
		$this->updateSql->reset()
			->table($this->tableName)
			->where('username = :username')
			->column('status', ':status')
			->column('session', ':session')
			->param(':username', $user->getUsername())
			->param(':status', intval($user->getStatus()))
			->param(':session', $user->getSession())
			->execute();
	}
}
?>