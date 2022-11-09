<h2>Gestion des Utilisateurs</h2>

<p style="margin : 0 20px">Pour modifier un utilisateur veuillez cliquer sur son ID</p>


<table>

    <tbody>
        <tr class="baseTr">
            <td class="baseTab tdid">ID</td>
            <td class="baseTab">NOM</td>
            <td class="baseTab">PNOM</td>
            <td class="baseTab">MAIL</td>
            <td class="baseTab">BAN</td>
            <td class="baseTab">ROLE</td>
            <td class="baseTab">TEL</td>
        </tr>

        <?php

require 'pdo.php';



        $sql = "SELECT * FROM users ";
        $query = $pdo->prepare($sql);
        $query->execute();
        $res=$query->fetchAll();

        if(empty($res)){
            echo 'vous n\'avez aucuns articles';
        }else{
            foreach($res as $re){

                if($re['role'] !== 'admin'){

                    $url = "index.php?page=back_selectuser&amp;id=".$re['id_users'];
                    ?>

        <tr class="tr">
            <td class="td"><a href=<?=$url;?>><?=$re['id_users']; ?></a></td>
            <td class="td"><?=$re['nom']; ?></td>
            <td class="td"><?=$re['prenom']; ?></td>
            <td class="td"><?=$re['email']; ?></td>
            <td class="td"><?=$re['ban']; ?></td>
            <td class="td"><?=$re['role']; ?></td>
            <td class="td"><?=$re['tel']; ?></td>
        </tr>

      



        <?php
            }
        }

    }

        ?>

    </tbody>
</table>