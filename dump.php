<?php

require __DIR__ . '/vendor/autoload.php';

(Dotenv\Dotenv::createImmutable(__DIR__))->load();

$db_name     = getenv('DB_DATABASE');
$db_host     = getenv('DB_HOST');
$db_login    = getenv('DB_USERNAME');
$db_password = getenv('DB_PASSWORD');

$connection = new \App\Connection\Connection($db_name, $db_host, $db_login, $db_password);

$params = ['method' => $argv[1], 'className' => $argv[2] ?? null];

$migration = new App\Migration\Migration($connection, $params['method'], $params['className']);
try {
	$output = $migration->invoke();
} catch (Exception $e) {
	echo $e->getMessage();
}

echo $output;
