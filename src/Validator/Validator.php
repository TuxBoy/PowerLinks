<?php

declare(strict_types=1);

namespace App\Validator;

class Validator
{

	/**
	 * @var array
	 */
	private array $data = [];

	public array $errors = [];

	public function check(array $data): self
	{
		$this->data = $data;

		return $this;
	}

	/**
	 * Vérifie si un champ est obligatoire et existe bien et n'est pas vide dans le tableau des donnée
	 *
	 * @param string $fieldName Le nom du champ à valider
	 * @return $this
	 */
	public function required(string $fieldName): self
	{
		if (
			!array_key_exists($fieldName, $this->data)
			|| (array_key_exists($fieldName, $this->data) && empty($this->data[$fieldName]))
		) {
			$this->errors[$fieldName]['required'] = sprintf("Le champ %s n'existe pas ou est vide", $fieldName);
		}

		return $this;
	}

	/**
	 * Retourne true s'il y a des erreurs de validation
	 *
	 * @return bool
	 */
	public function hasErrors(): bool
	{
		return !empty($this->errors);
	}

	/**
	 * @param string $fieldName Le nom du champ à valider
	 * @param int $minValue La valeur minimal souhaité pour le champ
	 * @return $this
	 */
	public function minLength(string $fieldName, int $minValue): self
	{
		if (strlen($this->data[$fieldName]) < $minValue) {
			$this->errors[$fieldName]['minLength'] = sprintf('Le champ %s est inférieur àla taille %s', $fieldName, $minValue);
		}

		return $this;
	}

	public function url(string $fieldName): self
	{
		if (!filter_var($this->data[$fieldName], FILTER_VALIDATE_URL)) {
			$this->errors[$fieldName]['url'] = sprintf('Le champ %s n\'est pas une url valide', $fieldName);
		}

		return $this;
	}

}