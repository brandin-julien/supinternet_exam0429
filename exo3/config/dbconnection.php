<?php

require_once ("dbconf.php");
global $config;
//Créaction du pdo
$pdo = new PDO('mysql:host='.$config['host'].';dbname='.$config['dbname'], $config['user'], $config['password']);

$pdo->query("SET NAMES UTF8");//Encodage UTF8

return $pdo;
