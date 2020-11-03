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
        $statut = "Suivre +";
        ?>
        <style>
            #btn-follow
            { 
                background-color: #C5226D;
                color: #E8E1D7;
            }
        </style>
    <?php
    }
    else if($statutSuivi == 1)
    {
        $statut = "Abonné";
    ?>
        <style>
            #btn-follow
            { 
                background-color: #F6A248;
                color: #133149;
            }
        </style>
    <?php
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
        <p><?php echo $nbrab;?></p>
        <h3>Abonnés</h3>
    </section>
    <?php
        if($_SESSION['login'])
        {
    ?>
            <form action="" method="post">
                <input type="submit" name="btnStatut" value="<?php echo $statut?>" id="btn-follow">
            </form>
    <?php
        }
    ?>
</div>