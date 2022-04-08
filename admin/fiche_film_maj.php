<?php 
// require connexion, session etc.
require_once '../inc/init.inc.php';

if (!estAdmin()) { // accès non autorisé si on n'est pas admin (et pas connecté)
    header('location:../connexion.php');
}

// 3 RÉCEPTION DES INFORMATIONS D'UN FILM AVEC $_GET
debug($_GET);
if ( isset($_GET['id_film']) ) {
    debug($_GET);
    $resultat = $pdoMJC->prepare( " SELECT * FROM films, categories WHERE films.id_categorie = categorie.id_categorie AND film = :id_film " );
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
  debug($_POST);

$_POST['categorie'] = htmlspecialchars($_POST['categorie']);
$_POST['titre'] = htmlspecialchars($_POST['titre']);
$_POST['description'] = $_POST['description'];
$_POST['realisateur'] = htmlspecialchars($_POST['realisateur']);
$_POST['acteurs'] = htmlspecialchars($_POST['acteurs']);

$resultat = $pdoMJC->prepare( " UPDATE films SET  categorie = :categorie, titre = :titre, description = :description, realisateur = :realisateur, acteurs = :acteurs WHERE id_film = :id_film " );// requete préparée avec des marqueurs

$resultat->execute( array(
  ':categorie' => $_POST['categorie'],
  ':titre' => $_POST['titre'],
  ':description' => $_POST['description'],
  ':realisateur' => $_POST['realisateur'],
  ':acteurs' => $_POST['acteurs'],
  ':id_film' => $_GET['id_film']

));
header('location:index.php');
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
  <body class="m-2">
      
  <?php require_once 'inc/navbar.inc.php'; ?>

  <header class="container bg-warning text-white p-4 ">
        <div class="row">
          <div class="col-5">
            <h1 class="display-4">Admin</h1>
            <p class="lead">Mise à jour - Fiche du film ID <?php echo $fiche['id_film']; ?> </p>
          </div>         
          <?php require_once '../inc/navbis.inc.php'; ?>
        </div>
   </header>

   <div class="container">      
        <section class="row m-4 justify-content-center">
            <h2>Le Film : <?php echo $fiche['titre']; ?></h2>           
            <div class="col-md-8 p-2 bg-light border border-primary">
                <table class="table table-striped">
                <tr>
                    <td> <img src="../<?php echo $fiche['photo']; ?>" class="figure-img img-fluid rounded img-admin"></td>
                    <td> ID <?php echo $fiche['id_film']; ?></td>                 
                    <td><?php echo $fiche['titre']. ' ' .$fiche['categorie']; ?></td>
                    <td><?php echo $fiche['description']; ?></td>
                    <td><?php echo $fiche['realisateur']; ?></td>
                    <td><?php echo $fiche['acteurs']; ?></td>
                </tr>
                <!-- fermeture de la boucle -->
            </table>
            </div>
        <!-- fin col -->
        </section>
        <!-- fin row -->

        <section class="row m-4 justify-content-center"> 
            <h2>Mise à jour</h2>          
            <div class="col-md-8 p-2 bg-light border border-primary">
                <?php echo $contenu; ?>
                <form action="" method="POST" enctype="multipart/form-data" class="p-2">
                    <!-- l'attribut entype spécifie que le formulaire envoie des fichiers en plus de données texte ; il va nous permettre de télécharger un fichier ici une photo -->

                    <label for="id_categorie" class="form-label">Catégorie *</label>
                    <select name="id_categorie" id="id_categorie" class="form-select">
                    <?php
                      foreach ($pdoMJC->query( " SELECT * FROM categories ORDER BY categorie ASC ") as $ligne_categorie) {
                        echo '<option value="' .$ligne_categorie['id_categorie']. '"';
                        if ($ligne_categorie['id_categorie'] == $fiche['id_categorie']) {
                          echo 'selected';
                        }
                        echo '>' .$ligne_categorie['categorie']. '</option>';
                      }
                    ?>

                    <label for="titre" class="form-label">Titre *</label>
                    <input type="text" name="titre" id="titre" class="form-control" value="<?php echo $fiche['titre'] ?? ''; ?>">

                    <label for="description" class="form-label">Description *</label>
                    <textarea name="description" id="description" cols="30" rows="3" class="form-control"><?php echo $fiche['description']; ?></textarea>

                    <label for="realisateur" class="form-label">Réalisateur(s)</label>
                    <textarea name="realisateur" id="realisateur" cols="30" rows="3" class="form-control"><?php echo $fiche['realisateur']; ?></textarea>

                    <label for="acteurs" class="form-label">Acteurs principaux</label>
                    <textarea name="acteurs" id="acteurs" cols="30" rows="3" class="form-control"><?php echo $fiche['description']; ?></textarea>

                  
                    <!-- <label for="photo" class="form-label">Photographie *</label>
                    <input type="file" name="photo" id="photo" class="form-control"> -->
                    <!-- pour pouvoir utiliser le type="file" il FAUT ABSOLUMENT l'attribut enctype="multipart/form-data" dans la balise form-->

                  

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