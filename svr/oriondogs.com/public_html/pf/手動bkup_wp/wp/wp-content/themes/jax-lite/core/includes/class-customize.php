<?php

class jaxlite_customize {

	public $theme_fields;

	public function __construct( $fields = array() ) {

		$this->theme_fields = $fields;

		add_action ('admin_init' , array( &$this, 'admin_scripts' ) );
		add_action ('customize_register' , array( &$this, 'customize_panel' ) );
		add_action ('customize_controls_enqueue_scripts' , array( &$this, 'customize_scripts' ) );

	}

	public function admin_scripts() {
	
		global $wp_version, $pagenow;

		$file_dir = get_template_directory_uri() . '/core/admin/assets/';
			
		if ( $pagenow == 'post.php' || $pagenow == 'post-new.php' || $pagenow == 'edit.php' ) {
			wp_enqueue_style ( 'jax-lite-panel',  $file_dir . 'css/theme.css', array(), '1.0.0' ); 
			wp_enqueue_script( 'jax-lite-script', $file_dir . 'js/theme.js', array('jquery', 'jquery-ui-core', 'jquery-ui-tabs'),'1.0.0', TRUE ); 
			wp_enqueue_style ( 'jaxlite_on_off', $file_dir.'css/on_off.css' ); 
			wp_enqueue_script( 'jaxlite_on_off', $file_dir.'js/on_off.js',array('jquery'),'',TRUE ); 
		}

	}
		
	public function customize_scripts() {

		wp_enqueue_style ( 
			'jaxlite_panel', 
			get_template_directory_uri() . '/core/admin/assets/css/customize.css', 
			array(), 
			''
		);

	}
	
	public function customize_panel ( $wp_customize ) {
		
		global $wp_version;

		$theme_panel = $this->theme_fields ;

		foreach ( $theme_panel as $element ) {
			
			switch ( $element['type'] ) {
					
				case 'panel' :
				
					$wp_customize->add_panel( $element['id'], array(
					
						'title' => $element['title'],
						'priority' => $element['priority'],
						'description' => $element['description'],
					
					) );
			 
				break;
				
				case 'section' :
						
					$wp_customize->add_section( $element['id'], array(
					
						'title' => $element['title'],
						'panel' => $element['panel'],
						'priority' => $element['priority'],
					
					) );
					
				break;

				case 'text' :
							
					$wp_customize->add_setting( $element['id'], array(
					
						'sanitize_callback' => 'sanitize_text_field',
						'default' => $element['std'],

					) );
											 
					$wp_customize->add_control( $element['id'] , array(
					
						'type' => $element['type'],
						'section' => $element['section'],
						'label' => $element['label'],
						'description' => $element['description'],
									
					) );
							
				break;

				case 'upload' :
							
					$wp_customize->add_setting( $element['id'], array(

						'default' => $element['std'],
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'esc_url_raw'

					) );

					$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, $element['id'], array(
					
						'label' => $element['label'],
						'description' => $element['description'],
						'section' => $element['section'],
						'settings' => $element['id'],
					
					)));

				break;

				case 'url' :
							
					$wp_customize->add_setting( $element['id'], array(
					
						'sanitize_callback' => 'esc_url_raw',
						'default' => $element['std'],

					) );
											 
					$wp_customize->add_control( $element['id'] , array(
					
						'type' => $element['type'],
						'section' => $element['section'],
						'label' => $element['label'],
						'description' => $element['description'],
									
					) );
							
				break;

				case 'color' :
							
					$wp_customize->add_setting( $element['id'], array(
					
						'sanitize_callback' => 'sanitize_hex_color',
						'default' => $element['std'],

					) );
											 
					$wp_customize->add_control( $element['id'] , array(
					
						'type' => $element['type'],
						'section' => $element['section'],
						'label' => $element['label'],
						'description' => $element['description'],
									
					) );
							
				break;

				case 'button' :
							
					$wp_customize->add_setting( $element['id'], array(
					
						'sanitize_callback' => array( &$this, 'customize_button_sanize' ),
						'default' => $element['std'],

					) );
											 
					$wp_customize->add_control( $element['id'] , array(
					
						'type' => 'url',
						'section' => $element['section'],
						'label' => $element['label'],
						'description' => $element['description'],
									
					) );
							
				break;

				case 'textarea' :
							
					$wp_customize->add_setting( $element['id'], array(
					
						'sanitize_callback' => 'esc_textarea',
						'default' => $element['std'],

					) );
											 
					$wp_customize->add_control( $element['id'] , array(
					
						'type' => $element['type'],
						'section' => $element['section'],
						'label' => $element['label'],
						'description' => $element['description'],
									
					) );
							
				break;

				case 'select' :
							
					$wp_customize->add_setting( $element['id'], array(

						'sanitize_callback' => array( &$this, 'customize_select_sanize' ),
						'default' => $element['std'],

					) );

					$wp_customize->add_control( $element['id'] , array(
						
						'type' => $element['type'],
						'section' => $element['section'],
						'label' => $element['label'],
						'description' => $element['description'],
						'choices'  => $element['options'],
									
					) );
							
				break;

				case 'jaxlite-customize-info' :

					$wp_customize->add_section( $element['id'], array(
					
						'title' => $element['title'],
						'priority' => $element['priority'],
						'capability' => 'edit_theme_options',

					) );

					$wp_customize->add_setting(  $element['id'], array(
						'sanitize_callback' => 'esc_url_raw'
					) );
					 
					$wp_customize->add_control( new Jaxlite_Customize_Info_Control( $wp_customize,  $element['id'] , array(
						'section' => $element['section'],
					) ) );		
										
				break;

			}
			
		}

		if ( $wp_version >= 4.7 )
			$wp_customize->remove_section( 'styles_section');

   }

	public function customize_select_sanize ( $value, $setting ) {
		
		$theme_panel = $this->theme_fields ;

		foreach ( $theme_panel as $element ) {
			
			if ( $element['id'] == $setting->id ) :

				if ( array_key_exists($value, $element['options'] ) ) : 
						
					return $value;

				endif;

			endif;
			
		}
		
	}

	public function customize_button_sanize ( $value, $setting ) {
		
		$sanize = array (
		
			'jaxlite_footer_email_button' => 'mailto:',
			'jaxlite_footer_skype_button' => 'skype:',
			'jaxlite_footer_whatsapp_button' => 'tel:',
		
		);

		if (!isset($value) || $value == '' || $value == $sanize[$setting->id]) {

			return '';

		} elseif (!strstr($value, $sanize[$setting->id])) {
		
			return $sanize[$setting->id] . $value;
	
		} else {
	
			return esc_url_raw($value, array('mailto', 'skype', 'tel'));
	
		}
	
	}

}

if ( class_exists( 'WP_Customize_Control' ) ) {

	class Jaxlite_Customize_Info_Control extends WP_Customize_Control {

		public $type = "jaxlite-customize-info";

		public function render_content() { ?>
            
            <div class="inside">

				<h2><?php esc_html_e('Upgrade to Jax Premium.','jax-lite');?></h2> 

                <p><?php esc_html_e("Upgrade to the premium version of Jax, to enable 600+ Google Fonts, Unlimited sidebars, Portfolio section and much more.","jax-lite");?></p>

                <ul>
                
                    <li><a class="button purchase-button" href="<?php echo esc_url( 'https://www.themeinprogress.com/jax-free-responsive-creative-wordpress-theme/?ref=2&campaign=jax-panel' ); ?>" title="<?php esc_attr_e('Upgrade to Jax Premium','jax-lite');?>" target="_blank"><?php esc_html_e('Upgrade to Jax Premium','jax-lite');?></a></li>
                
                </ul>

            </div>
            
            <div class="inside">

                <h2><?php esc_html_e('Become a supporter','jax-lite');?></h2> 

                <p><?php _e("If you like this theme and support, <strong>I'd appreciate</strong> any of the following:","jax-lite");?></p>

                <ul>
                
                    <li><a class="button" href="<?php echo esc_url( 'https://wordpress.org/support/view/theme-reviews/jax-lite#postform' ); ?>" title="<?php esc_attr_e('Rate this Theme','jax-lite');?>" target="_blank"><?php esc_html_e('Rate this Theme','jax-lite');?></a></li>
                    <li><a class="button" href="<?php echo esc_url( 'https://www.facebook.com/WpInProgress' ); ?>" title="<?php esc_attr_e('Like on Facebook','jax-lite');?>" target="_blank"><?php esc_html_e('Like on Facebook','jax-lite');?></a></li>
                
                </ul>
    
            </div>
    
		<?php

		}
	
	}

}

?>