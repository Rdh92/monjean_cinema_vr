<?php

// 1- FONCTION VAR DUMP AVEC STYLES BOOTSTRAP : ma fonction var_dump est nomée "debug" :
function debug($mavar) { // la fonction avec son paramètre, une variable
    echo "<br><small class=\"bg-danger text-white \"> * * *  var_dump de la BDD montjean_cinema * * *  </smal><pre class=\"alert alert-info w-25\">";
    var_dump($mavar); // à cette variable on applique la fonction var_dump()
    echo "</pre>";

}

// 2 - FONCTIONS POUR EXECUTER LES REQUETES PREPAREES AVEC FOREACH (raccourci comme un require)
function executeRequete( $requete, $parametres = array ()) { // utile pour toutes les requetes 1) la requete  2) fabrication du tableau avec des marqueurs
    foreach ($parametres as $indice => $valeur) { // boucle foreach
        $parametres[$indice] = htmlspecialchars($valeur); // boucle foreach // pour eviter les injections ???
        global $pdoMJC; // "global" nous permet d'acceder à la variable $pdoMJC dans l'espace global du fichier init.inc.php

        $resultat = $pdoMJC->prepare($requete); // prépare requête
        $succes = $resultat->execute($parametres); // et ici exécute

        if ($succes === false) {
            return false; // si la requête n'a pas marché, je renvoie "false"
        } else {
            return $resultat; // sinon je renvoie les résultats de la requête
        } // fin if else
    } // fin foreach
} // fin fonction


// 3 - FONCTION POUR VERIFIER QUE LE BENEVOLE EST CONNECTE
function estConnecte() {
    if (isset($_SESSION['membre'])) { // s'il y a un indice membre, le membre est passé par la page de connexion
        return true; // true = il est connecté
    } else {
        return false;  // false = il n'est pas connecté
    }
}

// 4 - FONCTION POUR VERIFIER QUE LE MEMBRE EST ADMIN  (et qu'il est connecté)
function estAdmin() {
    if (estConnecte() && $_SESSION['membre']['statut'] == 1 ) {  // Si le membre à le statut 1 il est consideré comme Admin
        return true; // True = il est connecté ET il est ADMIN
    } else {
        return false; // Il est connecté pas il n'EST PAS ADMIN
    }
}

?>