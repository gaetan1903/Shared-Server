<?php
session_start();
$ajouter = 0;
$suppr = 0;
$bdd = new PDO('mysql:host=localhost;dbname=bdd_sserver','sserver','sserver') or die("not connect");
if(isset($_POST['créer_groupe']))
{
    $name_new_groupe = $_POST['name_new_groupe'];
    if($_POST['ajouter']=='on')
    {
        $ajouter = 1;
    }
    else
    {
        $ajouter = 0;
    }
    if($_POST['ajouter']=='on')
    {
        $suppr = 1;
    }
    else
    {
        $suppr = 0;
    }

$insert_groupe = 
}
?>