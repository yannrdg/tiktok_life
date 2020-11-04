<nav>
    <?php
            if($_SESSION['mail'])
            {
        ?>
                <ul id="menu-connect">
                    <li>
                        <input type="checkbox" name="chec-profil" id="chec-profil">
                        <label for="chec-profil">
                            <svg id="profilbase" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 124.73 124.74">
                                <style>
                                    .cls-1 {
                                        fill: #e8e1d7;
                                    }

                                    .cls-2 {
                                        fill: #c5226d;
                                    }

                                    .cls-3 {
                                        fill: #133149;
                                    }
                                </style>
                                <g id="Calque_2" data-name="Calque 2">
                                    <g id="Calque_1-2" data-name="Calque 1">
                                        <path class="cls-1"
                                            d="M124.73,62.37a62.08,62.08,0,0,1-8.45,31.36C109.3,83.28,97,75.15,82.11,71.28a25.14,25.14,0,0,1-39.49,0c-14.93,3.87-27.19,12-34.17,22.46A62.37,62.37,0,1,1,124.73,62.37Z" />
                                        <circle class="cls-2" cx="62.36" cy="49.42" r="25.15" />
                                        <path class="cls-3"
                                            d="M116.28,93.73A62.37,62.37,0,0,1,12.16,99.37a61.43,61.43,0,0,1-3.71-5.63c7-10.46,19.24-18.59,34.17-22.46a25.14,25.14,0,0,0,39.49,0C97,75.15,109.3,83.28,116.28,93.73Z" />
                                    </g>
                                </g>
                            </svg>
                        </label>
                        <ul id="deco">
                            <li><a href="deconnexion.php">Déconnexion</a></li>
                            <li><a href="">Profil</a></li>
                        </ul>
                    </li>
                </ul>
    <?php
            }
            else
            {
        ?>
    <ul id="menu-deco">
        <li><a href="connexion.php">Connexion</a></li>
        <li><a href="inscription.php">Inscription</a></li>
    </ul>
    <?php
            }
        ?>

</nav>