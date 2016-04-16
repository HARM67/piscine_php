#!/usr/bin/php
<?php
if ($argc < 2)
{
	print("Error\n");
	exit ;
}
function load_img($arg)
{
	if (file_exists(parse_url($arg[1], PHP_URL_HOST)) === false)
		mkdir(parse_url($arg, PHP_URL_HOST));
	$fd = fopen(parse_url($arg, PHP_URL_HOST)."/".basename($arg), "wb");
	$id = curl_init($arg);
	curl_setopt($id, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($id, CURLOPT_FILE, $fd);
	curl_exec($id);
	curl_close($id);
}

$url = parse_url($argv[1]);
if ($url["scheme"] == false)
	$url = "http://".$argv[1];
else
	$url = $argv[1];
$data = file_get_contents($url);
preg_match_all("/<[ \t]*img[^>]+src[ \t]*=[ \t]*['\"]([^'\"]+)['\"][^>]*>/is", $data, $my_tab,PREG_PATTERN_ORDER);
foreach ($my_tab[1] as $elem)
{
	$img = parse_url($elem);
	if ($img["scheme"] == false)
		$img = $url.$elem;
	else
		$img = $elem;
	load_img($img);
}
?>
