<h2>Back_produits</h2>


<?php

require 'pdo.php';



        $sql = "SELECT * FROM articles ";
        $query = $pdo->prepare($sql);
        $query->execute();
        $res=$query->fetchAll();

        if(empty($res)){
            echo 'vous n\'avez aucuns articles';
        }else{
            foreach($res as $re){
                d($re);
            }
        }