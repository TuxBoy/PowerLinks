<?php

declare(strict_types=1);

namespace App\Controller;

use Twig\Environment;
use Zend\Diactoros\Response;

abstract class BaseController
{

    /**
     * @var Environment
     */
    private Environment $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    protected function render(string $name, array $params = []): Response
    {
        $response = new Response();
        $response->getBody()->write($this->twig->render($name, $params));

        return $response;
    }

}