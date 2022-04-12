<?php

// require connexion, session etc.
require_once '../inc/init.inc.php';
require_once '../inc/head.inc.php';


// 1 INSERTION D'UN FILM 

if (!empty($_POST)) {

    // 9 conditions pour vérifier que les champs du form sont bien remplis
    
    if ( !isset($_POST['titre']) || strlen($_POST['titre']) < 3 || strlen($_POST['titre']) > 100) {
        $contenu .='<div class="alert alert-warning">Titre entre 3 et 100 caractères</div>';
    }

    if ( !isset($_POST['realisateur']) || strlen($_POST['realisateur']) < 4 || strlen($_POST['realisateur']) > 200) {
        $contenu .='<div class="alert alert-warning">Description incomplète !</div>';
    }
    if ( !isset($_POST['acteurs']) || strlen($_POST['acteurs']) < 4 || strlen($_POST['acteurs']) > 30) {
        $contenu .='<div class="alert alert-warning">Champs "Acteurs" compris entre 4 et 30 caractères</div>';
    }

    if ( !isset($_POST['pays']) || strlen($_POST['pays']) < 5 || strlen($_POST['pays']) > 50) {
        $contenu .='<div class="alert alert-warning">Pays : Champs compris entre 5 et 50 caractères</div>';
    }

    if ( empty($_FILES['photo']['name']) || 
    ($_FILES['photo']['error'] == 0 && $_FILES['photo']['size'] != 0  && !isset($_FILES['photo']['type']) ) ){
        $_FILES .='<div class="alert alert-warning">Erreur Photo</div>';
    }

    
    //var_dump($_POST);

    if (empty($contenu)) {

    $_POST['categorie'] = htmlspecialchars($_POST['categorie']);
    $_POST['titre'] = $_POST['titre'];
    $_POST['realisateur'] = htmlspecialchars($_POST['realisateur']);
    $_POST['acteurs'] = $_POST['acteurs'];
    $_POST['pays'] = htmlspecialchars($_POST['pays']);
    $_POST['description'] = htmlspecialchars($_POST['description']);
    $_POST['bande_annonce'] = htmlspecialchars($_POST['bande_annonce']);
    // $_FILES['photo'] = htmlspecialchars($_POST['photo']);

    // debug($_FILES);
    // traitement du fichier image, de la photo

    $photo_bdd = '';
    if (!empty($_FILES['photo']['name'])) {
        $photo_bdd = 'affiches/' .$_FILES['photo']['name'];
        copy($_FILES['photo']['tmp_name'], '../' .$photo_bdd);
    }//fin du traitement photo

    $requete =  executeRequete( " INSERT INTO films (categorie, titre, realisateur, acteurs, pays, description, photo, bande_annonce) VALUES ( :categorie, :titre, :realisateur, :acteurs, :pays, :description, :photo, :bande_annonce) ",
    array(
        ':categorie' => $_POST['categorie'],
        ':titre' => $_POST['titre'],
        ':realisateur' => $_POST['realisateur'],
        ':acteurs' => $_POST['acteurs'],
        ':pays' => $_POST['pays'],
        ':description' => $_POST['description'],
        ':photo' => $photo_bdd,
        ':bande_annonce' => $_POST['bande_annonce'],
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

    <header class="container-fluid text-white bg-primary bg-gradient p-4">
        <h2>Ajout d'un Nouveau Film</h2>
        <ul class="nav nav-pills nav-fill">
            <?php
                  if(estAdmin()) { 
                        echo '<li class="nav-item"><a class="btn btn-success shadow" href="../profil.php">Retour au profil</a></li>';
                        
                        echo '<li class="nav-item"><a class="btn btn-danger shadow" href="../connexion.php?action=deconnexion">Se déconnecter</a></li>';
                    } 
                  ?>
        </ul>
    </header>
        <main>
            <div class="col-12">
                    <!-- action vide car nous envoyons les données avec cette même page et POST va envoyer dans la superglobale $_POST -->
                    <?php echo $contenu ?>
                    <form method="POST" action="" enctype="multipart/form-data" class="shadow p-3 mb-5 bg-body rounded"> 
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
                                        <option value="France">France</option>
                                        <option value="Etats-Unis">Etats-Unis</option>
                                        <option value="Angleterre">Angleterre</option>
                                        <option value="Corée">Corée</option>
                                        <option value="Afrique du Sud">Afrique du Sud</option>
                                        <option value="Italie">Italie</option>
                                        <option value="Espagne">Espagne</option>
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

                            <div class="mb-3">
                                <label for="bande_annonce" class="form-label">Bande-annonce (URL)</label>
                                <input type="text" name="bande_annonce" id="bande_annonce" value="<?php echo $_POST['bande_annonce']?? '' ;?>" class="form-control">
                            </div>


                            <button type="submit" class="btn btn-primary position-relative">Ajouter le nouveau film</button> 
                        </form>

                </div>
            <!-- fin col -->
        </main>
    
</body>
</html>