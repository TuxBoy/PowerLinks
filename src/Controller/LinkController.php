<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\Metadata;
use App\Table\LinkTable;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response;

class LinkController extends BaseController
{

	public function index(ServerRequestInterface $request, LinkTable $linkTable): Response
	{
		return $this->render('link.index', ['links' => $linkTable->paginate(20)]);
	}

	public function getMetadata(ServerRequestInterface $request, Metadata $metadata)
	{
		$description = $metadata->getTwitterData('description');
	}

}
