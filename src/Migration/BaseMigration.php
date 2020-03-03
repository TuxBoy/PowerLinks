<?php

declare(strict_types=1);


namespace App\Migration;


abstract class BaseMigration implements \Countable
{

	public array $queries = [];

	abstract public function up(): void;

	abstract public function down(): void;

	public function addSql(string $query): self
	{
		$this->queries[] = $query;

		return $this;
	}

	public function count(): int
	{
		return \count($this->queries);
	}

}
