<?php
/**
 * The template for displaying all pages.
 * @package Dropshipping Store
 */

get_header(); ?>

<?php do_action( 'dropshipping_store_page_top' ); ?>

<main role="main" id="skip_content" class="content_box">
    <div class="container background-img-skin">
        <div class="main-wrapper py-4 px-0"> 
            <?php $dropshipping_store_theme_lay = get_theme_mod( 'dropshipping_store_page_sidebar_options','One Column');
                if($dropshipping_store_theme_lay == 'One Column'){ ?>
                    <?php if(get_theme_mod('dropshipping_store_single_page_breadcrumb',false) == 1){ ?>
                        <div class="bradcrumbs">
                            <?php dropshipping_store_the_breadcrumb(); ?>
                        </div>
                    <?php }?>
                    <?php while ( have_posts() ) : the_post();
                        get_template_part( 'template-parts/content-page'); 
                    endwhile; ?>
            <?php }else if($dropshipping_store_theme_lay == 'Right Sidebar'){ ?>
                <div class="row">
                    <div class="<?php if( get_theme_mod( 'dropshipping_store_sidebar_size', 'Sidebar 1/3') == 'Sidebar 1/3') { ?>col-lg-8 col-md-8"<?php } else { ?>col-lg-9 col-md-8 <?php } ?>">
                        <?php if(get_theme_mod('dropshipping_store_single_page_breadcrumb',false) == 1){ ?>
                            <div class="bradcrumbs">
                                <?php dropshipping_store_the_breadcrumb(); ?>
                            </div>
                        <?php }?>
                        <?php while ( have_posts() ) : the_post();
                            get_template_part( 'template-parts/content-page');
                        endwhile; ?>
                    </div>
                    <div id="sidebar" class="<?php if( get_theme_mod( 'dropshipping_store_sidebar_size', 'Sidebar 1/3') == 'Sidebar 1/3') { ?>col-lg-4 col-md-4"<?php } else { ?>col-lg-3 col-md-4 <?php } ?>"><?php dynamic_sidebar('sidebar-2'); ?></div>
                </div>
            <?php }else if($dropshipping_store_theme_lay == 'Left Sidebar'){ ?>
                <div class="row">
                    <div id="sidebar" class="<?php if( get_theme_mod( 'dropshipping_store_sidebar_size', 'Sidebar 1/3') == 'Sidebar 1/3') { ?>col-lg-4 col-md-4"<?php } else { ?>col-lg-3 col-md-4 <?php } ?>"><?php dynamic_sidebar('sidebar-2'); ?></div>
                    <div class="<?php if( get_theme_mod( 'dropshipping_store_sidebar_size', 'Sidebar 1/3') == 'Sidebar 1/3') { ?>col-lg-8 col-md-8"<?php } else { ?>col-lg-9 col-md-8 <?php } ?>">
                        <?php if(get_theme_mod('dropshipping_store_single_page_breadcrumb',false) == 1){ ?>
                            <div class="bradcrumbs">
                                <?php dropshipping_store_the_breadcrumb(); ?>
                            </div>
                        <?php }?>
                        <?php while ( have_posts() ) : the_post();
                            get_template_part( 'template-parts/content-page'); 
                        endwhile; ?>
                    </div>
                </div>
            <?php }else {?>
                <div class="row">
                    <div class="<?php if( get_theme_mod( 'dropshipping_store_sidebar_size', 'Sidebar 1/3') == 'Sidebar 1/3') { ?>col-lg-8 col-md-8"<?php } else { ?>col-lg-9 col-md-8 <?php } ?>">
                        <?php if(get_theme_mod('dropshipping_store_single_page_breadcrumb',false) == 1){ ?>
                            <div class="bradcrumbs">
                                <?php dropshipping_store_the_breadcrumb(); ?>
                            </div>
                        <?php }?>
                        <?php while ( have_posts() ) : the_post();
                            get_template_part( 'template-parts/content-page'); 
                        endwhile; ?>
                    </div>
                    <div id="sidebar" class="<?php if( get_theme_mod( 'dropshipping_store_sidebar_size', 'Sidebar 1/3') == 'Sidebar 1/3') { ?>col-lg-4 col-md-4"<?php } else { ?>col-lg-3 col-md-4 <?php } ?>"><?php dynamic_sidebar('sidebar-2'); ?></div>
                </div>
            <?php } ?>
        </div>
    </div>
</main>

<?php do_action( 'dropshipping_store_page_bottom' ); ?>

<?php get_footer(); ?>