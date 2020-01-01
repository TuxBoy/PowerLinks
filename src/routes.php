<?php

declare(strict_types=1);

use App\Controller\PageController;

$map->get('root', '/', [PageController::class]);

$map->post('root.post', '/', [PageController::class, 'add']);

$map
	->post('link.delete', '/link/delete/{id}', [PageController::class, 'delete'])
	->tokens(['id' => '\d+']);