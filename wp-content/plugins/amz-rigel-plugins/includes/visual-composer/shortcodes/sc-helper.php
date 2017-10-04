<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/* Custom Post Type Class */
if( ! class_exists( 'Rigel_helper' ) ) :

class Rigel_helper {

	protected static $_instance = null;

	protected $fonts_used = array();

	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	public function __construct() {
		$this->subsets = 'latin,latin-ext';

		add_action( 'the_content', array( $this, 'amz_scripts_and_styles' ), 99999 );
	}

	function amz_scripts_and_styles( $the_content ) {

		$chosen_fonts = '';
		$total_fonts = count( $this->fonts_used );

		$i = 1;

		foreach ( $this->fonts_used as $font => $variant ) {
			
			$chosen_fonts .= $font . ':' . implode( ',', $variant );

			$chosen_fonts .= ( $i < $total_fonts ) ? '|' : '';

			$i++;
		}

		if( $chosen_fonts ) {
			
			$fonts_url = add_query_arg( array(
						'family' => urlencode( $chosen_fonts ),
						'subset' => urlencode( $this->subsets ),
					), '//fonts.googleapis.com/css' );

			wp_enqueue_style( 'rigel_sc_google_fonts', esc_url_raw( $fonts_url ), array(), null );
		}		

		return $the_content;
	}

	/* Seperate 300italic to array(300, italic) */
	function amz_font_variant($fv = ''){

		//Font Style
		if(stristr($fv, 'italic') !== FALSE){
			$fs = 'italic';
		}else{
			$fs = 'normal';
		}

		//Font Weight
		$fw = substr($fv, 0, 3);
		if($fw === FALSE || $fw == 'reg' || $fw == 'ita'){
			$fw = '400';
		}

		return array($fs, $fw);
	}

	function amz_split_letter( $button_text ){
		$button_text_html = '';
		if ( ! empty ( $button_text ) ) {
			foreach ( str_split( $button_text ) as $value ) {
				if($value == ' ' ){
					$button_text_html .= ' ';
				}else{
					$button_text_html .= '<span>'. $value .'</span>';
				}
			}
		}
		
		return $button_text_html;
	}

	/* Generate inline style for font group */
	public function amz_generate_font_css( $typography ) {
		$variant = $this->amz_font_variant( $typography['variant'] );
		//$style = ' style="';
		$style = '';
			
			if ( $typography['family'] && $typography['family'] != 'none' )
				$style .= 'font-family: \''. trim($typography['family']) .'\', san-serif;';
			
			if ( $typography['size'] && $typography['size'] != '' )
				$style .= 'font-size: '. $typography['size'] .';';

			if ( $typography['variant'] && $typography['variant'] != 'none' ){
				$style .= 'font-style: '. $variant[0] .';';
				$style .= 'font-weight: '. $variant[1] .';';
			}
			
		//$style .= '"';
		return $style;
	}

	public function amz_generate_font_url( $typography ) {

		if( isset( $typography['family'] ) && $typography['family'] != 'none' ) {

			$font_name = $typography['family'];

			if( isset( $typography['variant'] ) && $typography['variant'] != 'none' ) {

				if( ! isset( $this->fonts_used[$font_name] ) ) {
					$this->fonts_used[$font_name] = array();
				}

				if( ! in_array($typography['variant'], $this->fonts_used[$font_name]) ) {
					array_push( $this->fonts_used[$font_name], $typography['variant'] );
				}

			}

		}

	}


	public function amz_get_class_name ( $css ) {

		if ( empty ( $css ) ) { return ''; }

		$css_array = VcExtremeAddons::amz_css_to_array( $css );
		$css_rules = $css_array[key($css_array)];

		if ( isset($css_rules['font-family']) && $css_rules['font-family'] != 'none' ) {

			$typography['family'] = str_replace("'", '', $css_rules['font-family']);
			$typography['family'] = str_replace(" !important", '', $typography['family']);
			$typography['variant'] = 'none';
			$variant = '';

			if ( isset( $css_rules['font-weight'] ) && ! empty( $css_rules['font-weight'] ) ) {
				$variant .= ( $css_rules['font-weight'] != '400' ) ? $css_rules['font-weight'] : 'regular';
			}

			if ( isset( $css_rules['font-style'] ) && ( $css_rules['font-weight'] == 'italic' ) ) {
				$variant .= 'italic';
			}
			$typography['variant'] = $variant;

			$this->amz_generate_font_url( $typography );

		}

		$class = str_replace(':hover', '', key($css_array));
		$class = str_replace('.', '', $class);

		return ' ' . $class;

	}

	/*--------------------------------------------------------------------------------------
	  *
	  * amz_get_font_and_color_styles
	  * required $font or $color or $font_size
	  *
	  * @author Shahul Hameed
	  * @since 1.0
	  * @todo return string of css (font & color)
	  *-------------------------------------------------------------------------------------*/

	public function amz_get_font_and_color_styles( $font = '',  $color = '', $font_size = '', $include_style_attr = 1 ) {

		$style = '';

		// Counter Number Custom Styles
		if ( ( $font && $font != "{'family':'none', 'variant':'none', 'size':''}" ) || ! empty( $color ) || ! empty( $font_size ) ) {

			if ( $include_style_attr ) {
				$style .= ' style="';
			}

				if ( $font && $font != "{'family':'none', 'variant':'none', 'size':'none'}" ) {

					/*typography becomes like this $typography['family'] $content_typography['variant'] $content_typography['size'] */
					$typography = json_decode( str_replace( "'", '"', $font ), true );

					$style .= $this->amz_generate_font_css( $typography );

					$this->amz_generate_font_url( $typography );
				}               

				$style .= ( ! empty( $color ) ) ? 'color: '. $color .';' : '';
				$style .= ( ! empty( $font_size ) ) ? 'font-size: '. $font_size .';' : '';          

			if ( $include_style_attr ) {
				$style .= '"';
			}

		}

		return $style;

	}
	
}

endif;

if( ! function_exists( 'RH' ) ) :
	function RH() {
		return Rigel_helper::instance();
	}
endif;

RH();
