<?php
include "function/define.php";
include "function/include.php";
include "vue/header.php";
if (file_exists(database) === false)
{
	mkdir(database);
}
if (file_exists(USER.".data") !== false)
	unlink(USER.".data");
if (file_exists(USER.".id") !== false)
	unlink(USER.".id");
echo "user list clean<br/>";
if (add_root_user())
	echo "root user is set with 'root' password<br/>";
if (file_exists(PRODUCT.".data") !== false)
	unlink(PRODUCT.".data");
if (file_exists(PRODUCT.".id") !== false)
	unlink(PRODUCT.".id");

echo "product list clean<br/>";
if (file_exists(CATEGORY.".data") !== false)
	unlink(CATEGORY.".data");
if (file_exists(CATEGORY.".id") !== false)
	unlink(CATEGORY.".id");
echo "category list clean<br/>";
if (file_exists(LINK_DATA.".data") !== false)
	unlink(LINK_DATA.".data");
if (file_exists(LINK_DATA.".id") !== false)
	unlink(LINK_DATA.".id");
if (add_category("home", "on"))
	echo "category list clean<br/>";
include "vue/footer.php";
?>
