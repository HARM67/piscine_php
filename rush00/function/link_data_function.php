<?php
function	check_no_exist($id_category, $id_product)
{
	$data = get_product_by_category($id_category);
	if ($data === false)
		return (true);
	foreach($data as $elem)
	{
		if ($elem["id"] === $id_product)
			return (false);
	}
	return (true);
}

function	rm_link_data($id_category, $id_product)
{
	if ($id_category === "")
		return (false);
	$id_category 	= intval($id_category);
	$id_product		= intval($id_product);
	$link = get_all_data(LINK_DATA);
	if ($link === false || $link === NULL)
		return (false);
	foreach ($link as $elem)
	{
		if ($elem["id_category"] !== $id_category || $elem["id_product"] !== $id_product)
			$rt[] = $elem;
	}
	file_put_contents(LINK_DATA.".data", serialize($rt));
	return (true);
}

function	add_link_data($id_category, $id_product)
{
	if ($id_category === "" || $id_product === "")
		return (false);
	$id_category 	= intval($id_category);
	$id_product		= intval($id_product);
	if (get_data_first(CATEGORY, "id", $id_category) === false ||
		get_data_first(PRODUCT, "id", $id_product) === false)
		return (false);
	if (check_no_exist($id_category, $id_product) === false)
		return (false);
	add_data_once(LINK_DATA, "id", array(
				"id"			=> get_id(LINK_DATA),
				"id_category"	=> $id_category,
				"id_product"	=> $id_product));
	return (true);
}

function	delete_link_from_product($id)
{
	rm_data(LINK_DATA, "id_product", $id);
}

function	delete_link_from_category($id)
{
	rm_data(LINK_DATA, "id_category", $id);
}
?>
