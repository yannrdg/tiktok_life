<main id="inscription">
    <fieldset>
        <legend>Inscription</legend>
        <form action="" method="post">
            <input type="text" placeholder="Login" name="login" id="login">
            <input type="email" placeholder="Adresse-mail" name="mail" id="mail">
            <input type="password" placeholder="Mot de passe" name="mdp" id="mdp">
            <input type="submit" value="Valider" name="btnValide">
        </form>
        <?php
        if(!empty($errorMsg))
        {
        ?>
        <p><?php echo $errorMsg; ?></p>
        <?php
        }
        ?>
    </fieldset>
</main>
