<?php

/**
 * This file is used to markup the sidebar on the dashboard page.
 * @package Leanex Lite
 */

// Links that are used on this page.
$sidebar_links = array(
    'demo' => 'http://demo.dinevthemes.com/leanex-main/',
	'premium' => 'http://dinevthemes.com/themes/leanex/',
);

?>

<div class="tab-section">
    <h4 class="section-title"><?php esc_html_e( 'Demo Website', 'leanex-lite' ); ?></h4>

    <p><?php esc_html_e( 'You can look live theme on the demo website. There you will also find a description of the main features of the theme.', 'leanex-lite' ); ?></p>

    <p>
    <?php
        // Display a link to the demo website.
        printf( '<a href="%1$s" target="_blank">%2$s</a>', esc_url( $sidebar_links['demo'] ), esc_html__( 'View Demo', 'leanex-lite' ) );
    ?>
    </p>
</div><!-- .tab-section -->

<div class="tab-section">
    <h4 class="section-title"><?php esc_html_e( 'Get Much More', 'leanex-lite' ); ?></h4>

    <p><?php esc_html_e( 'More features and one-on-one support you will get with the premium version of the theme.', 'leanex-lite' ); ?></p>

    <p>
    <?php
        // Display link to the Premium.
        printf( '<a href="%1$s"  class="button button-primary" target="_blank">%2$s</a>', esc_url( $sidebar_links['premium'] ), esc_html__( 'Get Premium', 'leanex-lite' ) );
    ?>
    </p>
</div><!-- .tab-section -->
