<?php
require_once "include/database.php";
$id = $_GET["id"];
$pdo->prepare("DELETE FROM product WHERE id_categorie = ?")->execute([$id]);
$sqlstate = $pdo->prepare("DELETE FROM categorie WHERE id = ?");
$sqlstate->execute([$id]);
header("Location: ListeCategories.php");
exit;
?>
