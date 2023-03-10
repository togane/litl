<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Leanex Lite
 */
 
/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function leanex_lite_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'leanex_lite_pingback_header' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function leanex_lite_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
	
	// Adds a special class if no background image of the header
	$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), 'leanex-lite-header' );

	if( !is_singular() ) {
		$bgimage = get_header_image();
	}
	if( is_home() && !is_front_page() && get_theme_mod( 'blog-header' ) ) {
		$bgimage = get_theme_mod( 'blog-header' );
	}
	if( is_singular() && $thumbnail ) {
		$bgimage = $thumbnail[0];
	}

    if ( empty( $bgimage ) && ! get_header_image() ) {
        $classes[] = 'no-header-image';
    }
	
	if ( is_singular() && !has_post_thumbnail() ) {
        $classes[] = 'no-thumbnail';
    }

	return $classes;
}
add_filter( 'body_class', 'leanex_lite_body_classes' );

/**
 * Return an alternative title, without prefix
 * for every type used in the get_the_archive_title().
 */
function leanex_lite_archive_title_prefix( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '#', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif ( is_year() ) {
        $title = get_the_date( 'Y' );
    } elseif ( is_month() ) {
        $title = get_the_date( 'F Y' );
    } elseif ( is_day() ) {
        $title = get_the_date( get_option( 'date_format' ) );
    } elseif ( is_tax( 'post_format' ) ) {
        if ( is_tax( 'post_format', 'post-format-aside' ) ) {
            $title = esc_html( _x( 'Asides', 'post format archive title', 'leanex-lite' ) );
        } elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
            $title = esc_html( _x( 'Galleries', 'post format archive title', 'leanex-lite' ) );
        } elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
            $title = esc_html( _x( 'Images', 'post format archive title', 'leanex-lite' ) );
        } elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
            $title = esc_html( _x( 'Videos', 'post format archive title', 'leanex-lite' ) );
        } elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
            $title = esc_html( _x( 'Quotes', 'post format archive title', 'leanex-lite' ) );
        } elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
            $title = esc_html( _x( 'Links', 'post format archive title', 'leanex-lite' ) );
        } elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
            $title = esc_html( _x( 'Statuses', 'post format archive title', 'leanex-lite' ) );
        } elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
            $title = esc_html( _x( 'Audio', 'post format archive title', 'leanex-lite' ) );
        } elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
            $title = esc_html( _x( 'Chats', 'post format archive title', 'leanex-lite' ) );
        }
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    } else {
        $title = __( 'Archives', 'leanex-lite' );
    }
    return $title;
}
add_filter( 'get_the_archive_title', 'leanex_lite_archive_title_prefix' );

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 * @return string 'Read More' link prepended with an ellipsis.
 */
function leanex_lite_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}

	$link = sprintf( '<p class="link-more"><a href="%1$s" class="read-more">%2$s</a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( '%1$s<span class="screen-reader-text">%2$s</span>', 'leanex-lite' ), esc_html( get_theme_mod( 'custom-link-more' ) ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'leanex_lite_excerpt_more' );