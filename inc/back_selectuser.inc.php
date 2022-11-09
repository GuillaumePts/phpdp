<?php

// on recupère l'id dans l'url
$id = $_GET['id'];

// on vérifie si l'id est bien de type number si oui on lance la requete pdo
if(is_numeric($id) === false){
    echo 'l\'id doit etre un nombre';
    
}else{
    
require 'pdo.php';

// requete pdo
$sql = "SELECT * FROM users WHERE id_users =".$id;
        $query = $pdo->prepare($sql);
        $query->execute();
        $user=$query->fetch();

        
        // Gestion si utilisateur existe pas
        if(empty($user)){

            echo 'aucun utilisateur connu à l\'id = '.$_GET['id'];

        }else{

            echo '<h2>'.$user['nom'].' '.$user['prenom'];
            d($user);
            
        }
    }
