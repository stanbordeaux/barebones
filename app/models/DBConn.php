<?php

namespace app\models;

class DBConn {

	// protected $host = 'localhost';
	// protected $db = 'todo';
	// protected $user = 'root';
	// protected $password = '';

	public function __construct()
	{
		$this->conn = new \PDO("mysql:host=localhost;dbname=todo", 'root', '');

	}
}