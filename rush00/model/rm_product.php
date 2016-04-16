<?php
	if ($_SESSION["user"]["group"] >= 1)
	{
		$id = intval($_GET["id"]);
		if (rm_data(PRODUCT, "id", $id))
		{
			if (file_exists("img/product/".$id.".jpg"))
				unlink("img/product/".$id.".jpg");
			delete_link_from_product($id);
			header("Location: index.php?page=see_product");
		}
		else
		header("Location: index.php");
	}
?>
