<?php
    get_header();
?>
<section>
    <?php
    if ( have_posts() ) : ?>
        <?php while ( have_posts() ): the_post(); ?>
            <article class="">
                <h2><?php the_title(); ?></h2>
                <p>Published on <?php  the_time('F j,Y'); ?> by <?php the_author(); ?></p>
                <?php the_content(); ?>
            </article>
        <?php endwhile;
    endif;
?>
</section>
<aside>
    <?php
        //El parametro es id de register_sidebar
        dynamic_sidebar( 'main_sidebar' );
    ?>
</aside>
<?php
    get_footer();
?>

