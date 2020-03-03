<?php

declare(strict_types=1);

use App\Migration\BaseMigration;

class AddTags_1583245631 extends BaseMigration
{

	public function up(): void
	{
		$this->addSql('ALTER TABLE links ADD tag varchar(255)');
	}

	public function down(): void
	{
		$this->addSql('ALTER TABLE links DROP tag');
	}
}
