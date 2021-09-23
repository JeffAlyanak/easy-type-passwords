# Easy-Type Passwords

### Secure passwords that you can actually type in.

Pretty simple concept, these passwords are easy to type in.

## Configuration & Use

* Add or alter the wordlist (`src/assets/words/words.txt`)
* Add the class somewhere in your php (eg,  `require_once "src/assets/php/class/password-generator.php";`)
* Create a generator (`$gen	= new PasswordGenerator;`)
* Generate a password  (`$gen->generatePassword(<number of words>,<number of numbers>,<special characters>);`)

## Of Note

The resulting password will include a random selection of words pulled randomly from the wordlist and will slot the random numbers (0-99) in random slots between words. This includes before the first word and after the last word.

It will not put two numbers or two special characters next to each other, so if you select a 'number of numbers' larger than there are word edges it will simply fill every word edge only once.

Also of note, rather than using the php rand function, there is instead a wrapper function called `PasswordGenerator::randNum`. While the passwords returned should be sufficiently difficult to predict, you can always replace the simple rand call inside the wrapper with a more robust random number generator.