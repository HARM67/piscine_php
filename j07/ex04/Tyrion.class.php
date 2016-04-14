<?php
include_once('Lannister.class.php');

class	Tyrion
{
	public function	sleepWith($obj)
	{
		if (is_a($obj,"Jaime")|| is_a($obj,"Cersei") )
			print("Not even if I'm drunk !" . PHP_EOL);
		else if (is_a($obj,"Sansa"))
			print("Let's do this." . PHP_EOL);
	}
}
?>
