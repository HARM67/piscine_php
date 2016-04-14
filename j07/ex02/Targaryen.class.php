<?php
class	Targaryen
{
	public function resistsFire() {
		return False;
	}
	public function		getBurned()
	{
		if (static::resistsFire() === true)
		{
			return ("emerges naked but unharmed");
		}
		else
		{
			return ("burn alive");
		}
	}
}
?>
