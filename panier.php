<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=nom_de_ta_base;charset=utf8', 'utilisateur', 'motdepasse');

$panier = $_SESSION['panier'] ?? [];
$produits = [];

if (!empty($panier)) {
    $ids = implode(',', array_keys($panier));
    $stmt = $pdo->query("SELECT * FROM produits WHERE id IN ($ids)");
    $produits = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

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
    <title>Votre Panier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5">
    <h1 class="text-center mb-4">Votre Panier</h1>

    <?php if (empty($panier)): ?>
        <div class="alert alert-info text-center">Votre panier est vide.</div>
    <?php else: ?>
        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>Produit</th>
                    <th>Prix</th>
                    <th>Quantité</th>
                    <th>Total</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produits as $produit): ?>
                    <tr>
                        <td><?= htmlspecialchars($produit['nom']) ?></td>
                        <td><?= number_format($produit['prix'], 2, ',', ' ') ?> €</td>
                        <td>
                            <form action="modifier_quantite.php" method="post" class="d-flex">
                                <input type="hidden" name="id" value="<?= $produit['id'] ?>">
                                <input type="number" name="quantite" value="<?= $panier[$produit['id']] ?>" min="1" class="form-control w-50 me-2">
                                <button class="btn btn-sm btn-secondary">OK</button>
                            </form>
                        </td>
                        <td><?= number_format($produit['prix'] * $panier[$produit['id']], 2, ',', ' ') ?> €</td>
                        <td>
                            <form action="supprimer_produit.php" method="post">
                                <input type="hidden" name="id" value="<?= $produit['id'] ?>">
                                <button class="btn btn-danger btn-sm">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="text-end fs-5 fw-bold">
            Total : <?= number_format(totalPanier($produits, $panier), 2, ',', ' ') ?> €
        </div>

        <div class="text-center mt-4">
            <a href="commander.php" class="btn btn-success btn-lg">Commander</a>
        </div>
    <?php endif; ?>
</div>
</body>
</html>
