<div class="blogPost">

    <div class="blogTitle">
        <h3><?php echo $post->getSubject(); ?></h3>
    </div>

    <div class="delete">
        <a href="blog/delete/<?php echo $post->getId(); ?>">
            <img src="img/delete.png" width="30" height="30"/>
        </a>
    </div>

    <div class="blogText">
        <p>
            <?php echo $post->getText(); ?>
        </p>
    </div>

    <div class="blogFooter">
        <?php echo $post->getAuthor(); ?>
        <?php echo $post->getCreatedAt(); ?>
    </div>

</div>
