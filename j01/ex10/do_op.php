#!/usr/bin/php
<?php

if ($argc != 4)
{
	print("Incorrect Parameters\n");
}
else
{
	$argv[1] = trim($argv[1]);
	$argv[2] = trim($argv[2]);
	$argv[3] = trim($argv[3]);
	if ($argv[2] == "+")
		$rt = $argv[1] + $argv[3];
	else if ($argv[2] == "-")
		$rt = $argv[1] - $argv[3];
	else if ($argv[2] == "*")
		$rt = $argv[1] * $argv[3];
	else if ($argv[2] == "/")
	{
		if ($argv[3] == 0)
		{
			print("Incorrect Parameters\n");
			exit ;
		}
		$rt = $argv[1] / $argv[3];
	}
	else if ($argv[2] == "%")
	{
		if ($argv[3] == 0)
		{
			print("Incorrect Parameters\n");
			exit ;
		}
		$rt = $argv[1] % $argv[3];
	}
	print($rt."\n");
}
?>
