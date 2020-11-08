<?php
try{
    include 'config.php';
    $bdd  = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);

    $idPost = $_GET['id'];
    $login = $_GET['login'];
    $reqLike = $bdd->prepare('SELECT * FROM Jaime WHERE idPost = :idPost && user = :user');
    $reqLike->bindParam(':idPost', $idPost);
    $reqLike->bindParam(':user', $login);
    $reqLike->execute();
    $allLike = $reqLike->rowCount();

    if($allLike == 0)
    {
        $ajoutLike = $bdd->prepare('INSERT INTO Jaime (idPost, user) VALUES (:idPost, :user)');
        $ajoutLike->bindParam(':idPost', $idPost);
        $ajoutLike->bindParam(':user', $login);
        $ajoutLike->execute();
        header('Location: accueil.php');
    }
    else if($allLike == 1)
    {
        $supLike = $bdd->prepare('DELETE FROM Jaime WHERE idPost = :idPost && user = :user');
        $supLike->bindParam(':idPost', $idPost);
        $supLike->bindParam(':user', $login);
        $supLike->execute();
        header('Location: accueil.php');
    }
} 
catch(PPDOException $Exception)
{
    echo 'Impossible de traiter les données. Erreur : '.$Exception->getMessage();
}