<?php
$_SESSION['login'] = false;
session_destroy();

echo "<script>window.location.replace('http://192.168.1.13:9999/index.php?page=accueil')</script>";
