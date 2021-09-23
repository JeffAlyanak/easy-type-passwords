<?php

require_once	"wordlist-parser.php";

final class PasswordGenerator
{
	public function generatePassword($howManyWords, $howManyNumbers, $specialCharacters): string
	{
		$password	= '';

		$parser	= new WordlistParser;

		// Shuffle the special characters and get the length
		$specialCharacters = str_shuffle($specialCharacters);
		$howManySpecialCharacters = strlen($specialCharacters);

		$edges	= $howManyWords + 1;												// Edges between words, ie, places to put numbers.
		if ($howManyNumbers > $edges) $howManyNumbers = $edges;						// Limit numbers based on places to put them.
		if ($howManySpecialCharacters > $edges) $howManySpecialCharacters = $edges;	// Limit special chars based on places to put them.

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
			// Choose unique, random edges to place special characters.
			if ($howManySpecialCharacters > 0)
			{
				$locationOfSpecialCharacters	= [];
				$t	= $howManySpecialCharacters;

				for ($i = 0; $i < ($edges - $t); $i++) $locationOfSpecialCharacters[] = 0;
				for ($i = 0; $i < $t; $i++) $locationOfSpecialCharacters[] = 1;

				shuffle($locationOfSpecialCharacters);
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

				if ($howManySpecialCharacters > 0)
				{
					if ($locationOfSpecialCharacters[$i] == 1)
					{
						// TODO: This is sort of dirty, there's probably a more diomatic way of doing this.
						$password	.= $specialCharacters[0];
						$specialCharacters = substr($specialCharacters, 1, $howManySpecialCharacters);
						$howManySpecialCharacters--;
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

?>
