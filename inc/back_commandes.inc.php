<h2>Back_commandes</h2>

<?php

require 'pdo.php';



        $sql = "SELECT * FROM commandes ";
        $query = $pdo->prepare($sql);
        $query->execute();
        $res=$query->fetchAll();

        if(empty($res)){
            echo 'vous n\'avez aucunes commandes';
        }else{
            foreach($res as $re){
                d($re);
            }
        }

