<?php
include 'config.php';
$bdd = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
$bdd = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
$req = $bdd->prepare("SELECT * FROM Post");
$exe = $req->execute();
$videos = $req->fetchAll();
foreach($videos as $video):
$auteur = $video['auteur'];
$idVideo = $video['idPost'];
$btnPublier = $_POST['publier'];
$commentaire = $_POST['com'];
try
{
    if(isset($_POST['publier'.$idVideo]))
    {
        $reqCom = $bdd->prepare("INSERT INTO Commentaire (auteur, idPost, commentaire) VALUES (?, ?, ?)");
        $reqCom->execute(array($auteur, $idVideo, $commentaire));
    }   
} 
catch(PPDOException $Exception)
{
    echo 'Impossible de traiter les données. Erreur : '.$Exception->getMessage();
}
endforeach;  