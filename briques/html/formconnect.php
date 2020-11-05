<main id="connexion">
    <fieldset>
        <legend>Connexion</legend>
        <form action="../pages/connecter.php" method="post">
            <input type="text" name="identifiant" placeholder="Identifiant">
            <input type="password" name="mdpConnect" placeholder="Votre mot de passe">
            <input type="submit" name="btnConnect" value="Se connecter">
        </form>
        <p>
        <?php
            if($_GET['erreur'] == "badId")
            {
                echo "Le mot de passe ou l'identifiant n'est pas correct";
            }
        ?>
        </p>
    </fieldset>
    <a href="inscription.php">Première inscription</a>
</main>