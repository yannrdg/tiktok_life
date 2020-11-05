<main id="inscription">
    <fieldset>
        <legend>Inscription</legend>
        <form action="../pages/inscrire.php" method="post">
            <input type="text" placeholder="Login" name="login" id="login">
            <input type="email" placeholder="Adresse-mail" name="mail" id="mail">
            <input type="text" placeholder="Mot de passe" name="mdp" id="mdp">
            <input type="submit" value="Valider" name="btnValide">
        </form>
        <p>
        <?php
             if($_GET["erreur"] == "loginNo")
             {
                 echo "Ce login n'est pas disponible";
             }
             if($_GET["erreur"] == "userCompte")
             {
                 echo "Vous possédez déjà un compte !";
             }
             if($_GET["erreur"] == "mqueInfo")
             {
                 echo "Il manque des informations";
             }
        ?>
        </p>
    </fieldset>
</main>