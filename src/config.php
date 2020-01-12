<?php

use App\Connection\Connection;
use App\Factory\TwigFactory;
use App\Session\Session;
use App\Session\SessionInterface;
use Psr\Container\ContainerInterface;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use function DI\env;
use function DI\factory;

return [

	'env'         => env('ENV'),
	'debug'       => env('ENV') === 'development',
	'db.host'     => env('DB_HOST'),
	'db.login'    => env('DB_USERNAME'),
	'db.password' => env('DB_PASSWORD'),
	'db.dbname'   => env('DB_DATABASE'),

	Environment::class => factory([TwigFactory::class, 'build']),

	SessionInterface::class => \DI\create(Session::class),

	Connection::class => factory(function (ContainerInterface $container) {
		return new App\Connection\Connection(
			$container->get('db.dbname'),
			$container->get('db.host'),
			$container->get('db.login'),
			$container->get('db.password'),
		);
	}),

];
