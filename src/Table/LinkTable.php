<?php

declare(strict_types=1);

namespace App\Table;

use App\Connection\Connection;
use App\Entity\Link;
use App\Entity\User;

class LinkTable extends Table
{

	protected ?string $table = 'links';

	public function __construct(Connection $connection)
	{
		parent::__construct($connection);
		$this->className = Link::class;
	}

	public function paginate(int $limit = null): array
	{
		/** @var $link Link */
		$links = parent::paginate($limit);
		if ($links) {
			$links = array_map(function (Link $link) {
					if (! $link->user) {
						$link->user = $this->connection
							->queryOne("SELECT * FROM users WHERE users.id = ?", User::class, [$link->user_id]);
					}
					return $link;
				}, $links);
		}

		return $links;
	}

}