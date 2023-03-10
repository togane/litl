<?php
/**
 * Template part for displaying the credits of the Theme.
 * @package Leanex Lite
 */
?>

<?php
	if ( 1 == get_theme_mod( 'theme-credit' ) ) {
		return;
	}
	?>

	<!--<p class="credit">
		<a href="<?php echo esc_url( 'http://wordpress.org/' ); ?>">
		<?php
			/* translators: Theme CMS name. */
			//esc_html_e( 'WordPress', 'leanex-lite' );
		?>
		</a>
		<?php echo esc_html_e( 'theme by', 'leanex-lite' ); ?>
		<a href="<?php echo esc_url( 'http://dinevthemes.com/' ); ?>">
		<?php
			/* translators: Theme developer name. */
			//esc_html_e( 'DinevThemes', 'leanex-lite' );
		?>
		</a>
	</p>-->