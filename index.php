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
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,400;0,600;1,400&family=Belgrano&display=swap" rel="stylesheet">

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

    <title>Montjean_index_accueil</title>
</head>

<body>

    <!-- ====================================================== -->
    <!--  EN-TETE : NAVBAR en require      --> 
    <!-- ====================================================== --> 
    
    <?php require_once 'inc/navbar.inc.php'; ?> 
   
    <!-- ====================================================== -->
    <!--              EN-TETE : header avec carousel            --> 
    <!-- ====================================================== --> 
    
  <header class="container-fluid f-header p-2 mb-4 bg-light col-12 text-center"><div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <!-- passage PHP pour tester s'il fonctionne avant de poursuivre -->
       <?php
          // $positiva = "Bon ciné !";
          // echo "<p class=\"text-green\">$positiva</p>";
        ?>
  
    <div class="container rounded">
      <h1>Bienvenue au Montjean Cinéma !</h1>
      <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" class="active" aria-current="true" aria-label="Slide 4"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="5" aria-label="Slide 6"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="6" aria-label="Slide 7"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="7" aria-label="Slide 8"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="img/printemps_du_cinema_Capture d’écran 2022-03-26 184832.png" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <!-- <h5>First slide label</h5>
              <p>Some representative placeholder content for the first slide.</p> -->
            </div>
          </div>
          <div class="carousel-item">
            <img src="affiches/batman.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>BATMAN</h5>
              <p>Some representative placeholder content for the second slide.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="affiches/permis_de_construire.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>PERMIS DE CONSTRUIRE</h5>
              <p>Some representative placeholder content for the third slide.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="affiches/goliath.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>GOLIATH</h5>
              <p>Some representative placeholder content for the third slide.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="affiches/notre_dame_brule.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>NOTRE DAME BRÛLE</h5>
              <p>Some representative placeholder content for the third slide.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="affiches/ogre.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Third slide label</h5>
              <p>Some representative placeholder content for the third slide.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="affiches/sonic2.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>SONIC 2</h5>
              <p>Some representative placeholder content for the third slide.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="affiches/morbius.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>MORBIUS</h5>
              <p>Some representative placeholder content for the third slide.</p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </ class="rounded-pill">
    <!-- fin carousel -->
  </header>
      <!-- fin container-fluid header -->
    
    <!-- ====================================================== -->
    <!--                CONTAINER : contenu principal           --> 
    <!-- ====================================================== -->
  <main class="container">
    <!-- DEBUT SECTION : A L AFFICHE -->
    <section class="py-5 text-center">
        <h2 class="fw-light">A l'affiche</h2>
        <div class="album py-5 bg-light">
            <div class="galerie justify-content-evenly">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">

                  <!-- debut div col de la galerie -->
                    <div class="col">
                        <div class="card shadow-sm m-4" style="width: 18rem;">
                            <img src="affiches/batman.jpg" class="card-img-top rounded-3" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <!-- fin col -->
                    
                    <div class="col">
                        <div class="card shadow-sm m-4" style="width: 18rem;">
                            <img src="affiches/notre_dame_brule.jpg" class="card-img-top rounded-3" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <!-- fin col -->
            
                    <div class="col">
                        <div class="card shadow-sm m-4" style="width: 18rem;">
                            <img src="affiches/ambulance.jpg" class="card-img-top rounded-3" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <!-- fin col -->
            
                    <div class="col">
                        <div class="card shadow-sm m-4" style="width: 18rem;">
                            <img src="affiches/goliath.jpg" class="card-img-top rounded-3" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <!-- fin col -->
                </div>
                <!-- fin row -->
            </div>
           <!--  fin container -->
        </div class="album py-5 bg-light">
    </section>
    <!-- FIN SECTION : A L AFFICHE -->
  </main>
  <!-- fin container  -->

  <!-- VOIR pour la transition du carrousel : https://getbootstrap.com/docs/4.3/components/carousel/#carouselcycle -->

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


