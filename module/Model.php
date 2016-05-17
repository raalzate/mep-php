<?php

namespace Module;


class Model 
{
	public static function insert()
	{
		return false;
	}

	public static function update()
	{
		return true;
	}

	public static function remove()
	{
		return true;
	}

	public static function gets()
	{
		return array("manzanas","mangos");
	}
}
?>