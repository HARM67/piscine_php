<?php
	if ($_SESSION["user"]["group"] >= 1)
	{
		add_category($_POST["name"], $_POST["visible"]);
		header("Location: index.php?page=see_category");
	}
	else
		header("Location: index.php");
?>
