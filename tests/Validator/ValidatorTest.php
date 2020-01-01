<?php

declare(strict_types=1);

namespace Tests\Validator;

use App\Validator\Validator;
use PHPUnit\Framework\TestCase;

class ValidatorTest extends TestCase
{

	public function testRequiredAllFieldsValidator()
	{
		$validator = new Validator();
		$validator->check(['name' => '', 'content' => ''])
			->required('name')
			->required('content');

		$this->assertTrue($validator->hasErrors());
		$this->assertEquals('Le champ name n\'existe pas ou est vide', $validator->errors['name']['required']);
	}

	public function testIfOnlyFieldIsEmpty()
	{
		$validator = new Validator();
		$validator->check(['name' => 'zeaea', 'content' => ''])
			->required('name')
			->required('content');

		$this->assertTrue($validator->hasErrors());
	}

	public function testIfOnlyFieldIsRequired()
	{
		$validator = new Validator();
		$validator->check(['name' => '', 'content' => 'zaaeza'])
			->required('content');

		$this->assertFalse($validator->hasErrors());
	}

	public function testIfAllFieldsIsNotRequired()
	{
		$validator = new Validator();
		$validator->check(['name' => 'zeaea', 'content' => 'zaeazae'])
			->required('name')
			->required('content');

		$this->assertFalse($validator->hasErrors());
	}

	public function testIfFieldIsNotUrl()
	{
		$validator = new Validator();
		$validator->check(['url' => 'zeaea'])->url('url');

		$this->assertTrue($validator->hasErrors());
	}

	public function testIfFieldIsUrl()
	{
		$validator = new Validator();
		$validator->check(['url' => 'http://monsite.com'])->url('url');

		$this->assertFalse($validator->hasErrors());


		$validator = new Validator();
		$validator->check(['url' => 'monsite.com'])->url('url');

		$this->assertTrue($validator->hasErrors());
	}

	public function testIfyFieldHasGoodMinLength()
	{
		$validator = new Validator();
		$validator->check(['content' => 'az'])->minLength('content', 5);

		$this->assertTrue($validator->hasErrors());

		$validator = new Validator();
		$validator->check(['content' => 'azaze'])->minLength('content', 5);

		$this->assertFalse($validator->hasErrors());
	}

}