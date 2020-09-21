<nav>
    <ul>
        <li><a href="accueil.php">Accueil</a></li>
        <?php
            if($_SESSION['mail'])
            {
        ?>
        <li><a href="deconnexion.php">Déconnexion</a></li>
        <?php
            }
            else
            {
        ?>
            <li><a href="connexion.php">Connexion</a></li>
            <li><a href="inscription.php">Inscription</a></li>
        <?php
            }
        ?>
        
    </ul>
</nav>