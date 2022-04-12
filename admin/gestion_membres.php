<?php 
// require connexion, session etc.
require_once '../inc/init.inc.php';

// debug( $_SESSION['membre']['id_membre']);

// ZONE DE TRAITEMENT

// debug($_GET);
// debug($_POST);
// debug($SESSION);
// debug($resultat);
// debug($suppression);
 // debug($nbr_membres);
// debug($nbr_messsages);

if (isset($_GET['action']) && $_GET['action'] == 'supprimer' && isset($_GET['id_membre'])) {
  $resultat = $pdoMJC->prepare( " DELETE FROM membres WHERE id_membre= :id_membre" );

  $resultat->execute(array(
    ':id_membre' => $_GET['id_membre']
  ));

  if ($resultat->rowCount() == 0) {
    $suppression .= '<div class="alert alert-danger"> Erreur de suppression !</div>';
  } else {
    $suppression .= '<div class="alert alert-success"> Membre bien supprimé !</div>';
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

    <title>Gestion des membres</title>
</head>

<body>
<header class="container-fluid bg-primary bg-gradient text-white p-4 ">
        <div class="row">
          <div class="col-5">
            <h1 class="display-4">Gestion des membres</h1>
            <p class="lead">Liste des membres (Administrateurs et bénévoles)</p>
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
    <!-- fin container-fluid header -->
    
    <!-- ====================================================== -->
    <!--                CONTAINER : contenu principal           --> 
    <!-- ====================================================== -->
<main class="container-fluid">
    <section class="text-center m-5 py-5">
            <?php
                $requete = $pdoMJC->query( " SELECT * FROM membres ORDER BY id_membre ASC " );
                // debug($resultat);
                $nbr_membres = $requete->rowCount();
                // debug($nbr_membres);
            ?>
            <br>
        <h2>Il y a <?php echo $nbr_membres; ?> membres dans la liste</h2>
        <?php echo $contenu; ?>
        <div class="col col-lg-10 col-md-8">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Civilité</th>
                        <th>Prenom</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Pseudo</th>
                        <th>Mdp</th>
                        <th>Adresse</th>
                        <th>Code_postal</th>
                        <th>Ville</th>                       
                    </tr>
                </thead>
                <tbody>
                <!-- ouverture boucle -->
                <?php while ( $ligne = $requete->fetch( PDO::FETCH_ASSOC )) { ?>
                    <tr>                  
                        <td><?php echo $ligne['civilite']; ?></td>
                        <td><?php echo $ligne['prenom']; ?></td>
                        <td><?php echo $ligne['nom']; ?></td>
                        <td><?php echo $ligne['email']; ?></td>
                        <td><?php echo $ligne['pseudo']; ?></td>
                        <td><?php echo $ligne['mdp']; ?></td>
                        <td><?php echo $ligne['adresse']; ?></td>
                        <td><?php echo $ligne['code_postal']; ?></td>
                        <td><?php echo $ligne['ville']; ?></td>
                        <td><a href="?action=supprimer&id_membre=<?php echo $ligne['id_membre']; ?>" onclick="return(confirm('Voulez-vous vraiment supprimer votre profil de la liste des bénevoles ? '))">Supprimer le profil</a></td>
                    </tr>
                <!-- fermeture boucle -->
                <?php } ?>
                </tbody>
            </table>          
        </div>
    </section>
    <!-- fin row -->
</main>
<!-- fin container principal -->
    <!-- ====================================================== -->
    <!--                  FOOTER : en require                   --> 
    <!-- ====================================================== -->  
    <?php require_once '../inc/footer.inc.php';?> 


    <!-- ====================================================== -->
    <!--              Bootstrap Bundle with Popper              --> 
    <!-- ====================================================== -->  

    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
    crossorigin="anonymous"></script>
</body>
</html>
        
    <!-- ====================================================== -->
    <!--             PAS DE FOOTER pour le back office          --> 
    <!-- ====================================================== -->  
   
    <!-- ====================================================== -->
    <!--              Bootstrap Bundle with Popper              --> 
    <!-- ====================================================== -->  

    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
    crossorigin="anonymous"></script>
</body>
</html>