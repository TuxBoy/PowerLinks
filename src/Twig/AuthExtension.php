<?php

declare(strict_types=1);

namespace App\Twig;

use App\Authenticate\Auth;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class AuthExtension extends AbstractExtension
{

	private Auth $auth;

	public function __construct(Auth $auth)
	{
		$this->auth = $auth;
	}

	public function getFunctions(): array
	{
		return [
			new TwigFunction('auth', [$this, 'getAuthenticate'])
		];
	}

	/**
	 * @return Auth|null
	 * @throws \Exception
	 */
	public function getAuthenticate(): ?Auth
	{
		return $this->auth;
	}

}