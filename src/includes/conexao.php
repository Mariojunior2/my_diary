<?php 
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "my_diary"; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Erro em conectar com o banco". $e->getMessage());
}


?>