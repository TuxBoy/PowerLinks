<?php

require __DIR__ . '/vendor/autoload.php';

(Dotenv\Dotenv::createImmutable(ROOT))->load();

$db_name     = getenv('DB_DATABASE');
$db_host     = getenv('DB_HOST');
$db_login    = getenv('DB_USERNAME');
$db_password = getenv('DB_PASSWORD');

$connection = new \App\Connection\Connection($db_name, $db_host, $db_login, $db_password);

$connection->getConnection()->exec(<<<SQL
	CREATE TABLE IF NOT EXISTS `links` (
	  `id` int(11) NOT NULL AUTO_INCREMENT,
	  `url` varchar(255) NOT NULL,
	  `description` text DEFAULT NULL,
	  `view` bigint(20) DEFAULT 0,
	  `createdAt` datetime DEFAULT current_timestamp(),
	  `updatedAt` datetime DEFAULT current_timestamp(),
	  PRIMARY KEY (`id`)
	) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
	SQL
);

echo 'Le dump a bien été fait.';