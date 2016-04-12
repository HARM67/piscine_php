<?php
class Color
{
	public						$red;
	public						$green;
	public						$blue;
	public static				$verbose = false;
	public function		__construct( array $kwargs)
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
				print("La classe color a ete correctement instanciee avec les valeurs : $this\n");
		}
		else if (self::$verbose)
		{
			print("La classe Color n'a pas pu etre instancee avec les parametres\n");
			print_r($kwargs);
		}
	}
	public function		__destruct()
	{
		if (self::$verbose === true)
			print("Une instance de classe color a ete detruite !\n");
	}
	public function		__toString()
	{
		return ("Color(red: $this->red, green: $this->green, blue: $this->blue)");
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
	public function		mult(Color	$c)
	{
		$rt = clone $this;
		$rt->red	*= $c->red;
		$rt->green	*= $c->green;
		$rt->blue	*= $c->blue;
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
Color::$verbose = false;
$c	= new Color(array("red" => 34, "green" => 65, "blue" => 76));
$c2 = $c->mult(new Color(array("red" => 10, "green" => 10, "blue" => 10)));
print($c2 . PHP_EOL);
print(Color::doc());
?>
