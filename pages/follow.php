<?php
session_start();
try
{
    include 'config.php';
    $bdd = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);  
    $buttonSuivre = $_POST['btnStatut'];
    $user = 'admin';
    $follower = $_SESSION['login'];

    $reqSuivi = $bdd->prepare("SELECT * FROM Follow WHERE follower = :follower && user = :user");
    $reqSuivi->bindParam(':follower', $follower);
    $reqSuivi->bindParam(':user', $user);
    $reqSuivi->execute();
    $statutSuivi = $reqSuivi->rowCount();

    if($statutSuivi == 0)
    {
        $statut = "Suivre";
    }
    else if($statutSuivi == 1)
    {
        $statut = "Abonné";
    }

    if(isset($buttonSuivre))
    {
        if($statutSuivi == 0)
        {
            $reqfo = $bdd->prepare("INSERT INTO Follow (follower, user) VALUES (:follower, :user)");
            $reqfo->bindParam(':follower', $follower);
            $reqfo->bindParam(':user', $user);
            $reqfo->execute();
            header('Location: accueil.php');
        }
        else if($statutSuivi == 1)
        {
            $supfo = $bdd->prepare("DELETE FROM Follow WHERE follower = :follower && user = :user");
            $supfo->bindParam(':follower', $follower);
            $supfo->bindParam(':user', $user);
            $supfo->execute();
            header('Location: accueil.php');
        }
    }

    //Gestion du nombre d'abonnés
    
    $reqab = $bdd->prepare("SELECT * FROM Follow WHERE user = ?");
    $reqab->execute(array($user));  
    $nbrab = $reqab->rowCount();

} 
catch(PPDOException $Exception)
{
    echo 'Impossible de traiter les données. Erreur : '.$Exception->getMessage();
}
?>

<div id="suivi">
    <section>
        <h3>Nombre d'abonnés</h3>
        <p><?php echo $nbrab;?></p>
    </section>
    <form action="" method="post">
        <input type="submit" name="btnStatut" value="<?php echo $statut?>">
    </form>
</div>