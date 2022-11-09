<h2>Gestion des produits</h2>


<table>

<a id="ajoutbutton" href="#">Add +</a>

<tbody>



  <tr class="baseTr">
    <td class="baseTab tdid">ID</td>
    <td class="baseTab">NOM</td>
    <td class="baseTab">QTS</td>
    <td class="baseTab">PRIX</td>
    <td class="baseTab">REF</td>
    <td class="baseTab">IMG</td>
    <td class="baseTab">CATg</td>
    
  </tr>


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
                ?>

<tr class="tr">
    <td class="td"><a href="#"><?=$re['id_articles']; ?></a></td>
    <td class="td"><?=$re['nom']; ?></td>
    <td class="td"><?=$re['quantite']; ?></td>
    <td class="td"><?=$re['prix']; ?></td>
    <td class="td"><?=$re['ref']; ?></td>
    <td class="td"><?=$re['image']; ?></td>
    <td class="td"><?=$re['categories_id_categories']; ?></td>
  </tr> 

                <?php
            }
        }


        ?>

    </tbody>
    </table>