<?php 
	$dsn = 'mysql:host=localhost;dbname=web_bh';
	$username ="root";
	$password ="";

	try {
		$db = new PDO ($dsn, $username, $password);
	
	} catch (PDOException $e) {
		$error_message = $e -> getMessage();
		echo 'error connection';
		exit();
	}
 ?>