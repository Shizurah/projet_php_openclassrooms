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
    while ($data = $req1->fetch()) {
        $post = new Post($data);
    ?>
    
    <a href="view/display_post_and_comments.php?postId=<?= $post->id() ?>" class="chapters-list"><?= $post->title() ?></a><br/>

    <?php
    }
    $req1->closeCursor();
    ?>
</aside>