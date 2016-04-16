<?php
if ($_SESSION["user"]["group"] === 0 || $_SESSION["user"] === NULL)
	add_in_cart($_GET["id"]);
header("Location: index.php?page=see_cart");
?>
