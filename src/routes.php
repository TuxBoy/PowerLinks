<?php

declare(strict_types=1);

// add a route to the map, and a handler for it
$map->get('root', '/', [\App\Controller\PageController::class]);