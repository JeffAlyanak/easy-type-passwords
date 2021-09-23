<?php

final class GetParameters
{
	public function numberOfWords(): string
	{
		return	$_GET['words'] ?? "6";
	}
	
	public function numberOfNumbers(): string
	{
		return	$_GET['numbers'] ?? "1";
	}

	public function specialCharacters(): string
	{
		return	$_GET['special'] ?? "!";
	}
}

?>
