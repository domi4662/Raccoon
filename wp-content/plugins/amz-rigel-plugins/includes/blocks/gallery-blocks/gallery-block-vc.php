<?php
    /* =============================================================================
     Gallery Blocks Extend Vc
     ========================================================================== */

	$block = array(
		'gallery_block1'  => esc_html__( 'Gallery Block 1', 'composer' ),
		'gallery_block2'  => esc_html__( 'Gallery Block 2', 'composer' ),
		'gallery_block3'  => esc_html__( 'Gallery Block 3', 'composer' ),
		'gallery_block4'  => esc_html__( 'Gallery Block 4', 'composer' ),
		'gallery_block5'  => esc_html__( 'Gallery Block 5', 'composer' ),
		'gallery_block6'  => esc_html__( 'Gallery Block 6', 'composer' ),
		'gallery_block7'  => esc_html__( 'Gallery Block 7', 'composer' ),
		'gallery_block8'  => esc_html__( 'Gallery Block 8', 'composer' ),
		'gallery_block9'  => esc_html__( 'Gallery Block 9', 'composer' ),
		'gallery_block10' => esc_html__( 'Gallery Block 10', 'composer' ),
		'gallery_block11' => esc_html__( 'Gallery Block 11', 'composer' ),
		'gallery_block12' => esc_html__( 'Gallery Block 12', 'composer' )
	);
	
	foreach ( $block as $key => $value ) {

		$icon = str_replace('gallery_block', 'icon-portfolio-block', $key);

		// Gallery Block
		vc_map( array(
			"name" => $value, //Title
			"base" => $key, //Shortcode name
			"class" => "blocks",
			"icon" => $icon,
			"category" => 'Gallery Blocks', //category
			"params" => array(

				array(
					"type" => "attach_images",
					"heading" => esc_html__("Image", "composer"),
					"param_name" => "image_id",
					"value" => "",
					"description" => esc_html__("Select a icon image from media library.", "composer")
				),

				array(
					"type" => "dropdown",
					"heading" => esc_html__("Enable Space in columns?", "composer"),
					"param_name" => "margin",
					"value" => array(
						esc_html__('No', "composer") => "",  
						esc_html__('Yes', "composer") => "margin-yes"
					),
					"description" => esc_html__('Choose Yes to enable Space ( margin inbetween columns )', "composer")
				)
			)
		) );
	}
    