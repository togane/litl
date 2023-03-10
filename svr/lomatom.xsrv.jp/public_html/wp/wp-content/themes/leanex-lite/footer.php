<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Leanex Lite
 */
?>

</div><!-- #content -->
<!-- end Main content -->

	<div id="go-top" class="top-go">
		<a class="page-scroll" href="#masthead"><i class="fa fa-chevron-up"></i></a>
    </div>

<!-- #Footer -->
<footer id="footer" class="footer-section">
	<div class="container">
	
	<?php get_template_part( 'template-parts/footer', 'widgets' ); ?>
	<?php get_template_part( 'template-parts/menu', 'social' ); ?>
	<?php get_template_part( 'template-parts/footer', 'copyright' ); ?>
	<?php get_template_part( 'template-parts/footer', 'credit' ); ?>
	
	</div>
</footer>

</div>
<!-- #page -->
<?php wp_footer(); ?>
</body>
</html>