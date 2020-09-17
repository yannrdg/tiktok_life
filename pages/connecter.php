<?php
try
{
    include 'config.php';
    $bdd = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    
} 
catch(PPDOException $Exception)
{
    echo 'Impossible de traiter les données. Erreur : '.$Exception->getMessage();
}