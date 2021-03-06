<?php

declare(strict_types=1);

use App\Controller\LinkController;
use App\Controller\PageController;
use App\Controller\UserController;

/** Page routes */
$map->get('root', '/', [PageController::class]);
$map->post('root.post', '/', [PageController::class, 'add']);
$map
	->post('link.delete', '/link/delete/{id}', [PageController::class, 'delete'])
	->tokens(['id' => '\d+']);

/** Users routes */
$map->get('user.register', '/user/register', [UserController::class, 'register']);
$map->get('user.login', '/user/login', [UserController::class, 'login']);
$map->post('user.post.login', '/user/login', [UserController::class, 'login']);
$map->get('user.disconnect', '/user/disconnect', [UserController::class, 'disconnect']);
$map->post('user.post.register', '/user/register', [UserController::class, 'register']);

/** Links routes */
$map->get('link.index', '/tous-les-liens', [LinkController::class]);
$map->post('link.getMetadata', '/link/metas', [LinkController::class, 'getMetadata'])
	->accepts([
		'application/json',
	]);
