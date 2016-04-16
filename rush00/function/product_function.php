<?php
function	get_product_by_category($id_category)
{
	if ($id_category === "")
		return (false);
	$link = get_data(LINK_DATA, "id_category", intval($id_category));
	if ($link === false || $link === NULL)
		return (false);
	foreach ($link as $elem)
	{
		$rt[] = get_data_first(PRODUCT, "id", intval($elem["id_product"]));
	}
	return ($rt);
}

function	add_product($name, $price, $quantity)
{
	if ($name === "" || $price === "" || $quantity === "")
		return (false);
	if (is_numeric($price) === false || is_numeric($quantity) === false)
		return (false);
	$price = intval($price);
	$quantity = intval($quantity);
	add_data_once(PRODUCT, "name", array(
				"id"		=> get_id(PRODUCT),
				"name"		=> $name,
				"price"		=> $price,
				"quantity"	=> $quantity
			));
	return (true);
}

function	get_product_img($id)
{
	if (file_exists("img/product/".$id.".jpg"))
		$img = "img/product/".$id.".jpg";
	else
		$img = "img/default.gif";
	return ($img);
}

function	change_product($name, $price, $quantity)
{
	if ($name === "" || $price === "" || $quantity === "")
		return (false);
	if (is_numeric($price) === false || is_numeric($quantity) === false)
		return (false);
	$price = intval($price);
	$quantity = intval($quantity);
	if (file_exists(PRODUCT.".data") !== false)
	{
		$tab = unserialize(file_get_contents(PRODUCT.".data"));
		foreach ($tab as &$elem)
		{
			if (intval($_GET["id"]) === $elem["id"])
			{
 				$elem["name"]		= $name;
				$elem["price"]		= $price;
				$elem["quantity"]	= $quantity;
			}
		}
	}
	file_put_contents(PRODUCT.".data", serialize($tab));
	return (true);
}
?>
