<?php

	/* Visual Composer: Initialize
	================================================== */

	// Include external shortcodes
	function amz_external_shortcodes() {

		$vc_active = false;

		if ( ! function_exists( 'is_plugin_active' ) ) {
		    require_once( ABSPATH . '/wp-admin/includes/plugin.php' );
        }

        if( is_plugin_active( 'js_composer/js_composer.php' ) ) {
        	$vc_active = true;
        } else {

        	if( is_multisite() ) {

        		if ( ! function_exists( 'is_plugin_active_for_network' ) ) {
        			require_once( ABSPATH . '/wp-admin/includes/plugin.php' );
        		}

        		if ( is_plugin_active_for_network( 'js_composer/js_composer.php' ) ) {
        			$vc_active = true;
        		}

        	}

        }

		if( $vc_active ) {

			@vc_add_shortcode_param( 'icon', 'icon_field', get_template_directory_uri() .'/framework/extras/menu-extend/js/dialog.js' );			

			require_once( RIGEL_INC_DIR . 'visual-composer/params/googlefonts.php' );
			
			require_once( RIGEL_INC_DIR . 'blocks/blocks.php' ); // Blocks

		}

		require_once( RIGEL_INC_DIR . 'visual-composer/shortcodes/sc-helper.php' );

		require_once( RIGEL_INC_DIR . 'visual-composer/shortcodes/external_shortcodes.php' );

	}
	add_action( 'init', 'amz_external_shortcodes' );
	
	
	if ( is_admin() ) {
		// Include external elements
		function amz_external_vc_elements() {
			require_once( RIGEL_INC_DIR . 'visual-composer/elements/vc_elements.php' );
		}
		add_action( 'vc_build_admin_page', 'amz_external_vc_elements' );
	}

	//Add new param to vc
	function icon_field( $settings, $value ) {
		return '<div class="icon_field menu-item-settings">'
			.'<input type="hidden" class="edit-menu-item-icon wpb_vc_param_value wpb-textinput '. esc_attr( $settings['param_name'] .' '. $settings['type'] ) . '_field" name="'. esc_attr( $settings['param_name'] ) .'" value="'. esc_attr( $value ) .'"/>

			<span class="pix-inserted-icon"></span>

			<a href="#" class="button pix-insert-menu-icon"><i class="fa fa-arrow-circle-o-down"></i> '. esc_html__( 'Insert Icon', 'rigel' ) .'</a>
			<a href="#" class="button pix-remove-menu-icon hidden"><i class="fa fa-times"></i> '. esc_html__( 'Remove Icon', 'rigel' ) .'</a>
		</div>';
	}
