<?php

declare(strict_types=1);

namespace App\Connection;

use PDO;
use PDOException;
use PDOStatement;
use StdClass;

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

	/**
	 * @param string $query
	 * @param string|null $className
	 * @param array|null $data
	 * @return array
	 */
	public function query(string $query, string $className = null, array $data = null): array
	{
		return $this->getStatement($query, $className, $data)->fetchAll();
	}

	/**
	 * @param string $query
	 * @param string|null $className
	 * @param array|null $data
	 * @return mixed
	 */
	public function queryOne(string $query, string $className = null, array $data = null)
	{
		return $this->getStatement($query, $className, $data)->fetch();
	}

	public function insert(string $tableName, array $data): int
	{
		$fieldsName    = join(', ', array_keys($data));
		$prepareFields = join(', ', array_map(fn () => '?', array_keys($data)));
		$statement = $this
			->getConnection()
			->prepare("INSERT INTO $tableName ($fieldsName) VALUES ($prepareFields)");

		$statement->execute(array_values($data));

		return (int) $this->getConnection()->lastInsertId();
	}

	public function getConnection(): PDO
	{
		return $this->pdo;
	}

	/**
	 * @param string $query
	 * @param string|null $className
	 * @param array|null $data
	 * @return PDOStatement|null
	 */
	private function getStatement(string $query, ?string $className, array $data = null): ?PDOStatement
	{
		$className ??= StdClass::class;
		if (null !== $data) {
			$statement = $this->pdo->prepare($query);
			$statement->execute($data);
		} else {
			$statement = $this->pdo->query($query);
		}

		$statement->setFetchMode(PDO::FETCH_CLASS, $className);

		return $statement ?? null;
	}

}