#!/usr/bin/php
<?php
if ($argc >= 2)
{
	$rt = array();
	$tok = strtok($argv[1], " ");
	$first = $tok;
	if ($first == NULL)
		exit;
	$tok = strtok(" ");
	while ($tok !== false)
	{
		array_push($rt, $tok);
		$tok = strtok(" ");
	}
	array_push($rt, $first);
	$len = count($rt);
	foreach($rt as $elem)
	{
		print($elem);
		$len--;
		if ($len >= 1)
			print(" ");
	}
	print("\n");
}
?>
