<h2>Back_categories</h2>

<?php

require ('pdo.php');

$sql = "SELECT * FROM categories ";
        $query = $pdo->prepare($sql);
        $query->execute();
        $res=$query->fetchAll();

        if(empty($res)){
            echo 'vous n\'avez aucunes categories';
        }else{
            foreach($res as $re){
                d($re);
            }
        }