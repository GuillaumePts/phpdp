<?php

$id=$_GET['id'];

$urlannule = 'index.php?page=back_selectuser&id='.$id;

$urlok = 'index.php?page=back_selectuser&id='.$id.'&accord=oui';

?>



<div id="alert">

    <p>Etes vous sur de devoir supprimer cet utilisateur ?</p>

    <div style="display:flex;gap:40px">
    <a style="background-color: #dadada; color:#333" href="<?=$urlok;?>">OK</a>
    <a  href="<?=$urlannule;?>">Annuler</a>
    </div>
</div>