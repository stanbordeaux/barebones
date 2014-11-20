<?php

// require_once 'core/App.php';
// require_once 'core/Controller.php';
// require_once 'core/DBclass.php';
// require_once 'library/helpers.php';

spl_autoload_register(function ($class) 
{
 require_once  'app/' .$class . '.php';
});

define('BASE_URL', 'http://localhost:81/barebones/public');