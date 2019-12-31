<?php

declare(strict_types=1);

namespace Tests\Table;

use App\Connection\Connection;
use App\Entity\Link;
use App\Table\LinkTable;
use PHPUnit\Framework\TestCase;

class LinkTableTest extends TestCase
{

	public function testFindAll()
	{
		$db   = $this->createMock(Connection::class);
		$link = new Link();

		$link->url         = 'http://monsite.fr';
		$link->description = 'description';
		$linkTable = new LinkTable($db, $link);

		$db->method('query')->willReturn([$link]);

		$links = $linkTable->findAll();

		$this->assertNotEmpty($links);
		$this->assertEquals('http://monsite.fr', $links[0]->url);
	}

	public function testFindAllWithoutResults()
	{
		$db   = $this->createMock(Connection::class);
		$linkTable = new LinkTable($db, new Link());

		$db->method('query')->willReturn([]);

		$links = $linkTable->findAll();

		$this->assertEmpty($links);
	}

}