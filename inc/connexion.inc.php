<h2>connection</h2>



<?php

require ('pdo.php');


//  ANTI FAILLE XSS
if (isset($_POST['frmLogin'])) {
    $email = isset($_POST['email']) ? htmlentities(trim($_POST['email'])) : "";
    $mdp = isset($_POST['mdp']) ? htmlentities(trim($_POST['mdp'])) :  "";


    // TABLEAU DES ERREURS
    $erreurs = array();

    if (mb_strlen($email) === 0)
        array_push($erreurs, "Veuillez saisir une adresse mail");
    
    elseif (!(filter_var($email, FILTER_VALIDATE_EMAIL)))
        array_push($erreurs, "Veuillez saisir une adresse conforme");

    if (mb_strlen($mdp) === 0)
        array_push($erreurs, "Veuillez saisir un mot de passe");
    
    if (count($erreurs) > 0) {
        $messageErreurs = "<ul>";

        for ($i = 0 ; $i < count($erreurs) ; $i++) {
            $messageErreurs .= "<li>";
            $messageErreurs .= $erreurs[$i];
            $messageErreurs .= "</li>";
        }

        $messageErreurs .= "</ul>";

        echo $messageErreurs;

        require 'frmconnexion.php';

    } else {
        if (verifierLogin($email,$mdp)) {
            $recupDatasUser = "SELECT * FROM users WHERE email='$email'";
            global $pdo;
            if ($pdo) {
                $datasUser = $pdo->query($recupDatasUser);
                $datasUser = $datasUser->fetchAll();

                
           

                $_SESSION['prenom'] = $datasUser[0]['prenom'];
                $_SESSION['nom'] = $datasUser[0]['nom'];
                $_SESSION['role'] = $datasUser[0]['role'];
                $_SESSION['mdp'] = $datasUser[0]['mdp'];
                $_SESSION['email'] = $datasUser[0]['email'];
                $_SESSION['tel'] = $datasUser[0]['tel'];
                $_SESSION['role'] = $datasUser[0]['role'];
                
            }

            $_SESSION['login'] = true;
            d($_SESSION);

            verifierAdmin();
           echo "<script>window.location.replace('http://192.168.1.13:9999/index.php?page=back_accueil')</script>";
           
        } else {
            echo "Erreur dans votre login/password";
        }
    }

} else {
    $email = "";
    require 'frmconnexion.php';
}
