<?php
class Color
{
	public						$red;
	public						$green;
	public						$blue;
	public static				$verbose = false;
	public function		__construct(array $kwargs)
	{
		if (array_key_exists("rgb", $kwargs))
		{
			if (self::$verbose === true)
				print("La classe color a ete correctement instanciee avec les valeurs : $this\n");
		}
		else if (array_key_exists("red", $kwargs) && array_key_exists("green", $kwargs) && array_key_exists("blue", $kwargs))
		{
			$this->red = intval($kwargs["red"]);
			$this->green = intval($kwargs["green"]);
			$this->blue= intval($kwargs["blue"]);
			if (self::$verbose === true)
				print("$this constructed.\n");
		}
	}
	public function		__destruct()
	{
		if (self::$verbose === true)
			print("$this destructed.\n");
	}
	public function		__toString()
	{
		return (sprintf("Color( red: %3u, green: %3u, blue: %3u )", $this->red, $this->green, $this->blue));
	}
	public function		__get($att)
	{
		print("No public attribute named $attin class Color.\n");
	}
	public function		__set($att, $value)
	{
		print("No public attribute named $attin class Color.\n");
		print_r($value);
	}
	public function		add(Color	$c)
	{
		$rt = clone $this;
		$rt->red	+= $c->red;
		$rt->green	+= $c->green;
		$rt->blue	+= $c->blue;
		return ($rt);
	}
	public function		sub(Color	$c)
	{
		$rt = clone $this;
		$rt->red	-= $c->red;
		$rt->green	-= $c->green;
		$rt->blue	-= $c->blue;
		return ($rt);
	}
	public function		mult($c)
	{
		$rt = clone $this;
		$rt->red	*= $c;
		$rt->green	*= $c;
		$rt->blue	*= $c;
		return ($rt);
	}
	public static function		doc()
	{
		$rt = file_get_contents("Color.doc.txt");
		if ($rt !== false)
		{
			return ($rt);
		}
		else
		{
			if (self::$verbose === true)
				print("Le fichier Color.doc.txt n'a pas pu etre ouvert\n");
			return (false);
		}
	}
}
?>
