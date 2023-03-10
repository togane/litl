<?php
/* translators: used between list items, there is a space after the comma */
$categories_list = get_the_category_list( esc_html__( ', ', 'leanex-lite' ) );
if ( $categories_list && 'post' == get_post_type() ) {
	printf( '<span class="post-metacat">' . esc_html__( 'Posted in %1$s', 'leanex-lite' ) . '</span>', $categories_list ); // WPCS: XSS OK.
}