<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=bdd_sserver','sserver','sserver') or die("not connect");
$_SESSION = array();
session_destroy();
header("Location: shared-server.php");


?>