<?php

	$wordlist = "assets/words/words.txt";

	function listLen()
	{
		global $wordlist;

		$file   = fopen($wordlist, "r") or die("Unable to open file!");
		$len    = 0;

		while(!feof($file))
		{
			fgets($file);
			$len++;
		}
		fclose($file);

		return $len;
	}

	function returnWord($a)
	{
		global $wordlist;
		$file   = fopen($wordlist, "r") or die("Unable to open file!");
		$words  = [];

		while(!feof($file))
		{
			$words[]	= fgets($file);
		}
		fclose($file);

		echo removewhite($words[$a]);
	}

	function removeWhite($str)
	{
		return ucfirst(preg_replace('/\s+/', ' ', trim($str)));
	}

?>

