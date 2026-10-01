<?php

/* Template Name: Landing Page */
/*
 Es una directiva especial que WordPress lee y procesa. Aunque visualmente 
 parece un comentario de PHP, WordPress escanea todos los 
archivos .php...
*/
  
get_header( 'landing' );
?>
<section id="landing-widgets">
 <?php dynamic_sidebar( 'landing_sidebar' ); ?>
</section>
<?php
//get_template_part( 'templates/reviews', '3-layout');
    if( have_posts() ) :
        while ( have_posts() ) : the_post(); ?>
        <?php  //get_template_part( 'content', 'post' ); ?>
        <article class="my-post">
            <?php the_content(); ?>
        </article>
        <?php
        endwhile;
    endif;
    
get_footer( 'landing' );

/*
Llamada	Archivo que busca
get_header();	            header.php
get_header( 'landing' );	header-landing.php
get_footer();	            footer.php
get_footer( 'landing' );	footer-landing.php

El patrón es siempre el mismo: {tipo}-{parámetro}.php. 
WordPress toma el string que le pasaste y arma el nombre de archivo agregando un guion antes.
*/
?>

