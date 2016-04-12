<?php
require_once("Color.class.php");
class Vertex
{
	private						$_x;
	private						$_y;
	private						$_z;
	private						$_w;
	private						$_color;
	public static				$verbose = false;
	public function		__construct(array $kwargs)
	{
		if (array_key_exists("x", $kwargs) == false || array_key_exists("y", $kwargs) == false || array_key_exists("z", $kwargs) == false)
		{
			if (self::$verbose === true)
				print("La classe Vertex ne peux pas etre instanciee avec les parametres: $this\n");
			return ;
		}
		$this->_x = floatval($kwargs["x"]);
		$this->_y = floatval($kwargs["y"]);
		$this->_z = floatval($kwargs["z"]);
		if (array_key_exists("color", $kwargs))
			$this->_color = $kwargs["color"];
		else
			$this->_color = new Color(array("red" => 255, "green" => 255, "blue" => 255));
		if (array_key_exists("w", $kwargs))
			$this->_w = floatval($kwargs["w"]);
		else
			$this->_w = 1.0;
			if (self::$verbose === true)
				print("$this constructed\n");
	}
	public function		__destruct()
	{
		if (self::$verbose === true)
			print("$this destructed\n");
	}
	public function		__toString()
	{
		if (self::$verbose === true)
			return (sprintf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f, $this->_color )", $this->_x, $this->_y, $this->_z, $this->_w));
		else
			return (sprintf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f )", $this->_x, $this->_y, $this->_z, $this->_w));
	}
	public function		__get($att)
	{
		print("No public attribute named $attin class Vertex.\n");
	}
	public function		__set($att, $value)
	{
		print("No public attribute named $attin class Vertex.\n");
		print_r($value);
	}
	public function		getX()
	{
		return ($this->_x);
	}
	public function		setX($x)
	{
		$this->_x	= floatval($x);
	}
	public function		getY()
	{
		return ($this->_y);
	}
	public function		setY($y)
	{
		$this->_y	= floatval($y);
	}
	public function		getZ()
	{
		return ($this->_z);
	}
	public function		setZ($z)
	{
		$this->_z	= floatval($z);
	}
	public function		getW()
	{
		return ($this->_x);
	}
	public function		setW($w)
	{
		$this->_w	= floatval($w);
	}
	public function		getColor()
	{
		return ($this->_color);
	}
	public function		setColor($color)
	{
		$this->_color	= $color;
	}
	public static function		doc()
	{
		$rt = file_get_contents("Vertex.doc.txt");
		if ($rt !== false)
		{
			return ($rt);
		}
		else
		{
			if (self::$verbose === true)
				print("Le fichier Vertex.doc.txt n'a pas pu etre ouvert\n");
			return (false);
		}
	}
}
?>
