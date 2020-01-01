<?php

declare(strict_types=1);

namespace App\Table;

use App\Connection\Connection;
use App\Entity\Link;

class LinkTable
{
	private const MAX_LIMIT_PER_PAGE = 10;

	protected string $table = 'links';

	/**
	 * @var Connection
	 */
	private Connection $connection;

	/**
	 * @var Link
	 */
	private Link $link;

	/**
	 * @var string
	 */
	private string $className;

	public function __construct(Connection $connection, Link $link)
	{
		$this->connection = $connection;
		$this->link       = $link;
		$this->className  = get_class($link);
	}

	public function findAll(): array
	{
		return $this->connection->query("SELECT * FROM {$this->table}", $this->className);
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