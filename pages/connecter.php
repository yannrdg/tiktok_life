<?php
session_start();
try
{
    include 'config.php';
    $bdd = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);

    $identifiant = $_POST['identifiant'];
    $btnConnect = $_POST['btnConnect'];

    $reqMdp = $bdd->prepare("SELECT mdp FROM Utilisateur WHERE login = ? || mail = ?");
    $exe = $reqMdp->execute(array($identifiant, $identifiant));
    $mdp = $reqMdp->fetchAll();

    $mdpConnect = $_POST['mdpConnect'];


    if(isset($btnConnect))
    {
        if(!empty($identifiant) && !empty($mdpConnect))
        {
            if(password_verify($mdpConnect, $mdp[0][0]))
            {
                $requser = $bdd->prepare("SELECT * FROM Utilisateur WHERE (login = ? || mail = ?)");
                $requser->execute(array($idconnnect, $identifiant));
                $userinfo = $requser->fetch();
                $_SESSION['login'] = $userinfo['login'];
                $_SESSION['mail'] = $userinfo['mail'];
                header('Location: accueil.php');
            }
            else
            {
                echo 'no';
            }
        }
    }

} 
catch(PPDOException $Exception)
{
    echo 'Impossible de traiter les données. Erreur : '.$Exception->getMessage();
}