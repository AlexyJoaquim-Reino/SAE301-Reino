<?php include('src/database/connexion.php'); ?>
<!DOCTYPE html>
<html lang="fr">
<meta name="description" content="Projet de refonte du site MMI par Reino">

<head>
  <?php include 'src/frontend/head.php'; ?>
  <title>Accueil - MMI Champs</title>
</head>

<body>
  <?php include 'src/frontend/menu.php'; ?>
  <section id="hero" class="d-flex align-items-center">

    <div class="container-fluid" data-aos="fade-up">
      <div class="row justify-content-center">
        <div class="col-xl-5 col-lg-6 pt-3 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1>BUT MMI CHAMPS</h1>
          <h2> À la recherche d'une formation ? Un étudiant MMI d'un autre IUT ?
              Un ancien élève ? Un parent ? Un enseignant ?
              Peu importe votre statut, venez découvrir le BUT MMI à l'IUT de Champs-sur-Marne !</h2>
          <div><a href="index" class="btn-get-started scrollto">Voir le programme</a></div>
        </div>

        <div class="col-xl-4 col-lg-6 order-1 order-lg-2 hero-img pl-50" data-aos="zoom-in" data-aos-delay="150">
          <img src="assets/logo/logo-but-mmi-champs-white.png" class="img-fluid animated" alt="Logo MMI">
        </div>
      </div>
    </div>

  </section>

  <section id="counts" class="counts">
    <div class="container">

      <div class="row counters">

        <div class="col-lg-3 col-6 text-center">
          <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="300" class="purecounter"></span>
          <p>Etudiants</p>
        </div>

        <div class="col-lg-3 col-6 text-center">
          <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="20" class="purecounter"></span>
          <p>Salles</p>
        </div>

        <div class="col-lg-3 col-6 text-center">
          <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="15" class="purecounter"></span>
          <p>Professeurs</p>
        </div>

        <div class="col-lg-3 col-6 text-center">
          <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="7" class="purecounter"></span>
          <p>Parcours</p>
        </div>

      </div>

    </div>
  </section>
  <main class="mb-5 container h-100">

   
  </main>

  <?php include 'src/frontend/footer.php'; ?>
</body>