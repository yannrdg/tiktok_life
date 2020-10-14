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
?>
<main>
<?php
include '../briques/html/post.php';
include '../briques/html/formPost.php';
?>
</main>
<?php
include '../briques/html/footer.php';

