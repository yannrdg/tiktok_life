<?php
session_start();
if($_SESSION['login'])
{
    header('Location: accueil.php');
}
else
{
    if($_SESSION['mail'])
    {
        header('Location: accueil.php');
    }
    $title = "Connexion";
    include '../briques/html/header.php';
    include '../briques/html/menu.php';
    include '../briques/html/formconnect.php';
}


   
