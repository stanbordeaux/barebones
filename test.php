<?php
include 'app/core/init.php';
// use app\classes\DB;

$table = 'users';
$where = ['username', '=', 'stanman'];
$user = DB::getInstance()->get($table, $where);
if ($user->count()){echo 'ole';}
varDump($user);