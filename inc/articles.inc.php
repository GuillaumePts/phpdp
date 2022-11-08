<h2>articles</h2>

<?php

require 'pdo.php';



$sql = "SELECT * FROM categories ";
        $query = $pdo->prepare($sql);
        $query->execute();
        $res=$query->fetchAll();

        

        

        foreach($res as $re){
            $url = "index.php?page=articles&amp;categories=".$re['nom']."&amp;id=".$re['id_categories'];

            
            ?>
            <a href="<?= $url ;?>"><?= $re['nom'] ;?></a>

            
            <?php

        }


        if($_GET['id']){
           
            $sql = "SELECT * FROM articles WHERE categories_id_categories =".$_GET['id'];
            $query = $pdo->prepare($sql);
            $query->execute();
            $arts=$query->fetchAll();

            if(!empty($arts)){

                foreach($arts as $art){

                    ?>
                
                    <div><?= $art['nom'];?></div>
                    <img src="<?=$art['image'];?>" width="60px" alt="image du produit">
    
                    <?php

                }
              
            }else{
                echo 'existe pas';
            }

        }


