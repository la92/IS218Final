<?php


define('DB_SERVER', 'sql2.njit.edu'); // Mysql hostname
define('DB_USERNAME', 'la92'); // Mysql username
define('DB_PASSWORD', '06CLHiUFj'); // Mysql password
define('DB_DATABASE', 'la92'); // Mysql database name


$connection = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or die(mysql_error());
$database = mysql_select_db(DB_DATABASE) or die(mysql_error());
?>
