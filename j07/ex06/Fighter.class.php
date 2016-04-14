<?php

abstract class	Fighter
{
	private $_name;
	public function	__construct($fighter)
	{
		$this->_name = $fighter;
	}
	public function	getName()
	{
		return ($this->_name);
	}
	abstract public function	fight($target);
}
?>
