<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Leanex Lite
 */
 
if ( ! function_exists( 'leanex_lite_main_class' ) ) :
/**
 * Return #main class
 */
function leanex_lite_main_class() {
	if ( is_single() ){
		if ( !is_active_sidebar( 'sidebar-post' ) ) {
			echo ' col-md-offset-2';
		}
	}
	if ( is_page() ) {
		if ( !is_active_sidebar( 'sidebar-page' ) ) {
			echo ' col-md-offset-2';
		}
	}
}
endif;

if ( ! function_exists( 'leanex_lite_main_menu' ) ) :
/**
 * Return wp_nav_menu
 */
function leanex_lite_main_menu() {
	if ( has_nav_menu( 'primary' ) ) {
		wp_nav_menu(
				array(
					'theme_location'  => 'primary',
					'menu_id'         => 'main',
					'depth'           => 3,
					'container' => false,
					'menu_class' => 'nav navbar-nav navbar-right',
					'walker' => new Leanex_Lite_Bootstrap_Navwalker()
				)
			);
	}
}
endif;

if ( ! function_exists( 'leanex_lite_post_metadate' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time only
 */
function leanex_lite_post_metadate() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	echo '<span class="post-metadate">' . $time_string . '</span>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'leanex_lite_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function leanex_lite_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		/* translators: %s: post date */
		esc_html_x( 'on %s', 'post date', 'leanex-lite' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		/* translators: %s: post author */
		esc_html_x( 'by %s', 'post author', 'leanex-lite' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="byline"> ' . $byline . '</span><span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'leanex_lite_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function leanex_lite_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'leanex-lite' ) );
		if ( $categories_list && leanex_lite_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'leanex-lite' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'leanex-lite' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'leanex-lite' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( esc_html__( 'Leave a comment', 'leanex-lite' ), esc_html__( '1 Comment', 'leanex-lite' ), esc_html__( '% Comments', 'leanex-lite' ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'leanex-lite' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function leanex_lite_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'leanex_lite_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'leanex_lite_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so leanex_lite_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so leanex_lite_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in leanex_lite_categorized_blog.
 */
function leanex_lite_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'leanex_lite_categories' );
}
add_action( 'edit_category', 'leanex_lite_category_transient_flusher' );
add_action( 'save_post',     'leanex_lite_category_transient_flusher' );

/**
 * Template for comments and pingbacks
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
if ( ! function_exists( 'leanex_lite_comment' ) ) :

function leanex_lite_comment( $comment, $args, $depth ) {
	if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
		<div class="comment-body">
			<?php comment_author_link(); ?>
			<?php edit_comment_link( esc_html__( 'Edit', 'leanex-lite' ), '<span class="edit-link">', '</span>' ); ?>
		</div>

	<?php else : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
		<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">

			<div class="comment-author vcard">
				<?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
			</div><!-- .comment-author -->

			<header class="comment-meta">

				<?php printf( '<cite class="fn">%s</cite>', get_comment_author_link() ); ?>

				<div class="comment-metadata">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
						<time datetime="<?php comment_time( 'c' ); ?>">
							<?php printf( esc_html_x( '%1$s at %2$s', '1: date, 2: time', 'leanex-lite' ), get_comment_date(), get_comment_time() ); ?>
						</time>
					</a>
				</div><!-- .comment-metadata -->

				<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'leanex-lite' ); ?></p>
				<?php endif; ?>
			</header><!-- .comment-meta -->

			<div class="comment-content">
				<?php comment_text(); ?>
			</div><!-- .comment-content -->
			<div class="comment-tools">
					<?php
						comment_reply_link( array_merge( $args, array(
							'add_below' => 'div-comment',
							'depth'     => $depth,
							'max_depth' => $args['max_depth'],
							'before'    => '<span class="reply">',
							'after'     => '</span>',
							'reply_text'     => 'reply',
						) ) );
					?>
				<?php edit_comment_link( esc_html__( 'Edit', 'leanex-lite' ), '<span class="edit-link">', '</span>' ); ?>
			</div><!-- .comment-tools -->
		</article><!-- .comment-body -->

	<?php
	endif;
}
endif;

/**
 * Num Pagination/Bootstrap adaptation
 */
if ( !function_exists( 'leanex_lite_pagination' ) ) :
	function leanex_lite_pagination() {
		// Pagination.
		the_posts_pagination( array(
					'show_all'     => False,
					'end_size'     => 1,
					'mid_size'     => 5,
					'prev_next'    => True,
					'prev_text'    => '<i class="fa fa-angle-left"></i>',
					'next_text'    => '<i class="fa fa-angle-right"></i>',
					'add_args'     => False,
					'add_fragment' => '',
					'screen_reader_text' => esc_html__( 'Posts navigation', 'leanex-lite' ),
					'type' => 'list',
		) );
	}
    
endif;

/**
 * Tag Cloud Filter
 */
function leanex_lite_widget_tag_cloud_args( $args ) {
	$args = array(
		'number'   => 0,
		'unit' => 'px',
		'largest'    => 16,
		'smallest' => 11,
		'order' => 'RAND'
		);
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'leanex_lite_widget_tag_cloud_args' );

/**
 * Count Widgets to replace before_widget params
 * to do ? if ( is_active_widget( '', '', 'leanex_lite_icon_widget' ) )
 */
function leanex_lite_sidebar_params($params) {

    global $my_widget_num;
    $sidebar_id = $params[0]['id'];

    if ( $sidebar_id == 'home-widgets' ) {
    	$registered_widgets = wp_get_sidebars_widgets();
		$number_of_widgets = count( $registered_widgets[$sidebar_id] );

    	if ( !isset($registered_widgets[$sidebar_id]) || !is_array( $registered_widgets[$sidebar_id] ) || $number_of_widgets < 4 ) {
    	    	return $params;
    	}
    	if ( !$my_widget_num ) {
    	    	$my_widget_num = array();
    	}
    	if ( isset( $my_widget_num[$sidebar_id] ) ) {
        		$my_widget_num[$sidebar_id] ++;
    	} else {
        		$my_widget_num[$sidebar_id] = 1;
    	}
    	if ( $my_widget_num[$sidebar_id]/3-round($my_widget_num[$sidebar_id]/3)==0 && $my_widget_num[$sidebar_id] != count($registered_widgets[$sidebar_id]) ) {
        		$params[0]['after_widget'] = str_replace( '</div>', '</div></div><div class="row">', $params[0]['after_widget'] );
		}
    }
    return $params;

}
add_filter('dynamic_sidebar_params','leanex_lite_sidebar_params');

/**
 * List Categories
 */
if ( ! function_exists( 'leanex_lite_list_cat' ) ) :
	function leanex_lite_list_cat() {
		if ( get_theme_mod( 'hide-cat-list' ) != 1 ) {
			echo '<ul class="cat-list">';
				wp_list_categories('orderby=name&depth=1&number=&title_li=');
			echo '</ul>';
		} else {
			echo '<div class="space-min"></div>';
		}
	}
	add_action( 'above_blog_section', 'leanex_lite_list_cat', 10 );
endif;

/**
 * Get Header Background Image
 */
if ( ! function_exists( 'leanex_lite_header_bg' ) ) :
	function leanex_lite_header_bg() {

		global $post;

		// Set header Image
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
		if( is_singular() && !$thumbnail && get_header_image() ) {
			$bgimage = get_header_image();
		}
		
		if( !empty( $bgimage ) ) {
			echo ' style="background: url(' . esc_url( $bgimage ) . ');"';
		}
	}
endif;