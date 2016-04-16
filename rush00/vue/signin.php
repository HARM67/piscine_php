<table class = "basic_table">
	<form method="post" class="tab_signin" action="index.php?page=check_signin">
		<tr>
			<td>Login</td>
			<td><input type="text" name="login" value="<?php echo $_POST["login"]?>"/></td>
		</tr>
		<tr>
			<td>Mail</td>
			<td><input type="text" name="mail"value="<?php echo $_POST["mail"]?>"/></td>
		</tr>
		<tr>
			<td>Tel</td>
			<td><input type="tel" name="tel"value="<?php echo $_POST["tel"]?>"/></td>
		</tr>
		<tr>
			<td>Password:</td>
			<td><input type="password" name="passwd"/></td>
		</tr>
		<tr>
			<td>Comfirm</td>
			<td><input type="password" name="comfirm"/></td>
		</tr>
		<tr>
			<td collapse="2"><input type="submit" name="submit" value="OK"/></td>
		</tr>
			<td>
			</td>
	</form>
</table>
