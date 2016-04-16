<?php
	$data = get_all_data(USER);
	if ($data !== false)
		include "vue/see_user.php";
?>