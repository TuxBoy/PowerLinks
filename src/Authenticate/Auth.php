<?php

declare(strict_types=1);

namespace App\Authenticate;

use App\Entity\User;
use App\Hash;
use App\Session\SessionInterface;
use App\Table\UserTable;
use Exception;

class Auth
{

	private SessionInterface $session;

	private UserTable $userTable;

	public function __construct(SessionInterface $session, UserTable $userTable)
	{
		$this->session   = $session;
		$this->userTable = $userTable;
	}

	public function setCurrent(User $user): void
	{
		$this->session->set('user', $user);
	}

	/**
	 * @return User
	 * @throws Exception
	 */
	public function current(): ?User
	{
		$currentUser = $this->session->get('user');
		if (null !== $currentUser) {
			return $this->userTable->findById($currentUser->id);
		}

		return null;
	}

	public function disconnect(): void
	{
		$this->session->destroy('user');
	}

	/**
	 * @param string $username
	 * @param string $password
	 * @return bool
	 * @throws Exception
	 */
	public function login(string $username, string $password): bool
	{
		$hash = new Hash;
		if ($user = $this->userTable->findUser($username, $password)) {
			if ($hash->verify($password, $user->password)) {
				$this->setCurrent($user);
				return true;
			}
		}

		return false;
	}

}