<?php
if ($_GET["action"] !== "")
{
	if ($_GET["action"] === "set")
	{
		if ($_GET["name"] !== NULL && $_GET["value"] !== NULL)
			setcookie($_GET["name"], $_GET["value"], time() + 3600);
	}
	else if ($_GET["action"] === "del")
	{
		if ($_GET["name"] !== NULL)
			setcookie($_GET["name"]);
	}
	else if ($_GET["action"] === "get")
	{
		if ($_GET["name"] !== NULL)
			if ($_COOKIE[$_GET["name"]] !== NULL)
				echo $_COOKIE[$_GET["name"]]."\n";
	}
}
?>
