<?php

declare(strict_types=1);

namespace App\Twig;

use App\Middleware\Csrf\CsrfMiddleware;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class CsrfExtension extends AbstractExtension
{

	private CsrfMiddleware $csrf;

	public function __construct(CsrfMiddleware $csrf)
	{
		$this->csrf = $csrf;
	}

	public function getFunctions(): array
	{
		return [
			new TwigFunction('csrf',       [$this, 'generateToken']),
			new TwigFunction('csrf_field', [$this, 'generateFieldToken'], ['is_safe' => ['html']]),
		];
	}

	public function generateFieldToken(): string
	{
		return '<input type="hidden" name="'. $this->csrf->formKey .'" value="'. $this->csrf->generateToken() .'">';
	}

	/**
	 * @return string
	 * @throws \Exception
	 */
	public function generateToken(): string
	{
		return $this->csrf->generateToken();
	}

}