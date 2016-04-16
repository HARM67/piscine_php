<?php	
	
	if ($data !== false && $data !== NULL)
	{
		echo "<h1>".get_data_first(CATEGORY, "id", intval($_GET["id"]))["name"]."</h1>";
		echo "<br/>";
		echo "<div class=\"products_list\">";
		foreach($data as $elem)
		{
?>
			<div class="product_list">
				<?php
				echo "<div style=\"background-image:url(".get_product_img($elem["id"]).");\" class=\"product_list_img\"></div>";
?>
				<div class="product_list_info">
					<?php echo htmlspecialchars($elem['name']);?>
					<br/>
<?php
				if (isset($_SESSION["user"]) === false || $_SESSION["user"]["group"] === 0)
				{
?>
					<a href="index.php?page=add_cart&id=<?php  echo $elem["id"];?>">Add cart!</a>
<?php
				}
				else
				{
?>
					<a href="index.php?page=unlink&id_category=<?php echo $_GET["id"];?>&id_product=<?php  echo $elem["id"];?>">Unlink</a>
<?php
				}
?>

				</div>
			</div>
<?php 
		}
		echo "</div>";
	}
?>
