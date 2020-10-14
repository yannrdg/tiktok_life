<?php
$title = "Accueil";
include '../briques/html/header.php';
if(isset($_SESSION['login']))
{
    echo "ok";
}
else 
{
    echo "no";
}
include '../briques/html/post.php';
include '../briques/html/formPost.php';
include '../briques/html/footer.php';