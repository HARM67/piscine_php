#!/usr/bin/php
<?php

function my_function3($tt)
{
	return (strtoupper($tt[0]));
}

function my_function2($tt)
{
	$tt[2] = preg_replace_callback('/>([^<>]*)</s', "my_function3", $tt[2]);
	return ($tt[1].$tt[2].$tt[3]);
}

function my_function($tt)
{
	return ($tt[1].strtoupper($tt[2]).$tt[3]);
}

if ($argc < 2)
{
	print("Error\n");
	exit ;
}
$fd = fopen ($argv[1] , "rb");
if ($fd === false)
{
	print("Error\n");
	exit ;
}
$data = fread($fd, filesize($argv[1]));
fclose($fd);
$rt = preg_replace_callback('/(title[ \t]*=[ \t]*")([^>"]*)(")/s', "my_function", $data);
$rt = preg_replace_callback('/(<[ \t]*a[ \t][^>]*)(>.*?<)([ \t]*\/[ \t]*a[ \t]*>)/s', "my_function2" , $rt);
print($rt);
?>
