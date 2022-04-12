<?php 
// require connexion, session etc.
require_once '../inc/init.inc.php';

// debug( $_SESSION['membre']['id_membre']);
// $adresse = $_SESSION['membre']['adresse'];



// 2 - SUPPRESSION D'UN MESSAGE

// debug($_GET);
if (isset($_GET['action']) && $_GET['action'] == 'supprimer' && isset($_GET['id_contact'])) {
  $resultat = $pdoMJC->prepare( " DELETE FROM contact WHERE id_contact = :id_contact " );

  $resultat->execute(array(
    ':id_contact' => $_GET['id_contact']
  ));

  if ($resultat->rowCount() == 0) {
    $suppression .= '<div class="alert alert-danger"> Erreur de suppression !</div>';
  } else {
    $suppression .= '<div class="alert alert-success"> Contact supprimé !</div>';
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
    <header class="container-fluid text-white bg-primary bg-gradient p-4">
            <h1 class="display-4 text-white ">Messages</h1>
            <p class="lead">
            <?php
            if(estAdmin()) { // si le membre est 'admin' il n'a pas les mêmes accès qu'un membre 'client'
                echo ' -- Vous êtes administrateur</p>';
            }
            ?>

            <ul class="nav nav-pills nav-fill">
            <?php 
                if(estAdmin()) { 
                    echo '<li class="nav-item"><a class="btn btn-success shadow" href="../profil.php">Retour au profil</a></li>';
                    
                    echo '<li class="nav-item"><a class="btn btn-danger shadow" href="../connexion.php?action=deconnexion">Se déconnecter</a></li>';
                } 
            ?>
            </ul>
    </header>
    
    </section>
        <!-- fin row -->  

        <div class="col-12">
            <section>
                <div class="col-9">
                    <h2>Liste des messages :</h2>
                    <br>
                    <?php
                    // 3 affichage de données 
                    $requete = $pdoMJC->query( " SELECT * FROM contact ORDER BY id_contact ASC " );
                    // debug($resultat);
                    $nbr_message = $requete->rowCount();
                    // debug($nbr_message);
                    ?>

                    <h5>Il y a <?php echo $nbr_message; ?> messages ! </h5>
                    <?php echo $contenu; ?>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Prenom</th>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Message</th>                         
                            </tr>
                        </thead>
                        <tbody>
                            <!-- ouverture de la boucle while -->
                            <?php while ( $ligne = $requete->fetch( PDO::FETCH_ASSOC )) { ?>
                            <tr>                  
                                <td><?php echo $ligne['prenom']; ?></td>
                                <td><?php echo $ligne['nom']; ?></td>
                                <td><?php echo $ligne['email']; ?></td>
                                <td><?php echo $ligne['message']; ?></td>
                                <td><a href="?action=supprimer&id_contact=<?php echo $ligne['id_contact']; ?>" onclick="return(confirm('Voulez-vous supprimer le message ? '))">Supprimer le message</a></td>
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
    <!--              Bootstrap Bundle with Popper              --> 
    <!-- ====================================================== -->  

    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
    crossorigin="anonymous"></script>
</body>
</html>