<?php
	if ($_SESSION["user"]["group"] >= 1)
	{
		change_user($_GET["id"], $_POST["group"]);
		header("Location: index.php?page=see_user");
	}
	else
		header("Location: index.php");
?>
