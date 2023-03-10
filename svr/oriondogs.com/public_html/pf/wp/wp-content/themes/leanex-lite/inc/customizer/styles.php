<?php
/**
 * Implements styles set in the theme customizer
 * @package Leanex Lite
 */

if ( ! function_exists( 'leanex_lite_customizer_build_styles' ) && class_exists( 'Customizer_Library_Styles' ) ) :
/**
 * Process user options to generate CSS needed to implement the choices.
 */
function leanex_lite_customizer_build_styles() {

	// Heading Font Size
	$setting = 'headline-font-size';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$font_size = customizer_library_sanitize_range( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.headline-section h1',
			),
			'declarations' => array(
				'font-size' => $font_size . 'px',
			)
		) );
	}

	// Front page Headline Padding
	$setting = 'headline-range';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$padding = customizer_library_sanitize_range( $mod );
		$padding_bottom = $padding - 4;

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.home.page .head-content',
			),
			'declarations' => array(
				'padding-top' => $padding . '%',
				'padding-bottom' => $padding_bottom . '%'
			)
		) );
	}

	// Headline Overlay Color
	$setting = 'overlay-color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );
	$hex = $mod;

	function leanex_lite_hex2rgb( $hex ) {
   		$hex = str_replace("#", "", $hex);

   		if( strlen( $hex ) == 3) {
      			$r = hexdec(substr($hex,0,1).substr($hex,0,1));
      			$g = hexdec(substr($hex,1,1).substr($hex,1,1));
      			$b = hexdec(substr($hex,2,1).substr($hex,2,1));
   		} else {
      			$r = hexdec(substr($hex,0,2));
      			$g = hexdec(substr($hex,2,2));
      			$b = hexdec(substr($hex,4,2));
   		}

        		$color = array($r, $g, $b);

        		return implode(",", $color);
	}

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = leanex_lite_hex2rgb( $hex );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.overlay-header'
			),
			'declarations' => array(
				'background-color' => 'rgba(' . $color . ',.5)',
			)
		) );
	}

	// Blog Headline Padding
	$setting = 'blog-headline-range';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$padding = customizer_library_sanitize_range( $mod );
		$padding_bottom = $padding - 4;

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.blog .head-content'
			),
			'declarations' => array(
				'padding-top' => $padding . '%',
				'padding-bottom' => $padding_bottom . '%'
			)
		) );
	}

	// Headline Padding
	$setting = 'single-headline-range';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$padding = customizer_library_sanitize_range( $mod );
		$padding_bottom = $padding - 4;

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.single .head-content',
				'.page .head-content',
				'.archive .head-content',
				'.search .head-content',
				'.headline-section .caption-wrapper'

			),
			'declarations' => array(
				'padding-top' => $padding . '%',
				'padding-bottom' => $padding_bottom . '%'
			)
		) );
	}

	// Alt Headline Padding
	$setting = 'alt-headline-range';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$padding = customizer_library_sanitize_range( $mod );
		$padding_bottom = $padding - 4;

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.single.no-header-image .head-content',
				'.page.no-header-image .head-content',
				'.archive.no-header-image .head-content',
				'.search.no-header-image .head-content',
				'.no-header-image .headline-section .caption-wrapper'

			),
			'declarations' => array(
				'padding-top' => $padding . '%',
				'padding-bottom' => $padding_bottom . '%'
			)
		) );
	}

	// Primary Color
	$setting = 'primary-color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = customizer_library_sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'body',
				'.headline-section',
				'.section-title h2',
				'.section-title.center h2',
				'.portfolio-item h4 a',
				'.hentry h3 a',
				'.pagination > li > a',
				'.pagination > li > span',
				'.author a',
				'.posted-on a',
				'.cat-links a',
				'.tags-links a',
				'.edit-link a',
				'ul.cat li a',
				'a.page-scroll',
				'.services-widget i.icon',
				'.section-title.center p',
			),
			'declarations' => array(
				'color' => $color
			)
		) );
		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.blog-section span.date',
				'.menu-lp',
				'mark',
				'.pagination .current',
				'.pagination .current:hover',
				'.pagination .current:focus',
				'.dropdown-menu>.active>a, .dropdown-menu>.active>a:focus, .dropdown-menu>.active>a:hover',
				'button',
				'.btn[type=submit]',
				'.button[type=submit]',
				'input[type=submit]',
				'input[type=button]',
				'input[type=reset]'
			),
			'declarations' => array(
				'background-color' => $color
			)
		) );
		Customizer_Library_Styles()->add( array(
			'selectors' => array(
					'.section-title h2:after',
			),
			'declarations' => array(
				'border-color' => $color
			)
		) );
	}

	// Secondary Color
	$setting = 'secondary-color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = customizer_library_sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'ul.cat li:after',
				'a.read-more',
				'.post-metacat',
				'.post-metacat a',
				'.post-metadate',
				'.byline',
				'.posted-on',
				'.wp-caption-text',
				'.single .entry-footer .cat-links',
				'.single .entry-footer .edit-link',
				'.single .entry-footer .tags-links',
				'.single .entry-footer .cat-links::before'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}

	// Link Color
	$setting = 'link-color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = customizer_library_sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'a',
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}

	// Link Hover Color
	$setting = 'link-hover-color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = customizer_library_sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'a:hover',
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}

	// Menu Color
	$setting = 'menu-color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = customizer_library_sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.navbar-fixed-top.on .navbar-nav > li > a',
				'.navbar-default .navbar-nav>li>a',
				'.navbar-default .navbar-nav>li>a:hover',
				'.navbar-nav li a',
				'.site-title',
				'.site-description',
				'.headline-section p',
				'.headline-section h1'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}

	// Alt Menu Color
	$setting = 'alt-menu-color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = customizer_library_sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.no-header-image .navbar-default .navbar-nav > li > a:hover',
				'.no-header-image .navbar-default .navbar-nav > li > a',
				'.no-header-image .site-title',
				'.no-header-image .site-description',
				'.no-header-image .headline-section p',
				'.no-header-image .headline-section h1'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}

	// Shrink Menu Color
	$setting = 'shrink-menu-color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = customizer_library_sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.navbar-default .navbar-nav>.active>a',
				'.navbar-default .navbar-nav>.active>a:hover',
				'.no-header-image .navbar-default.on .navbar-nav > li > a:hover',
				'.navbar-default.on .navbar-nav > li > a',
				'.on .site-title',
				'.on .site-description'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}

	// SubMenu Color
	$setting = 'submenu-color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = customizer_library_sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.navbar-default .navbar-nav .open .dropdown-menu>li>a',
				'.no-header-image .navbar-default .navbar-nav > li.open > a:hover',
				'.no-header-image .navbar-default .navbar-nav > li.open > a',
				'a.dropdown-toggle',
				'.navbar-default .navbar-nav>.open>a',
				'.navbar-default .navbar-nav>li>a:focus',
				'.navbar-default .navbar-nav>.open>a:hover',
				'.navbar-default .navbar-nav>.open>a',
				'.navbar-nav .open .dropdown-menu>li>a',
				'.navbar-default .navbar-nav>.open>a',
				'.no-header-image .navbar-default.on .navbar-nav >.open>a',
				'.no-header-image .navbar-default .navbar-nav >.open>a'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}

	// SubMenu Background
	$setting = 'submenu-bg';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = customizer_library_sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.navbar-default .navbar-nav>.open>a:hover',
				'.navbar-default .navbar-nav>.open>a',
				'.navbar-default .navbar-nav>.open>a',
				'.navbar-default .navbar-nav>.open>a:focus',
				'.dropdown-menu',
				'.dropdown.open'
			),
			'declarations' => array(
				'background-color' => $color
			)
		) );
	}

	// Shrink Menu Background
	$setting = 'shrink-menu-bg';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = customizer_library_sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.navbar-default.navbar-fixed-top.on',
			),
			'declarations' => array(
				'background-color' => $color
			)
		) );
	}

	// Footer Background Color
	$setting = 'footer-background';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = customizer_library_sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.footer-section',
			),
			'declarations' => array(
				'background' => $color
			)
		) );
	}

	// Footer Color
	$setting = 'footer-color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = customizer_library_sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.footer-section',
				'.footer-section a',
				'.footer-social li a::before',
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}

	// Headings Font
	$setting = 'heading-font';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );
	$stack = customizer_library_get_font_stack( $mod );

	if ( $mod != customizer_library_get_default( $setting ) && get_theme_mod( 'fonts-default', 1 ) == 0 ) {

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'h1,
				h2,
				h3,
				h4,
				h5,
				h6,
				.headline-section h1,
				h3.comments-title,
				h3.comment-reply-title'
			),
			'declarations' => array(
				'font-family' => $stack
			)
		) );

	}	
	
	// Primary Font
	$setting = 'primary-font';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );
	$stack = customizer_library_get_font_stack( $mod );

	if ( $mod != customizer_library_get_default( $setting ) && get_theme_mod( 'fonts-default', 1 ) == 0 ) {

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'a.navbar-brand,
				.blog-section ul.post-meta,
				.blog-section span.date,
				cite.fn,
				.comments-area footer .comment-author,
				.comment-metadata,
				p'
			),
			'declarations' => array(
				'font-family' => $stack
			)
		) );

	}

	// Secondary Font
	$setting = 'secondary-font';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );
	$stack = customizer_library_get_font_stack( $mod );

	if ( $mod != customizer_library_get_default( $setting ) && get_theme_mod( 'fonts-default', 1 ) == 0 ) {

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'body',
			),
			'declarations' => array(
				'font-family' => $stack
			)
		) );

	}

}
endif;

add_action( 'customizer_library_styles', 'leanex_lite_customizer_build_styles' );

if ( ! function_exists( 'leanex_lite_customizer_styles' ) ) :
/**
 * Generates the style tag and CSS needed for the theme options.
 */
function leanex_lite_customizer_styles() {

	do_action( 'customizer_library_styles' );

	// Echo the rules
	$css = Customizer_Library_Styles()->build();

	if ( ! empty( $css ) ) {
		echo "\n<!-- Begin Custom CSS -->\n<style type=\"text/css\" id=\"theme-custom-css\">\n";
		echo $css;
		echo "\n</style>\n<!-- End Custom CSS -->\n";
	}
}
endif;

add_action( 'wp_head', 'leanex_lite_customizer_styles', 11 );