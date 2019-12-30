<?php

declare(strict_types=1);

namespace App\Factory;

use Psr\Container\ContainerInterface;

/**
 * FactoryInterface.
 */
interface FactoryInterface
{

	public function build(ContainerInterface $container);

}
