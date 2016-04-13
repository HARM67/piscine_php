<?php
require_once("Matrix.class.php");
require_once("Vertex.class.php");
require_once("Vector.class.php");
class	Camera
{
	private		$_ratio;
	private		$_near;
	private		$_fov;
	private		$_far;
	private		$_width;
	private		$_height;
	private		$_origin;
	private		$_origin_mtrx;
	private		$_view_matrix;
	private		$_projection_matrix;

	public static				$verbose = false;
	public function		__construct(array $kwargs)
	{
		$this->_fov			= $kwargs["fov"];
		$this->_near			= $kwargs["near"];
		$this->_far			= $kwargs["far"];
		$this->_origin		= $kwargs["origin"];
		$this->_origin_mtrx	= new Matrix(array("preset" => Matrix::TRANSLATION, "vtc" => (new Vector(array("dest" => $this->_origin)))->opposite()));
		$this->_orientation	= $kwargs["orientation"]->transpose();
		if (array_key_exists("ratio", $kwargs))
		{
			$this->_ratio		= $kwargs["ratio"];
		}
		else
		{
			$this->_ratio		= $kwargs["width"] / $kwargs["height"];
		}
		$this->_view_matrix = $this->_orientation->mult($this->_origin_mtrx);
		$this->_projection_matrix = new Matrix(array("preset" => Matrix::PROJECTION, "ratio" => $this->_ratio, "near" => $this->_near, "fov" => $this->_fov, "far" => $this->_far));
		if (self::$verbose === true)
			print("Camera instance constructed\n");
	}
	public function		__toString()
	{
		$rt = "Camera( \n";
		$rt .= "+ Origine: ".$this->_origin."\n";
		$rt .= "+ tT:\n".$this->_origin_mtrx."\n";
		$rt .= "+ tR:\n".$this->_orientation."\n";
		$rt .= "+ tR->mult( tT ):\n".$this->_view_matrix."\n";
		$rt .= "+ Proj:\n".$this->_projection_matrix."\n)";
		return ($rt);
	}
	public function		__destruct()
	{
		if (self::$verbose === true)
			print("Camera instance destructed\n");
	}
	public function watchVertex(Vertex $worldVertex)
	{
		$rt = $this->_view_matrix->transformVertex($worldVertex);
		$rt = $this->_projection_matrix->transformVertex($rt);
		return ($rt);
	}
	public static function		doc()
	{
		$rt = file_get_contents("Camera.doc.txt");
		if ($rt !== false)
		{
			return ($rt);
		}
		else
		{
			if (self::$verbose === true)
				print("Le fichier Camera.doc.txt n'a pas pu etre ouvert\n");
			return (false);
		}
	}
}
?>
