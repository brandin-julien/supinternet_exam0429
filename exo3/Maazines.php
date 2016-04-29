<?php

require_once("config/dbconnection.php"); //appel du pdo

//class magazine permettant d'avoir les informations
class Magazines {
    function getInfo($pdo)
    {
        $stmt = $pdo->prepare('SELECT * FROM informations');
        $stmt->execute();
        return $row = $stmt->fetchAll();
    }
}