<?php
try
{
    include 'config.php';
    $bdd = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);

    $login = htmlspecialchars($_POST['login']);
    $mail = htmlspecialchars($_POST['mail']);
    $mdp = password_hash($_POST['mdp'],  PASSWORD_DEFAULT);


    if(isset($_POST['btnValide']))
    {
        if(!empty($login) && !empty($mail) && !empty($mdp))
        {
            $reqMail = $bdd->prepare("SELECT mail FROM Utilisateur WHERE mail = ?");
            $reqMail->execute(array($mail));
            $mailExist = $reqMail->rowCount();
            if($mailExist == 0)
            {
                $reqLogin = $bdd->prepare("SELECT login FROM Utilisateur WHERE login = ?");
                $reqLogin->execute(array($login));
                $loginExist = $reqLogin->rowCount();
                if($loginExist == 0)
                {
                    $reqco = $bdd->prepare("INSERT INTO Utilisateur (login, mail, mdp) VALUES (:login, :mail, :mdp)");
                    $reqco->bindParam(':login', $login);
                    $reqco->bindParam(':mail', $mail);
                    $reqco->bindParam(':mdp', $mdp);
                    $reqco->execute();
                    header('Location: connexion.php');
                }
                else
                {
                    echo "Ce login n'est pas disponible";
                }
            }
            else
            {
                echo "Vous possédez déjà un compte !";
            }
        }
        else
        {
            echo "Il manque des informations";
        }
    }
} catch(PPDOException $Exception)
{
    echo 'Impossible de traiter les données. Erreur : '.$Exception->getMessage();
}


