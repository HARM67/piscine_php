<?php
function ft_split($str)
{
	$rt = explode(" ", $str);
	$rt = array_filter($rt);
	sort($rt);
	return ($rt);
}
?>
