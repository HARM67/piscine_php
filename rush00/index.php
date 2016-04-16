<?php
session_start();
include("function/include.php");
//unset($_COOKIE["cart"]);
if ($_GET["page"] === "signin")
{
	include("vue/header.php");
	include("model/signin.php");
	include("vue/footer.php");
}
else if ($_GET["page"] === "check_signin")
{
	include("vue/header.php");
	include("model/check_signin.php");
	include("vue/footer.php");
}
else if ($_GET["page"] === "see_user")
{
	include("vue/header.php");
	include("model/see_user.php");
	include("vue/footer.php");
}
else if ($_GET["page"] === "product")
{
	include("vue/header.php");
	include("model/product.php");
	include("vue/footer.php");
}
else if ($_GET["page"] === "category")
{
	include("vue/header.php");
	include("model/category.php");
	include("vue/footer.php");
}
else if ($_GET["page"] === "link_data")
{
	include("vue/header.php");
	include("model/link_data.php");
	include("vue/footer.php");
}
else if ($_GET["page"] === "validate_link")
{
	include("model/validate_link.php");
}
else if ($_GET["page"] === "unlink")
{
	include("model/unlink.php");
}
else if ($_GET["page"] === "see_product")
{
	include("vue/header.php");
	include("model/see_product.php");
	include("vue/footer.php");
}
else if ($_GET["page"] === "see_command")
{
	include("vue/header.php");
	include("model/see_command.php");
	include("vue/footer.php");
}
else if ($_GET["page"] === "see_category")
{
	include("vue/header.php");
	include("model/see_category.php");
	include("vue/footer.php");
}
else if ($_GET["page"] === "add_product")
{
	include("model/add_product.php");
}
else if ($_GET["page"] === "add_category")
{
	include("model/add_category.php");
}
else if ($_GET["page"] === "log_in")
{
	include("model/log_in.php");
}
else if ($_GET["page"] === "log_out")
{
	include("model/log_out.php");
}
else if ($_GET["page"] === "rm_user")
{
	include("model/rm_user.php");
}
else if ($_GET["page"] === "rm_product")
{
	include("model/rm_product.php");
}
else if ($_GET["page"] === "rm_category")
{
	include("model/rm_category.php");
}
else if ($_GET["page"] === "change_user")
{
	include("model/change_user.php");
}
else if ($_GET["page"] === "change_product")
{
	include("model/change_product.php");
}
else if ($_GET["page"] === "change_category")
{
	include("model/change_category.php");
}
else if ($_GET["page"] === "upload_img")
{
	include("model/upload_img.php");
}
else if ($_GET["page"] === "thanks")
{
	include("vue/header.php");
	include("vue/thanks.php");
	include("vue/footer.php");
}
else if ($_GET["page"] === "see_cart")
{
	include("vue/header.php");
	include("model/see_cart.php");
	include("vue/footer.php");
}
else if ($_GET["page"] === "homepage")
{
	include("vue/header.php");
	include("vue/footer.php");
}
else if ($_GET["page"] === "change_cart")
{
	include("model/change_cart.php");
}
else if ($_GET["page"] === "send_cart")
{
	include("model/send_cart.php");
}
else if ($_GET["page"] === "add_cart")
{
	include("model/add_cart.php");
}
else
{
	header("Location: index.php?page=category&id=0");
}
?>
