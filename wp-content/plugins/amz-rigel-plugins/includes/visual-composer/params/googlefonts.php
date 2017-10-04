<?php

if ( !function_exists('vc_add_shortcode_param')) return;

function rigel_googlefonts( $settings, $value ) {

	$font_variants = $GLOBALS['$font_variants'];
	$font_family_arr = $GLOBALS['$font_family_arr'];

	$g_typography_stored = array('family' => 'none', 'variant' => 'none', 'size' => 'none');
	
	if ( $value && $value != null && !empty ( $value ) ) {
		$g_typography_stored = json_decode( str_replace("'", '"', $value), true );
	}

	$output = '';
	$output .= '<div class="amz_googlefonts_field">';
		$output .= '<input type="hidden" class="edit-menu-item-icon wpb_vc_param_value wpb-textinput '.$settings['param_name'].' '.$settings['type'].'_field" name="'.$settings['param_name'].'" id="'.$settings['param_name'].'" value="'.$value.'"/>';

		/* google Font Face */
		//if ( isset($g_typography_stored['family']) ) {
			$output .= '<div class="amz-gf-field amz-gf-main" data-paramid="'. $settings['param_name'] .'">';	
				$output .= '<select name="'. $settings['param_name']. '_gfont" class="wpb-input wpb-select amz_google_font_select '. $settings['param_name']. '_gfont" id="'. $settings['param_name'] .'_gfont" data-paramid="'. $settings['param_name'] .'">';
						foreach ($font_family_arr as $select_key => $option) {
							$output .= '<option value="'.$select_key.'" ' . selected($g_typography_stored['family'], $option, false) . '>'.$option.'</option>';
						}
				$output .= '</select>';			
			$output .= '</div>';
		//}

		/* Font Variant */	
		if ( isset($g_typography_stored['variant']) ) {
			$output .= '<div class="amz-gf-field amz-gf-variant" data-paramid="'. $settings['param_name'] .'">';
			$output .= '<select class="wpb-input wpb-select amz_google_font_variants_select" name="'.$settings['param_name'].'[variants]" id="'. $settings['param_name'].'_gfont_variants">';
			if ( $g_typography_stored['family'] != 'none' ) {
				$variants = $font_variants[$g_typography_stored['family']];
			} else {
				$variants = array('regular');
			}


			//var_dump( $font_variants );
			$output .= '<option value="none" ' . selected($g_typography_stored['variant'], 'none', false) . '>Theme Default</option>';
						
			foreach ($variants as $variant){		
				$output .= '<option value="'. $variant .'" ' . selected($g_typography_stored['variant'], $variant, false) . '>'. ucwords($variant) .'</option>';		
			}
			$output .= '</select></div>';
		}

		if ( isset($g_typography_stored['size']) ) {
			/* Font Size */
			$output .= '<div class="amz-gf-field amz-gf-size" data-paramid="'. $settings['param_name'] .'">';
			/*$output .= '<select class="wpb-input wpb-select amz_google_font_size_select" name="'.$settings['param_name'].'[size]" id="'. $settings['param_name'].'_gfont_size">';
							$output .= '<option value="none" ' . selected($g_typography_stored['size'], 'none', false) . '>Theme Default</option>';
				for ($i = 9; $i < 70; $i++){ 
					$test = $i.'px';
					$output .= '<option value="'. $i .'px" ' . selected($g_typography_stored['size'], $test, false) . '>'. $i .'px</option>'; 
					}	
			$output .= '</select>';*/
			$output .= '<input type="text" value="'. $g_typography_stored['size'] .'" class="wpb-input wpb-select amz_google_font_size_select" name="'.$settings['param_name'].'[size]" id="'. $settings['param_name'].'_gfont_size">';
			$output .= '</div>';

		}
	
		if(isset($value['preview']['text'])){
			$g_text = $value['preview']['text'];
		} else {
			$g_text = '0123456789 ABCDEFGHIJKLMNOPQRSTUVWXYZ abcdefghijklmnopqrstuvwxyz';
		}
		if(isset($value['preview']['size'])) {
			$g_size = 'style="font-size: '. $value['preview']['size'] .';"';
		} else { 
			$g_size = 'style="font-size: 26px;"';
		}
		
		$output .= '<p class="'.$settings['param_name'].'_gfont_ggf_previewer amz_google_font_preview" '. $g_size .'>'. $g_text .'</p>';	
		//{"family":"Zeyada","variants":["regular"],"subsets":["latin"]}

	$output .= '</div>';

	return $output;


}
vc_add_shortcode_param( 'amz_gf', 'rigel_googlefonts', RIGEL_PLUGIN_URL .'/assets/js/googlefonts-preview.js' );
