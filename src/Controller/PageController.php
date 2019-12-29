<?php

declare(strict_types=1);

namespace App\Controller;

use App\Table\LinkTable;
use Psr\Http\Message\ServerRequestInterface as Request;

class PageController extends BaseController
{

    public function index(Request $request, LinkTable $linkTable)
    {
    	$links = $linkTable->findAll();
        return $this->render('index.twig', ['links' => $links]);
    }

	public function add(Request $request)
	{
		var_dump($request); die();
    }

}