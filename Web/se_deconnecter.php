<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=espace_membres','root','') or die("not connect");
$_SESSION = array();
session_destroy();
header("Location: http://localhost/projet/Shared-Server-1/Web/shared-server.php");


?>