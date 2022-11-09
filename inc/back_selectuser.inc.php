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

            ?>

<h2><?=$user['nom'].' '.$user['prenom'];?></h2>

<a href="index.php?page=back_users">Retour</a>

<div id="user">



    <p>Nom : <span style="color:green"><?=$user['nom'];?></span></p>
    <p>Prenom : <span style="color:green"><?=$user['prenom'];?></span></p>
    <p>Email : <span style="color:green"><?=$user['email'];?></span></p>
    <p>Ban : <span style="color:green"><?=$user['ban'];?></span></p>
    <p>Role : <span style="color:green"><?=$user['role'];?></span></p>
    <p>Adresse : <span style="color:green"><?=$user['adresse'];?></span></p>
    <p>Tel : <span style="color:green"><?=$user['tel'];?></span></p>


</div>

<div id="editordelete">
    <a href="#">Modifier</a>
    <a href="index.php?page=back_selectuser&id=<?=$id.'&amp;accord=non'?>">Supprimer</a>
</div>

<?php
            
            
        };
    };

    if(isset($_GET['accord']) && $_GET['accord'] === 'non'){

         include 'back_accordSupp.php';

    }

    if(isset($_GET['accord']) && $_GET['accord'] === 'oui'){

        include 'back_suppUser.php';

   }
