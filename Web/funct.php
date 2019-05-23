<?php
	try
	{
	$bdd = new PDO('mysql:host=localhost;dbname=shared_server', 'sserver', 'sserver');
	}
	catch (Exception $e)
	{
	die('Erreur : ' . $e->getMessage());
	}
?>