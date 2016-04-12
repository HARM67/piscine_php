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
	public function		__construct( array $kwargs)
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
		return (sprintf("Vertex( x: %.2f, y: %.2f, z: %.2f, w: %.2f, color: $this->_color )", $this->_x, $this->_y, $this->_z, $this->_w));
	}
}
Vertex::$verbose = true;
$v = new Vertex(array("x" => 1, "y" => 2.0, "z" => 3, "w" => 4, "color" => new Color(array("red" => 54, "green" => 64, "blue" => 42))));
?>
