<?php 
// 1- POUR SE CONNECTER ET SE DECONNECTER
require_once 'inc/init.inc.php';
debug($_SESSION);

// 2- DÉCONNEXION DU MEMBRE
// debug($_GET);
$message = '';
if (isset($_GET['action']) && $_GET['action'] == 'deconnexion') { // si il existe action qui contient 'deconnexion' dans l'url
    unset($_SESSION['membre']);// on supprime le membre de la session (le contenu du tableau indice membre)
    $message = '<div class="alert alert-success">Vous êtes déconnecté</div>';// message de déconnexion cf echo plus bas
    // debug($_SESSION);
}
// 3- REDIRECTION VERS LA PAGE PROFIL
if (estConnecte()) { // si le membre est connecté on le renvoi vers le profil
    header('location:profil.php');// header() est une fonction prédéfinie qui va nous rediriger vers la page souhaitée (ici profil.php)
    exit();
}

// 4- TRAITEMENT DU FORMULAIRE DE CONNEXION

// debug($_POST);
if ( !empty( $_POST ) ) {

    // if (empty($_POST['pseudo']) || empty($_POST['mdp']) ) { // OU
        // $contenu .='<div class="alert alert-warning">Le pseudo ou le mdp sont requis !</div>';
    // }

    if (empty($_POST['pseudo'])) { // si c'est vide = 0 ou NULL c'est false 
        $contenu .='<div class="alert alert-warning">Le pseudo est requis !</div>';
    }

    if (empty($_POST['mdp'])) { // si mdp vide
        $contenu .='<div class="alert alert-warning">Le mdp est requis !</div>';
    }

    if (empty($contenu)) { // si la variable $contenu est vide pas d'erreurs
        $resultat = executeRequete( " SELECT * FROM membres WHERE pseudo = :pseudo ", // on cherche le membre avec son pseudo unique
                        array(
                            ':pseudo' => $_POST['pseudo'],
                        ));

        if ( $resultat->rowCount() == 1 )  { // si il y a une ligne c'est qu'il y a ce pseudo et ce membre
            $membre = $resultat->fetch( PDO::FETCH_ASSOC ); 
            // debug($membre);

                if ( password_verify($_POST['mdp'], $membre['mdp'])) { // si le hash du mdp de la bdd correspond au mdp du formulaire, alors password_verify retourne true
                    // echo 'coucou le membre';
                    $_SESSION['membre'] = $membre; // nous créons une session avec les infos du membre, dans un tableau multidimesionnel
                    // debug($_SESSION);
                    header( 'location:profil.php' );// on redirige le membre vers la page profil
                    exit();
                } else {
                    $contenu .='<div class="alert alert-danger">Erreur sur les identifiants !</div>';
                }
            }  else {
                $contenu .='<div class="alert alert-danger">Erreur sur les identifiants !</div>';
        } // fin if $resultat
        
    }//fin if empty $contenu

}// fin vérification formulaire

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Connectez-vous</title>
  </head>
  <body>
   <header class="container bg-success bg-gradient text-white p-2 ">
        <h1 class="display-4">Connexion à votre espace administrateur</h1>
        <p class="lead">Administration site Montjean_cinéma</p>
   </header>
   <div class="container">      
        <section class="row m-4 justify-content-center">
            
        <?php echo $message; ?>            
            <div class="col-md-9 p-4 text-white bg-success bg-gradient border border-warning">
                <p class="lead text-color-white">Rentrez vos identifiants pour vous connecter</p> 
                <!-- 1- FORMULAIRE DE CONNEXION   -->
                <form action="" method="POST" class="">
                    <?php echo $contenu; ?>
                    <div class="form-group mt-2">
                        <label for="pseudo">Pseudo *</label>
                        <input type="text" name="pseudo" id="pseudo" class="form-control"> 
                    </div>
                    <div class="form-group mt-2">
                        <label for="mdp">Mot de passe *</label>
                        <input type="password" name="mdp" id="mdp" class="form-control">
                    </div>
                        <div class="form-group mt-2">
                        <input type="submit" value="Connectez-vous" class="btn btn-sm btn-warning"> 
                    </div>
                </form>
            </div>
        <!-- fin col -->
        </section>
        <!-- fin row -->
   </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>
