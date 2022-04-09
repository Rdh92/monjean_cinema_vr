<?php 
// require connexion, session etc.
require_once 'inc/init.inc.php';

// debug( $_SESSION['membre']['id_membre']);
$adresse = $_SESSION['membre']['adresse'];

// 1 - TRAITEMENT DE MISE À JOUR DU PROFIL
if ( !empty($_POST) ) {//not empty
    debug($_POST);
  
  $_POST['pseudo'] = htmlspecialchars($_POST['pseudo']);
  $_POST['nom'] = htmlspecialchars($_POST['nom']);
  $_POST['prenom'] =htmlspecialchars($_POST['prenom']);
  $_POST['email'] = htmlspecialchars($_POST['email']);
  $_POST['civilite'] = htmlspecialchars($_POST['civilite']);
  $_POST['ville'] = htmlspecialchars($_POST['ville']);
  $_POST['code_postal'] = htmlspecialchars($_POST['code_postal']);
  $_POST['adresse'] = htmlspecialchars($_POST['adresse']);
  
  $resultat = $pdoMJC->prepare( " UPDATE membres SET pseudo = :pseudo, nom = :nom, prenom = :prenom, email = :email, civilite = :civilite, ville = :ville, code_postal = :code_postal, adresse = :adresse WHERE id_membre = :id_membre " );// requete préparée avec des marqueurs
  
  $resultat->execute( array(
    ':pseudo' => $_POST['pseudo'],
    ':nom' => $_POST['nom'],
    ':prenom' => $_POST['prenom'],
    ':email' => $_POST['email'],
    ':civilite' => $_POST['civilite'],
    ':ville' => $_POST['ville'],
    ':code_postal' => $_POST['code_postal'],
    ':adresse' => $_POST['adresse'],
    ':id_membre' => $_SESSION['membre']['id_membre']
  ));
  header('location:profil.php');
  exit();
  }

// 2 - SUPPRESSION D'UN FILM

// debug($_GET);
if (isset($_GET['action']) && $_GET['action'] == 'supprimer' && isset($_GET['id_film'])) {
  $resultat = $pdoMJC->prepare( " DELETE FROM films WHERE id_film = :id_film " );

  $resultat->execute(array(
    ':id_film' => $_GET['id_film']
  ));

  if ($resultat->rowCount() == 0) {
    $suppression .= '<div class="alert alert-danger"> Erreur de suppression</div>';
  } else {
    $suppression .= '<div class="alert alert-success"> Film supprimé</div>';
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
      <?php require_once 'inc/navbar.inc.php'; ?>

    <header class="container-fluid text-white bg-primary bg-gradient p-4">
            <h1 class="display-4 text-white ">Bonjour <?php echo $_SESSION['membre']['prenom']; ?></h1>
            <p class="lead">
            <?php
            if(estAdmin()) { // si le membre est 'admin' il n'a pas les mêmes accès qu'un membre 'client'
                echo ' -- Vous êtes administrateur</p>';
            } else {
                echo ' --  Bienvenue dans votre espace Bénévole !</p>';
            }
            ?>

            <ul class="nav nav-pills nav-fill">
            <?php 
                if(estAdmin()) { 
                    echo '<li class="nav-item"><a class="btn btn-success shadow" href="admin/gestion_film.php">Ajouter un nouveau film </a></li>';
                    
                    echo '<li class="nav-item"><a class="btn btn-warning shadow" href="admin/benevoles.php">Liste des bénévoles</a></li>';
                } 
                
                if (estConnecte()) {
                    echo '<li class="nav-item"><a class="btn btn-danger shadow" href="connexion.php?action=deconnexion">Se déconnecter</a></li>';
                }
            ?>
            </ul>
    </header>
    <div class="container-fluid">
    <section class="row justify-content-start">
        <div class="col-12">
            <form method="POST" action="" class="shadow p-3 mb-5 bg-body rounded">
                <h2>Mise à jour de vos informations</h2>
                <div class="row">
                <div class="col-md-6 form-group mt-2">
                    <label for="pseudo">Votre pseudo *</label>
                    <input type="text" name="pseudo" id="pseudo" value="<?php echo $_SESSION['membre']['pseudo']; ?>" class="form-control"> 
                </div>

                <div class="row">
                <div class="col-md-6 form-group mt-2">
                    <label for="nom">Nom *</label>
                    <input type="text" name="nom" id="nom" value="<?php echo $_SESSION['membre']['nom']; ?>" class="form-control">
                </div>
                <div class="col-md-6  form-group mt-2">
                    <label for="prenom">Prénom *</label>
                    <input type="text" name="prenom" id="prenom" value="<?php echo $_SESSION['membre']['prenom']; ?>" class="form-control"> 
                </div>
                <div class="col-md-6  form-group mt-2">
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
                    <textarea name="adresse" id="adresse" class="form-control"><?php echo $adresse ?? '' ; ?></textarea>
                </div>
                <div class="col-4 form-group mt-2">
                    <label for="code_postal">Code postal</label>
                    <input type="text" name="code_postal" id="code_postal" value="<?php echo $_SESSION['membre']['code_postal']; ?>" class="form-c²ontrol"> 
                </div>
                <div class="col-7 form-group mt-2">        
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
          <!-- fin col -->
    </section>
        <!-- fin row -->  

        <div class="col-12">
            <section>
                <div class="col-9">
                    <h2>Liste des films :</h2>
                    <br>
                    <?php
                    // 3 affichage de données 
                    $requete = $pdoMJC->query( " SELECT * FROM films ORDER BY id_film ASC " );
                    // debug($resultat);
                    $nbr_films = $requete->rowCount();
                    // debug($nbr_commentaires);
                    ?>

                    <h5>Il y a <?php echo $nbr_films; ?> films </h5>
                    <?php echo $contenu; ?>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Titre</th>
                                <th>Réalisateurs</th>
                                <th>Acteurs</th>
                                <th>Pays</th>
                                <th>Description</th>
                                <th>Catégorie</th>
                                <th>Photo</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <!-- ouverture de la boucle while -->
                            <?php while ( $ligne = $requete->fetch( PDO::FETCH_ASSOC )) { ?>
                            <tr>                  
                                <td><?php echo $ligne['titre']; ?></td>
                                <td><?php echo $ligne['realisateur']; ?></td>
                                <td><?php echo $ligne['acteurs']; ?></td>
                                <td><?php echo $ligne['pays']; ?></td>
                                <td><?php echo $ligne['description']; ?></td>
                                <td><?php echo $ligne['categorie']; ?></td>
                                <td><?php echo $ligne['photo']; ?></td>
                                <td><a href="admin/maj_film.php?id_film=<?php echo $ligne['id_film']; ?>">MAJ</a></td>
                                <td><a href="?action=supprimer&id_film=<?php echo $ligne['id_film']; ?>" onclick="return(confirm('Voulez-vous supprimer le film ? '))">Supprimer le film</a></td>
                            </tr>
                            <!-- fermeture de la boucle -->
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
   
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