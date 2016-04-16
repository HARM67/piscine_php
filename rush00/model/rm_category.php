<?php
	if ($_SESSION["user"]["group"] >= 1)
	{
		$id = intval($_GET["id"]);
		if (rm_data(CATEGORY, "id", $id))
		{
			delete_link_from_category($id);
			header("Location: index.php?page=see_category");
		}
		else
		header("Location: index.php");
	}
?>
