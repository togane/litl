<?php

/**
 * Wp in Progress
 * 
 * @package Jax Lite
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

/*-----------------------------------------------------------------------------------*/
/* Socials */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('jaxlite_socials_function')) {

	function jaxlite_socials_function() {
		
		$socials = array ( 
			
			"facebook" => array( "icon" => "fa fa-facebook" , "target" => "_blank" ),
			"twitter" => array( "icon" => "fa fa-twitter" , "target" => "_blank" ),
			"flickr" => array( "icon" => "fa fa-flickr" , "target" => "_blank" ),
			"linkedin" => array( "icon" => "fa fa-linkedin" , "target" => "_blank" ),
			"pinterest" => array( "icon" => "fa fa-pinterest" , "target" => "_blank" ),
			"tumblr" => array( "icon" => "fa fa-tumblr" , "target" => "_blank" ),
			"youtube" => array( "icon" => "fa fa-youtube" , "target" => "_blank" ),
			"skype" => array( "icon" => "fa fa-skype" , "target" => "_self" ),
			"instagram" => array( "icon" => "fa fa-instagram" , "target" => "_blank" ),
			"github" => array( "icon" => "fa fa-github" , "target" => "_blank" ),
			"xing" => array( "icon" => "fa fa-xing" , "target" => "_blank" ),
			"whatsapp" => array( "icon" => "fa fa-whatsapp" , "target" => "_self" ),
			"email" => array( "icon" => "fa fa-envelope" , "target" => "_self" ),
		
		);

		$i = 0;
		$html = "";
		
		foreach ( $socials as $name => $attrs) { 
		
			if (jaxlite_setting('jaxlite_footer_'.$name.'_button')): 

				$i++;	
				$html.= '<a href="'.esc_url(jaxlite_setting('jaxlite_footer_'.$name.'_button'), array( 'http', 'https', 'tel', 'skype', 'mailto' ) ).'" target="'.$attrs['target'].'" class="social '.$name.'-button"> <i class="'.$attrs['icon'].'" ></i> </a> ';
			
			endif;
			
		}
		
		if ( jaxlite_setting('jaxlite_footer_rss_button') == "on" ): 
		
			$i++;	
			$html.= '<a href="'. esc_url(get_bloginfo('rss2_url')). '" title="Rss" class="social rss"> <i class="fa fa-rss" ></i>  </a> ';
		
		endif; 
			
		if ( $i > 0 ) {
			
		?>
	
		<div class="socials">
				
			<?php echo $html; ?>
							
		</div>
	
		<?php
	
		}
		
	}
	
	add_action( 'jaxlite_socials', 'jaxlite_socials_function', 10, 2 );

}

?>