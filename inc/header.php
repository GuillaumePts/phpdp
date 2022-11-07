<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style.css">
    <title>DP PHP</title>
</head>
<body>
    
    <header>
        <h1>logo</h1>
        <nav>
            <ul>
                <li><a href="index.php?page=accueil">Accueil</a></li>
                <li><a href="index.php?page=articles">Articles</a></li>
                <li><a href="index.php?page=contact">Contact</a></li>
                <li><a href="index.php?page=inscription">Inscription</a></li>
               
            </ul>
        </nav>
        <div class="login">
                
                <?php
                if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
                    echo '<li><a href="index.php?page=deconnexion">Déconnexion</a></li>';
                    echo '<li><a href="index.php?page=compte">Mon compte</a></li>'; 
                } else {
                    echo '<li><a href="index.php?page=connexion">Connexion</a></li>';
                                    
                }
                ?>
            </div>
    </header>
