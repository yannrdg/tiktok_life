<?php
session_start();
require 'config.php';
require '../donnees/Utilisateur.php';

//Faire l'action demandée (Inscrire si le formulaire est envoyé)
if(isset($_POST['btnValide']))
{
    $login = htmlspecialchars($_POST['login']);
    $mail = htmlspecialchars($_POST['mail']);
    $mdp = password_hash($_POST['mdp'],  PASSWORD_DEFAULT);
    if(!empty($login) && !empty($mail) && !empty($mdp))
    {
        try
        {
            $bdd = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
	    
            $utilisateur = new Utilisateur($bdd, $mail, $login, $mdp); 
            
            //Recherche si le mail est déjà existant
            if(!$utilisateur->EmailExist())
            {
                //Recherche si le login est déjà existant
                if(!$utilisateur->LoginExist())
                {
		             $utilisateur->EnregistrerInfoBase();
                }
                else
                {
                    $errorMsg = "Le login est déjà pris";
                }
            }
            else
            {
                $errorMsg = "Vous possèdez déjà un compte avec ce mail";
            }
        }
        catch(PDOException $Exception)
        {
            $errorMsg = "Votre demande n'a pas pu être traitée. Raison: " . $Exception->getMessage();
        }
    }
    else
    {
       $errorMsg = "Il manque des informations";
    }
    if(empty($errorMsg))
    {
        header('Location: connexion.php');
    }
}

// Afficher la page correspondante 
require '../briques/html/header.php';
require '../briques/html/forminscription.php';
require '../briques/html/footer.php';

//Sinon rediriger vers une autre page
