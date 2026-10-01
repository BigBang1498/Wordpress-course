<?php
/**
 * Helper functions.
 *
 * @package Business_Point
 */

// Bail if no slider.
// phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedVariableFound
$slider_details = business_point_get_slider_details();
if ( empty( $slider_details ) ) {
	return;
}

// Slider status.
// phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedVariableFound
$slider_status = business_point_get_option( 'slider_status' );
if ( 1 !== absint( $slider_status ) ) {
	return;
}

if ( ! ( is_front_page()) && ! is_page_template( 'templates/home.php' ) ) {
    return;
} 

// Slider settings.
// phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedVariableFound
$slider_transition_effect 		= business_point_get_option( 'slider_transition_effect' );
// phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedVariableFound
$slider_transition_delay  		= business_point_get_option( 'slider_transition_delay' );
// phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedVariableFound
$slider_transition_duration  	= business_point_get_option( 'slider_transition_duration' );
// phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedVariableFound
$slider_caption_status    		= business_point_get_option( 'slider_caption_status' );
// phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedVariableFound
$slider_arrow_status      		= business_point_get_option( 'slider_arrow_status' );
// phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedVariableFound
$slider_pager_status     		= business_point_get_option( 'slider_pager_status' );
// phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedVariableFound
$slider_autoplay_status   		= business_point_get_option( 'slider_autoplay_status' );
// phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedVariableFound
$slider_overlay_status   		= business_point_get_option( 'slider_overlay_status' );
// phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedVariableFound
$slider_readmore_status   		= business_point_get_option( 'slider_readmore_status' );
// phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedVariableFound
$slider_readmore_text   		= business_point_get_option( 'slider_readmore_text' );

// Cycle data.
// phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedVariableFound
$slide_data = array(
	'fx'             => esc_attr( $slider_transition_effect ),
	'speed'          => esc_attr( $slider_transition_duration ) * 1000,
	'pause-on-hover' => 'true',
	'loader'         => 'true',
	'log'            => 'false',
	'swipe'          => 'true',
	'auto-height'    => 'container',
);

if ( true === $slider_pager_status ) {
	// phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedVariableFound
	$slide_data['pager-template'] = '<span class="pager-box"></span>';
}
if ( true === $slider_autoplay_status ) {
	// phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedVariableFound
	$slide_data['timeout'] = absint( $slider_transition_delay ) * 1000;
} else {
	// phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedVariableFound
	$slide_data['timeout'] = 0;
}

// phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedVariableFound
$slide_data['slides'] = 'article';

// phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedVariableFound
$slide_attributes_text = '';
// phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedVariableFound
foreach ( $slide_data as $key =>
// phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedVariableFound
$item ) {

	// phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedVariableFound
	$slide_attributes_text .= ' ';
	// phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedVariableFound
	$slide_attributes_text .= ' data-cycle-'.esc_attr( $key );
	// phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedVariableFound
	$slide_attributes_text .= '="'.esc_attr( $item ).'"';

}
// phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedVariableFound
$overlay_class = ( true === $slider_overlay_status ) ? 'overlay-enabled' : 'overlay-disabled' ;
?>
<div id="featured-slider">
	<div class="header-cycle-slideshow cycle-slideshow <?php echo esc_attr( $overlay_class ); ?>" id="main-slider" <?php
	// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	echo $slide_attributes_text; ?>>

		<?php 
		if ( true === $slider_arrow_status ) : ?>
			<div class="cycle-next"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
			<div class="cycle-prev"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
			<?php 
		endif; 

		// phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedVariableFound
		$count = 1; 

		// phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedVariableFound
		foreach ( $slider_details as $slide ) :
			// phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedVariableFound
			$extra_class = ( 1 === $count ) ? 'first' : ''; 
			// phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
            $tag = ( 1 === $count ) ? 'h1' : 'h2'; 
			?>
			<article class="<?php echo esc_attr( $extra_class ); ?>" data-cycle-tag="<?php
			// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			echo $tag;?>" data-cycle-title="<?php echo esc_attr( $slide['title'] ); ?>"  data-cycle-url="<?php echo esc_url( $slide['url'] ); ?>"  data-cycle-excerpt="<?php echo esc_attr( $slide['excerpt'] ); ?>">

				<img src="<?php echo esc_url( $slide['image_url'] ); ?>" alt="<?php echo esc_attr( $slide['title'] ); ?>" />

				<?php if ( true === $slider_caption_status ) : ?>
					<div class="cycle-caption">
						<div class="container">
							<div class="caption-wrap">
								<<?php
								// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
								echo $tag;?>><?php echo esc_html( $slide['title'] ); ?></<?php
								// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
								echo $tag;?>>
								<div class="slider-meta"><p><?php echo esc_html( $slide['excerpt'] ); ?></p></div>
								<?php 
								if( true === $slider_readmore_status && !empty( $slider_readmore_text ) ){ ?>
									<a href="<?php echo esc_url( $slide['url'] ); ?>" class="button slider-button"><?php echo esc_html( $slider_readmore_text ); ?></a>
									<?php 
								} ?>
							</div>
						</div><!-- .cycle-wrap -->
					</div><!-- .cycle-caption -->
				<?php endif; ?>

			</article>

		<?php $count++; ?>

		<?php endforeach; ?>

		<?php if ( true === $slider_pager_status ) : ?>
			<div class="cycle-pager"></div>
		<?php endif; ?>

	</div> <!-- #main-slider -->
</div><!-- #featured-slider -->