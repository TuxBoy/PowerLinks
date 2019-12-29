<?php

use App\Connection\Connection;
use Psr\Container\ContainerInterface;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use function DI\env;
use function DI\factory;

return [

	'db.host'     => env('DB_HOST'),
	'db.login'    => env('DB_USERNAME'),
	'db.password' => env('DB_PASSWORD'),
	'db.dbname'   => env('DB_DATABASE'),

	Environment::class => function () {
		$loader = new FilesystemLoader(ROOT . '/templates');
		return new Environment($loader, [
			'cache' => getenv('ENV') === 'production' ? ROOT . '/cache/' : false,
		]);
	},

	Connection::class => factory(function (ContainerInterface $container) {
		return new App\Connection\Connection(
			$container->get('db.dbname'),
			$container->get('db.host'),
			$container->get('db.login'),
			$container->get('db.password'),
		);
	}),

];