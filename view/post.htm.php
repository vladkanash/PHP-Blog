<div class="blogPost">

    <h3><?php echo $post->getSubject(); ?></h3>

    <div class="blogText">
        <?php echo $post->getText(); ?>
    </div>

    <div class="blogFooter">
        <?php echo $post->getAuthor(); ?>
        <?php echo $post->getCreatedAt(); ?>
    </div>

</div>
