<?php
$bdd = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
$req = $bdd->prepare("SELECT * FROM Post");
$exe = $req->execute();
$videos = $req->fetchAll();
foreach($videos as $video):
    ?>
    <div class="post">
        <p><?=$video['auteur']?></p>
        <img src="<?=$video['video']?>" alt="">
        <form action="../pages/commenter.php" method="post">
            <textarea name="com" id="com" cols="70" rows="5" placeholder="Commentaire"></textarea>
            <input type="submit" name="publier<?=$video['idPost']?>" value="Publier">
        </form>
    </div>
    <?php
endforeach;