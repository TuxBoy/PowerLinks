<?php

declare(strict_types=1);

namespace App\Table;

use App\Connection\Connection;
use App\Entity\User;
use App\Hash;
use Exception;

class UserTable extends Table
{

	protected string $table = 'users';

	public function __construct(Connection $connection)
	{
		parent::__construct($connection);
		$this->className = User::class;
	}

	/**
	 * @param string $username
	 * @param string $password
	 * @return User
	 * @throws Exception
	 */
	public function findUser(string $username, string $password)
	{
		return $this
			->connection
			->queryOne(
				"SELECT * FROM {$this->table} WHERE username = :username",
				$this->className,
				[':username' => $username]
			);
	}

}