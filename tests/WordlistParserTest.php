<?php

use PHPUnit\Framework\TestCase;

final class WordlistParserTest extends TestCase
{
	public function testReturnTheCorrectPasswordListLength(): bool
	{
		$parse		= new WordlistParser;

		$this->assertEquals(
			8191,
			$parse->ListLength()
		);

		return true;
	}

	public function testEveryWordReturnsCorrectly(): bool
	{
		$parse		= new WordlistParser;

		for ($a = 0; $a < 8191; $a++)
		{
			$this->assertRegExp(
				'/^([A-Z])([a-z])+$/',
				$parse->ReturnWord($a)
			);
		}

		return true;
	}
}

