<?php
function data_exist($tab, $key, $data)
{
	if ($tab === NULL)
		return (false);
	foreach ($tab as $elem)
	{
		if ($elem[$key] === $data)
			return (true);
	}
	return (false);
}

function	get_id($file)
{
	if (file_exists($file.".id") === false)
		$i = 0;
	else
		$i = unserialize(file_get_contents($file.".id"));
	file_put_contents($file.".id", serialize($i + 1));
	return ($i);
}

function	add_data_once($file, $key, $new_data)
{
	if (file_exists($file.".data") !== false)
	{
		$tab = unserialize(file_get_contents($file.".data"));
		if ($tab !== NULL)
			if (data_exist($tab, $key, $new_data[$key]))
				return false;
	}
	$tab[] = $new_data;
	file_put_contents($file.".data", serialize($tab));
	return (true);
}

function get_all_data($file)
{
	if (file_exists($file.".data") !== false)
	{
		$tab = unserialize(file_get_contents($file.".data"));
		if ($tab === NULL)
			return (false);
		return ($tab);
	}
	return (false);
}

function get_data($file, $key, $value)
{
	if (file_exists($file.".data") !== false)
	{
		$tab = unserialize(file_get_contents($file.".data"));
		if ($tab === NULL)
			return (false);
		foreach ($tab as $elem)
		{
			if ($elem[$key] === $value)
				$rt[] = $elem;
		}
		return ($rt);
	}
	return (false);
}

function get_data_first($file, $key, $value)
{
	if (file_exists($file.".data") !== false)
	{
		$tab = unserialize(file_get_contents($file.".data"));
		if ($tab === NULL)
			return (false);
		foreach ($tab as $elem)
		{
			if ($elem[$key] === $value)
				return ($elem);
		}
	}
	return (false);
}

function	modify_data($file, $key, $value, $key2, $value2)
{
	if (file_exists($file.".data") !== false)
	{
		$tab = unserialize(file_get_contents($file.".data"));
		if ($tab === NULL)
			return (false);
		foreach ($tab as $elem)
		{
			if ($elem[$key] !== $value)
				$new_tab[] = $elem;
			else
			{
				$elem[$key2] = $value2;
				$new_tab[] = $elem;
			}
		}
		$fd = fopen($file, "w");
		flock($fd, LOCK_EX);
		file_put_contents($filei.".data", serialize($new_tab));
		flock($fd, LOCK_UN);
		fclose($fd);
		return (true);
	}
	return (false);
}

function	rm_data_all($file)
{
	if (file_exists($file.".data") !== false)
	{
		unlink($file.".data");
		return (true);
	}
	return (false);
}

function	rm_data($file, $key, $value)
{
	if (file_exists($file.".data") !== false)
	{
		$tab = unserialize(file_get_contents($file.".data"));
		if ($tab === NULL)
			return (false);
		foreach ($tab as $elem)
		{
			if ($elem[$key] !== $value)
				$new_tab[] = $elem;
		}
		$fd = fopen($file, "w");
		flock($fd, LOCK_EX);
		file_put_contents($file.".data", serialize($new_tab));
		flock($fd, LOCK_UN);
		fclose($fd);
		return (true);
	}
	return (false);
}

?>
