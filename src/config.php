<?php

return [

	\Twig\Environment::class => function () {
		$loader = new \Twig\Loader\FilesystemLoader(ROOT . '/templates');
		return new \Twig\Environment($loader, [
			'cache' => getenv('ENV') === 'production' ? ROOT . '/cache/' : false,
		]);
	}

];