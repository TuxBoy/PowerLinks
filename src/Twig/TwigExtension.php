<?php

declare(strict_types=1);

namespace App\Twig;

use Aura\Router\Exception\RouteNotFound;
use Aura\Router\RouterContainer;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

/**
 * TwigExtension.
 */
class TwigExtension extends AbstractExtension
{

	/**
	 * @var RouterContainer
	 */
	private RouterContainer $router;

	public function __construct(RouterContainer $router)
	{
		$this->router = $router;
	}

	/**
	 * @return TwigFunction[]
	 */
	public function getFunctions(): array
	{
		return [
			new TwigFunction('path', [$this, 'generateRoute'])
		];
	}

	/**
	 * @param string $name
	 * @param array  $params
	 * @return false|string
	 * @throws RouteNotFound
	 */
	public function generateRoute(string $name, array $params = [])
	{
		return $this->router->getGenerator()->generate($name, $params);
	}

}
