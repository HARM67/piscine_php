<div class="user_log">
<?php
if (isset($_SESSION["user"]))
{
	echo htmlspecialchars($_SESSION["user"]["login"]);
?>
	<a href="index.php?page=log_out"><img src="img/cross.png"></a>
	<a href="index.php?page=see_cart"><img class="img_logo" src="img/cart_logo.jpg"></a>
<?php
}
else
{
?>
		<form method="post" action="index.php?page=log_in">
			<ul>
				<li>Login: <input type="text" name="login"/></li>
				<li>Password: <input type="password" name="passwd"/></li>
				<li><input type="submit" name="submit" value="Connection"/></li>
				<li><a href="index.php?page=signin">Sign-in</a></li>
				<a href="index.php?page=see_cart"><img class="img_logo" src="img/cart_logo.jpg"></a>
			</ul>
		</form>
<?php
}
?>

</div>
