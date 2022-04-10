<?php 
// require connexion, session etc.
require_once '../inc/init.inc.php';

// ZONE DE TRAITEMENT

// debug($_GET);
// debug($_POST);
// debug($SESSION);
// debug($resultat);
// debug($suppression);
// debug($nbr_membres);
// debug($nbr_messsages);
// debug( $_SESSION['membre']['id_membre']);

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

    <title>Gabarit de Mise en page Admin</title>
</head>

<body>
   
    <!-- ====================================================== -->
    <!--  EN-TETE : NAVBAR en require      --> 
    <!-- ====================================================== --> 
    
    <?php require_once 'inc/navbar.inc.php'; ?> 

    <header class="container-fluid f-header p-2 m-2 col-12 text-center">
      <div class="col-12 text-center">
        <h1 class="">TITRE DE NIVEAU 1</h1>
        <p class="lead"></p>
        
        <!-- passage PHP pour test -->
        <?php
        // $cine = "Bon ciné !";
        // echo "<p class=\"text-primary\">$cine</p>";
        ?>

    </header>
    <!-- fin container-fluid header -->
    
    <!-- ====================================================== -->
    <!--                CONTAINER : contenu principal           --> 
    <!-- ====================================================== -->
    <main class="container mx-auto">
        <section class="row text-center m-5 py-5">
        <h2>TITRE DE NIVEAU 2</h2>
        <div class="col col-lg-12 col-md-8">
            <!-- sousnav back office -->
            <ul class="nav nav-pills nav-fill justify-content-center">
                <!-- PHP -->
            </ul>
        </div>
        </section>
        <!-- fin row --> 

        <section class="row text-center m-5 py-5">
            <h2>TITRE DE NIVEAU 2</h2>
            <div class="col col-lg-12 col-md-8">
              
            </div>
        </section>
        <!-- fin row -->
    </main>
    <!--fin container principal  -->
        
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