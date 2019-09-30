<?php
class Connect_bdd{
    protected function dbconnect(){
        $bdd = new PDO('mysql:host=localhost;dbname=bdd_sserver','sserver','sserver') or die('not connect');
        return $bdd;
    }
}