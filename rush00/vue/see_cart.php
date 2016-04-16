<?php
	echo "<h1>Cart</h1>";
	echo "<br/>";
	echo "<div class=\"products_list\">";
if ($_SESSION["user"]["group"] <= 1)
{
?>
	<table class="basic_table">
		<tr>
			<th>Product name</th>
			<th>Quantity</th>
			<th>Change</th>
		</tr><?php
		if ($data !== false && $data !== NULL)
			foreach($data as $elem)
			{?>
					<form method="post" action="index.php?page=change_cart&id=<?php echo $elem["id"]; ?>" class="form_none">
						<tr>
							<td><?php echo htmlspecialchars(get_data_first(PRODUCT, "id", $elem['id'])[name]);?></td>
							<td><?php echo $elem["quantity"];?></td>
							<td><input type="submit" name="action" value="+"/>
							<input type="submit" name="action" value="-"/></td>
						</tr>
					</form>
	<?php 
			}
	?>
		<tr>
			<td collspan="3">
				<a href="index.php?page=send_cart">Send cart</a>
			</td>
		</tr>
	</table>
<?php
}
?>
