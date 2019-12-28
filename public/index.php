<?php
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

$loader = new \Twig\Loader\FilesystemLoader(ROOT . '/templates');
$twig = new \Twig\Environment($loader, [
    'cache' => getenv('ENV') === 'production' ? ROOT . '/cache/' : false,
]);


// create the router container and get the routing map
$routerContainer = new Aura\Router\RouterContainer();
$map = $routerContainer->getMap();

// add a route to the map, and a handler for it
$map->get('root', '/', [\App\Controller\PageController::class]);

$matcher = $routerContainer->getMatcher();
$route   = $matcher->match($request);

if (! $route) {
    $response = new \Zend\Diactoros\Response('php://memory', 404);
    $response->getBody()->write("No route found for the request.");
} else {
    $response = new \Zend\Diactoros\Response();
    // add route attributes to the request
    foreach ($route->attributes as $key => $val) {
        $request = $request->withAttribute($key, $val);
    }

    $callable = $route->handler;
    if (is_callable($callable) && !is_array($callable)) {
        $response = $callable($request, $response);
    } else {
        $controller = $callable[0];
        $action     = $callable[1] ?? 'index';
        $response   = call_user_func_array(
            [new $controller($twig), $action], ['request' => $request, 'response' => $response]
        );
    }

    // emit the response
    foreach ($response->getHeaders() as $name => $values) {
        foreach ($values as $value) {
            header(sprintf('%s: %s', $name, $value), false);
        }
    }
}

\Http\Response\send($response);