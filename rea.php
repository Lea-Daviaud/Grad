<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GRAD - Réalisations</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./CSSrea.css" type="text/css">
</head>

<body>
    <?php 
        include "entete.php";
        $dossier = "./ImgRealisations";
        $images = scandir($dossier);
    ?>
    <div class="container py-5">
        <h1 class="text-center mb-4">Nos Réalisations</h1>
        <div class="row">
            <?php 
                // Parcours des images et affichage avec Bootstrap Grid
                foreach ($images as $image) {
                    if ($image != "." && $image != "..") {
                        $imagePath = "./ImgRealisations/" . $image;
                        echo "
                        <div class='col-md-4 mb-4'>
                            <img src='$imagePath' alt='$image' class='img-fluid rounded shadow' data-bs-toggle='modal' data-bs-target='#modal$image'>
                        </div>
                        ";
                    }
                }
            ?>
        </div>
    </div>

    <!-- Modals Bootstrap pour afficher les images en plein écran -->
    <?php 
        foreach ($images as $image) {
            if ($image != "." && $image != "..") {
                $imagePath = "./ImgRealisations/" . $image;
                echo "
                <div class='modal fade' id='modal$image' tabindex='-1' aria-labelledby='modalLabel$image' aria-hidden='true'>
                    <div class='modal-dialog modal-dialog-centered modal-lg'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h5 class='modal-title' id='modalLabel$image'>$image</h5>
                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                            </div>
                            <div class='modal-body'>
                                <img src='$imagePath' class='img-fluid' alt='$image'>
                            </div>
                        </div>
                    </div>
                </div>
                ";
            }
        }
    ?>

    <?php include "piedpage.php"; ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
