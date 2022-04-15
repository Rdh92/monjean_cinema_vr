<?php 
// POUR SE CONNECTER ET SE DECONNECTER avec fichier init :

// (CONNEXION AU FICHIER INIT dans le dossier INC)
require_once 'inc/init.inc.php';

// debug($_SESSION);
// TRAITEMENT DU FORMULAIRE : INSERTION D'UN MESSAGE - ENVOI DES INFORMATIONS A SCTOKER AVEC $_POST : 

if ( !empty($_POST) ) {
  // debug($_POST);

  // les if qui suivent vérifient si les valeurs passées dans $_POST correspondent à ce qui est attendu et autorisé en BDD 
  
  if ( !isset($_POST['prenom']) || strlen($_POST['prenom']) < 5 || strlen($_POST['prenom']) > 30) {
    $contenu .='<div class="alert alert-warning">Votre message doit être un peu plus court </div>';
}

if ( !isset($_POST['nom']) || strlen($_POST['nom']) < 5|| strlen($_POST['nom']) > 30) {
  $contenu .='<div class="alert alert-warning">Votre message doit être un peu plus court </div>';
}

  if ( !isset($_POST['email']) || strlen($_POST['email']) > 50 || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      // filter_var() fonction prédéfinie en PHP, qui filtre une variable, et dans ce filtre on passe la constante prédéfinie (NOM DE LA CONSTANTE EST EN MAJUSCULE) qui vérifie que c'est bien au format email
      $contenu .='<div class="alert alert-warning">Votre email n\'est pas conforme !</div>';
  }

  if ( !isset($_POST['message']) || strlen($_POST['message']) < 20 || strlen($_POST['message']) > 2000) {
      $contenu .='<div class="alert alert-warning">Votre message doit être un peu plus court </div>';
  }
  
  if (empty($contenu)) {// si la variable qui affiche les avertissements est vide c'est qu'il n'y a aucune erreur dans $_POST
     
          $succes = executeRequete( " INSERT INTO contact (prenom, nom, email, message) VALUES (:prenom, :nom, :email, :message) ",
          array(
              ':prenom' => $_POST['prenom'],
              ':nom' => $_POST['nom'],
              ':email' => $_POST['email'],
              ':message' => $_POST['message'],           
          ));

          // debug($succes);
          if ($succes) {
              $contenu .='<div class="alert alert-success">Merci pour votre message ! Montjean Cnéma vous répondra dans les plus brefs délas !<br> <a href="index.php">Rendez-vous à l\'accueil !</a></div>';
          } else {
              $contenu .='<div class="alert alert-danger">Il y a eu une petite erreur. Veuillez reessayer.</div>';
          }
      }
  }
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
    <section class="row text-center m-5">
      <h3>Informations et service client</h3>
      <div class="col col-lg-12 col-md-8 mx-auto">      
          <h4>Au guichet du cinéma de mercredi à dimanche de 20 h à 23 h</h4>
          <p>Adresse : Rue de l'Aumônerie 49570 Mauges-sur-Loire</p>
          <p>Par téléphone : 02 41 39 82 82</p>
          <p>Par e-email : montjean@montjean.com</p>
      </div>
    </section>

    <section class="row text-center m-5 py-5">
      <h3><?php echo $contenu; ?>Que pouvons-nous faire pour vous ?</h3>
      <h4 class="fw-light">Dites-nous tout en quelques mots !</h4>
      <div class="col-lg-8 col-md-6 mx-auto p-4" >
        <form action="" method="POST" class="form-control" class="border border-dark">
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Votre prenom</label>
            <input name="prenom" type="text" class="form-control" id="prenom" placeholder="Votre prenom">        
          </div>     

          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Votre nom</label>
            <input name="nom" type="text" class="form-control" id="nom" placeholder="Votre nom">         
          </div> 

          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Votre e-mail</label>
            <input name="email" type="email" class="form-control" id="email" placeholder="Votre email">
          </div>

          <div>
            <label for="exampleFormControlTextarea1" class="form-label">Votre message</label>
            <textarea name="message" class="form-control" id="message" rows="4"  placeholder="Votre message"></textarea>
          </div>

          <button type="submit" class="rounded-pill btn btn-sm p-2 m-2" style="background-color: rgba(58,60,220,1); color: rgba(224,228,239,1);">Envoyer votre message</button>           
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


