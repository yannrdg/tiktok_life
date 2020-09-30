<?php
    $filename = $_FILES['file']['name'];
    $filetmpname = $_FILES['file']['tmp_name'];
    $folder = '../briques/medias/';
    $extension = strtolower(substr(strrchr($filename,'.'),1));
    $newName = 'yes'.'.'.$extension;

    if(isset($_POST['ajout']))
    {
        if($fileError == 0)
        {
            if($extension == 'jpg')
            {
                move_uploaded_file($filetmpname, $folder.$newName);
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