<?php
//about theme info
add_action( 'admin_menu', 'skt_construction_lite_abouttheme' );
function skt_construction_lite_abouttheme() {    	
	add_theme_page( esc_html__('About Theme', 'skt-construction-lite'), esc_html__('About Theme', 'skt-construction-lite'), 'edit_theme_options', 'skt_construction_lite_guide', 'skt_construction_lite_mostrar_guide');   
} 
//guidline for about theme
function skt_construction_lite_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
?>
<div class="wrapper-info">
	<div class="col-left">
   		   <div class="col-left-area">
			  <?php esc_html_e('Theme Information', 'skt-construction-lite'); ?>
		   </div>
          <p><?php esc_html_e('SKT Construction is a construction, architecture, builder, and industry related business, corporate, personal, photography and real estate theme which showcases project galleries, contact info, nicely laid out content, animated sections, and compatibility with WooCommerce, NextGen Gallery and contact form 7.','skt-construction-lite'); ?></p>
          <a href="<?php echo esc_url(SKT_CONSTRUCTION_LITE_SKTTHEMES_PRO_THEME_URL); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/free-vs-pro.png" alt="" /></a>
	</div><!-- .col-left -->
	<div class="col-right">			
			<div class="centerbold">
				<hr />
				<a href="<?php echo esc_url(SKT_CONSTRUCTION_LITE_SKTTHEMES_LIVE_DEMO); ?>" target="_blank"><?php esc_html_e('Live Demo', 'skt-construction-lite'); ?></a> | 
				<a href="<?php echo esc_url(SKT_CONSTRUCTION_LITE_SKTTHEMES_PRO_THEME_URL); ?>"><?php esc_html_e('Buy Pro', 'skt-construction-lite'); ?></a> | 
				<a href="<?php echo esc_url(SKT_CONSTRUCTION_LITE_SKTTHEMES_THEME_DOC); ?>" target="_blank"><?php esc_html_e('Documentation', 'skt-construction-lite'); ?></a>
                <div class="space5"></div>
				<hr />                
                <a href="<?php echo esc_url(SKT_CONSTRUCTION_LITE_SKTTHEMES_THEMES); ?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/sktskill.jpg" alt="" /></a>
			</div>		
	</div><!-- .col-right -->
</div><!-- .wrapper-info -->
<?php } ?>