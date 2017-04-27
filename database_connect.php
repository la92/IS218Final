<?php 

	date_default_timezone_set('America/New_York');

	$hostname = 'sql2.njit.edu';
	$username = 'la92';
	$password = '06CLHiUFj';
	$database = 'la92';

	try{
		//$db = new PDO($dsn, $username, $password);
		$db = new PDO("mysql:host=$hostname;dbname=$database",
		$username, $password);

		echo "Successfull";
	}catch(PDOException $e){
		$error_message=$e->getMessage();
		include('Database_Error.php');
		exit();
?>
