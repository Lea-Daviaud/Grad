<?php
session_start();

// Connexion à la base de données
$pdo = new PDO('mysql:host=localhost;dbname=grad;charset=utf8', 'root', '');

// Récupération des produits
$stmt = $pdo->query("SELECT * FROM produits");
$produits = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GRAD - Produits</title>
    <link rel="stylesheet" href="CSSPresta.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <?php include "entete.php"; ?>

    <div class="container py-5">
        <h1 class="text-center mb-4">Nos Produits</h1>

        <section class="mb-5">
            <h2 class="h3">Le bois Kebony, un matériau révolutionnaire</h2>
            <div class="row">
                <div class="col-md-8">
                    <p>Le Kebony est beaucoup plus stable que le bois massif traditionnel. Sa couleur chaude brun-rouge s’apparente à celle des essences tropicales, et évoluera vers une patine argentée qui lui gardera toute sa noblesse. Même sans aucune forme d’entretien, la longévité du Kebony est impressionnante. La société Kebony a été lauréate de nombreux et prestigieux prix pour ses innovations au service de la préservation de la ressource bois dans le cadre d’une démarche respectueuse de l’environnement.</p>
                </div>
                <div class="col-md-4">
                    <img id="img_prod" src="./ImgProd/Kebony.jpg" alt="Bois Kebony" class="img-fluid rounded shadow" data-bs-toggle="modal" data-bs-target="#modalKebony">
                </div>
            </div>
        </section>

        <section class="mb-5">
            <h2 class="h3">Le Douglas</h2>
            <div class="row">
                <div class="col-md-8">
                    <p>Grâce au profilage et à la mise en oeuvre particulière de Grad, sa résistance naturelle et sa pérennité sont encore augmentées. Le Douglas est raboté après un passage en séchoir ; cette opération alliée à son faible retrait radial lui permet d’être fixé avec le système du clip JuAn®. Note : 
                        <ul>
                            <li>La présence des noeuds confère au Douglas une apparence rustique, d’une couleur miel, proche de celle du Pin à l’état naturel.</li>
                            <li>Ce produit bénéficie d’une garantie de 5 ans.</li>
                        </ul>
                        Grad améliore de manière significative la conception des terrasses en Douglas :
                        <ul>
                            <li>Par le Clip JuAn®, les lames sont isolées de leur support.</li>
                            <li>Le dessus légèrement bombé favorise l'écoulement rapide de l'eau de pluie.</li>
                            <li>Le rapport maximal entre épaisseur et largeur est réduit de 6 à 5.</li>
                        </ul>
                        Selon les termes de la norme régissant les platelages extérieurs en bois (DTU 51-4), ces améliorations de la conception des lames permettent à celles-ci de répondre aux sollicitations de la classe 4.</p>
                </div>
                <div class="col-md-4">
                    <img id="img_prod" src="./ImgProd/douglas.jpg" alt="Douglas" class="img-fluid rounded shadow" data-bs-toggle="modal" data-bs-target="#modalDouglas">
                </div>
            </div>
        </section>

        <section class="mb-5">
            <h2 class="h3">Nos Fiches</h2>
            <div class="row">
                <div class="col-md-4">
                    <img id="fiche_prod" src="./ImgProd/FicheAccoya.jpg" alt="Fiche Accoya" class="img-fluid rounded shadow mb-4" data-bs-toggle="modal" data-bs-target="#modalFicheAccoya">
                </div>
                <div class="col-md-4">
                    <img id="fiche_prod" src="./ImgProd/FicheThermopin.jpg" alt="Fiche Thermopin" class="img-fluid rounded shadow mb-4" data-bs-toggle="modal" data-bs-target="#modalFicheThermopin">
                </div>
                <div class="col-md-4">
                    <img id="fiche_prod" src="./ImgProd/FicheThermofrene.jpg" alt="Fiche Thermofrène" class="img-fluid rounded shadow mb-4" data-bs-toggle="modal" data-bs-target="#modalFicheThermofrene">
                </div>
            </div>
        </section>
    </div>

    <!-- Modal Kebony -->
    <div class="modal fade" id="modalKebony" tabindex="-1" aria-labelledby="modalKebonyLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalKebonyLabel">Bois Kebony</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="./ImgProd/Kebony.jpg" class="img-fluid" alt="Bois Kebony">
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Douglas -->
    <div class="modal fade" id="modalDouglas" tabindex="-1" aria-labelledby="modalDouglasLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDouglasLabel">Douglas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="./ImgProd/douglas.jpg" class="img-fluid" alt="Douglas">
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Fiche Accoya -->
    <div class="modal fade" id="modalFicheAccoya" tabindex="-1" aria-labelledby="modalFicheAccoyaLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalFicheAccoyaLabel">Fiche Accoya</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="./ImgProd/FicheAccoya.jpg" class="img-fluid" alt="Fiche Accoya">
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Fiche Thermopin -->
    <div class="modal fade" id="modalFicheThermopin" tabindex="-1" aria-labelledby="modalFicheThermopinLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalFicheThermopinLabel">Fiche Thermopin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="./ImgProd/FicheThermopin.jpg" class="img-fluid" alt="Fiche Thermopin">
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Fiche Thermofrène -->
    <div class="modal fade" id="modalFicheThermofrene" tabindex="-1" aria-labelledby="modalFicheThermofreneLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalFicheThermofreneLabel">Fiche Thermofrène</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="./ImgProd/FicheThermofrene.jpg" class="img-fluid" alt="Fiche Thermofrène">
                </div>
            </div>
        </div>
    </div>




    <div class="container py-5">
        <h1 class="text-center mb-4">Nos Produits</h1>
        <div class="row g-4">

            <?php foreach ($produits as $produit): ?>
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <img src="<?= htmlspecialchars($produit['image']) ?>" class="card-img-top" alt="<?= htmlspecialchars($produit['nom']) ?>">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><?= htmlspecialchars($produit['nom']) ?></h5>
                            <p class="card-text"><?= nl2br(htmlspecialchars($produit['description'])) ?></p>
                            <p class="card-text fw-bold"><?= number_format($produit['prix'], 2, ',', ' ') ?> €</p>
                            <form method="post" action="ajouter_panier.php" class="mt-auto">
                                <input type="hidden" name="id" value="<?= $produit['id'] ?>">
                                <button type="submit" class="btn btn-primary w-100">Ajouter au panier</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>





    <?php include "piedpage.php"; ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
