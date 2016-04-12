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
		{
			$this->_x = floatval($kwargs["dest"]->getX() - $kwargs["orig"]->getX());
			$this->_y = floatval($kwargs["dest"]->getY() - $kwargs["orig"]->getY());
			$this->_z = floatval($kwargs["dest"]->getZ() - $kwargs["orig"]->getZ());
			$this->_w = floatval(0.0);
		}
		else
		{
			$this->_x = floatval($kwargs["dest"]->getX());
			$this->_y = floatval($kwargs["dest"]->getY());
			$this->_z = floatval($kwargs["dest"]->getZ());
			$this->_w = floatval(0.0);
		}
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
		return (sprintf("Vector( x: %.2f, y: %.2f, z: %.2f, w: %.2f )", $this->_x, $this->_y, $this->_z, $this->_w));
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
		$rt = clone $this;
		$rt->_x += $rhs->_x;
		$rt->_y += $rhs->_y;
		$rt->_z += $rhs->_z;
		return ($rt);
	}
	public function		sub(Vector $rhs)
	{
		$rt = clone $this;
		$rt->_x -= $rhs->_x;
		$rt->_y -= $rhs->_y;
		$rt->_z -= $rhs->_z;
		return ($rt);
	}
	public function		opposite()
	{
		$rt = clone $this;
		$rt->_x = -$rt->_x;
		$rt->_y = -$rt->_y;
		$rt->_z = -$rt->_z;
		return ($rt);
	}
	public function		scalarProduct($k)
	{
		$rt = clone $this;
		$rt->_x *= $k;
		$rt->_y *= $k;
		$rt->_z *= $k;
		return ($rt);
	}
	public function		dotProduct(Vector $rhs)
	{
		$rt = floatval(($this->_x * $rhs->_x) + ($this->_y * $rhs->_y) + ($this->_z * $rhs->_z));
		return ($rt);
	}
	public function		cos(Vector $rhs)
	{
		$rt = floatval($this->dotProduct($rhs) / ($this->magnitude() * $rhs->magnitude()));
		return ($rt);
	}
	public function		crossProduct(Vector $rhs)
	{
		$rt = clone $this;
		$rt->_x = ($this->_y * $rhs->_z) - ($this->_z * $rhs->y);
		$rt->_y = ($this->_z * $rhs->_x) - ($this->_x * $rhs->z);
		$rt->_z = ($this->_x * $rhs->_y) - ($this->_y * $rhs->x);
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
