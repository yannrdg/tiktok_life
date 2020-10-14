<?php
session_start();
include 'config.php';
$login = $_SESSION['login'];

$bdd = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
$req = $bdd->prepare("SELECT * FROM Post");
$exe = $req->execute();
$videos = $req->fetchAll();

$reqCom = $bdd->prepare("SELECT * FROM Commentaire");
$exeCom = $reqCom->execute();
$coms = $reqCom->fetchAll();


foreach($videos as $video):

$auteur = $video['auteur'];
$idPost = $video['idPost'];
$commentaire = $_POST['com'];


try
{
    //Ajouter un com
    if(isset($_POST['publier'.$idPost]))
    {
        $ajoutCom = $bdd->prepare("INSERT INTO Commentaire (auteur, idPost, commentaire) VALUES (?, ?, ?)");
        $ajoutCom->execute(array($login, $idPost, $commentaire));
        header('Location: accueil.php');
    }   
    //Supprimer un com
    foreach($coms as $com):
    $idCom = $com['idComment'];
    if(isset($_POST['supCom'.$idCom])){
        $supCom = $bdd->prepare("DELETE FROM Commentaire WHERE idComment = ?");
        $supCom->execute(array($idCom));
        header('Location: accueil.php');
    }
    endforeach;
} 
catch(PPDOException $Exception)
{
    echo 'Impossible de traiter les données. Erreur : '.$Exception->getMessage();
}

endforeach; 


