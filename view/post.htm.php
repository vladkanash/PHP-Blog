<div class="blogPost">

    <div class="blogTitle">
        <h3><?php echo $post->getSubject(); ?></h3>
    </div>

    <div class="delete">
        <a href="index.php?action=delete&id=<?php echo $post->getId(); ?>">
            <img src="img/delete.png" width="30" height="30"/>
        </a>
    </div>

    <div class="blogText">
        <?php echo $post->getText(); ?>
    </div>

    <div class="blogFooter">
        <?php echo $post->getAuthor(); ?>
        <?php echo $post->getCreatedAt(); ?>
    </div>

</div>
