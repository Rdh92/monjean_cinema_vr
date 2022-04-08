<?php

// require connexion, session etc.
require_once '../inc/init.inc.php';
require_once '../inc/head.inc.php';
// 1 INSERTION D'UN FILM 

if (!empty($_POST)) {

    // 9 conditions pour vérifier que les champs du form sont bien remplis
    
    if ( !isset($_POST['titre']) || strlen($_POST['titre']) < 5 || strlen($_POST['titre']) > 100) {
        $contenu .='<div class="alert alert-warning">Titre entre 5 et 100 caractères</div>';
    }

    if ( !isset($_POST['realisateur']) || strlen($_POST['realisateur']) < 4 || strlen($_POST['realisateur']) > 200) {
        $contenu .='<div class="alert alert-warning">Description incomplète !</div>';
    }
    if ( !isset($_POST['acteurs']) || strlen($_POST['acteurs']) < 4 || strlen($_POST['acteurs']) > 20) {
        $contenu .='<div class="alert alert-warning">Champs compris entre 4 et 50 caractères</div>';
    }

    if ( !isset($_POST['pays']) || strlen($_POST['pays']) < 1 || strlen($_POST['pays']) > 50) {
        $contenu .='<div class="alert alert-warning">Pays : Champs compris entre 5 et  caractères</div>';
    }

    if ( empty($_FILES['photo']['name']) || 
    ($_FILES['photo']['error'] == 0 && $_FILES['photo']['size'] != 0  && !isset($_FILES['photo']['type']) ) ){
        $_FILES .='<div class="alert alert-warning">Erreur Photo</div>';
    }

    
    var_dump($_POST);

    if (empty($contenu)) {

    $_POST['categorie'] = htmlspecialchars($_POST['categorie']);
    $_POST['titre'] = $_POST['titre'];
    $_POST['realisateur'] = htmlspecialchars($_POST['realisateur']);
    $_POST['acteurs'] = $_POST['acteurs'];
    $_POST['pays'] = htmlspecialchars($_POST['pays']);
    $_POST['description'] = htmlspecialchars($_POST['description']);
    // $_FILES['photo'] = htmlspecialchars($_POST['photo']);

    // debug($_FILES);
    // traitement du fichier image, de la photo

    $photo_bdd = '';
    if (!empty($_FILES['photo']['name'])) {
        $photo_bdd = 'affiches/' .$_FILES['photo']['name'];
        copy($_FILES['photo']['tmp_name'], '../' .$photo_bdd);
    }//fin du traitement photo

    $requete =  executeRequete( " INSERT INTO films (categorie, titre, realisateur, acteurs, pays, description, photo) VALUES ( :categorie, :titre, :realisateur, :acteurs, :pays, :description, :photo) ",
    array(
        ':categorie' => $_POST['categorie'],
        ':titre' => $_POST['titre'],
        ':realisateur' => $_POST['realisateur'],
        ':acteurs' => $_POST['acteurs'],
        ':pays' => $_POST['pays'],
        ':description' => $_POST['description'],
        ':photo' => $photo_bdd,
    ));

    if ($requete) {
        $contenu .= '<div class="alert alert-success">Le film a été enregistré.</div>';
    } else {
        $contenu .= '<div class="alert alert-danger">Erreur lors de l\'enregistrement...</div>';
    }
  } 
}// fin insertion nouveau film

// 2 SUPPRESSION D'UN FILM

// debug($_GET);
if (isset($_GET['action']) && $_GET['action'] == 'supprimer' && isset($_GET['id_film'])) {
    $resultat = $pdoMJC->prepare( " DELETE FROM films WHERE id_film = :id_film " );
  
    $resultat->execute(array(
      ':id_film' => $_GET['id_film']
    ));
  
    if ($resultat->rowCount() == 0) {
      $contenu02 .= '<div class="alert alert-danger"> Erreur de suppression</div>';
    } else {
      $contenu02 .= '<div class="alert alert-success"> Film supprimé</div>';
    }
  }
?>


<body>


    <main>
    <div class="col-12">
            <!-- action vide car nous envoyons les données avec cette même page et POST va envoyer dans la superglobale $_POST -->
            <?php echo $contenu ?>;
			   <form method="POST" action="" enctype="multipart/form-data" class="shadow p-3 mb-5 bg-body rounded">
                  <h2>Ajout d'un Nouveau Film</h2>  
                    <div class="mb-3">
                        <label for="titre" class="form-label">Titre du film</label>
                        <input type="text" name="titre" id="titre" class="form-control" value="<?php echo $_POST['titre']?? '' ;?>" required>
                    </div>

                    <div class="mb-7">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" name="description" id="description" class="form-control" value="<?php echo $_POST['description']?? '' ;?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="realisateur" class="form-label">Réalisateur(s)</label>
                        <input type="text" name="realisateur" id="realisateur" class="form-control" value="<?php echo $_POST['realisateur']?? '' ;?>" required>
                    </div>

                    <div class="mb-3 col-12">
                        <label for="Catégorie" class="form-label"> Catégorie : </label> <br>
                        <input type="radio" name="categorie" id="categorie" value="Films à l'affiche" checked> Films à l'affiche
                        <input type="radio" name="categorie" id="categorie" value="Films à venir"> Films à venir
                        
                    </div>
                    <br>
                    <div class="mb-3">
                
                        <label for="pays" class="form-label">Pays d'origine</label>
                            <select name="pays" id="pays">
                                <option value="">Choisissez le pays</option>
                                <option value="FRANCE">FRANCE</option>
                                <option value="ETATS-UNIS">ETATS-UNIS</option>
                                <option value="ANGLETERRE">ANGLETERRE</option>
                                <option value="COREE">COREE</option>
                                <option value="AFRIQUE DU SUD">AFRIQUE DU SUD</option>
                                <option value="ITALIE">ITALIE</option>
                                <option value="ESPAGNE">ESPAGNE</option>
                            </select>
                    </div>

                    <div class="mb-3">
                        <label for="acteurs" class="form-label">Acteurs Principaux</label>
                        <input type="text" name="acteurs" id="acteurs" value="<?php echo $_POST['acteurs']?? '' ;?>" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="photo" class="form-label">Photo</label>
                        <input type="file" name="photo" id="photo" value="<?php echo $_FILES['photo']['name']?? '' ;?>" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary position-relative">Ajouter le nouveau film</button> 
                </form>

        </div>
          <!-- fin col -->
    </main>
    
</body>
</html>