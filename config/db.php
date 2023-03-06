<?php

$host = 'localhost';
$dbname = 'agenda';
$user = 'root';
$pass = "";


try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    $error = $e->getMessage();
    echo "Erro : $error";
}
