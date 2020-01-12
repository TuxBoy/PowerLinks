<?php

declare(strict_types=1);

namespace App\Session;

interface SessionInterface
{

	/**
	 * Démarre une session PHP si celle ci aucune est actuellement active.
	 */
	public function start(): void;

	/**
	 * @param string $key
	 * @param $value
	 */
	public function set(string $key, $value): void;

	/**
	 * Récupère la valeur de la session pour une clé donnée.
	 *
	 * @param string $key
	 * @return mixed
	 */
	public function get(string $key);

	/**
	 * Vérifie si une clé existe dans la session
	 *
	 * @param string $key
	 * @return bool
	 */
	public function exist(string $key): bool;

	/**
	 * Vérifie si la session est démarrée.
	 *
	 * @return bool
	 */
	public function isStart(): bool;

	/**
	 * Détruire la session en cours
	 *
	 * @param string|null $key la clé de la session a détruire, si null, on détruit toute la session
	 */
	public function destroy(?string $key): void;

}