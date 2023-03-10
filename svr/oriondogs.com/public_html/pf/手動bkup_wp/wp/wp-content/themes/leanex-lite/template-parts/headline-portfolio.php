<?php
/**
 * Template part for displaying Portfolio single headline section.
 *
 * @package Leanex Lite
 */
?>

<?php
	if( ! is_singular( 'portfolio' ) ) :
	?>
		<section id="headline" class="text-center headline-section"<?php leanex_lite_header_bg(); ?>>
         	<div class="head-content container">
            	<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
				<?php the_archive_description( '<p class="taxonomy-description">', '</p>' ); ?>
			</div>
			<span class="overlay-header"></span>
      	</section>
<?php
	endif;
	if( is_singular( 'portfolio' ) ) :
	?>

	<!-- Headline Section -->
	<section id="headline" class="<?php if ( !is_active_sidebar( 'portfolio' ) ) { ?>text-center<?php } ?> headline-section"<?php leanex_lite_header_bg(); ?>>
         		<div class="head-content container">
            		<?php the_title( '<h1>', '</h1>' ); ?>
         		</div>
		<span class="overlay-header"></span>
      	</section>
<?php
	endif;
?>