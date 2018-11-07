<?php

final class GetParameters
{
	public function numberOfWords(): string
	{
		return	$_GET['words'] ?? "6";
	}
}

?>
