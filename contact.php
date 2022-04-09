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

    <title>Montjean_contact</title>
</head>

<body>
    <!-- ====================================================== -->
    <!--  EN-TETE : header à preceder de NAVBAR en require      --> 
    <!-- ====================================================== --> 
    <?php require_once 'inc/navbar.inc.php'; ?> 
  
    <header class="container-fluid f-header p-2 m-2 col-12 text-center" style="background-image: url('img/background_peliculle_gris.png');">
      <div class="col-12 text-center">
        <h1 class="">Restons en contact !</h1>
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
    <section class="row text-center m-5 py-5">
      <h3>Informations et service client</h3>
      <div class="col col-lg-12 col-md-8 mx-auto">      
          <h4>Au guichet du cinéma de mercredi à dimanche de 20 h à 23 h</h4>
          <p>Adresse : Rue de l'Aumônerie 49570 Mauges-sur-Loire</p>
          <p>Par téléphone : 02 41 39 82 82</p>
          <p>Par e-email : montjean@montjean.com</p>
      </div>
    </section>

    <section class="row justify-content-evenly m-5 py-5">   
      <div class="col-lg-6 col-md-8 mx-auto border border-light">
        <h4 class="fw-light"></h4>        
        <form action="">
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Que pouvons-nous faire pour vous ? Dites-nous tout en quelques mots !</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Votre e-mail</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            <button type="submit" class="rounded-pill btn btn-sm p-2 m-2" style="background-color: rgba(58,60,220,1); color: rgba(224,228,239,1);">Envoyer votre message</button>         
          </div>      
        </form>
      </div>
      <!-- fin col -->
    </section>
    <!--  fin row -->
  </main>
  <!-- fin container -->

  <!-- VOIR pour la transition du carrousel : https://getbootstrap.com/docs/4.3/components/carousel/#carouselcycle  -->

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


