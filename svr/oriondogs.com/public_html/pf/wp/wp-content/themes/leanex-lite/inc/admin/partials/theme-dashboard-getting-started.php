<?php

/**
 * This file is used to markup the "Getting Started" section on the dashboard page.
 *
 * @package Leanex Lite
 */

// Links that are used on this page.
$getting_started_links = array(
    'demo' => 'http://demo.dinevthemes.com/leanex-main/',
    'docs' => 'http://dinevthemes.com/documentation-category/letterum-theme-doc/',
	'premium' => 'http://dinevthemes.com/themes/leanex/',
	'wpforms' => 'https://wordpress.org/plugins/wpforms-lite/',
	'portfolio_post_type' => 'https://wordpress.org/plugins/portfolio-post-type/',
);

?>

<div class="tab-section">
    <h3 class="section-title"><?php esc_html_e( 'Recommended plugins', 'leanex-lite' ); ?></h3>
	
<ul>
	<li>
	<?php
        // Display link to plugin page.
        printf( '<a href="%1$s" target="_blank">%2$s</a>', esc_url( $getting_started_links['wpforms'] ), esc_html__( 'Contact Form by WPForms', 'leanex-lite' ) );
    ?>
	</li>
</ul>

    <p><?php esc_html_e( 'With this theme you can build a Portfolio of your works. To do this, you need to activate the plugin:', 'leanex-lite' ); ?></p>
<ul>
	<li>
		<?php
        // Display link to plugin page.
        printf( '<a href="%1$s" target="_blank">%2$s</a>', esc_url( $getting_started_links['portfolio_post_type'] ), esc_html__( 'Portfolio Post Type', 'leanex-lite' ) );
		?>
	</li>
</ul>
</div><!-- .tab-section -->

<div class="tab-section">
    <h3 class="section-title"><?php esc_html_e( 'Front Page Setup', 'leanex-lite' ); ?></h3>

    <p><?php esc_html_e( 'Create a new by going to Pages > Add New. Give your page a name (Front Page).', 'leanex-lite' ); ?></p>
	<p><?php esc_html_e( 'In the same way create a blank page for the Blog Page.', 'leanex-lite' ); ?></p>
	<p><?php esc_html_e( 'Now you can go to Appearance > Customize > Static Front Page and choose your new created Page as your Front Page.', 'leanex-lite' ); ?></p>

</div><!-- .tab-section -->

<div class="tab-section">
    <h3 class="section-title"><?php esc_html_e( 'Theme Options', 'leanex-lite' ); ?></h3>

    <p><?php esc_html_e( 'You can use of the Customizer to provide you with the theme options. Press the button below to open the Customizer and start making changes.', 'leanex-lite' ); ?></p>

    <p><a href="<?php echo wp_customize_url(); // WPCS: XSS OK. ?>" class="button" target="_blank"><?php esc_html_e( 'Customize Theme', 'leanex-lite' ); ?></a></p>
</div><!-- .tab-section -->
