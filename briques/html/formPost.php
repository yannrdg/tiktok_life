<main>
    <section>
        <img src="" alt="">
        <p></p>
        <div>
            <input type="checkbox" id="coeur">
            <label for="coeur">
                <svg version="1.0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1280.000000 1280.000000"
                    preserveAspectRatio="xMidYMid meet">
                    <g transform="translate(0.000000,1280.000000) scale(0.100000,-0.100000)" fill="yellow"
                        stroke="none">
                        <path d="M3820 10864 c-238 -21 -540 -87 -750 -164 -252 -92 -562 -265 -764
                -428 -39 -31 -122 -106 -185 -167 -429 -417 -689 -967 -750 -1589 -16 -159
                -14 -484 5 -649 83 -762 416 -1452 1058 -2197 123 -143 467 -491 656 -665 322
                -295 676 -588 1355 -1120 799 -626 1062 -851 1385 -1181 244 -250 418 -476
                522 -679 24 -47 45 -85 48 -85 3 0 24 38 48 85 104 203 278 429 522 679 323
                330 586 555 1385 1181 918 719 1287 1036 1715 1471 283 289 463 499 655 769
                404 567 637 1147 700 1748 17 170 20 485 4 643 -61 622 -321 1172 -750 1589
                -63 61 -146 136 -185 167 -202 163 -512 336 -764 428 -153 56 -384 114 -561
                141 -208 33 -591 33 -794 1 -275 -43 -500 -114 -740 -232 -576 -284 -993 -786
                -1197 -1442 -18 -59 -35 -108 -38 -108 -3 0 -20 49 -38 108 -204 656 -621
                1158 -1197 1442 -351 173 -673 249 -1085 255 -118 1 -235 1 -260 -1z" />
                    </g>
                </svg>
            </label>
        </div>
    </section>
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