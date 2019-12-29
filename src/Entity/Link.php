<?php

declare(strict_types=1);

namespace App\Entity;

use DateTime;

class Link
{

	public string $url;

	public ?string $description = null;

	public bool $view = false;

	public $createdAt = null;

	public $updatedAt = null;

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