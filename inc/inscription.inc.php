<h2>inscription</h2>

<?php 

//  Si formulaire soumis 
if (isset($_POST['frmInscription'])) {


    d($_POST);

    //  On évite les failles XSS avec htmlentities
    $nom = isset($_POST['nom']) ? htmlentities(trim($_POST['nom'])) : "";
    $prenom = isset($_POST['prenom']) ? htmlentities(trim($_POST['prenom'])) : "";
    $email = isset($_POST['email']) ? htmlentities(trim($_POST['email'])) : "";
    $adresse = isset($_POST['adresse']) ? htmlentities(trim($_POST['adresse'])) : "";
    $tel = isset($_POST['tel']) ? htmlentities(trim($_POST['tel'])) : "";
    $mdp1 = isset($_POST['mdp1']) ? htmlentities(trim($_POST['mdp1'])) :  "";
    $mdp2 = isset($_POST['mdp2']) ? htmlentities(trim($_POST['mdp2'])) :  "";
    $cgu = isset($_POST['cgu']) ? $_POST['cgu'] :  "";


    // Stockage des erreures
    $erreurs = array();


    // Si un champ est vide il emet une erreur
    if (mb_strlen($nom) === 0)
        array_push($erreurs, "Veuillez saisir votre nom");

    if (mb_strlen($prenom) === 0)
        array_push($erreurs, "Veuillez saisir votre prénom");

    if (mb_strlen($email) === 0)
        array_push($erreurs, "Veuillez saisir une adresse mail");

        if (mb_strlen($adresse) === 0)
        array_push($erreurs, "Veuillez saisir une adresse ");

        if (mb_strlen($tel) === 0)
        array_push($erreurs, "Veuillez saisir un tel");


        // Verifie si email est conforme
    elseif (!(filter_var($email, FILTER_VALIDATE_EMAIL)))
        array_push($erreurs, "Veuillez saisir une adresse mail conforme");


        // Verifie si les 2 mdp concordent
    if (mb_strlen($mdp1) === 0 || mb_strlen($mdp2) === 0)
        array_push($erreurs, "Veuillez saisis deux fois votre mot de passe");

    elseif ($mdp1 !== $mdp2)
        array_push($erreurs, "Vos mots de passe ne sont pas identiques");


        // Si cgu pas séléctionné = erreur
    if (empty($_POST['cgu']))
        array_push($erreurs,  "Vous n'êtes pas d'accord avec les conditions de service");

        
    
    // Traitement des erreurs si y'en à
    if (count($erreurs) > 0) {
        $messageErreurs = "<ul>";

        for ($i = 0; $i < count($erreurs); $i++) {
            $messageErreurs .= "<li>";
            $messageErreurs .= $erreurs[$i];
            $messageErreurs .= "</li>";
        }

        $messageErreurs .= "</ul>";

        echo $messageErreurs;


        // Formulaire recursive
        require_once 'frmInscription.php';
    } else {
        // Vérification de l'inscription préalable ou non de l'utilisateur
        if (verifierUtilisateur($email)) {
            // La fonction verifierUtilisateur() renvoie vrai (il y a déjà une ligne avec cette adresse), pas de traitement
            echo "Vous êtes déjà inscrit";
        } else {
            // La fonction verifierUtilisateur() renvoie faux, donc on procède à l'inscription
            if (inscrireUtilisateur($nom, $prenom, $email, $mdp1, $adresse, $tel))
                $message = "Utilisateur inscrit";
            else
                $message = "Erreur";

            echo $message;

            //echo "<script>window.location.replace('http://localhost:8080/DWWM-Vernon-2022-PHP-Alibobo/')</script>";
        }
    }
} else {

    // On reset les champs
    $nom = $prenom = $email = $cgu = $adresse = $tel =  "";
    require_once 'frmInscription.php';
}


?>