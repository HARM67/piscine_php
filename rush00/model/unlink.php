<?php
	if ($_SESSION["user"]["group"] >= 1)
	{
		rm_link_data($_GET["id_category"], $_GET["id_product"]);
		header("Location: index.php?page=category&id=".$_GET["id_category"]);
	}
?>
