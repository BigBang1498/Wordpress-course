<?php
/* Template Name: Landing Page */
get_header( 'landing' );
?>
<section>
<?php
    if ( have_posts() ) : ?>
        <?php while ( have_posts() ): the_post(); ?>
            <article class="my-post">
                <?php the_content(); ?>
            </article>
        <?php endwhile;
    endif;
?>
</section>
<?php
get_footer( 'landing' );
?>