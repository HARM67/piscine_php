<?php
require_once("Vertex.class.php");
class	Vector
{
	private						$_x;
	private						$_y;
	private						$_z;
	private						$_w;
	public static				$verbose = false;
	public function		__construct(array $kwargs)
	{
		if (array_key_exists("orig", $kwargs))
			$orig = $kwargs["orig"];
		else
			$orig = new Vertex(array("x" => 0.0, "y" => 0.0, "z" => 0.0));
		$this->_x = $kwargs["dest"]->getX() - $orig->getX();
		$this->_y = $kwargs["dest"]->getY() - $orig->getY();
		$this->_z = $kwargs["dest"]->getZ() - $orig->getZ();
		$this->_w = 0.0;
		/*
		$this->_x = floatval($kwargs["dest"]->getX() - $orig->getX());
		$this->_y = floatval($kwargs["dest"]->getY() - $orig->getY());
		$this->_z = floatval($kwargs["dest"]->getZ() - $orig->getZ());
		$this->_w = floatval(0.0);
		 */
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
		return (sprintf("Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f )", $this->_x, $this->_y, $this->_z, $this->_w));
	}
	public function		getX()
	{
		return ($this->_x);
	}
	public function		getY()
	{
		return ($this->_y);
	}
	public function		getZ()
	{
		return ($this->_z);
	}
	public function		getW()
	{
		return ($this->_x);
	}
	public function		magnitude()
	{
		$rt = sqrt(($this->_x * $this->_x) + ($this->_y * $this->_y) + ($this->_z * $this->_z));
		return (floatval($rt));
	}
	public function		normalize()
	{
		$magn = $this->magnitude();
		$vx = new Vertex(array("x" => $this->_x / $magn, "y" => $this->_y / $magn, "z" => $this->_z / $magn));
		$rt = new Vector(array("dest" => $vx));
		return ($rt);
	}
	public function		add(Vector $rhs)
	{
		$rt = new Vector(array("dest" => new Vertex(array("x" => $this->getX() + $rhs->getX(), "y" => $this->getY() + $rhs->getY(), "z" => $this->getZ() + $rhs->getZ()))));
		return ($rt);
	}
	public function		sub(Vector $rhs)
	{
		$rt = new Vector(array("dest" => new Vertex(array("x" => $this->getX() - $rhs->getX(), "y" => $this->getY() - $rhs->getY(), "z" => $this->getZ() - $rhs->getZ()))));
		return ($rt);
	}
	public function		opposite()
	{
		$rt = new Vector(array("dest" => new Vertex(array("x" => -$this->getX(), "y" => -$this->getY(), "z" => -$this->getZ()))));
		return ($rt);
	}
	public function		scalarProduct($k)
	{
		$rt = new Vector(array("dest" => new Vertex(array("x" => $this->getX() * $k, "y" => $this->getY() * $k, "z" => $this->getZ() * $k))));
		return ($rt);
	}
	public function		dotProduct(Vector $rhs)
	{
		$rt = floatval(($this->_x * $rhs->getX()) + ($this->_y * $rhs->getY()) + ($this->_z * $rhs->getZ()));
		return ($rt);
	}
	public function		cos(Vector $rhs)
	{
		$rt = floatval($this->dotProduct($rhs) / ($this->magnitude() * $rhs->magnitude()));
		return ($rt);
	}
	public function		crossProduct(Vector $rhs)
	{
		$x = ($this->_y * $rhs->getZ()) - ($this->_z * $rhs->getY());
		$y = ($this->_z * $rhs->getX()) - ($this->_x * $rhs->getZ());
		$z = ($this->_x * $rhs->getY()) - ($this->_y * $rhs->getX());
		$rt = new Vector(array("dest" => new Vertex(array("x" => $x, "y" => $y, "z" => $z))));
		//$rt = new Vector(array("dest" => new Vertex(array("x" => -525.52, "y" => -141.77, "z" => 91.45))));

		return ($rt);
	}
	public static function		doc()
	{
		$rt = file_get_contents("Vector.doc.txt");
		if ($rt !== false)
		{
			return ($rt);
		}
		else
		{
			if (self::$verbose === true)
				print("Le fichier Vector.doc.txt n'a pas pu etre ouvert\n");
			return (false);
		}
	}
}
?>
