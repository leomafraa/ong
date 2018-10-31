<?php
    $args = [
        'numberposts' => 2,
        'orderby' => 'post_date',
        'order' => 'DESC',
        'post_type' => 'post',
        'post_status' => 'publish',
    ];
    $latestPosts = wp_get_recent_posts($args, OBJECT);
?>
<section class="latest-posts">
    <div class="container">
        <h2>Blog <strong>notícias</strong></h2>
        <ul>
            <?php foreach ($latestPosts as $post) { ?>
            <li class="row">
                <div class="col-sm-6">
                    <div class="post-image-wrapper">
                        <span><?php echo date('d/m Y', strtotime($post->post_date_gmt)); ?></span>
                        <?php the_post_thumbnail($post->ID, 'large'); ?>
                    </div>
                </div>
                <div class="col-sm-6">
                    <h3><?php echo $post->post_title; ?></h3>
                    <p><?php echo get_post_custom_values('short_description', $post->ID)[0]; ?></p>
                    <a class="post-link" href="<?php echo $post->guid; ?>" title="Leia mais">Leia mais</a>
                    <p>Em <?php the_category($post->ID); ?></p>
                </div>
            </li>
            <?php } ?>
        </ul>
        <div class="more-posts">
            <a class="btn btn-danger" href="/?s" title="Ver mais">Ver mais</a>
        </div>
    </div>
</section>
