<?php

use Aura\Router\RouterContainer;

define('ROOT', dirname(__DIR__));

require ROOT . '/vendor/autoload.php';

// create a server request object
$request = Zend\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
);

(Dotenv\Dotenv::createImmutable(ROOT))->load();

if (getenv('ENV') === 'development') {
	$whoops = new \Whoops\Run;
	$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
	$whoops->register();
}

$builder = new DI\ContainerBuilder();
$builder->addDefinitions(require ROOT . '/src/config.php');
$container = $builder->build();

// create the router container and get the routing map
$container->set(RouterContainer::class, fn () => new Aura\Router\RouterContainer());
/** @var $routerContainer RouterContainer */
$routerContainer = $container->get(RouterContainer::class);
$map = $routerContainer->getMap();

$container->get(\App\Session\SessionInterface::class)->start();

require ROOT . '/src/routes.php';

$matcher = $routerContainer->getMatcher();
$route   = $matcher->match($request);

if (! $route) {
    $response = new \Zend\Diactoros\Response('php://memory', 404);
    $response->getBody()->write($container->get(\Twig\Environment::class)->render('errors/404.twig'));
} else {
    $response = new \Zend\Diactoros\Response();
    // add route attributes to the request
    foreach ($route->attributes as $key => $val) {
        $request = $request->withAttribute($key, $val);
    }

    $callable = $route->handler;
    if (is_callable($callable) && !is_array($callable)) {
        $response = $container->call($callable, ['request' => $request]);
    } else {
        $controller = $callable[0];
        $action     = $callable[1] ?? 'index';
        $container->set(\Psr\Http\Message\ServerRequestInterface::class, $request);
	    $response   = $container->call([$controller, $action], ['request' => $request]);
    }

    // emit the response
    foreach ($response->getHeaders() as $name => $values) {
        foreach ($values as $value) {
            header(sprintf('%s: %s', $name, $value), false);
        }
    }
}

\Http\Response\send($response);
