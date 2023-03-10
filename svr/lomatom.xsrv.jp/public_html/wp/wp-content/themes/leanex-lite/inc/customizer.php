<?php
/**
 * Leanex Lite Customizer
 * @package Leanex Lite
 */
 
/**
 * Helper library for the theme customizer.
 */
require get_template_directory() . '/inc/customizer/customizer-library/customizer-library.php';

/**
 * Define options for the theme customizer.
 */
require get_template_directory() . '/inc/customizer/customizer-options.php';

/**
 * Output inline styles based on theme customizer selections.
 */
require get_template_directory() . '/inc/customizer/styles.php';