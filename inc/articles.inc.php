<h2>articles</h2>

<?php

require 'pdo.php';



$sql = "SELECT * FROM categories ";
        $query = $pdo->prepare($sql);
        $query->execute();
        $res=$query->fetchAll();

        

        

        foreach($res as $re){
            $url = "index.php?page=articles&amp;categories=".$re['nom'];
            ?>
            <a href="<?= $url ;?>"><?= $re['nom'] ;?></a>
               
            <?php

$sql = "SELECT * FROM articles WHERE categories_id_categories =".$re['id_categories'];
$query = $pdo->prepare($sql);
$query->execute();
$arts=$query->fetchAll();

foreach($arts as $art){
    ?>

 <p><?= $art['nom'] ;?></p>

    <?php
}
        }   