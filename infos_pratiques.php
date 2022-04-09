<?php 
// POUR SE CONNECTER ET SE DECONNECTER vec fichier init :

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

    <title>Montjean_infos_pratiques</title>
</head>

<body>
    <!-- ====================================================== -->
    <!--  EN-TETE : header à preceder de NAVBAR en require      --> 
    <!-- ====================================================== --> 
    
    <?php require_once 'inc/navbar.inc.php'; ?> 
  
<header class="container-fluid f-header p-2 mb-4">
  <div class="col-12 text-center">
        <a class="navbar-brand" href="infos_pratiques.php"><h1 class="">Informations pratiques</h1></a>
        <p class="lead"></p>
        <!-- passage PHP pour tester s'il fonctionne avant de poursuivre -->
          <?php
          // $positiva = "Bon ciné !";
          // echo "<p class=\"text-green\">$positiva</p>";
        ?>
    </div>
</header>
    <!-- fin container-fluid header -->
    
     
    <!-- ====================================================== -->
    <!--                CONTAINER : contenu principal           --> 
    <!-- ====================================================== -->
<main class="container">
  <h2>Nos services</h2>
    <div>
      <p>Montjean cinéma n’a rien à envié du point de vue technique aux différentes salles d’un multiplex ou autre, elle est équipée de toutes les dernières technologies possible :
        <ul>
          - Vidéo :
          o Projecteur numérique
          o 2D (24 images par seconde)
          o 3D avec lunette active (144 images par seconde)
          - Audio :
        </ul>

<ul>
- Audio :
o Analogique (2.1)
o Sons Dolby (numérique 2.1)
o Sons Dolby Digital (Numérique 5.1)
o Sons Dolby Digital (Numérique 7.1)
o Boucle magnétique pour personnes malentendantes
o 11 enceintes avec ampli intégré
o 2 Boomers
</ul>

<ul>
Salle :
o 153 places assises
o 3 places handicapées (pas de marche)
o Climatisation
o Caisse informatique
o 1 distributeur de bonbons
o Sanitaires femmes, hommes et handicapés Voir moins</p>
</ul>

      </div>      
      <!-- fin col -->
    </section>
    <!-- fin row -->

    <section class="row mx-auto mb-4 p-4">
    <h2 class="p-4 mb-4 mt-4">Nos tarifs (euros)</h2>  
      <div class="col-12 col-lg-4">
        <ul>
          <h3>Normal</h3>
          <li>Adulte = 5,00</li>
          <li>Carte Cézam = 4,50</li>
          <li>Enfant (-16ans) = 3,50</li>
        </ul>
      </div>
      <!-- fin col -->

      <div class="col-12 col-lg-4">
        <ul>
          <h3>3D</h3>
          <li>Adulte = 6,00</li>
          <li>Carte Cézam = 5,50</li>
          <li>Enfant (-16ans) = 4,50</li>
        </ul>
      </div>
       <!-- fin col -->

       <div class="col-12 col-lg-4">
        <ul>
          <h3>Dimanche - 11 h</h3>
          <li>Adulte = 4,00</li>
          <li>Enfant (-16ans) = 3,00</li>
        </ul>
      </div>
       <!-- fin col -->
    </section>
    <!-- fin row -->

    <section class="row p-4 mb-4 mt-4">
      <div class="justify-content-center">
        <h2 class="fw-light">Nous retrouver</h2>        
        <div class="col-12">
          <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d10804.743787052914!2d-0.8622309!3d47.3888047!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x3479c23dee996fa2!2sMontjean%20Cin%C3%A9ma!5e0!3m2!1sfr!2sfr!4v1648318885619!5m2!1sfr!2sfr" width="1200" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
      <!-- fin col -->
    </section>
    <!-- fin row -->

    <section class="col-lg-12 col-md-8 mb-4 p-4">
    <div class="container px-4 py-5" id="featured-3">
    <h2 class="pb-2 border-bottom">Columns with icons</h2>
    <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
      <div class="feature col">
        <div class="feature-icon bg-primary bg-gradient">
          <svg class="bi" width="1em" height="1em"><use xlink:href="#collection"/></svg>
        </div>
        <h2>Featured title</h2>
        <p>Paragraphe</p>
        <a href="#" class="icon-link">
          Call to action
          <svg class="bi" width="1em" height="1em"><use xlink:href="#chevron-right"/></svg>
        </a>
      </div>
      <div class="feature col">
        <div class="feature-icon bg-primary bg-gradient">
          <svg class="bi" width="1em" height="1em"><use xlink:href="#people-circle"/></svg>
        </div>
        <h2>Featured title</h2>
        <p>Paragraphe</p>
        <a href="#" class="icon-link">
          Call to action
          <svg class="bi" width="1em" height="1em"><use xlink:href="#chevron-right"/></svg>
        </a>
      </div>
      <div class="feature col">
        <div class="feature-icon bg-primary bg-gradient">
          <svg class="bi" width="1em" height="1em"><use xlink:href="#toggles2"/></svg>
        </div>
        <h2>Featured title</h2>
        <p>Paragraphe</p>
        <a href="#" class="icon-link">
          Call to action
          <svg class="bi" width="1em" height="1em"><use xlink:href="#chevron-right"/></svg>
        </a>
      </div>
    </div>
  </div>
</section>

<section>
<div class="b-example-divider"></div>

<div class="container px-4 py-5" id="hanging-icons">
  <h2 class="pb-2 border-bottom">Hanging icons</h2>
  <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
    <div class="col d-flex align-items-start">
      <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
        <svg class="bi" width="1em" height="1em"><use xlink:href="#toggles2"/></svg>
      </div>
      <div>
        <h2>Featured title</h2>
        <p>Paragraphe</p>
        <a href="#" class="btn btn-primary">
          Primary button
        </a>
      </div>
    </div>
    <div class="col d-flex align-items-start">
      <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
        <svg class="bi" width="1em" height="1em"><use xlink:href="#cpu-fill"/></svg>
      </div>
      <div>
        <h2>Featured title</h2>
        <p>Paragraphe</p>
        <a href="#" class="btn btn-primary">
          Primary button
        </a>
      </div>
    </div>
    <div class="col d-flex align-items-start">
      <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
        <svg class="bi" width="1em" height="1em"><use xlink:href="#tools"/></svg>
      </div>
      <div>
        <h2>Featured title</h2>
        <p>Paragraphe</p>
        <a href="#" class="btn btn-primary">
          Primary button
        </a>
      </div>
    </div>
  </div>
</div>
</section>
    
  </div>
  <!-- fin row -->
  </section>
  <!--  fin section row -->
</main>
<!-- fin container


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