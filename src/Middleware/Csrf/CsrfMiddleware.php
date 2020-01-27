<?php

declare(strict_types=1);

namespace App\Middleware\Csrf;

use App\Session\SessionInterface;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestInterface;

class CsrfMiddleware
{

	private SessionInterface $session;

	private ContainerInterface $container;

	public string $formKey = '_csrf';

	private string  $sessionKey = 'csrf.session';

	public function __construct(SessionInterface $session, ContainerInterface $container)
	{
		$this->session   = $session;
		$this->container = $container;
	}

	/**
	 * @inheritDoc
	 */
	public function handle(ServerRequestInterface $request)
	{
		if (\in_array($request->getMethod(), ['POST', 'PUT', 'PATCH', 'DELETE'], true)) {
			$params = $request->getParsedBody() ?? [];
			if (! array_key_exists($this->formKey, $params)) {
				throw new NoCsrfException('The csrf token is not found');
			}

			if (! \in_array($params[$this->formKey], $this->session->get($this->sessionKey) ?? [], true)) {
				throw new InvalidCsrfException('The csrf token is not valid');
			}

			$this->removeToken($params[$this->formKey]);
		}
	}

	/**
	 * @return string Le token généré.
	 * @throws \Exception
	 */
	public function generateToken(): string
	{
		$token    = bin2hex(random_bytes(16));
		$tokens   = $this->session->get($this->sessionKey) ?? [];
		$tokens[] = $token;
		$this->session->set($this->sessionKey, $tokens);

		return $token;
	}

	private function removeToken(string $token): void
	{
		$tokens = $this->session->get($this->sessionKey) ?? [];
		$tokens = array_filter($tokens, fn ($value) => $token !== $value);
		$this->session->set($this->sessionKey, $tokens);
	}
}