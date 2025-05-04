<?php
session_start();
$id = $_POST['id'];

unset($_SESSION['panier'][$id]);
header('Location: panier.php');
exit;
