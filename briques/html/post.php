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
    </div>
    <?php
endforeach;