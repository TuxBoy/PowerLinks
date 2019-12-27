<?php

declare(strict_types=1);

namespace App\Controller;

use Psr\Http\Message\ServerRequestInterface;

class PageController extends BaseController
{

    public function index(ServerRequestInterface $request)
    {
        return $this->render('index.twig');
    }

}