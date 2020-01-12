<?php

declare(strict_types=1);

namespace App\Entity;

use App\Hash;

class User
{

	public int $id;

	public string $username;

	public string $password;

	public ?string $email = null;

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

}