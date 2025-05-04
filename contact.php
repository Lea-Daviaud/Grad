<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Contact</title>
    <link rel="stylesheet" href="./CSSContact.css">
    <link rel="stylesheet" href="./CSSEntete.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJ6bJ6f8h27rYzHXELRhQYp7dTQfVjkY8YvRsaKvpoTqu0WSw1Kv1bm11rD2" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <style>
   
    </style>
</head>
<body>
<?php include "entete.php"; ?>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 col-sm-12">
                <h2 class="text-center mb-4">Contactez-nous</h2>
                <form method="POST" action="./message.php">
                    <!-- Nom -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nom" required>
                    </div>

                    <!-- Prénom -->
                    <div class="mb-3">
                        <label for="surname" class="form-label">Prénom</label>
                        <input type="text" class="form-control" id="surname" name="surname" placeholder="Prénom" required>
                    </div>

                    <!-- Code Postal et Ville -->
                    <div class="mb-3 row">
                        <label for="CPVille" class="form-label">Code Postal - Ville</label>
                        <div class="col-md-4">
                            <input type="number" class="form-control" id="CP" name="CP" placeholder="Code Postal" required>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="ville" name="ville" placeholder="Ville" required>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="abc@y.z" required>
                    </div>

                    <!-- Téléphone -->
                    <div class="mb-3">
                        <label for="tel" class="form-label">Téléphone</label>
                        <input type="tel" class="form-control" id="tel" name="tel" placeholder="XX.XX.XX.XX.XX" required>
                    </div>

                    <!-- Message -->
                    <div class="mb-3">
                        <label for="message" class="form-label">Votre message</label>
                        <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                    </div>

                    <!-- Submit Button -->
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include "piedpage.php"; ?>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
