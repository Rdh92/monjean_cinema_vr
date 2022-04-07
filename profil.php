<?php 
// require connexion, session etc.
require_once 'inc/init.inc.php';


// 1 INSERTION D'UN FILM 

if (!empty($_POST)) {

    // 9 conditions pour vérifier que les champs du form sont bien remplis
    
    if ( !isset($_POST['categorie']) || strlen($_POST['categorie']) < 1 || strlen($_POST['categorie']) > 3) {
        $contenu .='<div class="alert alert-warning">Choissisez la bonne catégorie</div>';
    }

    if ( !isset($_POST['titre']) || strlen($_POST['titre']) < 5 || strlen($_POST['titre']) > 100) {
        $contenu .='<div class="alert alert-warning">Titre entre 5 et 100 caractères</div>';
    }

    if ( !isset($_POST['realisateur']) || strlen($_POST['realisateur']) < 4 || strlen($_POST['realisateur']) > 200) {
        $contenu .='<div class="alert alert-warning">Description incomplète !</div>';
    }
    if ( !isset($_POST['acteurs']) || strlen($_POST['acteurs']) < 4 || strlen($_POST['acteurs']) > 20) {
        $contenu .='<div class="alert alert-warning">Champs compris entre 4 et 50 caractères</div>';
    }

    if ( !isset($_POST['pays']) || strlen($_POST['pays']) < 1 || strlen($_POST['pays']) > 5) {
        $contenu .='<div class="alert alert-warning">Pays : Champs compris entre 5 et  caractères</div>';
    }

    if ( !isset($_POST['description']) || $_POST['description'] != 'm' && $_POST['description'] != 'f'  && $_POST['description'] ) { // && ET
        $contenu .='<div class="alert alert-warning">Public : non conforme !</div>';
    }
    if ( !isset($_POST['photo']) || strlen($_POST['photo']) < 1 || strlen($_POST['photo']) > 5 ) {
        $contenu .='<div class="alert alert-warning">Prix : rentrez le prix de vente !</div>';
    }

    if ( !isset($_POST['prix']) || strlen($_POST['prix']) < 1 || strlen($_POST['prix']) > 5 ) {
        $contenu .='<div class="alert alert-warning">Prix : rentrez le prix de vente !</div>';
    }
    

    
    //var_dump($_POST);

    if (empty($contenu)) {

    $_POST['categorie'] = htmlspecialchars($_POST['categorie']);
    $_POST['titre'] = $_POST['titre'];
    $_POST['realisateur'] = htmlspecialchars($_POST['realisateur']);
    $_POST['acteurs'] = $_POST['acteurs'];
    $_POST['pays'] = htmlspecialchars($_POST['pays']);
    $_POST['description'] = htmlspecialchars($_POST['description']);
    $_POST['photo'] = htmlspecialchars($_POST['photo']);
    $_POST['prix'] = htmlspecialchars($_POST['prix']);

    // debug($_FILES);
    // traitement du fichier image, de la photo

    $photo_bdd = '';
    if (!empty($_FILES['photo']['name'])) {
        $photo_bdd = 'affiches/' .$_FILES['photo']['name'];
        copy($_FILES['photo']['tmp_name'], '../' .$photo_bdd);
    }//fin du traitement photo

    $requete =  executeRequete( " INSERT INTO films (categorie, titre, realisateur, acteurs, pays, description, photo, prix,) VALUES ( :categorie, :titre, :titre, :realisateur, :acteurs, :pays, :description, :photo, :prix) ",
    array(
        ':categorie' => $_POST['categorie'],
        ':titre' => $_POST['titre'],
        ':realisateur' => $_POST['realisateur'],
        ':acteurs' => $_POST['acteur'],
        ':pays' => $_POST['pays'],
        ':description' => $_POST['description'],
        ':photo' => $photo_bdd,
        ':prix' => $_POST['prix'],
    ));

    if ($requete) {
        $contenu .= '<div class="alert alert-success">Le film a été enregistré.</div>';
    } else {
        $contenu .= '<div class="alert alert-danger">Erreur lors de l\'enregistrement...</div>';
    }
  } 
}// fin insertion nouveau produit

// 2 SUPPRESSION D'UN ARTICLE

// debug($_GET);
if (isset($_GET['action']) && $_GET['action'] == 'supprimer' && isset($_GET['id_film'])) {
  $resultat = $pdoMAB->prepare( " DELETE FROM films WHERE id_film = :id_film " );

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

    <title>Espace Admin</title>
</head>

<body>
    <!-- ====================================================== -->
    <!--  EN-TETE : navbar en require et header                 --> 
    <!-- ====================================================== --> 
    
    <?php require_once 'inc/navbar.inc.php'; ?> 
  
    <header class="container-fluid f-header p-2 mb-4 bg-light col-12 text-center">
        <div class="p-4 m-4 text-center">
            <a class="navbar-brand" href="profil.php"><h1 class="display-4">Espace Admin</h1></a>
               
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

    <header class="container-fluid bg-warning p-4">
            <h1 class="display-4">Votre Espace</h1>
            <p class="lead">Bonjour <?php echo $_SESSION['membre']['prenom']; ?>
            <?php
            if(estAdmin()) { // si le membre est 'admin' il n'a pas les mêmes accès qu'un membre 'client'
                echo ' -- Vous êtes administrateur !</p>';
            }
            ?>

            <ul class="nav nav-pills nav-fill">
            <?php 
                if(estAdmin()) { // si le membre est 'admin' il n'a pas les mêmes accès qu'un membre 'client'
                    echo '<li class="nav-item"><a class="btn btn-primary" href="' .RACINE_SITE. 'admin/accueil.admin.php">Espace admin</a></li>';
                    echo '<li class="nav-item"><a class="btn btn-success" href="' .RACINE_SITE. 'index.php">Aller à l\'Accueil </a></li>';
                    // echo 'coucou';
                } else {
                    echo '<li class="nav-item"><a class="btn btn-success" href="index.php">Retour à l\'Accueil du Montjean !</a></li>';
                }
                if (estConnecte()) {
                    //  echo 'coucou';
                    echo '<li class="nav-item"><a class="btn btn-secondary" href="connexion.php?action=deconnexion">Se déconnecter</a></li>';
                }
            ?>
            </ul>
    </header>
    <div class="container-fluid">
    <section class="row m-3 justify-content-start">
        <div class="col-md-5">
            <form method="POST" action="" class="shadow p-3 mb-5 bg-body rounded">
                <h2>Mise à jour de vos informations</h2>
                <div class="row">
                <div class="col-4 form-group mt-2">
                    <label for="pseudo">Votre pseudo *</label>
                    <input type="text" name="pseudo" id="pseudo" value="<?php echo $_SESSION['membre']['pseudo']; ?>" class="form-control"> 
                </div>

                 <hr>

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

        <div class="col-12">
            <!-- action vide car nous envoyons les données avec cette même page et POST va envoyer dans la superglobale $_POST -->
			   <form method="POST" action="" class="shadow p-3 mb-5 bg-body rounded">
                  <h2>Ajout d'un Nouveau Film</h2>  
                    <div class="mb-3">
                        <label for="titre" class="form-label">Titre du film</label>
                        <input type="text" name="titre" id="titre" class="form-control" required>
                    </div>

                    <div class="mb-7">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" name="description" id="description" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="realisateur" class="form-label">Réalisateur(s)</label>
                        <input type="text" name="realisateur" id="realisateur" class="form-control" required>
                    </div>

                    <div class="mb-3 col-12">
                        <label for="Catégorie" class="form-label"> Catégorie : </label> <br>
                        <input type="radio" name="categorie" value="categorie" id="categorie" checked> Films à l'affiche
                        <input type="radio" name="categorie" value="categorie" id="categorie"> Films à venir
                        
                    </div>
                    <br>
                    <div class="mb-3">
                
                        <label for="pays" class="form-label">Pays</label>
                            <select name="pays" id="pays">
                                <option value="pays">----</option>
                                <option value="pays">FRANCE</option>
                                <option value="pays">ETATS-UNIS</option>
                                <option value="pays">ANGLETERRE</option>
                                <option value="pays">COREE</option>
                                <option value="pays">AFRIQUE DU SUD</option>
                                <option value="pays">ITALIE</option>
                                <option value="pays">ESPAGNE</option>
                            </select>
                    </div>

                    <div class="mb-3">
                        <label for="acteurs" class="form-label">Acteurs Principaux</label>
                        <input type="text" name="acteurs" id="acteurs" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary position-relative">Ajouter le nouveau film</button> 
                </form>

        </div>
          <!-- fin col -->
    </section>
        <!-- fin row -->  

        <div class="container-fluid bg-white col-12 d-flex">
  
        <section class="row">
  
          <div class="col-5">
            <?php
			// 3 affichage de données 
              $requete = $pdoMJC->query( " SELECT * FROM films ORDER BY id_film ASC " );
              // debug($resultat);
              $nbr_films = $requete->rowCount();
              // debug($nbr_commentaires);
            ?>
            <h5>Il y a <?php echo $nbr_films; ?> films </h5>
            <?php echo $contenu; ?>

            <table class="table table-striped  ">
             <thead>
               <tr>
                 <th>Id</th>
                 <th>Titre</th>
                 <th>Réalisateurs</th>
                 <th>Acteurs</th>
                 <th>Pays</th>
                 <th>Description</th>
                 <th>Catégorie</th>
                 <th>Photo</th>
                 <th>Prix</th>
               </tr>
             </thead>
             <tbody>
				 <!-- ouverture de la boucle while -->
               <?php while ( $ligne = $requete->fetch( PDO::FETCH_ASSOC )) { ?>
			   <tr>
				   <td><?php echo $ligne['id_film']; ?></td>                   
				   <td><?php echo $ligne['titre']; ?></td>
				   <td><?php echo $ligne['realisateur']; ?></td>
				   <td><?php echo $ligne['acteurs']; ?></td>
				   <td><?php echo $ligne['pays']; ?></td>
				   <td><?php echo $ligne['description']; ?></td>
                   <td><?php echo $ligne['categorie']; ?></td>
                   <td><?php echo $ligne['photo']; ?></td>
                   <td><?php echo $ligne['prix']; ?></td>
          <td><a href="fiche_film.php?id_film=<?php echo $ligne['id_film']; ?>">Mise à jour</a></td>
          <td><a href="?action=supprimer&id_film=<?php echo $ligne['id_film']; ?>" onclick="return(confirm('Voulez-vous supprimer le film ? '))">Supprimer le film</a></td>
			   </tr>
			   <!-- fermeture de la boucle -->
			   <?php } ?>
             </tbody>
            </table>
          </div>

      </div>
    </section>
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