<?php
require_once("Matrix.class.php");
require_once("Vertex.class.php");
require_once("Vector.class.php");
class	Camera
{
	private		$ratio;
	private		$near;
	private		$fov;
	private		$far;
	private		$width;
	private		$height;
	private		$origin;
	private		$origin_mtrx;
	private		$view_matrix;
	private		$projection_matrix;

	public static				$verbose = false;
	public function		__construct(array $kwargs)
	{
		$this->fov			= $kwargs["fov"];
		$this->near			= $kwargs["near"];
		$this->far			= $kwargs["far"];
		$this->origin		= $kwargs["origin"];
		$this->origin_mtrx	= new Matrix(array("preset" => Matrix::TRANSLATION, "vtc" => (new Vector(array("dest" => $this->origin)))->opposite()));
		$this->orientation	= $kwargs["orientation"]->transpose();
		if (array_key_exists("ratio", $kwargs))
		{
			$this->ratio		= $kwargs["ratio"];
		}
		else
		{
			$this->ratio		= $kwargs["width"] / $kwargs["height"];
		}
		$this->view_matrix = $this->orientation->mult($this->origin_mtrx);
		$this->projection_matrix = new Matrix(array("preset" => Matrix::PROJECTION, "ratio" => $this->ratio, "near" => $this->near, "fov" => $this->fov, "far" => $this->far));
		if (self::$verbose === true)
			print("Camera instance constructed\n");
	}
	public function		__toString()
	{
		$rt = "Camera( \n";
		$rt .= "+ Origine: ".$this->origin."\n";
		$rt .= "+ tT:\n".$this->origin_mtrx."\n";
		$rt .= "+ tR:\n".$this->orientation."\n";
		$rt .= "+ tR->mult( tT ):\n".$this->view_matrix."\n";
		$rt .= "+ Proj:\n".$this->projection_matrix."\n)";
		return ($rt);
	}
	public function		__destruct()
	{
		if (self::$verbose === true)
			print("Camera instance destructed\n");
	}
	public function watchVertex(Vertex $worldVertex)
	{
		$rt = $this->view_matrix->transformVertex($worldVertex);
		$rt = $this->projection_matrix->transformVertex($rt);
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
