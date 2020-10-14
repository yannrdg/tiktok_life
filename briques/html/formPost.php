<?php
if(isset($_SESSION['login']))
{
?>
    <form action="../pages/poster.php" method="post" enctype="multipart/form-data">
        <div>
            <label for="">Déposer votre image ou votre vidéo : </label>
            <input type="file" name="file" value="déposez">
            <input type="text" name="newName" placeholder="Nom du fichier">
        </div>
        <input type="submit" name="ajout" value="Ajouter un article" id="ajout">
    </form>
    <p>
    <?php
    if($_GET["erreur"] == "pasPoster")
    {
        echo "Votre vidéo n'a pas pu être posté !";
    }
    else if($_GET["erreur"] == "badExt")
    {
        echo "Le fichier doit être une vidéo ou une photo";
    }
    ?>
    </p>
<?php
}
?>
</main>