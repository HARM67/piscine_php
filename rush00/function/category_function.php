<?php
function	add_category($name, $visible)
{
	if ($name === "" || $visible === "")
		return (false);
	if ($visible === "on")
		$visible = true;
	else
		$visible = false;
	add_data_once(CATEGORY, "name", array(
				"id"	=> get_id(CATEGORY),
				"visible"	=> $visible,
				"name"	=> $name));
	return (true);
}

function	change_category($name, $visible)
{
	if ($name === "" || $visible === "")
		return (false);
	if ($visible === "on")
		$visible = true;
	else
		$visible = false;
	if (file_exists(CATEGORY.".data") !== false)
	{
		$tab = unserialize(file_get_contents(CATEGORY.".data"));
		foreach ($tab as &$elem)
		{
			if (intval($_GET["id"]) === $elem["id"])
			{
 				$elem["name"]		= $name;
				$elem["visible"]	= $visible;
			}
		}
	}
	file_put_contents(CATEGORY.".data", serialize($tab));
	return (true);
}
?>
