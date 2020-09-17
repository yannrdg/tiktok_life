<?php
session_start();
$title = "Accueil";
include '../briques/html/header.php';
include '../briques/html/menu.php';
echo $_SESSION['login'];
include '../briques/html/footer.php';