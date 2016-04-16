<?php
	echo "<h1>see user</h1>";
if ($_SESSION["user"]["group"] >= 1)
{
?>
<table class="basic_table">
	<tr>
		<th>Login</th>
		<th>Group</th>
		<th>Email</th>
		<th>Tel</th>
		<th>Action</th>
		<th>Delete</th>
	</tr>
<?php
	if ($data !== false && $data !== NULL)
		foreach($data as $elem)
		{
			if ($elem["id"] !== 0)
			{
?>
				<tr>
					<form method="post" action="index.php?page=change_user&id=<?php echo $elem["id"]; ?>" class="form_none">
						<td><?php echo $elem["login"]; ?></td>
<?php
						if ($_SESSION["user"]["group"] > get_data_first(USER, "id", $elem["id"])["group"])
						{?>
						<td><input type="number" min="0" name="group" value="<?php echo $elem["group"]; ?>"/></td>
<?php
						}
						else
						{
?>
						<td><?php echo $elem["group"]; ?></td>
<?php
						}?>
				
						<td><?php echo $elem["mail"]; ?></td>
						<td><?php echo $elem["tel"]; ?></td>
<?php
						if ($_SESSION["user"]["group"] > get_data_first(USER, "id", $elem["id"])["group"])
						{?>
							<td><input type="submit" name="submit" value="modify"/></td>
<?php
						}
						if ($_SESSION["user"]["group"] > get_data_first(USER, "id", $elem["id"])["group"])
						{?>
							<td><a href="index.php?page=rm_user&id=<?php echo $elem["id"];?>">X</a>
	<?php				}
						else
						{
							echo "<td></td>";
						}
?>
					</form>
				</tr>
<?php
			}
		}
?>
</table>
<?php
}
?>
