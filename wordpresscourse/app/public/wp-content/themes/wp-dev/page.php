<?php
    get_header();
?>
<section>
    <?php
    if ( have_posts() ) : ?>
        <?php while ( have_posts() ): the_post(); ?>
            <article class="my-post">
                <h2><?php the_title(); ?></h2>
                <?php the_content(); ?>
            </article>
        <?php endwhile;
    endif;
?>
</section>
<?php
    get_footer();
?>