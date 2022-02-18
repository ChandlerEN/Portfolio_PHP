<?php

$db = '[p-web-portfolio]';
$host = 'localhost';
$port = '3306';
$user = 'root';
$password = '';

$pdo = new PDO("mysql:host=$host:$port;dbname=$db", $user, $password);

require_once ('includes/fonction.php');

envoi($pdo, 
        $_SESSION['sujet'], 
        $_SESSION['message'], 
        $_SESSION['email'], 
        $_SESSION['telephone'],
        $_SESSION['entreprise'], 
        $_SESSION['nom'], 
        $_SESSION['prenom']);