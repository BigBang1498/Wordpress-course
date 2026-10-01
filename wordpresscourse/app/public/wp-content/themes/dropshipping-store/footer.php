<?php
/**
 * The template for displaying the footer.
 * @package Dropshipping Store
 */
?>
<?php if( get_theme_mod( 'dropshipping_store_hide_show_scroll',true) != '' || get_theme_mod( 'dropshipping_store_display_scrolltop',true) != '') { ?>
    <?php $dropshipping_store_theme_lay = get_theme_mod( 'dropshipping_store_footer_options','Right');
        if($dropshipping_store_theme_lay == 'Left align'){ ?>
            <a href="#" id="scrollbutton" class="left"><i class="<?php echo esc_attr(get_theme_mod('dropshipping_store_back_to_top_icon','fas fa-long-arrow-alt-up')); ?>"></i><span class="screen-reader-text"><?php esc_html_e( 'Back to Top', 'dropshipping-store' ); ?></span></a>
        <?php }else if($dropshipping_store_theme_lay == 'Center align'){ ?>
            <a href="#" id="scrollbutton" class="center"><i class="<?php echo esc_attr(get_theme_mod('dropshipping_store_back_to_top_icon','fas fa-long-arrow-alt-up')); ?>"></i><span class="screen-reader-text"><?php esc_html_e( 'Back to Top', 'dropshipping-store' ); ?></span></a>
        <?php }else{ ?>
            <a href="#" id="scrollbutton"><i class="<?php echo esc_attr(get_theme_mod('dropshipping_store_back_to_top_icon','fas fa-long-arrow-alt-up')); ?>"></i><span class="screen-reader-text"><?php esc_html_e( 'Back to Top', 'dropshipping-store' ); ?></span></a>
    <?php }?>
<?php }?>
<footer role="contentinfo">
    <?php if (get_theme_mod('dropshipping_store_show_hide_footer', true)){ ?>

    <?php //Set widget areas classes based on user choice
        $dropshipping_store_widget_areas = get_theme_mod('dropshipping_store_footer_widget_areas', '4');
        if ($dropshipping_store_widget_areas == '3') {
            $dropshipping_store_cols = 'col-lg-4 col-md-6 col-sm-12';
        } elseif ($dropshipping_store_widget_areas == '4') {
            $dropshipping_store_cols = 'col-lg-3 col-md-6 col-sm-12';
        } elseif ($dropshipping_store_widget_areas == '2') {
            $dropshipping_store_cols = 'col-md-6 col-sm-12';
        } else {
            $dropshipping_store_cols = 'col-md-12 col-sm-12';
        }
    ?>
    
    <aside id="sidebar-footer" class="footer-wp" role="complementary">
        <div class="container">
            <div class="row">

                <div class="<?php echo esc_attr($dropshipping_store_cols); ?> footer-block wow zoomIn">
                    <?php if (is_active_sidebar('footer-1')) : ?>
                        <?php dynamic_sidebar('footer-1'); ?>
                    <?php else : ?>
                        <aside id="search" class="widget pb-3" role="complementary" aria-label="<?php esc_attr_e('footer1', 'dropshipping-store'); ?>">
                            <h3 class="widget-title"><?php esc_html_e( 'Search', 'dropshipping-store' ); ?></h3>
                            <?php get_search_form(); ?>
                        </aside>
                    <?php endif; ?>
                </div>

                <div class="<?php echo esc_attr($dropshipping_store_cols); ?> footer-block wow zoomIn">
                    <?php if (is_active_sidebar('footer-2')) : ?>
                        <?php dynamic_sidebar('footer-2'); ?>
                    <?php else : ?>
                        <aside id="archives" class="widget pb-3" role="complementary" aria-label="<?php esc_attr_e('footer2', 'dropshipping-store'); ?>">
                            <h3 class="widget-title"><?php esc_html_e( 'Archives', 'dropshipping-store' ); ?></h3>
                            <ul>
                                <?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
                            </ul>
                        </aside>
                    <?php endif; ?>
                </div>

                <div class="<?php echo esc_attr($dropshipping_store_cols); ?> footer-block wow zoomIn">
                    <?php if (is_active_sidebar('footer-3')) : ?>
                        <?php dynamic_sidebar('footer-3'); ?>
                    <?php else : ?>
                        <aside id="meta" class="widget pb-3" role="complementary" aria-label="<?php esc_attr_e('footer3', 'dropshipping-store'); ?>">
                            <h3 class="widget-title"><?php esc_html_e( 'Meta', 'dropshipping-store' ); ?></h3>
                            <ul>
                                <?php wp_register(); ?>
                                <li><?php wp_loginout(); ?></li>
                                <?php wp_meta(); ?>
                            </ul>
                        </aside>
                    <?php endif; ?>
                </div>

                <div class="<?php echo esc_attr($dropshipping_store_cols); ?> footer-block wow zoomIn">
                    <?php if (is_active_sidebar('footer-4')) : ?>
                        <?php dynamic_sidebar('footer-4'); ?>
                    <?php else : ?>
                        <aside id="categories" class="widget pb-3" role="complementary" aria-label="<?php esc_attr_e('footer4', 'dropshipping-store'); ?>">
                            <h3 class="widget-title"><?php esc_html_e( 'Categories', 'dropshipping-store' ); ?></h3>
                            <ul>
                                <?php wp_list_categories('title_li=');  ?>
                            </ul>
                        </aside>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </aside>

    <?php }?>
    <?php if ( get_theme_mod( 'dropshipping_store_show_hide_footer_copyright', true ) ) : ?>
    <div class="<?php echo esc_attr(get_theme_mod( 'dropshipping_store_sticky_copyright' )? 'sticky-copyright': 'close-sticky'); ?>">
    	<div class="copyright-wrapper py-3 px-0">
            <div class="container">
                <p><?php dropshipping_store_credit(); ?> <?php echo esc_html(get_theme_mod('dropshipping_store_footer_copy',__('By Buywptemplate','dropshipping-store'))); ?></p>
                <?php if (get_theme_mod('dropshipping_store_show_footer_icons', false)){ ?> 
                <div class="socialicons mt-2">
                  <?php if ( get_theme_mod('dropshipping_store_footer_facebook_link','') != "" ) {?>
                    <a target="_blank" href="<?php echo esc_attr( get_theme_mod('dropshipping_store_footer_facebook_link','' )); ?>"><i class="<?php echo esc_attr(get_theme_mod('dropshipping_store_footer_facebook_icon','fab fa-facebook-f')); ?>"></i><span class="screen-reader-text"><?php echo esc_html('Facebook', 'dropshipping-store'); ?></span></a>
                  <?php }?>
                  <?php if ( get_theme_mod('dropshipping_store_footer_twitter_link','') != "" ) {?>
                    <a target="_blank" href="<?php echo esc_attr( get_theme_mod('dropshipping_store_footer_twitter_link','' )); ?>"><i class="<?php echo esc_attr(get_theme_mod('dropshipping_store_footer_twitter_icon','fab fa-twitter')); ?>"></i><span class="screen-reader-text"><?php echo esc_html('Twitter', 'dropshipping-store'); ?></span></a>
                  <?php }?>
                  <?php if ( get_theme_mod('dropshipping_store_footer_linkdin_link','') != "" ) {?>
                    <a target="_blank" href="<?php echo esc_attr( get_theme_mod('dropshipping_store_footer_linkdin_link','' )); ?>"><i class="<?php echo esc_attr(get_theme_mod('dropshipping_store_footer_linkdin_icon','fab fa-linkedin-in')); ?>"></i><span class="screen-reader-text"><?php echo esc_html('Linkdin', 'dropshipping-store'); ?></span></a>
                  <?php }?>   
                  <?php if ( get_theme_mod('dropshipping_store_footer_instagram_link','') != "" ) {?>
                    <a target="_blank" href="<?php echo esc_attr( get_theme_mod('dropshipping_store_footer_instagram_link','' )); ?>"><i class="<?php echo esc_attr(get_theme_mod('dropshipping_store_footer_instagram_icon','fab fa-instagram')); ?>"></i><span class="screen-reader-text"><?php echo esc_html('Instagram', 'dropshipping-store'); ?></span></a>
                  <?php }?>   
                  <?php if ( get_theme_mod('dropshipping_store_footer_pintrest_link','') != "" ) {?>
                    <a target="_blank" href="<?php echo esc_attr( get_theme_mod('dropshipping_store_footer_pintrest_link','' )); ?>"><i class="<?php echo esc_attr(get_theme_mod('dropshipping_store_footer_pintrest_icon','fab fa-pinterest-p')); ?>"></i><span class="screen-reader-text"><?php echo esc_html('Pintrest', 'dropshipping-store'); ?></span></a>
                  <?php }?>                
               </div>   
               <?php }?>  
            </div>
            <div class="clear"></div>
        </div>
    <?php endif;
    ?>
</footer>
<?php if(get_theme_mod('dropshipping_store_progress_bar', false )== true): ?>
    <div id="dropshipping_store_elemento_progress_bar" class="top"></div>
<?php endif; ?>     
<?php wp_footer(); ?>

</body>
</html>