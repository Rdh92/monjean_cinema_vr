<?php 
// (CONNEXION AU FICHIER INIT dans le dossier INC)
require_once 'inc/init.inc.php';

// debug($_SESSION);

$requete = $pdoMJC->query( " SELECT * FROM films WHERE categorie = 'Films à l\'affiche' ORDER BY titre ASC LIMIT 4 " );
//debug($requete);
// $nbr_films = $requete->rowCount();
// debug($nbr_films); 
//debug($ligne);

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

    <title>Montjean_accueil</title>
</head>

<body>

    <!-- ====================================================== -->
    <!--               EN-TETE : NAVBAR en require              --> 
    <!-- ====================================================== --> 
    
    <?php require_once 'inc/navbar.inc.php'; ?> 
   
    <!-- ====================================================== -->
    <!--              EN-TETE : header avec carousel            --> 
    <!-- ====================================================== --> 
    
<header class="container-fluid f-header p-4 mb-4 bt-4 col-12 text-center">

  <!-- test avec passage PHP sur le carousel -->
  <?php
    // $positiva = "Bon ciné !";
    // echo "<p class=\"text-green\">$positiva</p>";
    ?>

  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="container p-3 mb-5 rounded">
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
        <!-- <div class="carousel-item">
          <a href="evenements.php"><img src="img/cine_debat_carousel.png" class="d-block w-100" alt="Affiche evenement Ciné débat"></a>         
        </div> -->
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
    <!-- DEBUT SECTION en affichage de données en PHP : A L AFFICHE -->
    <section class="text-center">
      <!-- Ici les 2 classes pour l'animation du h1 de la page accueil -->
        <h1 class="battement bouton">A l'affiche au Montjean Cinéma</h1>
        <div class="album">
          <div class="galerie justify-content-around">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">

              <!-- boucle while -->
              <?php while ( $ligne = $requete->fetch( PDO::FETCH_ASSOC )) { ?>
                                  
              <!-- debut div col de la galerie -->
              <div class="col-md-3">
                <div class="card shadow-lg m-4" style="width: 18rem;">
                  <img src="<?php echo $ligne['photo']; ?>" class="card-img-top rounded-3 img-fluid" alt="affiche du film Sonic 2022">
                  <div class="card-body">
                    <h5 class="card-title">"<?php echo $ligne['titre']; ?>"</h5>
                    <p class="card-text">"<?php echo $ligne['description']; ?>" .</p>
                    <a href="https://youtu.be/NCZTYdAP6w0" class="btn btn-light" style="color: rgba(17,13,44,1);">Voir la bande d'annonce</a>
                  </div>
                  <!-- fin div card-body -->
                </div>
                <!-- fin div card shadow -->
              </div>
              <!-- fin col -->  
            <?php } ?>
            </div>
            <!-- fin div row de la galerie -->
          </div>
          <!-- fin div galerie -->
        </div>
        <!-- fin div album -->     
    </section>
    <!-- FIN SECTION : A L AFFICHE DE L'ACCUEIL -->

    <section class="baniere bouton battement">
      <div class="col text-center">
        <div class="card card-cover h-100 overflow-hidden rounded-5 shadow-lg" style="background-color: rgba(17,13,44,1); color: rgba(224,228,239,1);">
          <div class="d-flex flex-column h-100 p-5 p-3 text-white text-shadow-1">
            <h2 class="lh-1 fw-light text-center mb-4"><a href="infos_pratiques.php">RESERVATIONS DIRECTEMENT AU GUICHET. CLIQUER ICI POUR VOIR NOS TARIFS.</a></h2>
            <h3 class="lh-1 fw-light text-center"><a href="programme.php">Pour voir le programme, c'est par ici !</a></h3>
          <div>
          </div>
        </div>
    </section>
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


