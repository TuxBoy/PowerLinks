<?php

declare(strict_types=1);

namespace App\Controller;

use App\Authenticate\Auth;
use App\Middleware\Csrf\CsrfMiddleware;
use App\Table\LinkTable;
use App\Validator\Validator;
use Aura\Router\Exception\RouteNotFound;
use Aura\Router\RouterContainer;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Twig\Environment;
use Zend\Diactoros\Response;

class PageController extends BaseController
{

	private ?ContainerInterface $container = null;

	public function __construct(Environment $twig, RouterContainer $router, ContainerInterface $container)
	{
		$this->container = $container;
		parent::__construct($twig, $router);
		$this->middleware(CsrfMiddleware::class);
	}

	public function index(Request $request, LinkTable $linkTable): Response
    {
    	$links = $linkTable->paginate();
        return $this->render('index', ['links' => $links]);
    }

	/**
	 * @param Request $request
	 * @param LinkTable $linkTable
	 * @param Validator $validator
	 * @param Auth $auth
	 * @return Response
	 * @throws RouteNotFound
	 */
	public function add(Request $request, LinkTable $linkTable, Validator $validator, Auth $auth): Response
	{
		$data = $this->getData($request);
		$validator
			->check($data)
			->required('url')
			->url('url')
			->minLength('description', 5);

		if (! $validator->hasErrors()) {
			$data['user_id'] = $auth->current()->id;
			$linkTable->save($data);
		}

		return $this->withRedirect('root');
    }

	/**
	 * @param Request $request
	 * @param LinkTable $linkTable
	 * @return Response
	 * @throws RouteNotFound
	 */
	public function delete(Request $request, LinkTable $linkTable): Response
	{
		$id = (int) $request->getAttribute('id');
		$linkTable->delete($id);

		return $this->withRedirect('root');
    }

	private function middleware(string $middleware): void
	{
		$this->container
			->get($middleware)
			->handle($this->container->get(ServerRequestInterface::class));
	}

}
