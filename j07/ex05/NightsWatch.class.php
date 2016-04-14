<?php

require_once("IFighter.class.php");

class	NightsWatch
{
	static $fighter_list;
	public function	recruit($fighter)
	{
		if (is_a($fighter, "IFIghter"))
			self::$fighter_list[] = $fighter;
	}
	public function	fight()
	{
		foreach (self::$fighter_list as $fighter)
		{
			$fighter->fight();
		}
	}
}
?>
