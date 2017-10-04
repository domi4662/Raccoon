<?php
	
	/********************/
	/* Define Constants */
	/********************/
	
	define( 'RIGEL_DIR', get_template_directory() );
	define( 'RIGEL_URI', get_template_directory_uri() );
	
	//Theme Framework location
	define( 'RIGEL_FRAMEWORK',		RIGEL_DIR . '/framework' );
	define( 'RIGEL_FRAMEWORK_URI',	RIGEL_URI . '/framework' );
	
	//Wordpress Admin
	define( 'RIGEL_ADMIN',			RIGEL_FRAMEWORK . 		'/admin' );
	define( 'RIGEL_ADMIN_URI',		RIGEL_FRAMEWORK_URI . 	'/admin' );

	//Extras
	define( 'RIGEL_EXTRAS',			RIGEL_FRAMEWORK . 		'/extras' );
	define( 'RIGEL_EXTRAS_URI',		RIGEL_FRAMEWORK_URI . 	'/extras' );
	
	define( 'RIGEL_PLUGINS',		RIGEL_FRAMEWORK . 		'/plugins' );
	define( 'RIGEL_PLUGINS_URI',	RIGEL_FRAMEWORK_URI . 	'/plugins' );
	
	define( 'RIGEL_HELPERS',				RIGEL_FRAMEWORK . 		'/helpers' );
	define( 'RIGEL_HELPERS_URI',			RIGEL_FRAMEWORK_URI .   '/helpers' );
	
	define( 'RIGEL_WIDGETS',		RIGEL_FRAMEWORK . 		'/widgets' );
	
	define( 'RIGEL_ADMIN_OPTION',	 RIGEL_FRAMEWORK .		'/theme-options' );

	define( 'RIGEL_METABOX',	 RIGEL_ADMIN .		'/metaboxes' );

	rigel_require_file( RIGEL_EXTRAS. 			'/extras.php' ); //Install required plugins
	
	rigel_require_file( RIGEL_FRAMEWORK.		'/tgm-config.php' ); //Install required plugins

	rigel_require_file( RIGEL_ADMIN_OPTION .	'/theme-option.php' ); //Theme Option Page
	
	rigel_require_file( RIGEL_HELPERS .			'/helpers.php' ); //Helper ThemeFuntion
	
	rigel_require_file( RIGEL_HELPERS .			'/header-helpers.php' ); //Theme Header helper functions
	
	rigel_require_file( RIGEL_HELPERS .			'/blog-helpers.php' ); //Theme blog helper functions
	
	rigel_require_file( RIGEL_HELPERS .			'/woo-helpers.php' ); //Theme woocommerce functions
	
	rigel_require_file( RIGEL_HELPERS .			'/ajax-functions.php' ); //Theme Ajax Callback functions

	if ( class_exists( 'WPBakeryVisualComposerAbstract' ) ) {

		vc_disable_frontend();

		if( function_exists( 'vc_set_as_theme' ) ) vc_set_as_theme();               

		vc_set_shortcodes_templates_dir(  RIGEL_FRAMEWORK . '/vc_templates/' );

		rigel_require_file( RIGEL_FRAMEWORK. '/vc_templates/extend_vc/extend_vc.php' );

		require_once locate_template('/framework/vc_templates/extend_vc/templates.php');

		function rigel_enable_vc_auto_theme_update() { 
			if( function_exists('vc_updater') ) { 
				$vc_updater = vc_updater(); 
				remove_filter( 'upgrader_pre_download', array( $vc_updater, 'preUpgradeFilter' ), 10 ); 
				if( function_exists( 'vc_license' ) ) { 
					if( !vc_license()->isActivated() ) { 
						remove_filter( 'pre_set_site_transient_update_plugins', array( $vc_updater->updateManager(), 'check_update' ), 10 ); 
					} 
				} 
			} 
		} 
		add_action( 'vc_after_init', 'rigel_enable_vc_auto_theme_update' );
	}
	

	rigel_require_file( RIGEL_WIDGETS . '/widgets.php' ); //All Widgets

	/* Admin File */
	rigel_require_file( RIGEL_ADMIN . '/admin.php' );
	
	/*******************/
	/* Include Plugins */
	/*******************/
	rigel_require_file( RIGEL_PLUGINS . '/plugins.php' );
