<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style.css">
    <title>Admin</title>
</head>
<body>
    
<header>
        <h1>BACK OFFICE</h1>
        <nav>
            <ul>
                <li><a href="index.php?page=back_accueil">Accueil</a></li>
                <li><a href="index.php?page=back_commandes">Commandes</a></li>
                <li><a href="index.php?page=back_categories">Categories</a></li>
                <li><a href="index.php?page=back_produits">Produits</a></li>
                <li><a href="index.php?page=back_users">Utilisateurs</a></li>
               
            </ul>
        </nav>
        <div class="login" >
                
                <?php
                if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
                    echo '<li><a href="index.php?page=deconnexion">Déconnexion</a></li>';
                    
                } else {
                    echo '<li><a href="index.php?page=connexion">Connexion</a></li>';
                                    
                }
                ?>
            </div>
    </header>