<?php 

require ('pdo.php');


// La fonction autoInclude permet d'inclure automatiquement les vues sans devoir les requires
function autoInclude(string $file): void {
    // Récupération de tous les fichiers du répertoire 'includes' qui ont la double extension .inc.php
    $includedFiles = glob("./inc/*.inc.php");
    // Concaténation du nom de fichier avec le chemin et l'extension
    $file = "./inc/" . $file . ".inc.php";

    // Si le nombre de fichiers dans le tableau est > 0 et que la chaîne de caractères $files est dans le tableau
    if (count($includedFiles) !== 0 && in_array($file, $includedFiles)) {
        require_once $file;
    } else {
        require_once './inc/accueil.inc.php';
    }
};

function d($var){
    dump($var);
};


// Verifie si l'utilisateur existe déja
function verifierUtilisateur($email) {
    global $pdo;
    if ($pdo ) {
        $sql = "SELECT * FROM users WHERE email= '$email'";
        $query = $pdo->prepare($sql);
        $query->execute();
        $nbreLigne=$query->fetchAll();
        dump($nbreLigne);
        if (!empty($nbreLigne)) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}


// Requete pdo pour ajout utilisateur
// par defaut l'utilisateur est pas bani et à le statut de l'utilisateur
function inscrireUtilisateur(string $nom, string $prenom, string $email, string $mdp, string $adresse , int $tel, string $ban='non', string $role='utilisateur'): bool {
    
    // Hachage de mdp
    $mdp = password_hash("$mdp", PASSWORD_DEFAULT);
    ;

    global $pdo;
    if ($pdo) {

        // On utilise BindValue pour sécuriser les attaques SQL
        $requeteInscription = "INSERT INTO users
        (nom, prenom, email, ban, mdp, role, adresse, tel)
        VALUES (:nom, :prenom, :email, :ban, :mdp, :role, :adresse, :tel)";
        $query = $pdo->prepare($requeteInscription);
        $query->bindValue(':nom', $nom, PDO::PARAM_STR);
        $query->bindValue(':prenom', $prenom, PDO::PARAM_STR);
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        $query->bindValue(':mdp', $mdp, PDO::PARAM_STR);
        $query->bindValue(':adresse', $adresse, PDO::PARAM_STR);
        $query->bindValue(':tel', $tel, PDO::PARAM_INT);
        $query->bindValue(':ban', $ban, PDO::PARAM_STR);
        $query->bindValue(':role', $role, PDO::PARAM_STR);
        $query->execute();
        return true;
    } else {
        return false;
    }
}


// Verifie si email et mdp = ok
function verifierLogin($email, $motdepasse) {
    global $pdo;
    if ($pdo) {
        if (verifierUtilisateur($email)) {
            $recupMdp = "SELECT mdp FROM users WHERE email='$email'";
            $resultRecupMdp = $pdo->query($recupMdp);
            $mdpBDD = $resultRecupMdp->fetchAll();
            $mdpBDD = $mdpBDD[0]['mdp'];

            if (password_verify($motdepasse, $mdpBDD)) 
                return true;
            else 
                return false;

        } else {
            return false;
        }
    } else {
        return false;
    }
}


// Verifie si c'est un admin qui se connecte 
function verifierAdmin(): bool {
    if (isset($_SESSION['login']) && $_SESSION['login'] === true && $_SESSION['roles'] === 'admin') 
        return true;
    else
        return false;
}

;?>