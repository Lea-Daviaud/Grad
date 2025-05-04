<?php
session_start();

$id = $_POST['id'];

if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = [];
}

if (isset($_SESSION['panier'][$id])) {
    $_SESSION['panier'][$id]++;
} else {
    $_SESSION['panier'][$id] = 1;
}

header('Location: produits.php');
exit;
