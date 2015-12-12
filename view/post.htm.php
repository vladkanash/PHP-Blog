<p>
    <h3><?php echo $post->getSubject(); ?></h3>
    <div>
        <?php echo $post->getText(); ?>
    </div>
    <?php echo $post->getCreated_at(); ?>
