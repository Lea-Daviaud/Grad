<!-- HEADER / NAVBAR -->
<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm py-3">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center" href="./index.php">
        <img src="./ImgCommun/Logo Grad.jpg" alt="Logo GRAD" width="60" class="me-2">
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link text-dark fw-semibold" href="./index.php">Accueil</a></li>
          <li class="nav-item"><a class="nav-link text-dark fw-semibold" href="./prestations.php">Nos prestations</a></li>
          <li class="nav-item"><a class="nav-link text-dark fw-semibold" href="./produits.php">Nos produits</a></li>
          <li class="nav-item"><a class="nav-link text-dark fw-semibold" href="./rea.php">Nos réalisations</a></li>
          <li class="nav-item"><a class="nav-link text-dark fw-semibold" href="./contact.php">Contact</a></li>
          <li class="nav-item"><a class="nav-link text-dark fw-semibold" href="./panier.php">Panier</a></li>

<!-- Vérification de la session pour afficher Connexion/Deconnexion -->
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['user_id'])) {
    echo '<li class="nav-item"><a class="nav-link text-dark fw-semibold" href="./deconnexion.php">Se déconnecter</a></li>';
} else {
    echo '<li class="nav-item"><a class="nav-link text-dark fw-semibold" href="./login.php">Se connecter</a></li>';
}
?>
        </ul>
      </div>
    </div>
  </nav>
</header>


  <!-- ENTETE AVEC IMAGE ET TITRE -->
<section class="position-relative">
  <img src="./ImgCommun/entete01.jpg" alt="Bannière GRAD" class="img-fluid w-100" style="max-height: 400px; object-fit: cover;">
  <div class="position-absolute top-50 start-50 translate-middle text-white text-center">
    <h1 class="display-4 fw-bold text-shadow">GRAD</h1>
  </div>
</section>
