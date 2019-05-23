<?php
session_start();

$bdd = new PDO('mysql:host=192.168.150.119;dbname=sshared','root','__sshared__!!') or die("not connect");
$_SESSION = array();
session_destroy();
header("Location: http://192.168.150.119/Shared-Server-1/Web/shared-server.php");


?>