<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Leanex Lite
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<?php
if ( function_exists( 'the_custom_logo' ) ) {
	$image = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );
	$logo = $image[0];
} else {
	$logo = get_theme_mod( 'logo' );
}
?>

<body <?php body_class(); ?>>

<div id="page" class="site">
<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'leanex-lite' ); ?></a>

<header id="masthead" class="site-header" role="banner">
<!-- Navigation -->
      <nav id="main-menu" class="navbar navbar-default navbar-fixed-top">
         <div class="container">

            <div class="navbar-header">

	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
               		<span class="sr-only"><?php esc_html_e( 'Toggle navigation', 'leanex-lite' ); ?></span>
               		<span class="icon-bar"></span>
               		<span class="icon-bar"></span>
               		<span class="icon-bar"></span>
	</button>

	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="navbar-brand">
		<?php if ( ! empty( $logo ) ) { ?>
			<img src="<?php echo esc_url( $logo ); ?>" alt="<?php bloginfo( 'name' ); ?>" class="alignleft" />
		<?php } ?>
		<?php if ( 1 != get_theme_mod( 'disable-site-title', 0 ) ) { ?>
			<span class="site-title"><?php bloginfo( 'name' ); ?></span>
		<?php } ?>
	</a>
		<?php if ( 1 != get_theme_mod( 'disable-site-tagline', 0 ) ) { ?>
			<span class="site-description"><?php bloginfo( 'description' ); ?></span>
		<?php } ?>

            </div><!-- .navbar-header -->

            <!-- Primary Menu -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<?php leanex_lite_main_menu(); ?>
            </div>
            <!-- end Primary Menu -->

         </div><!-- .container -->
      </nav>
</header><!-- #masthead -->

<!-- Main content -->
<div id="content" class="site-content">