<?php
	if (add_user($_POST["login"], $_POST["passwd"], $_POST["comfirm"], $_POST["mail"], $_POST["tel"]))
	{
		?>
		<div class="welcome_msg" >Welcome <span><?php echo $_POST[login] ?>!</span></div>
		<?php
	}
	else 
	{
		include("vue/signin.php");
	}
?>

