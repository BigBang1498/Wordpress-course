<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Business_Point
 */

?>
<?php
	/**
	 * Hook - business_point_doctype.
	 *
	 * @hooked business_point_doctype_action - 10
	 */
	do_action( 'business_point_doctype' );
?>
<head>
	<?php
	/**
	 * Hook - business_point_head.
	 *
	 * @hooked business_point_head_action - 10
	 */
	do_action( 'business_point_head' );
	
	wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php if(function_exists('wp_body_open')){
	wp_body_open();
} ?>
	<div id="page" class="site">
		