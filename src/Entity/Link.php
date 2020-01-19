<?php

declare(strict_types=1);

namespace App\Entity;

use DateTime;

class Link
{

	public int $id;

	public string $url;

	public ?string $description = null;

	public bool $view = false;

	public $createdAt = null;

	public $updatedAt = null;

	public int $user_id;

	public ?User $user = null;

	/**
	 * @return DateTime
	 * @throws \Exception
	 */
	public function getCreatedAt(): DateTime
	{
		return new DateTime($this->createdAt ?? 'now');
	}

	/**
	 * @return DateTime
	 * @throws \Exception
	 */
	public function getUpdatedAt(): DateTime
	{
		return new DateTime($this->updatedAt ?? 'now');
	}

}