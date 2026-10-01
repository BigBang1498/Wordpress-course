<?php
    get_header();
?>
<section>
    <h2>Our Store</h2>
    <?php
    if ( have_posts() ) : ?>
        <?php while ( have_posts() ): the_post(); ?>
            <article class="my-post-store-product">
                <h2><?php the_title(); ?></h2>
                <p>Published on <?php  the_time('F j,Y'); ?> by <?php the_author(); ?></p>
                <?php the_content(); ?>
                <button>Add to cart</button>
            </article>
        <?php endwhile;
    endif;
?>
</section>
<?php
    get_footer();
?>

