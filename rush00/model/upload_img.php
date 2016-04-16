<?php
if (file_exists("img") === false)
	mkdir("img");
if (file_exists("img/product") === false)
	mkdir("img/product");
$filename = $_FILES["picture"]["tmp_name"];
move_uploaded_file($filename, "img/tmp");
imagejpeg(imagecreatefromstring(file_get_contents("img/tmp")), "img/product/".$_GET["id"].".jpg");
header("Location: index.php?page=see_product");
?>
