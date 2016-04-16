<?php
if ($_POST["login"] === "" || $_POST["passwd"] === "")
	header("Location: index.php");
$data = get_data_first(USER, "login", $_POST["login"]);
if (hash("whirlpool", $_POST["passwd"]) === $data["passwd"])
{
	$_SESSION["user"] = $data;
}
else
	header("Location: index.php?page=".$_GET["page"]);
header("Location: index.php");
?>
