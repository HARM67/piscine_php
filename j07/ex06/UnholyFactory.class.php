<?php

class	UnholyFactory
{
	private static	$_fighters;
	public function	absorb($new_fighter)
	{
		if (is_a($new_fighter, "Fighter") === false)
		{
			print("(Factory can't absorb this, it's not a fighter)" . PHP_EOL);
			return;
		}
		if (array_key_exists($new_fighter->getName(), self::$_fighters))
		{
			print("(Factory already absorbed a fighter of type " . $new_fighter->getName() . ")" . PHP_EOL);
		}
		else
		{
			self::$_fighters[$new_fighter->getName()] = $new_fighter;
			print("(Factory absorbed a fighter of type " . $new_fighter->getName() . ")" . PHP_EOL);
		}
	}
	public function	fabricate($string)
	{
		if (array_key_exists($string, self::$_fighters))
		{
			print("(Factory fabricates a fighter of type " . $string . ")" . PHP_EOL);
			return (self::$_fighters[$string]);
		}
		else
		{
			print("(Factory hasn't absorbed any fighter of type " . $string . ")" . PHP_EOL);
		}
	}

}
?>
