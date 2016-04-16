<?php
	if ($_SESSION["user"]["group"] > get_data_first(USER, "id", $_GET["id"])["group"])
	{
		$id = intval($_GET["id"]);
		if ($id !== 0)
		{
			if (rm_data(USER, "id", $id))
			{
				header("Location: index.php?page=see_user");
			}
		}
		else
			header("Location: index.php");
	}
?>
