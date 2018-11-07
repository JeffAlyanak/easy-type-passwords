<?php

	require_once	"assets/php/class/get-parameters.php";
	include_once	"assets/php/parse.php";	// Reader & parser for wordlist.


final class PasswordGenerator
{
	public function generatePassword($howManyWords, $howManyNumbers): string
	{		
		$password	= '';

		$parser	= new WordlistParser;
		$params	= new GetParameters;

		$words	= $params->numberOfWords();

		$edges	= $howManyWords + 1;								// Edges between words, ie, places to put numbers.
		if ($howManyNumbers > $edges) $howManyNumbers = $edges;		// Limit numbers based on places to put them.

		$a	= $parser->ListLength();
		if ($a != 0)
		{
			// Choose unique, random edges to place numbers.	
			if ($howManyNumbers > 0)
			{
				$locationOfNumbers	= [];
				$t	= $howManyNumbers;

				for ($i = 0; $i < ($edges - $t); $i++) $locationOfNumbers[] = 0;
				for ($i = 0; $i < $t; $i++) $locationOfNumbers[] = 1;

				shuffle($locationOfNumbers);
			}

			// Boom!
			for ($i = 0; $i < $edges; $i++)
			{
				if ($howManyNumbers > 0)
				{
					if ($locationOfNumbers[$i] == 1)
					{
						$password	.= $this->randNum(0,99);
						$howManyNumbers--;
					}
				}
				
				if ($howManyWords > 0)
				{
					$password	.= $parser->returnWord($this->randNum(0, $a-1));
					$howManyWords--;
				}
			}
		}
		return	$password;
	}

	private function randNum($min, $max)
	{
			return	rand($min, $max);								// Replace this with better randomization if you like.
	}

}

	

	// generatePassword(1, $words);





	function generatePassword($howManyNumbers, $howManyWords)
	{
		
		
	}

?>
