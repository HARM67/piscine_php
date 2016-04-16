<?php
if ($_SESSION["user"]["group"] >= 1)
{
?>
<table class="basic_table">
	<tr>
		<th>Name</th>
		<th>Price</th>
		<th>Quantity</th>
		<th>Choose</th>
	</tr>
<?php
	if ($data !== false && $data !== NULL)
		foreach($data as $elem)
		{
?>
			<tr>
				<td><?php echo htmlspecialchars($elem['name']);?></td>
				<td><?php echo $elem['price'];?></td>
				<td><?php echo $elem['quantity'];?></td>
				<td><a href="index.php?page=validate_link&id_category=<?php echo $_GET["id_category"];?>&id_product=<?php  echo $elem["id"];?>">Choose</a></td>
			</tr>
<?php
		}
?>
</table>
<?php
}
?>
