<aside>
    <div class="aside-titles">
        <h3>A PROPOS</h3>
    </div>
    
    <div id="author-avatar">
        <img src="public/images/jean.png" alt="Jean Forteroche">    
    </div>
    <p>
        <strong>Jean Forteroche</strong> <br/>
        Ecrivain contemporain et romancier<br/>
        Paris
    </p>

    <div id="networks">
        <img src="public/images/fb.png" alt="Icône Facebook" width="21px" height="22px">
        <img src="public/images/twitter.png" alt="Icône Twitter">
        <img src="public/images/youtube.png" alt="Icône Youtube" width="26px" height="27px">
    </div>
    <br/><br/>
    <!-- <hr/> -->
    
    <div class="aside-titles">
        <h3>CHAPITRES</h3>
    </div>
    
        
    <?php
        foreach($posts as $post) {
    ?>
    
            <a href="index.php?action=post&amp;postId=<?= $post->id() ?>" class="chapters-list"><?= $post->title() ?></a><br/>

    <?php
        }
    ?>
</aside>