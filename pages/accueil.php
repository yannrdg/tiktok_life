<?php
$title = "Accueil";
include '../briques/html/header.php';
include '../briques/html/menu.php';
if(isset($_SESSION['login']))
{
    echo "ok";
}
else 
{
    echo "no";
}
include '../briques/html/post.php';
include '../briques/html/footer.php';