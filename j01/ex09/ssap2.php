#!/usr/bin/php
<?php
function modifie_string($a)
{
	$len_a = strlen($a);
	$i = 0;
	while ($i < $len_a)
	{
		if (ord($a[$i]) >= 65 && ord($a[$i]) <= 90 )
			$a[$i] = chr(ord($a[$i]) - 33);
		else if (ord($a[$i]) >= 97 && ord($a[$i]) <= 122)
			$a[$i] = chr(ord($a[$i]) - 65);
		else if (ord($a[$i]) >= 48 && ord($a[$i]) <= 57)
			$a[$i] = chr(ord($a[$i]) + 10);
		else if (ord($a[$i]) >= 32 && ord($a[$i]) <= 64)
			$a[$i] = chr(ord($a[$i]) + 36);
		else if (ord($a[$i]) >= 91 && ord($a[$i]) <= 96)
			$a[$i] = chr(ord($a[$i]) + 9);
		$i++;
	}
	return ($a);
}

function mysort($a, $b)
{
	$a = modifie_string($a);
	$b = modifie_string($b);
	return (strcmp($a, $b));
}

$i = 1;
$rt = array();
while ($i < $argc)
{
	$tok = strtok($argv[$i], " ");
	while ($tok !== false)
	{
		array_push($rt, $tok);
		$tok = strtok(" ");
	}
	$i++;
}
usort($rt, "mysort");
foreach($rt as $elem)
{
	print($elem."\n");
}
?>
