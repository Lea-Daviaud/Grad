<?php
session_start();

$pdo = new PDO('mysql:host=localhost;dbname=nom_de_ta_base;charset=utf8', 'utilisateur', 'motdepasse');

$nom = $_POST['nom'] ?? '';
$email = $_POST['email'] ?? '';
$adresse = $_POST['adresse'] ?? '';
$panier = $_SESSION['panier'] ?? [];

if (!$nom || !$email || !$adresse || empty($panier)) {
    header('Location: commander.php');
    exit;
}

// Récupération des produits
$ids = implode(',', array_keys($panier));
$stmt = $pdo->query("SELECT * FROM produits WHERE id IN ($ids)");
$produits = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Création de la commande
$pdo->beginTransaction();
$stmt = $pdo->prepare("INSERT INTO commandes (nom, email, adresse, date_commande) VALUES (?, ?, ?, NOW())");
$stmt->execute([$nom, $email, $adresse]);
$commande_id = $pdo->lastInsertId();

// Ajout des lignes de commande
$stmt = $pdo->prepare("INSERT INTO commande_produits (commande_id, produit_id, quantite, prix_unitaire) VALUES (?, ?, ?, ?)");
foreach ($produits as $p) {
    $stmt->execute([$commande_id, $p['id'], $panier[$p['id']], $p['prix']]);
}

$pdo->commit();

// Vider le panier
unset($_SESSION['panier']);

header('Location: confirmation.php');
exit;
