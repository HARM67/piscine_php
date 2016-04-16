#!/usr/bin/php
<?php

if ($argc != 2)
{
		print("Incorrect Parameters\n");
}
else
{
	$signe = "$";
	if (substr_count($argv[1], "+"))
		$signe = "+";
	else if (substr_count($argv[1], "-"))
		$signe = "-";
	else if (substr_count($argv[1], "*"))
		$signe = "*";
	else if (substr_count($argv[1], "/"))
		$signe = "/";
	else if (substr_count($argv[1], "%"))
		$signe = "%";

	if ($signe === "$")
	{
		print("Syntax Error\n");
		exit;
	}
	$data = explode($signe, $argv[1]);
	if (count($data) !== 2)
	{
		print("Syntax Error\n");
		exit;
	}
	$data[0] = trim($data[0]);
	$data[1] = trim($data[1]);
	if (!is_numeric($data[0]) || !is_numeric($data[1]))
	{
		print("Syntax Error\n");
		exit;
	}
	if ($signe === "+")
		$rt = $data[0] + $data[1];
	else if ($signe === "-")
		$rt = $data[0] - $data[1];
	else if ($signe === "*")
		$rt = $data[0] * $data[1];
	else if ($signe === "/")
	{
		if ($data[1] == 0)
		{
			print("Syntax Error\n");
			exit ;
		}
		$rt = $data[0] / $data[1];
	}
	else if ($signe === "%")
	{
		if ($data[1] == 0)
		{
			print("Syntax Error\n");
			exit ;
		}
		$rt = $data[0] % $data[1];
	}
	print($rt."\n");
}
?>
