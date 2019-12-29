<?php

declare(strict_types=1);

namespace App\Connection;

use PDO;
use PDOException;

class Connection
{

	/**
	 * @var PDO
	 */
	private PDO $pdo;

	/**
	 * Create PDO connection
	 *
	 * @param string $dbname
	 * @param string $host
	 * @param string $login
	 * @param string $password
	 */
	public function __construct(
		string $dbname, string $host = 'localhost', string $login = 'root', string $password = 'root'
	) {
		try {
			$this->pdo = new PDO(sprintf("mysql:host=%s;dbname=%s", $host, $dbname), $login, $password,
				[
					PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
				]
			);
		} catch (PDOException $exception) {
			die($exception->getMessage());
		}
	}

	public function query(string $query, string $className = null): array
	{
		$className ??= \StdClass::class;
		$statement = $this->pdo->query($query);

		return $statement->fetchAll(PDO::FETCH_CLASS, $className);
	}

	public function getConnection(): PDO
	{
		return $this->pdo;
	}

}