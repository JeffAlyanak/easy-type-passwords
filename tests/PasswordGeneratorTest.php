<?php

use PHPUnit\Framework\TestCase;

final class PasswordGeneratorTest extends TestCase
{
	public function testPasswordsWith6WordsAnd1Number(): bool
	{
		$gen		= new PasswordGenerator;

		$words		= 6;
		$numbers	= 1;

		for ($a = 0; $a < 100; $a++)
		{
			$this->assertRegExp(
				'/^([0-9]{0,2})([A-Z])([a-z])+([0-9]{0,2})([A-Z])([a-z])+([0-9]{0,2})([A-Z])([a-z])+([0-9]{0,2})([A-Z])([a-z])+([0-9]{0,2})([A-Z])([a-z])+([0-9]{0,2})([A-Z])([a-z])+([0-9]{0,2})$/',
				$gen->generatePassword($words,$numbers)
			);
		}
		return true;
	}

	public function testPasswordsWith3WordsAnd3Numbers(): bool
	{
		$gen		= new PasswordGenerator;

		$words		= 3;
		$numbers	= 3;

		for ($a = 0; $a < 100; $a++)
		{
			$this->assertRegExp(
				'/^([0-9]{0,2})([A-Z])([a-z])+([0-9]{0,2})([A-Z])([a-z])+([0-9]{0,2})([A-Z])([a-z])+([0-9]{0,2})$/',
				$gen->generatePassword($words,$numbers)
			);
		}
		return true;
	}

	public function testPasswordsWith2WordsAnd6Numbers(): bool
	{
		$gen		= new PasswordGenerator;

		// Should limit numbers to edges.
		$words		= 2;
		$numbers	= 6;

		for ($a = 0; $a < 100; $a++)
		{
			$this->assertRegExp(
				'/^([0-9]{0,2})([A-Z])([a-z])+([0-9]{0,2})([A-Z])([a-z])+([0-9]{0,2})$/',
				$gen->generatePassword($words,$numbers)
			);
		}
		return true;
	}
}
