<?php
/**
 * Leanex Lite customizer options
 * @package Leanex Lite
 */

/**
 * Main Customize Options
 */
function leanex_lite_customizer_library_options() {

	// Theme defaults
	$primary_color = '#2c2c2c';
	$secondary_color = '#9E9E9E';
	$contrast_color = '#ffffff';

	// Stores all the controls that will be added
	$options = array();

	// Stores all the sections to be added
	$sections = array();

	// Stores all the panels to be added
	$panels = array();

	// Adds the sections to the $options array
	$options['sections'] = $sections;

	// Header Title Options
	$section = 'title_tagline';

	$options['disable-site-title'] = array(
		'id' => 'disable-site-title',
		'label'   => esc_html__( 'Hide Site Title', 'leanex-lite' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 0,
		'priority' => '30',
	);

	$options['disable-site-tagline'] = array(
		'id' => 'disable-site-tagline',
		'label'   => esc_html__( 'Hide Tagline', 'leanex-lite' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 0,
		'priority' => '30',
	);

	// Home Headline
	$section = 'home-headline';

	$sections[] = array(
		'id' => $section,
		'title' => esc_html__( 'Headline', 'leanex-lite' ),
		'description' => esc_html__( 'Here are settings of the header section for the front page, blog page, single posts and pages.', 'leanex-lite' ),
		'priority' => '60'
	);

	$options['headline-text'] = array(
		'id' => 'headline-text',
		'label'   => esc_html__( 'Front Page Headline', 'leanex-lite' ),
		'description' => esc_html__( 'Allowed plain text, html markup, shortcode. Example: <h1>Front Page</h1><p class="lead">Leanex</p>', 'leanex-lite' ),
		'section' => $section,
		'type'    => 'textarea',
		'default' => '',
	);

	$options['blog-headline-content'] = array(
		'id' => 'blog-headline-content',
		'label'   => esc_html__( 'Blog Page Headline', 'leanex-lite' ),
		'description' => esc_html__( 'Allowed plain text, html markup, shortcode. Example: <h1>My Journal</h1><p class="lead">Leanex</p>', 'leanex-lite' ),
		'section' => $section,
		'type'    => 'textarea',
		'default' => '',
	);

	$options['headline-range'] = array(
		'id' => 'headline-range',
		'label'   => esc_html__( 'Headline Height for Front Page', 'leanex-lite' ),
		'section' => $section,
		'type'    => 'range',
		'input_attrs' => array(
	        			'min'   => 4,
	        			'max'   => 30,
	        			'step'  => 1,
				)
	);

	$options['blog-headline-range'] = array(
		'id' => 'blog-headline-range',
		'label'   => esc_html__( 'Headline Height for Posts Page', 'leanex-lite' ),
		'section' => $section,
		'type'    => 'range',
		'input_attrs' => array(
	        			'min'   => 4,
	        			'max'   => 30,
	        			'step'  => 1,
				)
	);
	

	$options['single-headline-range'] = array(
		'id' => 'single-headline-range',
		'label'   => esc_html__( 'Post&Page Header Height', 'leanex-lite' ),
		'section' => $section,
		'type'    => 'range',
		'input_attrs' => array(
	        			'min'   => 4,
	        			'max'   => 20,
	        			'step'  => 1,
				)
	);

	$options['headline-font-size'] = array(
		'id' => 'headline-font-size',
		'label'   => esc_html__( 'Heading Font Size', 'leanex-lite' ),
		'description' => esc_html__( 'Applies to headings in the Headline section (if it is custom text, it must be enclosed in a H1 tag, for example: <h1>Headline</h1>).', 'leanex-lite' ),
		'section' => $section,
		'type'    => 'range',
		'input_attrs' => array(
	        			'min'   => 20,
	        			'max'   => 72,
	        			'step'  => 2,
						'default' => 70,
				)
	);

	// Colors
	$section = 'colors';

	$sections[] = array(
		'id' => $section,
		'title' => esc_html__( 'Colors', 'leanex-lite' ),
		'priority' => '80'
	);

	$options['overlay-color'] = array(
		'id' => 'overlay-color',
		'label'   => esc_html__( 'Headline Overlay', 'leanex-lite' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $primary_color,
	);

	$options['primary-color'] = array(
		'id' => 'primary-color',
		'label'   => esc_html__( 'Primary', 'leanex-lite' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $primary_color,
	);

	$options['secondary-color'] = array(
		'id' => 'secondary-color',
		'label'   => esc_html__( 'Secondary', 'leanex-lite' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $secondary_color,
	);

	$options['link-color'] = array(
		'id' => 'link-color',
		'label'   => esc_html__( 'Link', 'leanex-lite' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $primary_color,
	);

	$options['link-hover-color'] = array(
		'id' => 'link-hover-color',
		'label'   => esc_html__( 'Link Hover', 'leanex-lite' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $secondary_color,
	);

	$options['menu-color'] = array(
		'id' => 'menu-color',
		'label'   => esc_html__( 'Menu', 'leanex-lite' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $primary_color,
	);

	$options['alt-menu-color'] = array(
		'id' => 'alt-menu-color',
		'label'   => esc_html__( 'Alt Menu', 'leanex-lite' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $primary_color,
	);

	$options['shrink-menu-color'] = array(
		'id' => 'shrink-menu-color',
		'label'   => esc_html__( 'Shrink Menu', 'leanex-lite' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $primary_color,
	);

	$options['submenu-color'] = array(
		'id' => 'submenu-color',
		'label'   => esc_html__( 'SubMenu', 'leanex-lite' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $secondary_color,
	);

	$options['shrink-menu-bg'] = array(
		'id' => 'shrink-menu-bg',
		'label'   => esc_html__( 'Shrink Menu Background', 'leanex-lite' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $primary_color,
	);

	$options['submenu-bg'] = array(
		'id' => 'submenu-bg',
		'label'   => esc_html__( 'SubMenu Background', 'leanex-lite' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $contrast_color,
	);

	$options['footer-color'] = array(
		'id' => 'footer-color',
		'label'   => esc_html__( 'Footer Color', 'leanex-lite' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $secondary_color,
	);

	$options['footer-background'] = array(
		'id' => 'footer-background',
		'label'   => esc_html__( 'Footer Background', 'leanex-lite' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $primary_color,
	);

	// Typography
	$section = 'typography';
	$font_choices = customizer_library_get_font_choices();

	$sections[] = array(
		'id' => $section,
		'title' => esc_html__( 'Typography', 'leanex-lite' ),
		'priority' => '80'
	);
	
	$options['fonts-default'] = array(
		'id' => 'fonts-default',
		'label'   => esc_html__( 'Apply default font', 'leanex-lite' ),
		'description' => esc_html__( 'Default font - Open Sans. Uncheck box to change fonts to the selected', 'leanex-lite' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);
	
	$options['heading-font'] = array(
		'id' => 'heading-font',
		'label'   => esc_html__( 'Headings', 'leanex-lite' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $font_choices,
		'default' => 'Open Sans'
	);

	$options['primary-font'] = array(
		'id' => 'primary-font',
		'label'   => esc_html__( 'Primary', 'leanex-lite' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $font_choices,
		'default' => 'Open Sans'
	);

	$options['secondary-font'] = array(
		'id' => 'secondary-font',
		'label'   => esc_html__( 'Secondary', 'leanex-lite' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $font_choices,
		'default' => 'Open Sans'
	);

	// Posts Page Options
	$section = 'posts-page';

	$options['blog-header'] = array(
		'id' => 'blog-header',
		'label'   => esc_html__( 'Header Image', 'leanex-lite' ),
		'section' => $section,
		'type'    => 'image',
		'default' => ''
	);

	$sections[] = array(
		'id' => $section,
		'title' => esc_html__( 'Blog Options', 'leanex-lite' ),
		'description' => esc_html__( 'The options here apply to the blog posts page (blog index, archive etc.)', 'leanex-lite' ),
		'priority' => '160'
	);

	// Layout Styles
	$choices = array(
		'masonry' => esc_html__( 'Masonry wide', 'leanex-lite' ),
		'list' => esc_html__( 'List One Column', 'leanex-lite' ),
	);

	$options['layout-blog'] = array(
		'id' => 'layout-blog',
		'label'   => esc_html__( 'Blog Layout', 'leanex-lite' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $choices,
		'default' => 'masonry'
	);
	
	$options['hide-cat-list'] = array(
		'id' => 'hide-cat-list',
		'label'   => esc_html__( 'Hide Categories List', 'leanex-lite' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 0,
	);

	$options['hide-post-date'] = array(
		'id' => 'hide-post-date',
		'label'   => esc_html__( 'Hide Date', 'leanex-lite' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 0,
	);

	$options['hide-post-author'] = array(
		'id' => 'hide-post-author',
		'label'   => esc_html__( 'Hide Author', 'leanex-lite' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 0,
	);

	$options['hide-post-meta'] = array(
		'id' => 'hide-post-meta',
		'label'   => esc_html__( 'Hide Categories', 'leanex-lite' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 0,
	);

	$options['hide-excerpt'] = array(
		'id' => 'hide-excerpt',
		'label'   => esc_html__( 'Hide Excerpt', 'leanex-lite' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 0,
	);

	$options['hide-link-more'] = array(
		'id' => 'hide-link-more',
		'label'   => esc_html__( 'Hide link More', 'leanex-lite' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 0,
	);

	$options['custom-link-more'] = array(
		'id' => 'custom-link-more',
		'label'   => esc_html__( 'Custom link More', 'leanex-lite' ),
		'section' => $section,
		'type'    => 'text',
		'default' => esc_html__( 'Read More', 'leanex-lite'),
	);

	// Single Post Options
	$section = 'single-post-options';

	$sections[] = array(
		'id' => $section,
		'title' => esc_html__( 'Single Post', 'leanex-lite' ),
		'priority' => '165'
	);

	$options['hide-single-posted'] = array(
		'id' => 'hide-single-posted',
		'label'   => esc_html__( 'Hide post date and author', 'leanex-lite' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 0,
	);

	$options['hide-single-meta'] = array(
		'id' => 'hide-single-meta',
		'label'   => esc_html__( 'Hide post categories and tags', 'leanex-lite' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 0,
	);


	// Portfolio Options
	$section = 'portfolio-options';

	$sections[] = array(
		'id' => $section,
		'title' => esc_html__( 'Portfolio Options', 'leanex-lite' ),
		'priority' => '170'
	);

	// Layout Styles
	$choices = array(
		'masonry' => esc_html__( 'Masonry with overlay', 'leanex-lite' ),
		'masonry-caption' => esc_html__( 'Masonry with captions', 'leanex-lite' ),
	);

	$options['layout-projects'] = array(
		'id' => 'layout-projects',
		'label'   => esc_html__( 'Layout Styles', 'leanex-lite' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $choices,
		'default' => 'masonry'
	);

	$options['filterable-portfolio'] = array(
		'id' => 'filterable-portfolio',
		'label'   => esc_html__( 'Menu filterable categories', 'leanex-lite' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 0,
	);
	
	// Layout Single Styles
	$choices = array(
		'def' => esc_html__( 'Default', 'leanex-lite' ),
		'alt' => esc_html__( 'Alternative', 'leanex-lite' ),
	);

	$options['layout-single-projects'] = array(
		'id' => 'layout-single-projects',
		'label'   => esc_html__( 'Single Portfolio Layout', 'leanex-lite' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $choices,
		'default' => 'def'
	);

	// Footer Options
	$section = 'footer-options';

	$sections[] = array(
		'id' => $section,
		'title' => esc_html__( 'Footer Options', 'leanex-lite' ),
		'priority' => '200'
	);

	$options['copyright-text'] = array(
		'id' => 'copyright-text',
		'label'   => esc_html__( 'Copyright text', 'leanex-lite' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '',
	);
	
	// Footer Columns
	$choices = array(
		'wide' => esc_html__( 'No columns', 'leanex-lite' ),
		'two-col' => esc_html__( '2 columns', 'leanex-lite' ),
		'three-col' => esc_html__( '3 columns', 'leanex-lite' ),
		'four-col' => esc_html__( '4 columns', 'leanex-lite' ),
	);

	$options['footer-columns'] = array(
		'id' => 'footer-columns',
		'label'   => esc_html__( 'Widgets Area Columns', 'leanex-lite' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $choices,
		'default' => 'wide'
	);

	// Frontpage Sections Panel
	$panel = 'home-sections';

	$panels[] = array(
		'id' => $panel,
		'title' => esc_html__( 'Front Page Sections', 'leanex-lite' ),
		'description' => esc_html__( 'A static page with default template should be assigned as the front page.', 'leanex-lite' ),
		'priority' => '155'
	);
	
	// Multicheck Sortable for the front-page
	$section = 'homesorter';

	$sections[] = array(
		'id' => $section,
		'title' => esc_html__( 'Visibility & Sorting', 'leanex-lite' ),
		'priority' => '10',
		'description' => esc_html__( 'Check box to show. Drag and drop to sort.', 'leanex-lite' ),
		'panel' => $panel
	);

	/* Add Control for the settings. */
	$choices = array();
	$sorters = leanex_lite_sorter();
	foreach( $sorters as $key => $val ){
		$choices[$key] = $val['label'];
	}

	$options['homesorter'] = array(
		'id' 	=> 'homesorter',
		'section' 	=> $section,
		'type'	=> 'ckecksorter',
		'choices'	=> $choices,
		'default'	 => leanex_lite_sorter_default()
	);

	// Page Content Section
	$section = 'page-content-section';

	$sections[] = array(
		'id' => $section,
		'title' => esc_html__( 'Front Page Content', 'leanex-lite' ),
		'priority' => '10',
		'panel' => $panel
	);

	$options['page-content-title'] = array(
		'id' => 'page-content-title',
		'label'   => esc_html__( 'Enter Section Title', 'leanex-lite' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '',
	);

	$options['page-content-subtitle'] = array(
		'id' => 'page-content-subtitle',
		'label'   => esc_html__( 'Enter Section SubTitle', 'leanex-lite' ),
		'section' => $section,
		'type'    => 'text',
	);

	// Widgets Section
	$section = 'widgets-section';

	$sections[] = array(
		'id' => $section,
		'title' => esc_html__( 'Widgets Section', 'leanex-lite' ),
		'priority' => '10',
		'panel' => $panel
	);

	$options['section-widgets-title'] = array(
		'id' => 'section-widgets-title',
		'label'   => esc_html__( 'Enter Section Title', 'leanex-lite' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '',
	);

	$options['section-widgets-subtitle'] = array(
		'id' => 'section-widgets-subtitle',
		'label'   => esc_html__( 'Enter Section SubTitle', 'leanex-lite' ),
		'section' => $section,
		'type'    => 'text',
	);

	// Select Layout
	$choices = array(
		'1' => esc_html__( 'without columns', 'leanex-lite' ),
		'2' => esc_html__( 'two columns', 'leanex-lite' ),
		'3' => esc_html__( 'tree columns', 'leanex-lite' ),
		'4' => esc_html__( 'four columns', 'leanex-lite' ),
	);

	$options['section-one-layout'] = array(
		'id' => 'section-one-layout',
		'label'   => esc_html__( 'Layout Mode', 'leanex-lite' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $choices,
		'default' => '3',
	);

	// Recent Posts Section
	$section = 'recent-posts-section';

	$sections[] = array(
		'id' => $section,
		'title' => esc_html__( 'Recent Posts Section', 'leanex-lite' ),
		'priority' => '10',
		'panel' => $panel
	);

	$options['recent-posts-title'] = array(
		'id' => 'recent-posts-title',
		'label'   => esc_html__( 'Enter Section Title', 'leanex-lite' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '',
	);

	$options['recent-posts-subtitle'] = array(
		'id' => 'recent-posts-subtitle',
		'label'   => esc_html__( 'Enter Section SubTitle', 'leanex-lite' ),
		'section' => $section,
		'type'    => 'text',
	);

	$options['recent-posts-category'] = array(
		'id' => 'recent-posts-category',
		'label'   => esc_html__( 'In Category', 'leanex-lite' ),
		//'description' => esc_html__( 'If not selected, will be recent posts from all categories.', 'leanex-lite' ),
		'section' => $section,
		'type'    => 'category',
		'default' => 0,
	);

	// Number Posts
	$choices = array(
		'6' => '6',
		'7' => '7',
		'8' => '8',
		'9' => '9',
		'10' => '10',
		'11' => '11',
		'12' => '12'
	);

	$options['num-posts'] = array(
		'id' => 'num-posts',
		'label'   => esc_html__( 'Number of posts', 'leanex-lite' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $choices,
		'default' => '6'
	);


	// Portfolio Section
	$section = 'portfolio-section';

	$sections[] = array(
		'id' => $section,
		'title' => esc_html__( 'Portfolio Section', 'leanex-lite' ),
		'priority' => '10',
		'panel' => $panel
	);

	$options['portfolio-section-title'] = array(
		'id' => 'portfolio-section-title',
		'label'   => esc_html__( 'Enter Section Title', 'leanex-lite' ),
		'section' => $section,
		'type'    => 'text',
	);

	$options['portfolio-section-subtitle'] = array(
		'id' => 'portfolio-section-subtitle',
		'label'   => esc_html__( 'Enter Section SubTitle', 'leanex-lite' ),
		'section' => $section,
		'type'    => 'text',
	);

	// Layout Styles
	$choices = array(
		'masonry' => esc_html__( 'Masonry with overlay', 'leanex-lite' ),
		'masonry-caption' => esc_html__( 'Masonry with captions', 'leanex-lite' ),
	);

	$options['front-layout-projects'] = array(
		'id' => 'front-layout-projects',
		'label'   => esc_html__( 'Layout Styles', 'leanex-lite' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $choices,
		'default' => 'masonry'
	);

	// Number Posts
	$choices = array(
		'6' => '6',
		'7' => '7',
		'8' => '8',
		'9' => '9',
		'10' => '10',
		'11' => '11',
		'12' => '12'
	);

	$options['num-projects'] = array(
		'id' => 'num-projects',
		'label'   => esc_html__( 'Number of projects', 'leanex-lite' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $choices,
		'default' => '6'
	);


	// Wide Section
	$section = 'wide-section';

	$sections[] = array(
		'id' => $section,
		'title' => esc_html__( 'Widgets Wide Section', 'leanex-lite' ),
		'priority' => '10',
		'panel' => $panel
	);

	$options['wide-bg'] = array(
		'id' => 'wide-bg',
		'label'   => esc_html__( 'Background Image', 'leanex-lite' ),
		'section' => $section,
		'type'    => 'image',
		'default' => ''
	);
	
	$options['wide-bg-color'] = array(
		'id' => 'wide-bg-color',
		'label'   => esc_html__( 'Background Color', 'leanex-lite' ),
		'section' => $section,
		'type'    => 'color',
		'default' => '#2c2c2c',
	);

	// Select Displays
	$choices = array(
		'content' => 'Custom content',
		'widgets' => 'Widgets area',
	);

	$options['section-shows'] = array(
		'id' => 'section-shows',
		'label'   => esc_html__( 'What to show here?', 'leanex-lite' ),
		'description' => esc_html__( 'If you choose the Widgets area, you then need to place widgets in the Front Wide Section.', 'leanex-lite' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $choices,
		'default' => 'content',
	);

	$options['wide-content'] = array(
		'id' => 'wide-content',
		'label'   => esc_html__( 'Custom Content', 'leanex-lite' ),
		'description' => esc_html__( 'Allowed to use plain text, html tags or shortcode.', 'leanex-lite' ),
		'section' => $section,
		'type'    => 'textarea',
		'default' => '',
	);

// END Options

	// Adds the sections to the $options array
	$options['sections'] = $sections;

	// Adds the panels to the $options array
	$options['panels'] = $panels;

	$customizer_library = Customizer_Library::Instance();
	$customizer_library->add_options( $options );

	// To delete custom mods use: customizer_library_remove_theme_mods();
}
add_action( 'init', 'leanex_lite_customizer_library_options' );