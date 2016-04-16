<?php
function	add_root_user()
{
	if (add_data_once(USER, "login",
							array(	"id"		=> get_id(USER),
									"login"		=> "root",
									"passwd"	=> hash("whirlpool", "root"),
									"group"		=> 5,
								)))
	{
		return (true);
	}
	else
	{
		return (false);
	}
}

function	change_user($id, $group)
{
	if ($id === "" || $group === "")
		return (false);
	$id = intval($id);
	$group = intval($group);
	if ($group >= $_SESSION["user"]["group"])
		return (false);
	if (file_exists(USER.".data") !== false)
	{
		$tab = unserialize(file_get_contents(USER.".data"));
		foreach ($tab as &$elem)
		{
			if ($id === $elem["id"])
			{
				$elem["group"]	= $group;
			}
		}
	}
	file_put_contents(USER.".data", serialize($tab));
	return (true);
}

function	add_user($login, $passwd, $comfirm, $mail, $tel)
{
	if ($login === "" || $passwd === "" || $mail === "" || $tel === "")
		return (false);

	if (preg_match("/^[a-zA-Z\-\_0-9\.]+\@[a-zA-Z\-\_0-9\.]+\.[a-zA-Z]{2,}$/", $mail) == 0)
	{
		$GLOBALS["err_mail"] = 1;
		return (false);
	}
	if ($passwd !== $comfirm)
	{
		return (false);
	}
	if (preg_match("/^[0-9]{10}$/", $tel) == 0)
	{
		return (false);
	}
	$passwd = hash("whirlpool", $passwd);
	if (add_data_once(USER, "login",
							array(	"id"		=> get_id(USER),
									"login"		=> $login,
									"passwd"	=> $passwd,
									"group"		=> 0,
									"mail"		=> $mail,
									"tel"		=> $tel,
								)))
	{
		return (true);
	}
	else
	{
		return (false);
	}
}

?>
