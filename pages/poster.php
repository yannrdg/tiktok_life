<?php
    $login = 'admin';
    $valueNewName = $_POST['newName'];
    $fichier = $_FILES['file'];
    $filename = $_FILES['file']['name'];
    $filetmpname = $_FILES['file']['tmp_name'];
    $folder = '../briques/medias/';
    $extension = strtolower(substr(strrchr($filename,'.'),1));
    $newName = $valueNewName.'.'.$extension;
    $chemin = $folder.$newName;

    try
    {
        include 'config.php';
        $bdd = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
        if(isset($_POST['ajout']))
        {
            if(!empty($valueNewName) && !empty($fichier))
            {
                if($fileError == 0)
            {
                if($extension == 'jpg' || $extension == 'png')
                {
                    $reqFicher = $bdd->prepare("INSERT INTO Post (video, auteur) VALUES (:video, :auteur)");
                    $reqFicher->bindParam(':video', $chemin);
                    $reqFicher->bindParam(':auteur', $login);
                    $reqFicher->execute();
                    move_uploaded_file($filetmpname, $folder.$newName);
                    header('Location: accueil.php');
                }
                else
                {
                    header('Location: accueil.php?erreur=badExt');
                } 
            }
            else
            {
                header('Location: accueil.php?erreur=pasPoster');
            } 
            }
        }
    } 
    catch(PPDOException $Exception)
    {
        echo 'Impossible de traiter les données. Erreur : '.$Exception->getMessage();
    }