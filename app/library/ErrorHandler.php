<?php

namespace app\library;

class ErrorHandler {
	
	public $errors = [];

	public function addError($error, $key = null)
	{
		// echo $key;
		
		if ($key)
		{

			$this->errors[$key][] = $error;

		}
		else
		{
			$this->errors[] = $error;
		}

	}

	public function all($key = null)
	{

		return isset($this->errors[$key]) ? $this->errors[$key]  : $this->errors;
	}

	public function hasErrors()
	{
		return count($this->all()) ? true : false;
	}

	public function first($key)
	{
		return isset($this->all()[$key][0]) ? $this->all()[$key][0] : '';
	}
}