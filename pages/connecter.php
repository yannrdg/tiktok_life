<?php
session_start();
try
{
    include 'config.php';
    $bdd = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);

    $identifiant = $_POST['identifiant'];
    $btnConnect = $_POST['btnConnect'];

    //Récuperer le mdp dans la bdd du login mis dans le formulaire
    $reqMdp = $bdd->prepare("SELECT mdp FROM Utilisateur WHERE login = ? || mail = ?");
    $exe = $reqMdp->execute(array($identifiant, $identifiant));
    $mdp = $reqMdp->fetchAll();

    $mdpConnect = $_POST['mdpConnect'];


    if(isset($btnConnect))
    {
        if(!empty($identifiant) && !empty($mdpConnect))
        {
            //Voir si le mdp correspond au login mis
            if(password_verify($mdpConnect, $mdp[0][0]))
            {
                $requser = $bdd->prepare("SELECT * FROM Utilisateur WHERE (login = ? || mail = ?)");
                $requser->execute(array($identifiant, $identifiant));
                $userexist = $requser->rowCount();
                if($userexist == 1)
                {
                    $userinfo = $requser->fetch();
                    $_SESSION['login'] = $userinfo['login'];
                    $_SESSION['mail'] = $userinfo['mail'];
                    header('Location: accueil.php');
                }
            }
            else
            {
                header('Location: connexion.php?erreur=badId');
            }
        }
    }

} 
catch(PPDOException $Exception)
{
    echo 'Impossible de traiter les données. Erreur : '.$Exception->getMessage();
}