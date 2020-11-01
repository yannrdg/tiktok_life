<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../briques/style/header.css">
    <link rel="stylesheet" href="../briques/style/menu.css">
    <link rel="stylesheet" href="../briques/style/footer.css">
    <link rel="stylesheet" href="../briques/style/style.css">
    <link rel="stylesheet" href="../briques/style/post.css">
    <link rel="stylesheet" href="../briques/style/formulaire.css">
    <script src="../briques/script/like.js" async></script>
    <title><?php echo $title; ?></title>
</head>
<body>
<header>
    <div>
        <a href="accueil.php"><img src="../briques/medias/monogramme.png" alt="monogramme"></a>
        <?php
            include 'follow.php';
        ?>
        <h1>Mon portfolio</h1>
    </div>
    <?php
    include '../briques/html/menu.php';
    ?>
</header>