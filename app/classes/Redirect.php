<?php

namespace app\classes;

class Redirect {

	public static function to($location = null)
	{
		if($location)
		{
			header('Location: ' .$location);
			exit();
		}
	}

	public static function from($location = null)
	{
		header('Location: ' . $_SERVER['HTTP_REFERER']);
		exit();
	}


}