<?php
function change_passwd($tab, $login, $old_pw, $new_pw)
{
	foreach ($tab as &$data)
	{
		if ($data["login"] === $login)
		{
			if (hash("whirlpool", $old_pw) === $data["passwd"])
			{
				$data["passwd"] = hash("whirlpool", $new_pw);
				file_put_contents("../htdocs/private/passwd", serialize($tab));
				return (true);
			}
		}
	}
	return (false);
}
if ($_POST === NULL || $_POST["login"] === "" || $_POST["oldpw"] === "" || $_POST["newpw"] === "" || $_POST["submit"] !== "OK")
{
	echo "ERROR\n";
	exit ;
}
if (file_exists("../htdocs/private/passwd") === false)
{
	echo "ERROR\n";
	exit ;
}
$file = unserialize(file_get_contents("../htdocs/private/passwd"));
if ($file === false)
{
	echo "ERROR\n";
	exit ;
}
if (change_passwd($file, $_POST["login"], $_POST["oldpw"], $_POST["newpw"]))
	echo "OK\n";
else
	echo "ERROR\n";
?>
