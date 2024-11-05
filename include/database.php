<?php
$dsn = 'mysql:host=localhost;dbname=phpprojet;charset=utf8'; 
$username = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>
