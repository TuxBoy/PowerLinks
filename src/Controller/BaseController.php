<?php

declare(strict_types=1);

namespace App\Controller;

use Aura\Router\Exception\RouteNotFound;
use Aura\Router\RouterContainer;
use Twig\Environment;
use Zend\Diactoros\Response;

abstract class BaseController
{
	private const PERMANENT_REDIRECT = 301;

    /**
     * @var Environment
     */
    private Environment $twig;

	/**
	 * @var RouterContainer
	 */
	private RouterContainer $router;

	public function __construct(Environment $twig, RouterContainer $router)
    {
        $this->twig   = $twig;
	    $this->router = $router;
    }

    protected function render(string $name, array $params = []): Response
    {
        $response = new Response();
        $response->getBody()->write($this->twig->render($name, $params));

        return $response;
    }

	/**
	 * @param string $routeName
	 * @param array $params
	 * @return Response
	 * @throws RouteNotFound
	 */
	protected function withRedirect(string $routeName = '/', array $params = []): Response
	{
		$path = $this->router->getGenerator()->generate($routeName, $params);

		return new Response('php://memory', self::PERMANENT_REDIRECT, ['Location' => $path]);
    }

}