<div class="menu">
	<ul>
<?php
	if ($data !== false && $data !== NULL)
		foreach ($data as $elem)
		{
			echo "<li><a href=\"index.php?page=category&id=".$elem["id"]."\">".htmlspecialchars($elem["name"])."</a></li>";
		}

?>
	</ul>
<?php
	if ($_SESSION["user"]["group"] >= 1)
	{
?>
	<ul>
		<br /><li>Admin part: </li>
		<br /><li><a href="index.php?page=see_user">See User</a></li>
		<li><a href="index.php?page=see_product">See Product</a></li>
		<li><a href="index.php?page=see_category">See Category</a></li>
		<li><a href="index.php?page=see_command">See Command</a></li>
	</ul>
<?php
	}
?>
</div>
