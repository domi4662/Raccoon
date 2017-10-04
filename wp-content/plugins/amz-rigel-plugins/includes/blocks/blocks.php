<?php
	// Define Blocks location
	define( 'RIGEL_BLOCKS_DIR', RIGEL_INC_DIR . '/blocks' );
	define( 'RIGEL_BLOCKS_URL', RIGEL_INC_URL . 'blocks' );

	require_once( RIGEL_BLOCKS_DIR . '/portfolio-blocks/class-portfolio-blocks.php' ); // Class Portfolio Block

	require_once( RIGEL_BLOCKS_DIR . '/gallery-blocks/class-gallery-blocks.php' ); // Class Gallery Block
	
	// Admin Enque CSS and Scripts
	add_action( 'admin_enqueue_scripts', 'vc_pagebuilder_icon' );

	function vc_pagebuilder_icon( $hook_suffix ){

		if( 'post.php' == $hook_suffix || 'post-new.php' == $hook_suffix ) {

			//Load CSS
			wp_enqueue_style( 'vc_pagebuilder_icon', RIGEL_BLOCKS_URL. '/assets/css/vc-pagebuilder-icon.css', array(), 1.0 );

		}
		
	}