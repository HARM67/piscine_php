<?php
function auth($login, $passwd)
{
	if (file_exists("../htdocs/private/passwd") === false || $login === "" || $passwd === "")
		return (false);
	$file = unserialize(file_get_contents("../htdocs/private/passwd"));
	if ($file === false)
		return (false);
	foreach ($file as $data)
	{
		if ($data["login"] === $login)
		{
			if (hash("whirlpool", $passwd) === $data["passwd"])
				return (true);
		}
	}
	return (false);
}
?>
