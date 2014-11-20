<?php
// define('BASE_PATH', realpath(dirname(__FILE__)));

function my_autoloader($class)
{
    $filename = '/library/' . str_replace('\\', '/', $class) . '.php';
    include($filename);
}
spl_autoload_register('my_autoloader');

use acme\library as acme;

