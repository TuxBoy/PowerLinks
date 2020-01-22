<?php

declare(strict_types=1);

namespace App\Factory;

use App\Twig\AuthExtension;
use App\Twig\CsrfExtension;
use App\Twig\TwigExtension;
use Aura\Router\RouterContainer;
use Psr\Container\ContainerInterface;
use Twig\Environment;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;

/**
 * TwigFactory.
 */
class TwigFactory implements FactoryInterface
{

	public function build(ContainerInterface $container): Environment
	{
		$router = $container->get(RouterContainer::class);
		$loader = new FilesystemLoader(ROOT . '/templates');
		$view   = new Environment($loader, [
			'cache' => $container->get('env') === 'production' ? ROOT . '/cache/' : false,
			'debug' => true,
		]);

		$view->addExtension(new TwigExtension($router));
		$view->addExtension($container->get(AuthExtension::class));
		$view->addExtension($container->get(CsrfExtension::class));
		$view->addExtension(new DebugExtension());

		return $view;
	}

}
