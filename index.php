<?php  


session_start();
require __DIR__.'/vendor/autoload.php';
require './inc/function.php';



//  $_SESSION['login'] = true;
//  $_SESSION['test'] = 'problème résolu';


 

if(verifierAdmin()){
    require ('./backend/headerback.php');
}else{
    require ('./inc/header.php');
}










    
    require('./inc/main.php');
    require ('./inc/footer.php');
