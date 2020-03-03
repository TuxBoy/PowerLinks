<?php

declare(strict_types=1);

namespace App\Migration;

use App\Connection\Connection;

class Migration
{
	private const TABLE = 'migrations';

	private const CREATE  = 'create';

	private const MIGRATE = 'migrate';

	private const ROLLBACK = 'rollback';

	private string $method;

	private ?string $migrationClassName;

	private Connection $connection;

	/**
	 * Migration constructor
	 *
	 * @param Connection $connection
	 * @param string $method
	 * @param string $migrationClassName
	 */
	public function __construct(Connection $connection, string $method, ?string $migrationClassName)
	{
		$this->method             = $method;
		$this->migrationClassName = $migrationClassName;
		$this->connection         = $connection;
	}

	public function invoke(): string
	{
		switch ($this->method) {
			case self::CREATE:
				return $this->create();
			case self::MIGRATE:
				return $this->migrate();
			case self::ROLLBACK:
				return $this->rollback();
			default:
				throw new \Exception(sprintf('La méthode %s est introuvble', $this->method));
				break;
		}
	}

	private function create(): string
	{
		$stub          = file_get_contents(__DIR__ . '/ClassMigration.php.stub');
		$timestamp     = (new \DateTime())->getTimestamp();
		$name          = $this->migrationClassName . '_' . $timestamp;
		$migration     = str_replace('$className', $name, $stub);
		$migrationPath = dirname(__DIR__, 2) . '/migrations/';
		$fileName      = $migrationPath . $name . '.php';

		file_put_contents(
			$migrationPath . $name . '.php', $migration
		);

		return 'La migration ' . $name . ' a bien été créé.' . "\n";
	}

	private function migrate(): string
	{
		$migrationClass = $this->getMigrationClass();
		[, $timestamp]  = explode('_', $migrationClass);

		if ($this->findTimestamp($timestamp)) {
			return 'La migration ' . $timestamp . ' a déjà été exécutée.' . "\n";
		}

		/** @var $instance BaseMigration */
		$instance = new $migrationClass;
		$instance->up();

		foreach ($instance->queries as $query) {
			$this->connection->getConnection()->exec($query);
		}

		$this->connection->insert(self::TABLE, [
			'name'       => trim($migrationClass, '\\'),
			'timestamp'  => $timestamp,
			'created_at' => (new \DateTime())->format('Y-m-d H:i:s'),
			'updated_at' => (new \DateTime())->format('Y-m-d H:i:s'),
		]);

		return $instance->count() . ' requêtes exécutées.' . "\n";
	}

	public function rollback(): string
	{
		$migrationClass = $this->getMigrationClass();
		[, $timestamp]  = explode('_', $migrationClass);

		/** @var $instance BaseMigration */
		$instance = new $migrationClass;
		$instance->down();

		foreach ($instance->queries as $query) {
			$this->connection->getConnection()->exec($query);
		}

		return $instance->count() . ' requêtes exécutées.' . "\n";
	}

	/**
	 * @param string $timestamp
	 * @return mixed
	 */
	private function findTimestamp(string $timestamp)
	{
		return $this->connection->queryOne(
			"SELECT * FROM migrations WHERE timestamp = ?"
			, null, [$timestamp]);
	}

	private function getMigrationClass(): string
	{
		$classes        = glob(dirname(__DIR__, 2) . '/migrations/*.php');
		$class          = end($classes);
		$migrationClass = explode(DIRECTORY_SEPARATOR, $class);
		$migrationClass = '\\' . end($migrationClass);
		$migrationClass = str_replace('.php', '', $migrationClass);

		return $migrationClass;
	}
}
