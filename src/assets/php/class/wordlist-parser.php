<?php

final class WordlistParser
{
	private $wordlist = "assets/words/words.txt";

	public function ReturnWord($a): string
	{
		$list	= $this->wordlist;
		$file   = fopen($list, "r") or die("Unable to open file!");
		$words  = [];

		while(!feof($file))
		{
			$words[]	= fgets($file);
		}
		fclose($file);
		return	$this->removewhite($words[$a]);
	}

	public function ListLength(): int
	{
		$list	= $this->wordlist;
		$file   = fopen($list, "r") or die("Unable to open file!");
		$len    = 0;

		while(!feof($file))
		{
			fgets($file);
			$len++;
		}
		fclose($file);

		return $len;
	}

	private function removeWhite($str)
	{
		return ucfirst(preg_replace('/\s+/', ' ', trim($str)));
	}
}

?>

