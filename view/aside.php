<aside>
    <h3>A PROPOS DE L'AUTEUR</h3>
    <div id="author-avatar">
        <img src="public/images/jean.png" alt="Jean Forteroche">    
    </div>
    <p>
        Jean Forteroche <br/>
        Ecrivain contemporain et romancier<br/>
        Paris
    </p>
    
    <h3>CHAPITRES</h3>
    <?php
    foreach($posts as $post) {
    // while ($data = $req1->fetch()) {
    //     $post = new Post($data);
    ?>
    
    <a href="index.php?action=post&amp;postId=<?= $post->id() ?>" class="chapters-list"><?= $post->title() ?></a><br/>

    <?php
    }
    ?>
</aside>