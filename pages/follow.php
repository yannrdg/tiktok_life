<?php
session_start();
try
{
    include 'config.php';
    $bdd = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);  
    $buttonSuivre = $_POST['btnStatut'];
    $statut = "Suivre";
    $user = 'admin';
    $follower = $_SESSION['login'];

    if(isset($buttonSuivre))
    {
        $reqfo = $bdd->prepare("INSERT INTO Follow (follower, user) VALUES (:follower, :user)");
        $reqfo->bindParam(':follower', $follower);
        $reqfo->bindParam(':user', $user);
        $reqfo->execute();
        header('Location: accueil.php');
    }

} 
catch(PPDOException $Exception)
{
    echo 'Impossible de traiter les données. Erreur : '.$Exception->getMessage();
}
?>