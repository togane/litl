<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Shapla_Fonts' ) ) {
	/**
	 * Shapla_Fonts class.
	 *
	 * @class        Shapla_Fonts
	 * @version        1.4.0
	 */
	class Shapla_Fonts {

		/**
		 * List of Google fonts
		 *
		 * @var array
		 */
		protected static $google_fonts;

		/**
		 * If set to true, forces loading ALL variants.
		 *
		 * @static
		 * @access public
		 * @var bool
		 */
		public static $force_load_all_variants = false;

		/**
		 * Compile font options from different sources.
		 *
		 * @return array    All available fonts.
		 */
		public static function get_all_fonts() {
			$standard_fonts = self::get_standard_fonts();
			$google_fonts   = self::get_google_fonts();

			return apply_filters( 'shapla_fonts_all', array_merge( $standard_fonts, $google_fonts ) );
		}

		/**
		 * Return an array of standard websafe fonts.
		 *
		 * @return array    Standard websafe fonts.
		 */
		public static function get_standard_fonts() {
			$standard_fonts = array(
				'serif'      => array(
					'label' => 'Serif',
					'stack' => 'Georgia,Times,"Times New Roman",serif',
				),
				'sans-serif' => array(
					'label' => 'Sans Serif',
					'stack' => '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif',
				),
				'monospace'  => array(
					'label' => 'Monospace',
					'stack' => 'Monaco,"Lucida Sans Typewriter","Lucida Typewriter","Courier New",Courier,monospace',
				),
			);

			return apply_filters( 'shapla_fonts_standard_fonts', $standard_fonts );
		}

		/**
		 * Return an array of backup fonts based on the font-category
		 *
		 * @return array
		 */
		public static function get_backup_fonts() {
			$backup_fonts = array(
				'sans-serif'  => 'Helvetica, Arial, sans-serif',
				'serif'       => 'Georgia, serif',
				'display'     => '"Comic Sans MS", cursive, sans-serif',
				'handwriting' => '"Comic Sans MS", cursive, sans-serif',
				'monospace'   => '"Lucida Console", Monaco, monospace',
			);

			return apply_filters( 'shapla_fonts_backup_fonts', $backup_fonts );
		}

		/**
		 * Return an array of all available Google Fonts.
		 *
		 * @return array    All Google Fonts.
		 */
		public static function get_google_fonts() {

			// Get fonts from cache.
			self::$google_fonts = get_site_transient( 'shapla_google_fonts_cache' );

			// If we're debugging, don't use cached.
			if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
				self::$google_fonts = false;
			}

			// If cache is populated, return cached fonts array.
			if ( self::$google_fonts ) {
				return self::$google_fonts;
			}

			// If we got this far, cache was empty so we need to get from JSON.
			ob_start();
			include dirname( dirname( __FILE__ ) ) . '/assets/webfonts.json';

			$fonts_json = ob_get_clean();
			$fonts      = json_decode( $fonts_json, true );

			$google_fonts = array();
			if ( is_array( $fonts ) ) {
				foreach ( $fonts['items'] as $font ) {
					$google_fonts[ $font['family'] ] = array(
						'label'    => $font['family'],
						'variants' => $font['variants'],
						'category' => $font['category'],
					);
				}
			}

			// Apply the 'shapla_fonts_google_fonts' filter.
			self::$google_fonts = apply_filters( 'shapla_fonts_google_fonts', $google_fonts );

			// Save the array in cache.
			$cache_time = apply_filters( 'shapla_google_fonts_transient_time', HOUR_IN_SECONDS );
			set_site_transient( 'shapla_google_fonts_cache', self::$google_fonts, $cache_time );

			return self::$google_fonts;
		}

		/**
		 * Returns an array of all available subsets.
		 *
		 * @static
		 * @access public
		 * @return array
		 */
		public static function get_google_font_subsets() {
			return array(
				'cyrillic'     => 'Cyrillic',
				'cyrillic-ext' => 'Cyrillic Extended',
				'devanagari'   => 'Devanagari',
				'greek'        => 'Greek',
				'greek-ext'    => 'Greek Extended',
				'khmer'        => 'Khmer',
				'latin'        => 'Latin',
				'latin-ext'    => 'Latin Extended',
				'vietnamese'   => 'Vietnamese',
				'hebrew'       => 'Hebrew',
				'arabic'       => 'Arabic',
				'bengali'      => 'Bengali',
				'gujarati'     => 'Gujarati',
				'tamil'        => 'Tamil',
				'telugu'       => 'Telugu',
				'thai'         => 'Thai',
			);
		}

		/**
		 * Returns an array of all available variants.
		 *
		 * @static
		 * @access public
		 * @return array
		 */
		public static function get_all_variants() {
			return array(
				'100'       => esc_attr__( 'Ultra-Light 100', 'shapla' ),
				'100light'  => esc_attr__( 'Ultra-Light 100', 'shapla' ),
				'100italic' => esc_attr__( 'Ultra-Light 100 Italic', 'shapla' ),
				'200'       => esc_attr__( 'Light 200', 'shapla' ),
				'200italic' => esc_attr__( 'Light 200 Italic', 'shapla' ),
				'300'       => esc_attr__( 'Book 300', 'shapla' ),
				'300italic' => esc_attr__( 'Book 300 Italic', 'shapla' ),
				'400'       => esc_attr__( 'Normal 400', 'shapla' ),
				'regular'   => esc_attr__( 'Normal 400', 'shapla' ),
				'italic'    => esc_attr__( 'Normal 400 Italic', 'shapla' ),
				'500'       => esc_attr__( 'Medium 500', 'shapla' ),
				'500italic' => esc_attr__( 'Medium 500 Italic', 'shapla' ),
				'600'       => esc_attr__( 'Semi-Bold 600', 'shapla' ),
				'600bold'   => esc_attr__( 'Semi-Bold 600', 'shapla' ),
				'600italic' => esc_attr__( 'Semi-Bold 600 Italic', 'shapla' ),
				'700'       => esc_attr__( 'Bold 700', 'shapla' ),
				'700italic' => esc_attr__( 'Bold 700 Italic', 'shapla' ),
				'800'       => esc_attr__( 'Extra-Bold 800', 'shapla' ),
				'800bold'   => esc_attr__( 'Extra-Bold 800', 'shapla' ),
				'800italic' => esc_attr__( 'Extra-Bold 800 Italic', 'shapla' ),
				'900'       => esc_attr__( 'Ultra-Bold 900', 'shapla' ),
				'900bold'   => esc_attr__( 'Ultra-Bold 900', 'shapla' ),
				'900italic' => esc_attr__( 'Ultra-Bold 900 Italic', 'shapla' ),
			);
		}

		/**
		 * Determine if a font-name is a valid google font or not.
		 *
		 * @static
		 * @access public
		 *
		 * @param string $fontname The name of the font we want to check.
		 *
		 * @return bool
		 */
		public static function is_google_font( $fontname ) {
			if ( ! is_array( self::$google_fonts ) ) {
				self::$google_fonts = self::get_google_fonts();
			}

			return ( array_key_exists( $fontname, self::$google_fonts ) );
		}

		/**
		 * Gets available options for a font.
		 *
		 * @static
		 * @access public
		 * @return array
		 */
		public static function get_font_choices() {
			$fonts       = self::get_all_fonts();
			$fonts_array = array();
			foreach ( $fonts as $key => $args ) {
				$fonts_array[ $key ] = $key;
			}

			return $fonts_array;
		}

		/**
		 * Get font category from font name
		 *
		 * @param $fontname
		 *
		 * @return null|string
		 */
		public static function get_google_font_category( $fontname ) {
			if ( ! is_array( self::$google_fonts ) ) {
				self::$google_fonts = self::get_google_fonts();
			}

			if ( isset( self::$google_fonts[ $fontname ]['category'] ) ) {
				return ',' . self::$google_fonts[ $fontname ]['category'];
			}

			return null;
		}
	}
}