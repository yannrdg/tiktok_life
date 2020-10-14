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
    $title = "Inscription";
    include '../briques/html/header.php';
    include '../briques/html/menu.php';
    include '../briques/html/formincription.php';
    if($_GET["erreur"] == "loginNo")
    {
        echo "Ce login n'est pas disponible";
    }
    if($_GET["erreur"] == "userCompte")
    {
        echo "Vous possédez déjà un compte !";
    }
    if($_GET["erreur"] == "mqueInfo")
    {
        echo "Il manque des informations";
    }
    include '../briques/html/footer.php';
}