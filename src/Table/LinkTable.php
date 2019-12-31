<?php

declare(strict_types=1);

namespace App\Table;

use App\Connection\Connection;
use App\Entity\Link;

class LinkTable
{

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

	public function save(array $data): int
	{
		$statement = $this->connection
			->getConnection()
			->prepare("INSERT INTO {$this->table} (url, description) VALUES (?, ?)");

		$statement->execute(array_values($data));

		return (int) $this->connection->getConnection()->lastInsertId();
	}

}