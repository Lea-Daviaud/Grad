<?php
session_start();
$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $mot_de_passe = $_POST["mot_de_passe"];

    $conn = new mysqli("localhost", "root", "", "grad"); 

    if ($conn->connect_error) {
        die("Connexion échouée : " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT id, nom, mot_de_passe FROM utilisateur WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($id, $nom, $hash);
        $stmt->fetch();
        if (hash('sha256', $mot_de_passe) === $hash) {
            $_SESSION["user_id"] = $id;
            $_SESSION["user_nom"] = $nom;
            header("Location: panier.php");
            exit;
        } else {
            $message = "Mot de passe incorrect.";
        }
    } else {
        $message = "Email non trouvé.";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
     <?php include "entete.php"; ?>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center mb-4">Connexion</h2>
                <?php if ($message): ?>
                    <div class="alert alert-danger"><?= $message ?></div>
                <?php endif; ?>
                <form method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label">Adresse e-mail</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="mot_de_passe" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="mot_de_passe" name="mot_de_passe" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Se connecter</button>
                </form>
            </div>
        </div>
    </div>
     <?php include "piedpage.php"; ?>
</body>
</html>
