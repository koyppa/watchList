<?php
	$server = "localhost";
	$login = "root";
	$password = "root";
	$db = "watchlist";

	//Connexion au serveur MySQL
	try
	{
		$linkpdo = new PDO("mysql:host=localhost;dbname=watchlist", $login, $password);
	}
	catch (Exception $e)
	{
		die('Error : '.$e->getMessage());
	}
?>