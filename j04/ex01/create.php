<?php
function login_exist($tab, $login)
{
	foreach ($tab as $data)
	{
		if ($data["login"] === $login)
			return (true);
	}
	return (false);
}
if ($_POST === NULL || $_POST["login"] === "" || $_POST["passwd"] === "" || $_POST["submit"] !== "OK")
{
	echo "ERROR\n";
	exit ;
}
if (file_exists("../htdocs/") === false)
	mkdir("../htdocs");
if (file_exists("../htdocs/private") === false)
	mkdir("../htdocs/private");
if (file_exists("../htdocs/private/passwd") !== false)
{
	$file = unserialize(file_get_contents("../htdocs/private/passwd"));
	if (login_exist($file, $_POST["login"]))
	{
		echo "ERROR\n";
		exit ;
	}
}
$file[] = array("login" => $_POST["login"], "passwd" => hash("whirlpool", $_POST["passwd"]));
file_put_contents("../htdocs/private/passwd", serialize($file));
echo "OK\n";
?>
