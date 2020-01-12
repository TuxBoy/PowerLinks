<?php

declare(strict_types=1);

namespace App;

class Hash
{

	/**
	 * @param string $password
	 * @return false|string|null
	 */
	public function password(string $password)
	{
		return password_hash($password, PASSWORD_BCRYPT);
	}

	public function verify(string $password, string $hash): bool
	{
		return password_verify($password, $hash);
	}

}