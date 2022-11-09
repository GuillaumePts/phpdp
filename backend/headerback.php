<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../backend/backstyle.css">
    <title>Admin</title>
</head>
<body>
    
<header>
        

<div id="headertop">
    <div id="logo">
        <img src="../assets/img/logo.webp" alt="logo de l'entreprise" width="70px">
    </div>

    <h2 style="font-size:1rem">BACK OFFICE</h2>

    <div id="menuburger">
        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
            x="0px" y="0px" viewBox="0 0 250.579 250.579" style="enable-background:new 0 0 250.579 250.579;"
            xml:space="preserve">
            <g id="Menu">
                <path style="fill-rule:evenodd;clip-rule:evenodd;" d="M22.373,76.068h205.832c12.356,0,22.374-10.017,22.374-22.373
    c0-12.356-10.017-22.373-22.374-22.373H22.373C10.017,31.323,0,41.339,0,53.696C0,66.052,10.017,76.068,22.373,76.068z
     M228.205,102.916H22.373C10.017,102.916,0,112.933,0,125.289c0,12.357,10.017,22.373,22.373,22.373h205.832
    c12.356,0,22.374-10.016,22.374-22.373C250.579,112.933,240.561,102.916,228.205,102.916z M228.205,174.51H22.373
    C10.017,174.51,0,184.526,0,196.883c0,12.356,10.017,22.373,22.373,22.373h205.832c12.356,0,22.374-10.017,22.374-22.373
    C250.579,184.526,240.561,174.51,228.205,174.51z" />
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
        </svg>
    </div>

    </div>

    <div id="headerbottom" class="displaynone">

    <nav id="nav" >
        <ul>
        <li><a href="index.php?page=back_accueil">Accueil</a></li>
                <li><a href="index.php?page=back_commandes">Commandes</a></li>
                <li><a href="index.php?page=back_categories">Categories</a></li>
                <li><a href="index.php?page=back_produits">Produits</a></li>
                <li><a href="index.php?page=back_users">Utilisateurs</a></li>

        </ul>
    </nav>
   
    <div class="login">

        <?php
            if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
                echo '<a href="index.php?page=deconnexion">Déconnexion</a>';
                echo '<a href="index.php?page=compte">Mon compte</a>'; 
            } else {
                echo '<a href="index.php?page=connexion">Connexion</a>';
                                
            }
            ?>
    </div>

    </div>

   

   
    </header>