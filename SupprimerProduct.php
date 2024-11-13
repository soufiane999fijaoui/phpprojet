<?php
require_once "include/database.php";
$id = $_GET["id"];

$sqlstate = $pdo->prepare("DELETE FROM product  WHERE id = ?");
$sqlstate->execute([$id]);
header("Location: ListeProducts.php");
exit;
?>
