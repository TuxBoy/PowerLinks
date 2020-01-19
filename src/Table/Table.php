<?php

declare(strict_types=1);

namespace App\Table;

use App\Connection\Connection;
use Exception;

abstract class Table
{

	protected const MAX_LIMIT_PER_PAGE = 10;

	protected ?string $table = null;

	protected Connection $connection;

	protected string $className;

	public function __construct(Connection $connection)
	{
		$this->connection = $connection;
	}

	public function findAll(): array
	{
		return $this->connection->query("SELECT * FROM {$this->table}", $this->className);
	}

	/**
	 * @param int $id
	 * @return mixed
	 * @throws Exception
	 */
	public function findById(int $id)
	{
		$result = $this
			->connection
			->queryOne("SELECT * FROM {$this->table} AS t0 WHERE t0.id = :id",
				$this->className,
				[':id' => $id]
			);

		if (null === $result) {
			throw new Exception("Not found object for this identifier : $id");
		}

		return $result;
	}

	public function paginate(int $limit = null)
	{
		if (null === $limit) {
			$limit = self::MAX_LIMIT_PER_PAGE;
		}

		return $this->connection->query("SELECT * FROM {$this->table} LIMIT {$limit}", $this->className);
	}

	public function save(array $data): int
	{
		return $this->connection->insert($this->table, $data);
	}

	public function delete(int $id): bool
	{
		$statement = $this->connection
			->getConnection()
			->prepare("DELETE FROM {$this->table} WHERE id = :id");

		$deleted = $statement->execute([':id' => $id]);

		return $deleted;
	}

}