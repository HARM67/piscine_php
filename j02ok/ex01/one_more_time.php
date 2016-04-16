#!/usr/bin/php
<?php
if ($argc < 2)
	exit ;
if (($reg = preg_match("/^([a-zA-Z][a-z]+) ([0-3]{0,1}[0-9]) ([a-zA-Z][a-z]+) ([0-3][0-3][0-9][0-9]) ([0-2][0-9]):([0-5][0-9]):([0-5][0-9])$/", $argv[1], $nd)) === 0)
{
	print("Wrong Format\n");
	exit;
}
$month = array(
	"janvier" => 1,
	"fevrier" => 2,
	"mars" => 3,
	"avril" => 4,
	"mai" => 5,
	"juin" => 6,
	"juillet" => 7,
	"aout" => 8,
	"septembre" => 9,
	"octobre" => 10,
	"novembre" => 11,
	"decembre" => 12
);
$month_nb = 0;
if (($month_nb = $month[strtolower($nd[3])]) == 0)
{
	print("Wrong Format\n");
	exit;
}
date_default_timezone_set('Europe/Paris');
setlocale(LC_TIME, "fr_FR");
$rt = mktime($nd[5], $nd[6], $nd[7], $month_nb, $nd[2], $nd[4]);
if (strtolower($nd[1]) !== strtolower(strftime("%A", $rt)))
{
	print("Wrong Format\n");
	exit;
}
print($rt."\n");
?>
