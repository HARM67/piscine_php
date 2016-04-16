<?php
if ($_POST["action"] === "+")
	add_in_cart($_GET["id"]);
else if ($_POST["action"] === "-")
	rm_in_cart($_GET["id"]);
header("Location: index.php?page=see_cart");
?>
