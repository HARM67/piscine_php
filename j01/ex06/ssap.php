#!/usr/bin/php
<?php
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
sort($rt);
foreach($rt as $elem)
{
	print($elem."\n");
}
?>
