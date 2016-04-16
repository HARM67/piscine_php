#!/usr/bin/php
<?php

function read_stdin()
{
	$fd=fopen("php://stdin", "r");
	$input=fread($fd, 256);
	$input = trim($input, "\n");
	fclose($fd);
	return ($input);
}

while(1)
{
	print("Entrez un nombre: ");
	$number = read_stdin();
	if (!is_numeric($number))
	{
		print("'".$number."' n'est pas un chiffre\n");
		continue ;
	}
	if ($number & 1)
		print("Le chiffre $number number est Impair\n");
	else
		print("Le chiffre $number est Pair\n");
}
?>
