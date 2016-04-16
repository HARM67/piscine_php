#!/usr/bin/php
<?php
if ($argc == 2)
{
	$tok = strtok($argv[1], " ");
	$rt = $tok;
	while ($tok !== false)
	{
		$tok = strtok(" ");
		if ($tok)
			$rt = $rt." ".$tok;
	}
	print_r($rt."\n");
}
?>
