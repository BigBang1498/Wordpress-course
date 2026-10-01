<?php
    get_header();

//get_template_part( 'templates/reviews', '3-layout');
    if( have_posts() ) :
        while ( have_posts() ) : the_post(); ?>
        <?php  //get_template_part( 'content', 'post' ); ?>
        <article class="my-post policy-page">
            <h1>My random template</h1>
            <h2><?php the_title(); ?></h2>
            <p>Published on <?php  the_time('F j,Y'); ?>by <?php the_author(); ?></p>
            <?php the_content(); ?>
        </article>
        <aside id="privacy-widgets">
            <?php dynamic_sidebar( 'policy_sidebar' ); ?>
        </aside>
        <?php
        endwhile;
    endif;
    
    get_footer();
?>