<?php

class	Jaime
{
	public function	sleepWith($obj)
	{
		if (is_a($obj,"Tyrion"))
			print("Not even if I'm drunk !" . PHP_EOL);
		else if (is_a($obj,"Sansa"))
			print("Let's do this." . PHP_EOL);
		else if (is_a($obj,"Cersei"))
			print("With pleasure, but only in a tower in Winterfell, then." . PHP_EOL);
	}
}
?>
