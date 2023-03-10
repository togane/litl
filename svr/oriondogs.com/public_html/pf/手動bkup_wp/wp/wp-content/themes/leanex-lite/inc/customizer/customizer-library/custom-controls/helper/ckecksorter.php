<?php
/**
 * Sorters
 * list of available sorter
 */

function leanex_lite_sorter(){

	$sorters = array();

	$sorters['content'] = array(
		'id'       => 'content',
		'label'    => __( 'Page Content', 'leanex-lite' ),
		// 'callback' => '',
	);

	$sorters['widgets'] = array(
		'id'       => 'widgets',
		'label'    => __( 'Widgets Section', 'leanex-lite' ),
		// 'callback' => '',
	);

	$sorters['portfolio'] = array(
			'id'       => 'portfolio',
			'label'    => __( 'Portfolio Section', 'leanex-lite' ),
	);

	$sorters['wide'] = array(
		'id'       => 'wide',
		'label'    => __( 'Widgets Wide Section', 'leanex-lite' ),
		// 'callback' => '',
	);

	$sorters['blog'] = array(
		'id'       => 'blog',
		'label'    => __( 'Recent Posts', 'leanex-lite' ),
		// 'callback' => '',
	);

	return apply_filters( 'leanex_lite_sorter', $sorters );
}


/**
 * Utility: Default sorters to use in customizer default value
 * @return string
 */
function leanex_lite_sorter_default(){
	$default = array();
	$sorters = leanex_lite_sorter();
	foreach( $sorters as $sorter ){
		$default[] = $sorter['id'] . ':0'; /* activate all as default. */
	}
	return apply_filters( 'leanex_lite_sorter_default', implode( ',', $default ) );
}