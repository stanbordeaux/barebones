<?php

namespace app\core;

class Controller {

	public function model($model)
	{
		$this->name = $model;
		if (file_exists('../app/models/' .$this->name. '.php'))
		{
			// require_once '../app/models/' .$model. '.php';
			$path = 'app\models\\' . $model;
			return new $path;
		}
		else
		{
			return  "Model does not exsist";
		}
		
	}

	public function view($view, $data = [])
	{
		require_once 'app/views/' .$view. '.php';
	}

	public function partial($view)
	{
		$path =  'app/views/templates/' .$view. '.php';
		return $path;
	}

	public function redirect($url, $permanent = false)
	{
		header('Location: '.BASE_URL. '/' .$url);
		exit();
	}
}