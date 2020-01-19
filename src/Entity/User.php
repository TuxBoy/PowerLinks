<?php

declare(strict_types=1);

namespace App\Entity;

use App\Authenticate\Role;
use App\Hash;

class User
{

	public int $id;

	public string $username;

	public string $password;

	public ?string $email = null;

	public string $role = Role::MEMBER;

	/**
	 * @param string $password
	 * @return User
	 */
	public function setPassword(string $password): self
	{
		$this->password = (new Hash)->password($password);

		return $this;
	}

	public function getPassword(): string
	{
		return (new Hash)->password($this->password);
	}

	public function getAvatar(): string
	{
		$default = "https://www.somewhere.com/homestar.jpg";
		$size    = 40;

		return "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $this->email ) ) ) . "?s=" . $size;
	}

	/**
	 * @return bool
	 */
	public function isAdmin(): bool
	{
		return $this->role === Role::ADMIN;
	}

	/**
	 * Vérifie si le user est bien l'autheur du lien
	 * 
	 * @param  link Link
	 * @return boolean
	 */
	public function isAuthor(Link $link): bool
	{
		return $link->user_id === $this->id;
	}

}