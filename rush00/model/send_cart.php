<?php
if ($_SESSION["user"]["group"] === 0)
{
	send_cart(CART);
	header("Location: index.php?page=thanks");
}
else
{
	header("Location: index.php?page=see_cart");
}
?>
