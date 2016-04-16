<?php
if ($_SESSION["user"]["group"] >= 1)
$data = get_all_data(CART);
include("vue/see_command.php");
?>
