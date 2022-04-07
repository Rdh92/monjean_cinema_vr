<?php 
// POUR SE CONNECTER ET SE DECONNECTER avec fichier init :

// (CONNEXION AU FICHIER INIT dans le dossier INC)
require_once 'inc/init.inc.php';

// debug($_SESSION);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <!--  meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,800;1,300;1,400&family=Michroma&display=swap" rel="stylesheet">

    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="img/favicon.ico"/>

    <!-- Bootstrap ICONS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <!-- Bootstrap Bundle -->
    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Bootstrap Bundle with Popper- CDN  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
    crossorigin="anonymous"></script>

    <!-- Mes styles -->
    <link rel="stylesheet" href="css/styles.css" >

    <title>Montjean_tarifs</title>
</head>

<body>
    <!-- ====================================================== -->
    <!--  EN-TETE : header à preceder de NAVBAR en require      --> 
    <!-- ====================================================== --> 
    <?php require_once 'inc/navbar.inc.php'; ?> 
  
    <header class="container-fluid f-header p-2 mb-4 bg-light col-12 text-center">
      <div class="col-12 text-center">
        <a class="navbar-brand" href="qui_sommes_nous.php"><h1 class="display-4">Tarifs</h1></a>
        <p class="lead"></p>
       <!-- passage PHP pour tester s'il fonctionne avant de poursuivre -->
          <?php
          // $positiva = "Bon ciné !";
          // echo "<p class=\"text-green\">$positiva</p>";
        ?>
    </header>
    <!-- fin container-fluid header -->
   <!-- ====================================================== -->
    <!--                CONTAINER : contenu principal           --> 
    <!-- ====================================================== -->
    <main class="container">
    <section class="row py-5 justify-content-center">
      <div class="row mb-2">
        <div class="col-12 col-md-6 col-lg-8">
          <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
              <strong class="d-inline-block mb-2 text-primary">World</strong>
              <h3 class="mb-0">Featured post</h3>
              <div class="mb-1 text-muted">Nov 12</div>
              <p class="card-text mb-auto">o Adulte = 5.00€
                o Carte Cézam = 4.50€ <br>
                o Enfant (-16ans) = 3.50€ <br>
                - Tarifs 3D : <br>
                o Adulte = 6.00€ <br>
                o Carte Cézam = 5.50€ <br>
                o Enfant (-16ans) = 4.50€ <br>
                - Tarifs du dimanche à 11h : <br>
                o Adulte = 4.00€ <br>
                o Enfant (-16ans) = 3.00€</p>
              <a href="#" class="stretched-link">Continue reading</a>
            </div>
            <div class="col-auto d-none d-lg-block">
              <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-8">
          <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
              <strong class="d-inline-block mb-2 text-success">Design</strong>
              <h3 class="mb-0">Post title</h3>
              <div class="mb-1 text-muted">Nov 11</div>
              <p class="mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="stretched-link">Continue reading</a>
            </div>
            <div class="col-auto d-none d-lg-block">
              <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
            </div>
          </div>
        </div>
        <!-- fin col -->
    </div>
    <!-- fin row -->
</section>


      
o Adulte = 5.00€
o Carte Cézam = 4.50€
o Enfant (-16ans) = 3.50€
- Tarifs 3D :
o Adulte = 6.00€
o Carte Cézam = 5.50€
o Enfant (-16ans) = 4.50€
- Tarifs du dimanche à 11h :
o Adulte = 4.00€
o Enfant (-16ans) = 3.00€
- Le mardi c'est Cinéday, pour les abonnés Orange, une place achetée, une place offerte, voir conditions auprès de votre opérateur.
- Mode de règlement
o Carte bancaire
o Espèces
o Chèques
o Chèques vacance
o Carte de fidélité gratuite (la 12ème séance est gratuite)
- Carte d'abonnement : (à 7€ pour les adultes et 3.5€ pour les enfants)
o Adulte = Donne droit à une réduction de 1€ par place pendant un an.
o enfant = Donne droit à une réduction de 0.50€ par place pendant un an.
La carte d'abonnement et la carte de fidélité sont cumulable.
Montjean cinéma n’a rien à envié du point de vue technique aux différentes salles d’un multiplex ou autre, elle est équipée de toutes les dernières technologies possible :
- Vidéo :
o Projecteur numérique
o 2D (24 images par seconde)
o 3D avec lunette active (144 images par seconde)
- Audio :
o Analogique (2.1)
o Sons Dolby (numérique 2.1)
o Sons Dolby Digital (Numérique 5.1)
o Sons Dolby Digital (Numérique 7.1)
o Boucle magnétique pour personnes malentendantes
o 11 enceintes avec ampli intégré
o 2 Boomers
- Salle :
o 153 places assises
o 3 places handicapées (pas de marche)
o Climatisation
o Caisse informatique
o 1 distributeur de bonbons
o Sanitaires femmes, hommes et handicapés Voir moins
  </div>
  <!-- fin row -->
  </section>
  <!--  fin section row -->
</main>
<!-- fin container
  VOIR pour la transition du carrousel : https://getbootstrap.com/docs/4.3/components/carousel/#carouselcycle -->

    <!-- ====================================================== -->
    <!--                  FOOTER : en require                   --> 
    <!-- ====================================================== -->  
    <?php require_once 'inc/footer.inc.php';?> 

    <!-- ====================================================== -->
    <!--              Bootstrap Bundle with Popper              --> 
    <!-- ====================================================== -->  
    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
    crossorigin="anonymous"></script>
</body>
</html>


