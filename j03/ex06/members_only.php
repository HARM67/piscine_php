<?php
if ($_SERVER["PHP_AUTH_USER"] === "zaz" && $_SERVER["PHP_AUTH_PW"] === "jaimelespetitsponeys")
{
	header("Content-Type: text/html");
	$image = file_get_contents("../img/42.png");
	$image = base64_encode($image);
	echo "<html><body>
		Bonjour Zaz<br />
		<img src='data:image/png;base64,";
	echo $image;
	echo "'></body></html>";
}
else
{
	header("WWW-Authenticate: Basic realm=''Espace membres''");
	header("Content-Type: text/html");
	header("HTTP 1.0, assume close after body");
	header("Connection: close");
	echo "<html><body>Cette zone est accessible uniquement aux membres du site</body></html>";
}
?>
