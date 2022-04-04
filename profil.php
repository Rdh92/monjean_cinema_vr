<?php 
// require connexion, session etc.
require_once 'inc/init.inc.php';

// debug($_SESSION);
// debug(estConnecte());
// debug(estAdmin());

// debug(RACINE_SITE);

if (!estConnecte()) { // accès à la page autorisé quand on est connecté
    header('location:connexion.php');
}

?> 

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

    <title>Montjean_profil</title>
</head>

<body>
    <!-- ====================================================== -->
    <!--  EN-TETE : navbar en require et header                 --> 
    <!-- ====================================================== --> 
    
    <?php require_once 'inc/navbar.inc.php'; ?> 
  
    <header class="container-fluid f-header p-2 mb-4 bg-light col-12 text-center">
        <div class="p-4 m-4 text-center">
            <a class="navbar-brand" href="profil.php"><h1 class="display-4">Profil</h1></a>
               
        <!-- passage PHP pour tester s'il fonctionne avant de poursuivre -->
                <?php
                // $positiva = "Bon ciné !";
                // echo "<p class=\"text-green\">$positiva</p>";
                ?>
        </div>
    </header>
    <!-- fin container-fluid header -->

  <body class="m-2">      
      <?php require_once 'inc/navbar.inc.php'; ?>

    <header class="container bg-warning p-4">
            <h1 class="display-4">Votre profil </h1>
            <p class="lead">Bonjour <?php echo $_SESSION['membre']['prenom']; ?>
            <?php
            if(estAdmin()) { // si le membre est 'admin' il n'a pas les mêmes accès qu'un membre 'client'
                echo ' -- Vous êtes administrateur !</p>';
            } else {
                echo ' -- Vous êtes connecté ! Rendez-vous à l\'Accueil du Montjean !</p>';
            }
            ?>

            <ul class="nav nav-pills nav-fill">
            <?php 
                if(estAdmin()) { // si le membre est 'admin' il n'a pas les mêmes accès qu'un membre 'client'
                    echo '<li class="nav-item"><a class="btn btn-primary" href="' .RACINE_SITE. 'admin/accueil.admin.php">Espace admin</a></li>';
                    echo '<li class="nav-item"><a class="btn btn-success" href="' .RACINE_SITE. 'index.php">Aller à l\'Accueil du Montjean !</a></li>';
                    // echo 'coucou';
                } else {
                    echo '<li class="nav-item"><a class="btn btn-success" href="index.php">Retour à l\'Accueil du Montjean !</a></li>';
                }
                if (estConnecte()) {
                    //  echo 'coucou';
                    echo '<li class="nav-item"><a class="btn btn-secondary" href="' .RACINE_SITE. 'connexion.php?action=deconnexion">Se déconnecter</a></li>';
                }
            ?>
            </ul>
    </header>
    <div class="container">
    <section class="row m-3 justify-content-center">
        <div class="col-md-4 bg-light">²
            <div class="card" style="width: 18rem;">
                <img src="photos/" class="card-img-top img-fluid" alt="...">
                    <div class="card-body">
                    <h5 class="card-title"><?php echo $_SESSION['membre']['prenom']. ' ' .$_SESSION['membre']['nom']; ?></h5>
                    <p class="card-text">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem obcaecati sapiente ipsam minus voluptates facere dolore tempore voluptatem vitae fugit. Quod magni tempora qui quis quibusdam amet, delectus quae voluptate.
                
                    </p>
                    <a href="#" class="btn btn-primary">Test</a>
                </div>
            </div>
        </div>

        <div class="col-md-8">
        <form method="POST" action="" class="shadow p-3 mb-5 bg-body rounded">
			<h2>Mise à jour de vos informations</h2>
            <div class="row">
              <div class="col-4 form-group mt-2">
                  <label for="pseudo">Votre pseudo *</label>
                  <input type="text" name="pseudo" id="pseudo" value="<?php echo $_SESSION['membre']['pseudo']; ?>" class="form-control"> 
              </div>
            </div>
            <!-- <div class="form-group mt-2">
                <label for="mdp">Mot de passe *</label>
                <input type="password" name="mdp" id="mdp" value="" class="form-control">
                <small class="bg-warning">votre mot de passe doit contenir entre 4 et 20 caractères</small>
            </div> -->
            <div class="row">
              <div class="col-4 form-group mt-2">
                  <label for="nom">Nom *</label>
                  <input type="text" name="nom" id="nom" value="<?php echo $_SESSION['membre']['nom']; ?>" class="form-control">
              </div>
              <div class="col-4 form-group mt-2">
                  <label for="prenom">Prénom *</label>
                  <input type="text" name="prenom" id="prenom" value="<?php echo $_SESSION['membre']['prenom']; ?>" class="form-control"> 
              </div>
            <div class="col-4 form-group mt-2">
                <label for="email">Email *</label>
                <input type="email" name="email" id="email" value="<?php echo $_SESSION['membre']['email']; ?>" class="form-control">
            </div>
            </div>
            <!-- fin row  -->
            <div class="row">
              <div class="form-group mt-2">
                  <label for="civilite">Civilité *</label>
                  
                  <input type="radio" name="civilite" value="m" checked> Homme
                  <input type="radio" name="civilite" value="f"<?php if (isset($_SESSION['membre']['civilite']) && $_SESSION['membre']['civilite'] =='f') echo 'checked';?>> Femme            
              </div>
              <div class="col-4 form-group mt-2">
                  <label for="adresse">Adresse</label>
                  <textarea name="adresse" id="adresse" class="form-control"><?php echo $_SESSION['membre']['adresse']; ?></textarea>
              </div>
              <div class="col-4 form-group mt-2">
                  <label for="code_postal">Code postal</label>
                  <input type="text" name="code_postal" id="code_postal" value="<?php echo $_SESSION['membre']['code_postal']; ?>" class="form-c²ontrol"> 
              </div>
              <div class="col-4 form-group mt-2">        
                  <label for="ville">Ville</label>
                  <input type="text" name="ville" id="ville" value="<?php echo $_SESSION['membre']['ville']; ?>" class="form-control"> 
              </div>
            </div>
            <div class="form-group mt-2">
                <input type="submit" value="Mise à jour" class="btn btn-md btn-outline-success"> 
            </div>
    </form>
        </div>
    <a href="profil.php"></a>
    </section>
    </div>
   
</body>
</html>