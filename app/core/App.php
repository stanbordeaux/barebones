<?php

namespace app\core;

class App {

	protected $controller = 'home';
	protected $method = 'index';
	protected $params = [];

	public function __construct()
	{
		$url = $this->parseUrl();

		if (file_exists('app/controllers/' .$url[0]. '.php'))
		{
			$this->controller = $url[0];
			unset($url[0]);
		}

		// require_once '../app/controllers/' .$this->controller. '.php';
		$path = 'app\controllers\\' .$this->controller;
	
		$this->controller = new $path;

		if (isset($url[1]))
		{
			if (method_exists($this->controller, $url[1]))
			{
				$this->method = $url[1];

				unset($url[1]);
			}
		

		$this->params = $url ? array_values($url) : [ ];

		call_user_func_array(array($this->controller, $this->method), $this->params);
		}
		else
		{
		$path = 'app\controllers\home';
		$this->controller = new $path;
			call_user_func(array($this->controller, $this->method));
		}
	}

	public function parseUrl()
	{
		if (isset($_GET['url']))
		{
			return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
		}
	}
}