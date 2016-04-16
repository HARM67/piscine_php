<?php
	if ($_SESSION["user"]["group"] >= 1)
	{
		add_product($_POST["name"], $_POST["price"], $_POST["quantity"]);
		header("Location: index.php?page=see_product");
	}
	else
		header("Location: index.php");
?>
