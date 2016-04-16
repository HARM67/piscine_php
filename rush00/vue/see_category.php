<?php
	echo "<h1>see category</h1>";
if ($_SESSION["user"]["group"] >= 1)
{
?>
<table class="basic_table">
	<tr>
		<th>name</th>
		<th>Visible</th>
		<th>Action</th>
		<th>Delete</th>
	</tr><?php
	if ($data !== false && $data !== NULL)
		foreach($data as $elem)
		{?>
				<tr>
				<form method="post" action="index.php?page=change_category&id=<?php echo $elem["id"]; ?>" class="form_none">
					<td><input type="text" name="name" value="<?php echo htmlspecialchars($elem['name']);?>"/></td>
					<td><input type="checkbox" name="visible" value="on" <?php if ($elem['visible']) echo "checked='checked'";?>/></td>
					<td><input type="submit" name="submit" value="modify"/></td><?php
					if ($elem["id"] !== FALSE)
					{?>
						<td><a href="index.php?page=rm_category&id=<?php echo $elem["id"];?>">X</a></td><?php
					}
					else
					{
						echo "<td></td>";
					}?>
				</form>
				</tr>
<?php 
			
		}
?>
			<tr>
			<form method="post" action="index.php?page=add_category">
					<td><input type="text" name="name"/></td>
					<td><input type="checkbox" name="visible" value="on" checked="checked"/></td>
					<td><input type="submit" name="submit" value="insert"/></td>
			</form>
			</tr>
</table>
<?php
}
?>
