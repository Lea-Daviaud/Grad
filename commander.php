<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=nom_de_ta_base;charset=utf8', 'utilisateur', 'motdepasse');

$panier = $_SESSION['panier'] ?? [];

if (empty($panier)) {
    header('Location: panier.php');
    exit;
}

$ids = implode(',', array_keys($panier));
$stmt = $pdo->query("SELECT * FROM produits WHERE id IN ($ids)");
$produits = $stmt->fetchAll(PDO::FETCH_ASSOC);

function totalPanier($produits, $panier) {
    $total = 0;
    foreach ($produits as $p) {
        $total += $p['prix'] * $panier[$p['id']];
    }
    return $total;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Passer commande</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5">
    <h1 class="mb-4 text-center">Finalisez votre commande</h1>

    <form method="POST" action="valider_commande.php">
        <div class="mb-3">
            <label class="form-label">Nom complet</label>
            <input type="text" name="nom" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Adresse de livraison</label>
            <textarea name="adresse" class="form-control" rows="3" required></textarea>
        </div>

        <h4 class="mt-4">Résumé de votre commande</h4>
        <ul class="list-group mb-4">
            <?php foreach ($produits as $p): ?>
                <li class="list-group-item d-flex justify-content-between">
                    <?= htmlspecialchars($p['nom']) ?> × <?= $panier[$p['id']] ?>
                    <span><?= number_format($p['prix'] * $panier[$p['id']], 2, ',', ' ') ?> €</span>
                </li>
            <?php endforeach; ?>
            <li class="list-group-item d-flex justify-content-between fw-bold">
                Total
                <span><?= number_format(totalPanier($produits, $panier), 2, ',', ' ') ?> €</span>
            </li>
        </ul>

        <div class="text-center">
            <button type="submit" class="btn btn-success btn-lg">Valider la commande</button>
        </div>
    </form>
</div>
</body>
</html>
