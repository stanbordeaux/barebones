<?php
session_start();

$GLOBALS['config'] =array(
		'mysql' =>array(
			'host' => 'localhost',
			'dbname' => 'todo',
			'username' => 'root',
			'password' => ''
		),  
		'remember' => array	(
			'cookie_name' => 'hash',
			'cookie_expiry' => 604800
		),
		'session' => array(
			'session_name' => 'user',
			'token_name' => 'token'
		),
		'pages' => array(
		'homepage' => 	'Home Page'
		),
		'verify' =>array('email')

	);


require_once 'app/functions/sanitIze.php';
require_once 'app/functions/helpers.php';

