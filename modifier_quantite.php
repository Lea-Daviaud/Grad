<?php
session_start();
$id = $_POST['id'];
$quantite = max(1, (int)$_POST['quantite']);

$_SESSION['panier'][$id] = $quantite;
header('Location: panier.php');
exit;
