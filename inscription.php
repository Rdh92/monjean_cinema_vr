<?php
// 1- POUR SE CONNECTER ET SE DECONNECTER avec fichier init, REQUIRE CONNEXION, SESSION, ETC :

// 2- (CONNEXION AU FICHIER INIT dans le dossier INC)
require_once 'inc/init.inc.php';


// debug($_SESSION);


// 3 - TRAITEMENT DU FORMULAIRE : INSERTION D'UN NOUVEAU MEMBRE - ENVOI DES INFORMATIONS A SCTOKER AVEC $_POST : 

if ( !empty($_POST) ) {
    // debug($_POST);

    // 1/ les if qui suivent vérifient si les valeurs passées dans $_POST correspondent à ce qui est attendu et autorisé en BDD 

    if ( !isset($_POST['civilite']) || $_POST['civilite'] != 'm' && $_POST['civilite'] != 'f' ) { // && ET
        $contenu .='<div class="alert alert-warning">La civilité n\'est pas valable !</div>';// 2 ex. si il n'y a rien dans le $_POST ['civilite'] OU si il contient soit 'm' et soit 'f' (qui sont les valeurs autorisées) je ne remplis pas $contenu
    }
    if ( !isset($_POST['prenom']) || strlen($_POST['prenom']) < 2 || strlen($_POST['prenom']) > 20) {
        // !isset n'est pas isset, .= concaténation puis affectation, || ou, strlen string length longueur de la chaîne de caractère
        $contenu .='<div class="alert alert-warning">Votre prénom doit faire entre 2 et 20 caractères</div>';
    }
    if ( !isset($_POST['nom']) || strlen($_POST['nom']) < 2 || strlen($_POST['nom']) > 20) {
        $contenu .='<div class="alert alert-warning">Votre nom de famille doit faire entre 2 et 20 caractères</div>';
    }

    if ( !isset($_POST['email']) || strlen($_POST['email']) > 50 || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        // filter_var() fonction prédéfinie en PHP, qui filtre une variable, et dans ce filtre on passe la constante prédéfinie (NOM DE LA CONSTANTE EST EN MAJUSCULE) qui vérifie que c'est bien au format email
        $contenu .='<div class="alert alert-warning">Votre email n\'est pas conforme !</div>';
    }

    if ( !isset($_POST['pseudo']) || strlen($_POST['pseudo']) < 4 || strlen($_POST['pseudo']) > 20) {
        $contenu .='<div class="alert alert-warning">Votre pseudo doit faire entre 4 et 20 caractères</div>';
    }

    if ( !isset($_POST['mdp']) || strlen($_POST['mdp']) < 4 || strlen($_POST['mdp']) > 20) {
        $contenu .='<div class="alert alert-warning">Votre mot de passe doit faire entre 4 et 20 caractères</div>';
    }
    if ( !isset($_POST['adresse']) || strlen($_POST['adresse']) < 4 || strlen($_POST['adresse']) > 50) {
        $contenu .='<div class="alert alert-warning">Votre adresse doit faire entre 4 et 50 caractères</div>';
    }
    if ( !isset($_POST['code_postal']) || !preg_match('#^[0-9]{5}$#', $_POST['code_postal']) ) {
        // preg_match() vérifie si la chaîne de caractère est constitué des caractères autorisés dans le premier paramètre > '#^[0-9]{5}$#'
        $contenu .='<div class="alert alert-warning">Le code postal n\'est pas valable !</div>';
    }
    if ( !isset($_POST['ville']) || strlen($_POST['ville']) < 1 || strlen($_POST['ville']) > 50) {
        $contenu .='<div class="alert alert-warning">Votre ville doit faire entre 1 et 50 caractères</div>';
    }

    if (empty($contenu)) {// si la variable qui affiche les avertissements est vide c'est qu'il n'y a aucune erreur dans $_POST
        $membre = executeRequete( " SELECT * FROM membres WHERE pseudo = :pseudo ", 
                                        array(':pseudo' => $_POST['pseudo']));// on cherche si il y a un membre avec le pseudo rentré dans $_POST

        if ($membre->rowCount() > 0) {// si au décompte de cette requête le résultat ne donne pas 0, c'est que le pseudo existe 
            $contenu .='<div class="alert alert-warning">Le pseudo est indisponible veuillez en choisir un autre !</div>';
        } else { // sinon on exécute la requête d'insertion
            $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);// On hâche le mot de passe avec la fonction prédéfinie password_hash() avec un algorithme 'bcrypt' on passe cette information en variable 

            $succes = executeRequete( " INSERT INTO membres (civilite, prenom, nom, email, pseudo, mdp, adresse, code_postal, ville, statut) VALUES (:civilite, :prenom, :nom, :email, :pseudo, :mdp, :adresse, :code_postal, :ville, 0) ",
            array(
                ':civilite' => $_POST['civilite'],
                ':prenom' => $_POST['prenom'],
                ':nom' => $_POST['nom'],
                ':email' => $_POST['email'],
                ':pseudo' => $_POST['pseudo'],
                ':mdp' => $mdp,// ici on récupère le mdp de la variable qui le contient le hash du mot de passe
                ':adresse' => $_POST['adresse'],
                ':code_postal' => $_POST['code_postal'],
                ':ville' => $_POST['ville'],
            ));

            // AJOUTER LORS DE LA MISE EN LIGNE LA FONCTION mail()

            // debug($succes);
            if ($succes) {
                $contenu .='<div class="alert alert-success">Vous êtes bien inscrit à La Boutique !<br> <a href="connexion.php">Cliquez ici pour vous connecter</a></div>';
            } else {
                $contenu .='<div class="alert alert-danger">Erreur lors de l\'inscription !</div>';
            }
        }
    }
}

// A FAIRE rajouter required sur les champs du form, puis rajouter un second champ mdp pour vérifier si le mdp saisi dans le 1er champ est identique dans le second 
?> 
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

    <title>Montjean_inscription</title>
</head>

<body>
    <!-- ====================================================== -->
    <!--  EN-TETE : navbar en require et header                 --> 
    <!-- ====================================================== --> 
    
    <?php require_once 'inc/navbar.inc.php'; ?> 
  
    <header class="container-fluid f-header p-2 mb-4 bg-light col-12 text-center">
        <div class="p-4 m-4 text-center">
            <a class="navbar-brand" href="inscription.php"><h1 class="display-4">Inscription</h1></a>
               
        <!-- passage PHP pour tester s'il fonctionne avant de poursuivre -->
                <?php
                // $positiva = "Bon ciné !";
                // echo "<p class=\"text-green\">$positiva</p>";
                ?>
        </div>
    </header>
    <!-- fin container-fluid header -->



   <div class="container">
       <div class="row pt-2 justify-content-center">
          <div class="col-6 text-center">
               <?php echo $contenu; ?>
          </div>
       </div>
        <section class="row m-4 justify-content-center">
             
            <div class="col-md-6 p-2 bg-light border border-primary">
                
                <form action="" method="POST">
                <div class="form-group mt-2">
                    <label for="civilite">Civilité *</label>
                    <input type="radio" name="civilite" value="m" checked> Homme
                    <input type="radio" name="civilite" value="f"> Femme            
                </div>
                <div class="row">
                    <div class="col form-group mt-2">
                        <label for="prenom">Prénom *</label>
                        <input type="text" name="prenom" id="prenom" value="" class="form-control" required> 
                    </div>
                    <div class="col form-group mt-2">
                        <label for="nom">Nom *</label>
                        <input type="text" name="nom" id="nom" value="" class="form-control" required>
                    </div>
                </div>
                <div class="form-group mt-2">
                    <label for="email">Email *</label>
                    <input type="text" name="email" id="email" value="" class="form-control" required>
                </div>
                <div class="form-group mt-2">
                <label for="pseudo">Choisissez un pseudo *</label>
                <input type="text" name="pseudo" id="pseudo" value="" class="form-control" required> 
            </div>
            <div class="form-group mt-2">
                <label for="mdp">Mot de passe *</label>
                <input type="password" name="mdp" id="mdp" value="" class="form-control">
            </div>
            <div class="form-group mt-2">
                <label for="adresse">Adresse</label>
                <textarea name="adresse" id="adresse" class="form-control"></textarea>
            </div>
            <div class="row">
                <div class="col form-group mt-2">
                    <label for="code_postal">Code postal</label>
                    <input type="text" name="code_postal" id="code_postal" value="" class="form-control"> 
                </div>
                <div class="col form-group mt-2">        
                    <label for="ville">Ville</label>
                    <input type="text" name="ville" id="ville" value="" class="form-control"> 
                </div>
            </div>
            <div class="form-group mt-2">
                <input type="submit" value="Inscription" class="rounded-pill btn btn-sm btn-danger"> 
            </div>
                </form>
            </div>
        <!-- fin col -->
        </section>
        <!-- fin row -->
   </div>

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