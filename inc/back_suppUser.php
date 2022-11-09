<?php

    $id= $_GET['id'];

    require 'pdo.php';

    if(is_numeric($id) === false){
        
        echo "<script>window.location.replace('http://192.168.1.13:9999/index.php?page=back_users')</script>";
        
    }else{


    $sql = "DELETE FROM users WHERE id_users =".$id;
        $query = $pdo->prepare($sql);
        $query->execute();

        if($query->execute()){

            echo "<script>window.location.replace('http://192.168.1.13:9999/index.php?page=back_users')</script>";

            
        }else{
            // Traitement de l'erreur
        }
        

    }