<?php
	echo "<h1>see product</h1>";
if ($_SESSION["user"]["group"] >= 1)
{
?>
<table class="basic_table">
	<tr>
		<th>id</th>
		<th>Picture</th>
		<th>Name</th>
		<th>Price</th>
		<th>Quantity</th>
		<th>Action</th>
		<th>Image</th>
		<th>Delete</th>
	</tr>
<?php
	if ($data !== false && $data !== NULL)
		foreach($data as $elem)
		{
?>
			<tr>
			<form method="post" action="index.php?page=change_product&id=<?php echo $elem["id"]; ?>" class="form_none">
				<td><?php echo $elem['id'];?></td>
				<td><div style="background-image:url(<?php echo get_product_img($elem["id"]); ?>") class="see_product_img"></div></td>
				<td><input type="text" name="name" value="<?php echo htmlspecialchars($elem['name']);?>"/></td>
				<td><input type="number" name="price" min="0" value="<?php echo $elem['price'];?>"/></td>
				<td><input type="number" name="quantity" value="<?php echo $elem['quantity'];?>"/></td>
				<td><input type="submit" name="submit" value="Modify"/></td>
			</form>
			<form enctype="multipart/form-data" action="index.php?page=upload_img&id=<?php echo $elem["id"];?>" method="post">
				<input type="hidden" name="MAX_FILE_SIZE" value="20000000"/>
				<td><input type="file" name="picture" />
				<input type="submit" value="Upload picture" /></td>
			</form>
				<td><a href="index.php?page=rm_product&id=<?php  echo $elem["id"];?>">X</a></td>
			</tr>
<?php
		}
?>
	<tr>
		<form method="post" action="index.php?page=add_product">
			<td></td>
			<td></td>
			<td><input type="text" name="name"/></td>
			<td><input type="number" name="price" value="0"/></td>
			<td><input type="number" name="quantity" value="0"/></td>
			<td><input type="submit" name="submit" value="Insert"/></td>
			<td></td>
			<td></td>
		</form>
</tr>
</table>
<?php
}
?>
