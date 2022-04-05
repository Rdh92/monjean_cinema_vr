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

    <title>Montjean Cinéma</title>
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
    </div>
    <!-- fin jumbotron -->

    <div class="container rounded mt-5">
      <h1>Bienvenue au Montjean Cinéma !</h1>

      <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/printemps_du_cinema_Capture d’écran 2022-03-26 184832.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/batman_686_356.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/box_office.png" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
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
        <div class="album py-5">
            <div class="galerie justify-content-evenly">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">

                  <!-- debut div col de la galerie -->
                    <div class="col">
                        <div class="card shadow-sm m-4" style="width: 18rem;">
                            <img src="affiches/goliath.jpg" class="card-img-top rounded-3" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Goliath</h5>
                                <p class="card-text"></p>
                                <a href="#" class="btn btn-light">Voir la bande d'annonce</a>
                            </div>
                        </div>
                    </div>
                    <!-- fin col -->
                    
                    <div class="col">
                        <div class="card shadow-sm m-4" style="width: 18rem;">
                            <img src="affiches/notre_dame_brule.jpg" class="card-img-top rounded-3" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Notre-Dame brûle</h5>
                                <p class="card-text"></p>
                                <a href="#" class="btn">Voir la bande d'annonce</a>
                            </div>
                        </div>
                    </div>
                    <!-- fin col -->
            
                    <div class="col">
                        <div class="card shadow-sm m-4" style="width: 18rem;">
                            <img src="affiches/em_meme_temps.jpg" class="card-img-top rounded-3" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">En même temps</h5>
                                <p class="card-text"></p>
                                <a href="#" class="btn btn-light">Voir la bande d'annonce</a>
                            </div>
                        </div>
                    </div>
                    <!-- fin col -->
            
                    <div class="col">
                        <div class="card shadow-sm m-4" style="width: 18rem;">
                            <img src="affiches/ogre.jpg" class="card-img-top rounded-3" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Ogre</h5>
                                <p class="card-text"></p>
                                <a href="#" class="btn btn-light">Voir la bande d'annonce</a>
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


