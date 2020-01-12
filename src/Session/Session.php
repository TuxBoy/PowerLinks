<?php

declare(strict_types=1);

namespace App\Session;

class Session implements SessionInterface
{

	/**
	 * {@inheritDoc}
	 */
	public function start(): void
	{
		if (! $this->isStart()) {
			session_start();
		}
	}

	public function set(string $key, $value): void
	{
		$_SESSION[$key] = $value;
	}

	public function get(string $key)
	{
		return $_SESSION[$key] ?? null;
	}

	public function exist(string $key): bool
	{
		return array_key_exists($key, $_SESSION);
	}

	public function isStart(): bool
	{
		return session_status() === PHP_SESSION_ACTIVE;
	}

	/**
	 * @inheritDoc
	 */
	public function destroy(?string $key): void
	{
		if (null === $key) {
			unset($_SESSION);
		} else {
			$_SESSION[$key] = null;
			unset($_SESSION[$key]);
		}
	}
}