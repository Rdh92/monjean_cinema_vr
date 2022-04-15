<?php 
// require connexion, session etc.
require_once '../inc/init.inc.php';
require_once '../inc/head.inc.php';


if (!estAdmin()) { // accès non autorisé si on n'est pas admin (et pas connecté)
    header('location:../connexion.php');
}

// 3 RÉCEPTION DES INFORMATIONS D'UN FILM AVEC $_GET
//debug($_GET);
if ( isset($_GET['id_film']) ) {
    //debug($_GET);
    $resultat = $pdoMJC->prepare( " SELECT * FROM films WHERE id_film = :id_film " );
    $resultat->execute(array(
      ':id_film' => $_GET['id_film']
    ));
    // debug($resultat->rowCount());
      if ($resultat->rowCount() == 0) { // si le rowCount est égal à 0 c'est qu'il n'y a pas de films
          header('location:index.php');// redirection vers la page de départ
          exit();// arrêt du script
      }  
      $fiche = $resultat->fetch(PDO::FETCH_ASSOC);//je passe les infos dans une variable
    //   debug($fiche);// ferme if isset accolade suivante
      } else {
      header('location:index.php');// si j'arrive sur la page sans rien dans l'url
      exit();// arrête du script
  }

//4 TRAITEMENT DE MISE À JOUR D'UN FILM
if ( !empty($_POST) ) {//not empty
  //debug($_POST);

$_POST['categorie'] = htmlspecialchars($_POST['categorie']);
$_POST['titre'] = htmlspecialchars($_POST['titre']);
$_POST['description'] = $_POST['description'];
$_POST['realisateur'] = htmlspecialchars($_POST['realisateur']);
$_POST['acteurs'] = htmlspecialchars($_POST['acteurs']);
$_POST['pays'] = htmlspecialchars($_POST['pays']);
$_POST['bande_annonce'] = htmlspecialchars($_POST['bande_annonce']);
$_POST['fiche_film'] = htmlspecialchars($_POST['fiche_film']);

// traitement du fichier image, de la photo

$photo_bdd = '';
if (!empty($_FILES['photo']['name'])) {
    $photo_bdd = 'affiches/' .$_FILES['photo']['name'];
    copy($_FILES['photo']['tmp_name'], '../' .$photo_bdd);
}//fin du traitement photo

$resultat = $pdoMJC->prepare( " UPDATE films SET  categorie = :categorie, titre = :titre, description = :description, realisateur = :realisateur, acteurs = :acteurs, pays = :pays, photo = :photo, bande_annonce = :bande_annonce, fiche_film = :fiche_film WHERE id_film = :id_film " );// requete préparée avec des marqueurs

$resultat->execute( array(
  ':categorie' => $_POST['categorie'],
  ':titre' => $_POST['titre'],
  ':description' => $_POST['description'],
  ':realisateur' => $_POST['realisateur'],
  ':acteurs' => $_POST['acteurs'],
  ':id_film' => $_GET['id_film'],
  ':pays' => $_POST['pays'],
  ':photo' => $photo_bdd,
  ':bande_annonce' => $_POST['bande_annonce'],
  ':fiche_film' => $_POST['fiche_film'],

));
header('location:../profil.php');
exit();
}

?> 
<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title> Mise à jour film - Admin</title>

  </head>
  <body>
    
  <!-- Navbar  -->
    
  
  <!-- En-tête  -->
  <header class="container-fluid bg-primary bg-gradient text-white p-4 ">
        <div class="row">
          <div class="col-5">
            <h1 class="display-4">Admin</h1>
            <p class="lead">Mise à jour - Fiche du film <?php echo $fiche['titre']; ?> </p>
            <ul class="nav nav-pills nav-fill">
              <?php
                if(estAdmin()) { 
                      echo '<li class="nav-item"><a class="btn btn-success shadow" href="../profil.php">Retour au profil</a></li>';
                      
                      echo '<li class="nav-item"><a class="btn btn-danger shadow" href="../connexion.php?action=deconnexion">Se déconnecter</a></li>';
                  } 
                ?>
            </ul>
          </div>         
        </div>
   </header>
  <!-- fin en-tête  -->
     <br>

   <div class="container">      
        <section class="row justify-content-center">
            <h2>Le Film : <?php echo $fiche['titre']; ?></h2>           
            <div class="col-md-9 p-2 fw-bold bg-light border border-primary">
                <table class="table table-striped">
                <tr>
                    <td> <img src="../<?php echo $fiche['photo']; ?>" class="figure-img img-fluid rounded img-admin"></td>
                    <td>ID : <?php echo $fiche['id_film']; ?></td>                 
                    <td>Titre : <?php echo $fiche['titre']; ?></td>
                    <td>Catégorie : <?php echo $fiche['categorie']; ?></td>
                    <td>Pays : <?php echo $fiche['pays']; ?></td>
                    <td>Description : <br> <?php echo $fiche['description']; ?></td>
                    <td>Réalisateurs : <?php echo $fiche['realisateur']; ?></td>
                    <td>Acteurs : <?php echo $fiche['acteurs']; ?></td>
                    <td>Bande-annonce : <?php echo $fiche['bande_annonce']; ?></td>
                    <td>Fiche du film<?php echo $fiche['fiche_film']; ?></td>                 
                </tr>
                <!-- fermeture de la boucle -->
            </table>
            </div>
        <!-- fin col -->
        </section>
        <!-- fin row -->

        <section class="row m-5 justify-content-center"> 
            <h2>Mise à jour du film <?php echo $fiche['titre']; ?></h2>          
            <div class="col-md-9 p-2 bg-light border border-primary">
                <?php echo $contenu; ?>
                <form action="" method="POST" enctype="multipart/form-data" class="p-2">
                    <!-- l'attribut entype spécifie que le formulaire envoie des fichiers en plus de données texte ; il va nous permettre de télécharger un fichier ici une photo -->

                    <label for="categorie" class="form-label">Catégorie *</label>
                    <select name="categorie" id="categorie" class="form-select"> 
                     
                                <option value="">Choisissez une catégorie</option>
                                <option value="Films à l'affiche"<?php if (!strcmp("Films à l'affiche", $fiche['categorie'])) { echo " selected"; }?>>Films à l'affiche</option>
                                <option value="Films à venir"<?php if (!strcmp("Films à venir", $fiche['categorie'])) { echo " selected"; }?>>Films à venir</option>
                    </select>

                    <br>

                    <label for="pays" class="form-label">Pays d'origine</label>
                    <select name="pays" id="pays" class="form-select">
                        <option value="France"<?php if (!strcmp("France", $fiche['pays'])) { echo " selected"; }?>>France</option>
                        <option value="Etats-Unis" <?php if (!strcmp("Etats-Unis", $fiche['pays'])) { echo " selected"; }?>>Etats-Unis</option>
                        <option value="Angleterre"<?php if (!strcmp("Angleterre", $fiche['pays'])) { echo " selected"; }?>>Angleterre</option>
                        <option value="Corée"<?php if (!strcmp("Corée", $fiche['pays'])) { echo " selected"; }?>>Corée</option>
                        <option value="Afrique du Sud"<?php if (!strcmp("Afrique du Sud", $fiche['pays'])) { echo " selected"; }?>>Afrique du Sud</option>
                        <option value="Italie"<?php if (!strcmp("Italie", $fiche['pays'])) { echo " selected"; }?>>Italie</option>
                        <option value="Espagne"<?php if (!strcmp("Espagne", $fiche['pays'])) { echo " selected"; }?>>Espagne</option>
                    </select>

                    <br>

                    <label for="titre" class="form-label">Titre *</label>
                    <input type="text" name="titre" id="titre" class="form-control" value="<?php echo $fiche['titre'] ?? ''; ?>">

                    <label for="description" class="form-label">Description *</label>
                    <textarea name="description" id="description" cols="30" rows="3" class="form-control"><?php echo $fiche['description']; ?></textarea>

                    <label for="realisateur" class="form-label">Réalisateur(s)</label>
                    <textarea name="realisateur" id="realisateur" cols="30" rows="3" class="form-control"><?php echo $fiche['realisateur']; ?></textarea>

                    <label for="acteurs" class="form-label">Acteurs principaux</label>
                    <textarea name="acteurs" id="acteurs" cols="30" rows="3" class="form-control"><?php echo $fiche['acteurs']; ?></textarea>

                    <div class="mb-3">
                        <label for="photo" class="form-label">Photo</label>
                        <input type="file" name="photo" id="photo" value="<?php echo $_FILES['photo']['name']?? '' ;?>" class="form-control">
                    </div>

                    <div class="mb-3">
                      <label for="bande_annonce" class="form-label">Bande-annonce (URL)</label>
                      <textarea name="bande_annonce" id="bande_annonce" cols="30" rows="3" class="form-control"><?php echo $fiche['bande_annonce']; ?></textarea>
                    </div>

                    <div class="mb-3">
                      <label for="fiche_film" class="form-label">Fiche du film</label>
                      <textarea name="fiche_film" id="fiche_film" cols="30" rows="3" class="form-control"><?php echo $fiche['fiche_film']; ?></textarea>
                    </div>

                    <button class="btn btn-outline-success" type="submit">Mise à jour</button>

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
