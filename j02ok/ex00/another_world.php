#!/usr/bin/php
<?php
if ($argc < 2)
	exit;
$rt = preg_replace("/([ \t]+)/", " ", $argv[1]);
$rt = preg_replace("/^([ \t]+)/", "", $rt);
$rt = preg_replace("/([ \t]+)$/", "", $rt);
print($rt."\n");
?>
