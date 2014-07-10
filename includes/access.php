<?php
	// Connection to the database test-blog.
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=api-cinema', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	}
	catch (Exception $e)
	{
		die('Erreur : ' . $e->getMessage());
	}
?>