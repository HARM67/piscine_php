<?php
require_once("Vector.class.php");
class	Matrix
{
	const	IDENTITY	= 1;
	const	SCALE		= 2;
	const	RX			= 3;
	const	RY			= 4;
	const	RZ			= 5;
	const	TRANSLATION	= 6;
	const	PROJECTION	= 7;

	private						$_mtrx;
	public static				$verbose = false;
	public function __construct(array $kwargs)
	{
		if ($kwargs["preset"] === self::IDENTITY)
		{
			$this->_mtrx["x"] = array("vtcX" => 1.0, "vtcY" => 0.0, "vtcZ" => 0.0, "vtxO" => 0.0);
			$this->_mtrx["y"] = array("vtcX" => 0.0, "vtcY" => 1.0, "vtcZ" => 0.0, "vtxO" => 0.0);
			$this->_mtrx["z"] = array("vtcX" => 0.0, "vtcY" => 0.0, "vtcZ" => 1.0, "vtxO" => 0.0);
			$this->_mtrx["w"] = array("vtcX" => 0.0, "vtcY" => 0.0, "vtcZ" => 0.0, "vtxO" => 1.0);
			if (self::$verbose)
				print ("Matrix IDENTITY instance constructed\n");
		}
		else if ($kwargs["preset"] === self::SCALE)
		{
			$this->_mtrx["x"] = array("vtcX" => floatval($kwargs["scale"]), "vtcY" => 0.0, "vtcZ" => 0.0, "vtxO" => 0.0);
			$this->_mtrx["y"] = array("vtcX" => 0.0, "vtcY" => floatval($kwargs["scale"]), "vtcZ" => 0.0, "vtxO" => 0.0);
			$this->_mtrx["z"] = array("vtcX" => 0.0, "vtcY" => 0.0, "vtcZ" => floatval($kwargs["scale"]), "vtxO" => 0.0);
			$this->_mtrx["w"] = array("vtcX" => 0.0, "vtcY" => 0.0, "vtcZ" => 0.0, "vtxO" => 1.0);
			if (self::$verbose)
				print ("Matrix SCALE preset instance constructed\n");
		}
		else if ($kwargs["preset"] === self::RX)
		{
			$this->_mtrx["x"] = array("vtcX" => 1.0, "vtcY" => 0.0, "vtcZ" => 0.0, "vtxO" => 0.0);
			$this->_mtrx["y"] = array("vtcX" => 0.0, "vtcY" => cos(floatval($kwargs["angle"])), "vtcZ" => -sin(floatval($kwargs["angle"])), "vtxO" => 0.0);
			$this->_mtrx["z"] = array("vtcX" => 0.0, "vtcY" => sin(floatval($kwargs["angle"])), "vtcZ" => cos(floatval($kwargs["angle"])), "vtxO" => 0.0);
			$this->_mtrx["w"] = array("vtcX" => 0.0, "vtcY" => 0.0, "vtcZ" => 0.0, "vtxO" => 1.0);
			if (self::$verbose)
				print ("Matrix Ox ROTATION preset instance constructed\n");
		}
		else if ($kwargs["preset"] === self::RY)
		{
			$this->_mtrx["x"] = array("vtcX" => cos(floatval($kwargs["angle"])), "vtcY" => 0.0, "vtcZ" => sin(floatval($kwargs["angle"])), "vtxO" => 0.0);
			$this->_mtrx["y"] = array("vtcX" => 0.0, "vtcY" => 1.0, "vtcZ" => 0.0, "vtxO" => 0.0);
			$this->_mtrx["z"] = array("vtcX" => -sin(floatval($kwargs["angle"])), "vtcY" => 0.0, "vtcZ" => cos(floatval($kwargs["angle"])), "vtxO" => 0.0);
			$this->_mtrx["w"] = array("vtcX" => 0.0, "vtcY" => 0.0, "vtcZ" => 0.0, "vtxO" => 1.0);
			if (self::$verbose)
				print ("Matrix Oy ROTATION preset instance constructed\n");
		}
		else if ($kwargs["preset"] === self::RZ)
		{
			$this->_mtrx["x"] = array("vtcX" => cos(floatval($kwargs["angle"])), "vtcY" => -sin(floatval($kwargs["angle"])), "vtcZ" => 0.0, "vtxO" => 0.0);
			$this->_mtrx["y"] = array("vtcX" => sin(floatval($kwargs["angle"])), "vtcY" => cos(floatval($kwargs["angle"])), "vtcZ" => 0.0, "vtxO" => 0.0);
			$this->_mtrx["z"] = array("vtcX" => 0.0, "vtcY" => 0.0, "vtcZ" => 1.0, "vtxO" => 0.0);
			$this->_mtrx["w"] = array("vtcX" => 0.0, "vtcY" => 0.0, "vtcZ" => 0.0, "vtxO" => 1.0);
			if (self::$verbose)
				print ("Matrix Oz ROTATION preset instance constructed\n");
		}
		else if ($kwargs["preset"] === self::TRANSLATION)
		{
			$this->_mtrx["x"] = array("vtcX" => 1.0, "vtcY" => 0.0, "vtcZ" => 0.0, "vtxO" => $kwargs["vtc"]->getX());
			$this->_mtrx["y"] = array("vtcX" => 0.0, "vtcY" => 1.0, "vtcZ" => 0.0, "vtxO" => $kwargs["vtc"]->getY());
			$this->_mtrx["z"] = array("vtcX" => 0.0, "vtcY" => 0.0, "vtcZ" => 1.0, "vtxO" => $kwargs["vtc"]->getZ());
			$this->_mtrx["w"] = array("vtcX" => 0.0, "vtcY" => 0.0, "vtcZ" => 0.0, "vtxO" => 1.0);
			if (self::$verbose)
				print ("Matrix TRANSLATION preset instance constructed\n");
		}
		else if ($kwargs["preset"] === self::PROJECTION)
		{
			$tanHalfFOV = tan(deg2rad($kwargs["fov"]) / 2.0);
			$near = floatval($kwargs["near"]);
			$far = floatval($kwargs["far"]);
			$range = $near - $far;
			$this->_mtrx["x"] = array("vtcX" => 1.0 / ($tanHalfFOV * floatval($kwargs["ratio"])) , "vtcY" => 0.0, "vtcZ" => 0.0, "vtxO" => 0.0);
			$this->_mtrx["y"] = array("vtcX" => 0.0, "vtcY" => 1.0 / $tanHalfFOV, "vtcZ" => 0.0, "vtxO" => 0.0);
			$this->_mtrx["z"] = array("vtcX" => 0.0, "vtcY" => 0.0, "vtcZ" => -((-$near - $far) / $range), "vtxO" => (2.0 * $far * $near / $range));
			$this->_mtrx["w"] = array("vtcX" => 0.0, "vtcY" => 0.0, "vtcZ" => -1.0, "vtxO" => 0.0);
			if (self::$verbose)
				print ("Matrix PROJECTION preset instance constructed\n");
		}
	}
	public function		__destruct()
	{
		if (self::$verbose)
			print("Matrix instance destructed\n");
	}
	private function	_mult_one($key1, $key2, $tab1, $tab2)
	{
		$rt = 0;
		$rt = $tab1[$key1]["vtcX"] * $tab2["x"][$key2];
		$rt += $tab1[$key1]["vtcY"] * $tab2["y"][$key2];
		$rt += $tab1[$key1]["vtcZ"] * $tab2["z"][$key2];
		$rt += $tab1[$key1]["vtxO"] * $tab2["w"][$key2];
		return ($rt);
	}
	private function	_mult_vertex($key1, $tab1, $tab2)
	{
		$rt = 0;
		$rt = $tab1[$key1]["vtcX"] * $tab2->getX();
		$rt += $tab1[$key1]["vtcY"] * $tab2->getY();
		$rt += $tab1[$key1]["vtcZ"] * $tab2->getZ();
		$rt += $tab1[$key1]["vtxO"] * $tab2->getW();
		return ($rt);
	}
	public function		transpose()
	{
		$rt = clone ($this);
		$rt->_mtrx["x"]["vtcY"] = $this->_mtrx["y"]["vtcX"];
		$rt->_mtrx["x"]["vtcZ"] = $this->_mtrx["z"]["vtcX"];
		$rt->_mtrx["x"]["vtxO"] = $this->_mtrx["w"]["vtcX"];

		$rt->_mtrx["y"]["vtcX"] = $this->_mtrx["x"]["vtcY"];
		$rt->_mtrx["y"]["vtcZ"] = $this->_mtrx["z"]["vtcY"];
		$rt->_mtrx["y"]["vtxO"] = $this->_mtrx["w"]["vtcY"];

		$rt->_mtrx["z"]["vtcX"] = $this->_mtrx["x"]["vtcZ"];
		$rt->_mtrx["z"]["vtcY"] = $this->_mtrx["y"]["vtcZ"];
		$rt->_mtrx["z"]["vtxO"] = $this->_mtrx["w"]["vtcZ"];

		$rt->_mtrx["w"]["vtcX"] = $this->_mtrx["x"]["vtxO"];
		$rt->_mtrx["w"]["vtcY"] = $this->_mtrx["y"]["vtxO"];
		$rt->_mtrx["w"]["vtcZ"] = $this->_mtrx["z"]["vtxO"];
		return ($rt);
	}
	public function		mult(Matrix $rhs)
	{
		$rt  = clone ($this);
		foreach ($rt->_mtrx as $key1=>&$line)
		{
			foreach ($line as $key2=>&$col)
			{
				$col = $this->_mult_one($key1, $key2, $this->getMatrix(), $rhs->getMatrix());
			}
		}
		return ($rt);
	}
	public function		transformVertex(Vertex $vtx)
	{
		foreach ($this->getMatrix() as $key1=>$line)
		{
				$tmp[$key1] = $this->_mult_vertex($key1, $this->getMatrix(), $vtx);
		}
		return (new Vertex(array("x" => $tmp["x"], "y" => $tmp["y"],"z" => $tmp["z"],"w" => $tmp["w"])));
	}
	public function		__toString()
	{
		$rt = sprintf("M | vtcX | vtcY | vtcZ | vtxO\n");
		$rt .= sprintf("-----------------------------\n");
		$rt .= sprintf("x | %.2f | %.2f | %.2f | %.2f\n", $this->_mtrx["x"]["vtcX"],$this->_mtrx["x"]["vtcY"],$this->_mtrx["x"]["vtcZ"],$this->_mtrx["x"]["vtxO"]);
		$rt .= sprintf("y | %.2f | %.2f | %.2f | %.2f\n", $this->_mtrx["y"]["vtcX"],$this->_mtrx["y"]["vtcY"],$this->_mtrx["y"]["vtcZ"],$this->_mtrx["y"]["vtxO"]);
		$rt .= sprintf("z | %.2f | %.2f | %.2f | %.2f\n", $this->_mtrx["z"]["vtcX"],$this->_mtrx["z"]["vtcY"],$this->_mtrx["z"]["vtcZ"],$this->_mtrx["z"]["vtxO"]);
		$rt .= sprintf("w | %.2f | %.2f | %.2f | %.2f", $this->_mtrx["w"]["vtcX"],$this->_mtrx["w"]["vtcY"],$this->_mtrx["w"]["vtcZ"],$this->_mtrx["w"]["vtxO"]);
		return ($rt);
	}
	public function		getMatrix()
	{
		return ($this->_mtrx);
	}
	public static function		doc()
	{
		$rt = file_get_contents("Matrix.doc.txt");
		if ($rt !== false)
		{
			return ($rt);
		}
		else
		{
			if (self::$verbose === true)
				print("Le fichier Matrix.doc.txt n'a pas pu etre ouvert\n");
			return (false);
		}
	}
}
?>
