<?php
/**
 * Leanex Lite functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Leanex Lite
 */
 

// Theme Constants.
$leanex_lite_theme_info  = wp_get_theme();
$leanex_lite_theme_version  = $leanex_lite_theme_info->get( 'Version' );

define( 'LEANEX_LITE_DIR', get_template_directory() );
define( 'LEANEX_LITE_DIR_URI', get_template_directory_uri() );
define( 'LEANEX_LITE_VERSION', $leanex_lite_theme_version );
define( 'LEANEX_LITE_WP_REQUIRES', '4.7' );

if ( ! function_exists( 'leanex_lite_setup' ) ) :
/**
 * Theme Setup
 */
function leanex_lite_setup() {

	// Set the default content width.
	$GLOBALS['content_width'] = 860;

	// Localization support
	load_theme_textdomain( 'leanex-lite', get_template_directory() . '/languages' );

	// Add theme support
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo' );
	add_theme_support( 'post-thumbnails' );

	// Set default thumbnail size
	set_post_thumbnail_size( 150, 150 );

	// Add image sizes
	add_image_size( 'leanex-lite-small', 420, 530, false  ); // soft cropped
	add_image_size( 'leanex-lite-square', 480, 480, true  ); // cropped
	add_image_size( 'leanex-lite-medium', 700, 477, true  ); // cropped
	add_image_size( 'leanex-lite-horizont', 780, 350, true  ); // cropped
	add_image_size( 'leanex-lite-header', 1900, 1200, true ); // cropped
	add_image_size( 'leanex-lite-header-alt', 1200, 450, true ); // cropped

	/**
	 * Excerpt for page
	 */
	add_post_type_support( 'page', 'excerpt' );

	// This theme uses wp_nav_menu() in three locations
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'leanex-lite' ),
		'social' => esc_html__( 'Social Media', 'leanex-lite' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'image'
	) );

	// Set up the WordPress core custom header feature.
	add_theme_support( 'custom-header', apply_filters( 'leanex_lite_custom_header_args', array(
		'header-text'            => false,
		'width'                  => 2800,
		'height'                 => 1200,
		'flex-height'            => true,
	) ) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'leanex_lite_custom_background_args', array(
		'default-color' => 'ffffff',
	) ) );
	
	/**
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors...
	 */
	// Add support for Block Styles.
	add_theme_support( 'wp-block-styles' );
		
	// Add support for editor styles.
	add_theme_support( 'editor-styles' );
	add_editor_style( array( 'css/editor-style.css', leanex_lite_fonts_url() ) );
	
	// Add support for responsive embedded content.
	add_theme_support( 'responsive-embeds' );
}
endif;
add_action( 'after_setup_theme', 'leanex_lite_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function leanex_lite_content_width() {

	$content_width = $GLOBALS['content_width'];
	
	// Check if is wide page template.
	if ( is_page_template( array( 'templates/full-width-page.php' ) ) ) {
		$content_width = 1140;
	}

	/**
	 * Filter Imagery content width of the theme.
	 *
	 * @param $content_width integer
	 */
	$GLOBALS['content_width'] = apply_filters( 'leanex_lite_content_width', $content_width );
}
add_action( 'template_redirect', 'leanex_lite_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function leanex_lite_widgets_init() {
	// Page Sidebar
	register_sidebar( array(
		'name'          => esc_html__( 'Page Sidebar', 'leanex-lite' ),
		'id'            => 'sidebar-page',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );
	// Post Sidebar
	register_sidebar( array(
		'name'          => esc_html__( 'Post Sidebar', 'leanex-lite' ),
		'id'            => 'sidebar-post',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );
	// Front Page Widgets Section
	register_sidebar( array(
		'name'          => esc_html__( 'Front Page Section', 'leanex-lite' ),
		'id'            => 'home-widgets-one',
		'description'   => esc_html__( 'Widgets section of the Front Page.', 'leanex-lite' ),
		'before_widget' => leanex_lite_before_one(),
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	// Front Page Wide Area
	if ( get_theme_mod( 'section-shows' ) === 'widgets' ) {
	register_sidebar( array(
		'name'          => esc_html__( 'Front Page Wide Section', 'leanex-lite' ),
		'id'            => 'wide-section',
		'description'   => esc_html__( 'Widgets wide section of the Front page.', 'leanex-lite' ),
		'before_widget' => '<div class="row">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	}
// Footer Area
if ( get_theme_mod( 'footer-columns' ) == 'wide' || ! get_theme_mod( 'footer-columns' ) ) {
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Area', 'leanex-lite' ),
		'id'            => 'footer',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
}
if ( get_theme_mod( 'footer-columns' ) == 'two-col' ) {
	register_sidebar( array(
		'name'          => esc_html__( 'Footer One', 'leanex-lite' ),
		'id'            => 'footer-one',
		'before_widget' => '<div class="col-md-6">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Two', 'leanex-lite' ),
		'id'            => 'footer-two',
		'before_widget' => '<div class="col-md-6">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
}
if ( get_theme_mod( 'footer-columns' ) == 'three-col' ) {
	register_sidebar( array(
		'name'          => esc_html__( 'Footer One', 'leanex-lite' ),
		'id'            => 'footer-one',
		'before_widget' => '<div class="col-md-4">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Two', 'leanex-lite' ),
		'id'            => 'footer-two',
		'before_widget' => '<div class="col-md-4">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Three', 'leanex-lite' ),
		'id'            => 'footer-three',
		'before_widget' => '<div class="col-md-4">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
}
if ( get_theme_mod( 'footer-columns' ) == 'four-col' ) {
	register_sidebar( array(
		'name'          => esc_html__( 'Footer One', 'leanex-lite' ),
		'id'            => 'footer-one',
		'before_widget' => '<div class="col-md-3">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Two', 'leanex-lite' ),
		'id'            => 'footer-two',
		'before_widget' => '<div class="col-md-3">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Three', 'leanex-lite' ),
		'id'            => 'footer-three',
		'before_widget' => '<div class="col-md-3">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Four', 'leanex-lite' ),
		'id'            => 'footer-four',
		'before_widget' => '<div class="col-md-3">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
}
if( class_exists( 'Portfolio_Post_Type' ) ) {
	register_sidebar(
	array(
		'name' => esc_html__('Porfolio Sidebar', 'leanex-lite' ),
		'description' => esc_html__('Sidebar of the Portfolio Single Post', 'leanex-lite' ),
		'id' => 'portfolio',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
		)
	);
}
}
add_action( 'widgets_init', 'leanex_lite_widgets_init' );

/**
 * Register Google default fonts
 */
function leanex_lite_fonts_url(){
    $fonts_url = '';

    $open_sans = esc_html_x( 'on', 'Open Sans font: on or off', 'leanex-lite' );

    $fonts = array();
    $sets = apply_filters( 'leanex_lite_fonts_sets', array( 'latin', 'cyrillic' ) );

	/* translators: If there are characters in your language that are not supported by Open Sans, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== $open_sans ) {
    		$fonts['opensans'] = 'Open Sans:300italic,400italic,700italic,400,600,700,300';
	}
     
    $fonts = apply_filters( 'leanex_lite_fonts_url', $fonts );
     
    	if ( $fonts ) {
        		$fonts_url = add_query_arg(
					array(
            				'family' => urlencode( implode( '|', $fonts ) ),
            				'subset' => urlencode( implode( ',', $sets ) ),
						),
						'https://fonts.googleapis.com/css' );
    	}

    return esc_url_raw( $fonts_url );
}

/**
 * Enqueue scripts and styles.
 */
function leanex_lite_scripts() {

	// CSS
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css?v=3.3.7' );

	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css?v=4.4' );
	wp_enqueue_style( 'etlinefont', get_template_directory_uri() . '/css/etlinefont.css?v=4.2' );
	
	wp_enqueue_style( 'leanex-lite-style', get_stylesheet_uri(), '', LEANEX_LITE_VERSION );

	// Scripts
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.2', true );

	wp_enqueue_script( 'jquery-isotope', get_template_directory_uri() . '/js/jquery.isotope.min.js', array(), '3.0.1', true );
	wp_enqueue_script( 'jquery-onscreen', get_template_directory_uri() . '/js/jquery.onscreen.min.js', array(), LEANEX_LITE_VERSION, true );

	wp_enqueue_script( 'skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), LEANEX_LITE_VERSION, true );

	wp_enqueue_script( 'leanex-lite-main', get_template_directory_uri() . '/js/main.js', array(), LEANEX_LITE_VERSION, true );	
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	if ( is_home() || is_front_page() ) {
		wp_enqueue_script( 'scroll', get_template_directory_uri() . '/js/scroll.js', array(), LEANEX_LITE_VERSION, true );
	}
}
add_action( 'wp_enqueue_scripts', 'leanex_lite_scripts' );

/**
 * Main Menu Walker
 */
require_once( get_template_directory() . '/inc/bootstrap-navwalker.php' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/*-----------------------------------------------------------------------------------*/
/* The dependence of the before_widget value from the option value of customiser
/*-----------------------------------------------------------------------------------*/
function leanex_lite_before_one() {

	if ( get_theme_mod( 'section-one-layout' ) == '1' ) {
		$before_one = '<div id="%1$s" class="widget %2$s col-md-12 widgets-section">';
	}

	if ( get_theme_mod( 'section-one-layout' ) == '2' ) {
		$before_one = '<div id="%1$s" class="widget %2$s col-md-6 widgets-section">';
	}

	if ( !get_theme_mod( 'section-one-layout' ) || get_theme_mod( 'section-one-layout' ) == '3' ) {
		$before_one = '<div id="%1$s" class="widget %2$s col-md-4 widgets-section">';
	}

	if ( get_theme_mod( 'section-one-layout' ) == '4' ) {
		$before_one = '<div id="%1$s" class="widget %2$s col-md-3 widgets-section">';
	}

	if ( get_theme_mod( 'section-one-layout' ) == '5' ) {
		$before_one = '<div id="%1$s" class="%2$s widgets-section item">';
	}

	return $before_one;
}

/**
 * Theme Customizer
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Implementation Customize Google Fonts
 */
function leanex_lite_google_fonts() {
	if ( get_theme_mod( 'fonts-default', 1 ) ) {
		wp_enqueue_style( 'leanex-lite-font', leanex_lite_fonts_url(), array(), null );
	} else {
		// Font options
		$fonts = array(
			get_theme_mod( 'heading-font', customizer_library_get_default( 'heading-font' ) ),
			get_theme_mod( 'primary-font', customizer_library_get_default( 'primary-font' ) ),
			get_theme_mod( 'secondary-font', customizer_library_get_default( 'secondary-font' ) )
		);

		$font_uri = customizer_library_get_google_font_uri( $fonts );
		wp_enqueue_style( 'leanex-lite-font', $font_uri, array(), null );
	}
}
add_action( 'wp_enqueue_scripts', 'leanex_lite_google_fonts' );

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Portfolio hooks
 */
add_action( 'portfolio_summary', 'the_excerpt' );
add_action( 'portfolio_summary', 'the_meta' );

/**
 * Loading Welcome page.
 */
require_once( get_template_directory() . '/inc/admin/theme-get-started.php' );

/**
 * Upsell section in the Customizer.
 */
function leanex_lite_upsell_customize_register( $wp_customize ) {
		$upsell_link = 'http://www.dinevthemes.com/themes/leanex/';
		// Section
		$wp_customize->add_section( 'leanex_lite_get_premium', array(
			'title'       => '' . esc_html__( 'Get PREMIUM', 'leanex-lite' ),
			'priority'    => 2,
			'description' => sprintf(
				__( '<div class="upsell-container">
					<h3>Leanex Premium version available!</h3>
					<p><strong>Get more features:</strong></p>
					<ul class="upsell-features" style="margin-left: 2em;margin-bottom: 2em;">
                            <li>Advanced theme options</li>
                            <li>Alternative layout of a single post</li>
                            <li>Portfolio layout variations</li>
                            <li>Blog layout variations</li>
                            <li>Sidebar Options</li>
							<li>5+ Custom widgets</li>
							<li>One Click Demo Import</li>
                    </ul> %s </div>', 'leanex-lite' ),
				sprintf( '<a href="%1$s" target="_blank" class="button button-primary">%2$s</a>', esc_url( $upsell_link ), esc_html__( 'View Leanex Premium', 'leanex-lite' ) )
			),
		) );

		$wp_customize->add_setting( 'leanex_lite_get_premium_desc', array(
			'default'           => '',
			'sanitize_callback' => 'customizer_library_sanitize_textarea',
		) );
		$wp_customize->add_control( 'leanex_lite_get_premium_desc', array(
			'section' => 'leanex_lite_get_premium',
			'type'    => 'hidden',
		) );
}
add_action( 'customize_register', 'leanex_lite_upsell_customize_register', 15 );