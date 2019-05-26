<?php
	try
	{
	$bdd = new PDO('mysql:host=localhost;dbname=bdd_sserver', 'sserver', 'sserver');
	}
	catch (Exception $e)
	{
	die('Erreur : ' . $e->getMessage());
	}
?>