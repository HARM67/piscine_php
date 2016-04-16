<?php
if ($_SESSION["user"]["group"] >= 1)
{
?>
<a href="index.php?page=link_data&id_category=<?php echo $_GET["id"]; ?>">Link product</a>
<?php
}
$data = get_product_by_category($_GET["id"]);
include("vue/category.php");
?>
