<?php

declare(strict_types=1);

namespace App\Table;

use App\Connection\Connection;
use App\Entity\Link;

class LinkTable extends Table
{

	public function __construct(Connection $connection)
	{
		parent::__construct($connection);
		$this->className = Link::class;
	}

}