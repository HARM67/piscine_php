#!/usr/bin/php
<?php

$filename = "/var/run/utmpx";
$fd = fopen($filename, "rb");
if ($fd === false)
{
	print("Error\n");
	exit ;
}
$i = 1256;
fread($fd, 1256);
date_default_timezone_set('Europe/Paris');
while ($i < filesize($filename))
{
	$data = fread($fd, 628);
	$struct = unpack("a256name/a4id/a32line/ipid/itype/itime", $data);
	if ($struct["type"] == 7)
	{
			print($struct["name"]." ".$struct["line"]."  ".strftime("%b %e %H:%M", $struct["time"])."\n");
	}
	$i += 628;
}
fclose($fd);
?>
