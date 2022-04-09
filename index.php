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
    
<header class="container-fluid f-header p-4 mb-4 bt-4 col-12 text-center">
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="container p-3 mb-5">
    <div id="carouselExampleControls" class="carousel slide shadow-lg" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <a href="programme.php"><img src="img/affiche_carousel_bienvenue.png" class="d-block w-100" alt="Affiche de bienvenue"></a>         
        </div>
        <div class="carousel-item">
          <a href="https://video.wbdsta.net/ops/allocine/PrintempsDuCinema/PrintempsDuCinema_2.mp4"><img src="img/printemps_du_cinema_1920_1080.png" class="d-block w-100" alt="Affiche du Printemps du cinéma 2022"></a>
        </div>
        <div class="carousel-item">
          <a href="https://www.allocine.fr/article/fichearticle_gen_carticle=18708133.html"><img src="img/box_office_carousel.png" class="d-block w-100" alt="Affiche du box office - film Batman 2022"></a>         
        </div>
        <div class="carousel-item">
          <a href="https://www.allocine.fr/video/player_gen_cmedia=19586202&cfilm=248481.html?jwsource=cl"><img src="img/minions_carousel.png" class="d-block w-100" alt="Affiche du box office - film Batman 2022"></a>         
        </div>
        <div class="carousel-item">
          <a href="evenements.php"><img src="img/cine_debat_carousel.png" class="d-block w-100" alt="Affiche evenement Ciné débat"></a>         
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
  </div>
  <!-- fin container du carousel -->
</header>
  <!-- fin container-fluid header -->
    
    <!-- ====================================================== -->
    <!--                CONTAINER : contenu principal           --> 
    <!-- ====================================================== -->
  <main class="container">
    <!-- DEBUT SECTION : A L AFFICHE -->
    <section class="text-center">
      <!-- Ici les 2 classes pour l'animation du h1 de la page accueil -->
        <h1 class="fw-light battement bouton">A L'AFFICHE CHEZ MONTJEAN</h1>
        <div class="album">
            <div class="galerie justify-content-around">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">
                  <!-- debut div col de la galerie -->
                  <div class="col">
                        <div class="card shadow-lg m-4" style="width: 18rem;">
                            <img src="affiches/sonic.jpg" class="card-img-top rounded-3" alt="affiche du film Sonic 2022">
                            <div class="card-body">
                                <h5 class="card-title">Sonic</h5>
                                <p class="card-text"></p>
                                <a href="https://youtu.be/NCZTYdAP6w0" class="btn" style="color: rgba(17,13,44,1);">Voir la bande d'annonce</a>
                            </div>
                        </div>
                    </div>
                    <!-- fin col -->
                    <div class="col rounded-4">
                        <div class="card shadow-lg m-4" style="width: 18rem;">
                            <img src="affiches/goliath.jpg" class="card-img-top " alt="affiche du filme Goliath 2022">
                            <div class="card-body">
                                <h5 class="card-title">Goliath</h5>
                                <p class="card-text"></p>
                                <a href="https://youtu.be/I3gZ6Iz6yQI" class="btn" style="color: rgba(17,13,44,1);">Voir la bande d'annonce</a>
                            </div>
                        </div>
                    </div>
                    <!-- fin col -->                  
                    <div class="col">
                        <div class="card shadow-lg m-4" style="width: 18rem;">
                            <img src="affiches/notre_dame_brule.jpg" class="card-img-top rounded-3" alt="affiche du film Notre Dame brûle">
                            <div class="card-body">
                                <h5 class="card-title">Notre-Dame brûle</h5>
                                <p class="card-text"></p>
                                <a href="https://youtu.be/YlDXdPSEtgk" class="btn" style="color: rgba(17,13,44,1);">Voir la bande d'annonce</a>
                            </div>
                        </div>
                    </div>
                    <!-- fin col -->         
                    <div class="col">
                        <div class="card  shadow-lg m-4" style="width: 18rem;">
                            <img src="affiches/en_meme_temps.jpg" class="card-img-top rounded-3" alt="affiche du film En même temps">
                            <div class="card-body">
                                <h5 class="card-title">En même temps</h5>
                                <p class="card-text"></p>
                                <a href="https://youtu.be/M_ZsmTnkIPk"  class="btn" style="color: rgba(17,13,44,1);">Voir la bande d'annonce</a>
                            </div>
                        </div>
                    </div>
                    <!-- fin col -->
                </div>
                <!-- fin row -->
            </div>
           <!--  fin container -->
        </div class="album py-5">
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


