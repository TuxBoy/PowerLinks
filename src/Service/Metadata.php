<?php

declare(strict_types=1);

namespace App\Service;

use Psr\Http\Message\ServerRequestInterface;

class Metadata
{

	private ServerRequestInterface $request;

	private array $metadata;

	public function __construct(ServerRequestInterface $request)
	{
		$this->request  = $request;
		$this->metadata = get_meta_tags($request->getAttribute('url'));
	}

	public function getTwitterData(string $key): ?string
	{
		return $this->metadata['twitter:' . $key] ?? null;
	}

}
