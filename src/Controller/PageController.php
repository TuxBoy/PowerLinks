<?php

declare(strict_types=1);

namespace App\Controller;

use App\Authenticate\Auth;
use App\Table\LinkTable;
use App\Validator\Validator;
use Aura\Router\Exception\RouteNotFound;
use Psr\Http\Message\ServerRequestInterface as Request;
use Zend\Diactoros\Response;

class PageController extends BaseController
{

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
		$data = $request->getParsedBody();
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

}