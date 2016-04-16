<?php
function	send_cart($file)
{
	if (isset($_COOKIE["cart"]) === false|| $_COOKIE["cart"] == "N;")
		return (false);
	if (file_exists($file.".data") !== false)
	{
		$tab = unserialize(file_get_contents($file.".data"));
	}
	$tab[] = array("id" => get_id(CART), "data" => unserialize($_COOKIE["cart"]));
	if (file_put_contents($file.".data", serialize($tab)))
	{
		setcookie("cart", NULL, 0);
		unset($_COOKIE["cart"]);
	}
}


function	add_in_cart($id_product)
{
	if ($id_product=== "")
		return (false);
	if (is_numeric($id_product) === false)
		return (false);
	$temoin = 0;
	$id_product = intval($id_product);
	if (isset($_COOKIE["cart"]) !== false)
	{
		$tab = unserialize($_COOKIE["cart"]);
		if ($tab !== NULL)
			foreach ($tab as $elem)
			{
				if ($elem["id"] !== $id_product)
					$rt[] = $elem;
				else
				{
					$elem["quantity"]++;
					$rt[] = $elem;
					$temoin = 1;
				}
			}
	}
	if ($temoin === 0)
		$rt[] = array("id" => $id_product, "quantity" => 1);
	setcookie("cart", serialize($rt));
	return (true);
}

function	rm_in_cart($id_product)
{
	if ($id_product=== "")
		return (false);
	if (is_numeric($id_product) === false)
		return (false);
	$id_product = intval($id_product);
	if (isset($_COOKIE["cart"]) !== false)
	{
		$tab = unserialize($_COOKIE["cart"]);
		if ($tab !== NULL)
			foreach ($tab as $elem)
			{
				if ($elem["id"] !== $id_product)
					$rt[] = $elem;
				else
				{
					$elem["quantity"]--;
					if ($elem["quantity"] >= 1)
						$rt[] = $elem;
				}
			}
	}
	setcookie("cart", serialize($rt));
	return (true);
}

function	get_cart()
{
	if (isset($_COOKIE["cart"]))
	{
		$tab = unserialize($_COOKIE["cart"]);
		if ($tab !== false && $tab !== NULL)
			return ($tab);
	}
	return (false);
}

function	remove_from_cart()
{

}

?>
