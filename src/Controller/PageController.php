<?php

declare(strict_types=1);

namespace App\Controller;

use App\Table\LinkTable;
use Aura\Router\Exception\RouteNotFound;
use Psr\Http\Message\ServerRequestInterface as Request;
use Zend\Diactoros\Response;

class PageController extends BaseController
{

    public function index(Request $request, LinkTable $linkTable): Response
    {
    	$links = $linkTable->findAll();
        return $this->render('index.twig', ['links' => $links]);
    }

	/**
	 * @param Request $request
	 * @param LinkTable $linkTable
	 * @return Response
	 * @throws RouteNotFound
	 */
	public function add(Request $request, LinkTable $linkTable): Response
	{
		$data = $request->getParsedBody();
		$linkTable->save($data);

		return $this->withRedirect('root');
    }

}