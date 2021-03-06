<?php 
// POUR SE CONNECTER ET SE DECONNECTER avec fichier init :

// (CONNEXION AU FICHIER INIT dans le dossier INC)
require_once 'inc/init.inc.php';

$requete = $pdoMJC->query( " SELECT * FROM films WHERE categorie = 'Films à l\'affiche' " );
    //debug($requete);
    // $nbr_films = $requete->rowCount();
    // debug($nbr_films); 
    //debug($ligne);

$newrequete = $pdoMJC->query( " SELECT * FROM films WHERE categorie = 'Films à venir' " );

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

    <title>Evènements</title>
</head>

<body>
    <!-- ====================================================== -->
    <!--  EN-TETE : header à preceder de NAVBAR en require      --> 
    <!-- ====================================================== --> 
    <?php require_once 'inc/navbar.inc.php'; ?> 
  
    <header class="container-fluid f-header p-4 mb-4 bt-4 col-12 text-center">
      <div class="col-12 text-center">
        <h1 class="">Fiche du film</h1>
        <p class="lead"></p>
    </header>
    <!-- fin container-fluid header -->
    
    <!-- ====================================================== -->
    <!--                CONTAINER : contenu principal           --> 
    <!-- ====================================================== -->

  <main class="container">
    <section class="row py-5 justify-content-center">
        <div class="container px-4 py-5" id="custom-cards">
        <h2 class="pb-2 border-bottom">Réservation uniquement sur place ! Pas de réservation en ligne</h2>
          <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
          <?php
            while ( $ligne = $requete->fetch( PDO::FETCH_ASSOC )) {
          ?>
            <div class="row">
              <div class="card card-cover overflow-hidden rounded-5 shadow-lg">
                <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1" <?php echo $ligne['id_film']; ?>">
                  <img src="<?php echo $ligne['photo']; ?>" alt="">
                  <h2 class="pt-4 mt-4 mb-3  lh-1 fw-bold"><?php echo $ligne['titre']; ?></h2>
                  <ul class="d-flex list-unstyled mt-auto">
                    <li class="me-auto">
                      <p class="h6" alt="" width="32" height="32"><?php echo $ligne['date_sortie']; ?></p>
                      <p class="h6"><?php echo $ligne['duree']; ?> .</p>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          <?php  } ?>
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