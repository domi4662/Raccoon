<?php
/*
	Plugin Name: Rigel Core Plugins
	Plugin URI: http://themeforest.net
	Description: Core plugin for the rigel theme.
	Version: 1.5.1
	Author: Amazee
	Author URI: http://www.falconcreativestudio.com
	Text Domain: amz-rigel-plugins
	Domain Path: /languages/
*/


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


/*
 * The Rigel Core Plugins Iniatialize class
 */
class Rigel_Base_Plugin {

	public function __construct(){
		//Initialize folders as super global variables
		define( 'RIGEL_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

		define( 'RIGEL_PLUGIN_URL', plugins_url( '', __FILE__ ) );

		define( 'RIGEL_CLASS_DIR', plugin_dir_path( __FILE__ ). 'class/' );

		define( 'RIGEL_INC_DIR', plugin_dir_path( __FILE__ ). 'includes/' );

		define( 'RIGEL_INC_URL', plugins_url( '', __FILE__ ). '/includes/' );
		
		// call plugin text-domain
		add_action( 'plugins_loaded', array( $this, 'amz_load_plugin_textdomain' ) );

		// call metabox iniatialization
		add_action( 'init', array( $this, 'init' ) );

		require( RIGEL_INC_DIR . 'visual-composer/vc_init.php' );
		
	}	
	
	/* Load Text Domain */
	function amz_load_plugin_textdomain() {
	    load_plugin_textdomain( 'amz-rigel-plugins', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
	}

	/* Iniatialize */
	function init() {

		// Required Files
		require( RIGEL_PLUGIN_DIR . 'includes/helper.php' );
		require( RIGEL_CLASS_DIR . 'class-post-types.php' );
		require( RIGEL_CLASS_DIR . 'class-metaboxes.php' );

		require( RIGEL_PLUGIN_DIR . 'demo-importer/init.php' );		

		/* require_once all files inside includes/metaboxes */
		foreach ( glob( RIGEL_INC_DIR . "metaboxes/*" ) as $filename ) {
		  require_once $filename;
		}
		add_action('wp_ajax_amz_change_gfont_weight', array( $this, 'amz_change_gfont_weight') );

		require_once( RIGEL_INC_DIR . 'posttypes/posttypes.php' ); // Post type

		require_once( RIGEL_INC_DIR . 'twitter/twitter-feed-for-developers.php' ); // Twitter

		//VC Load Google Fonts
		require_once( RIGEL_INC_DIR . 'visual-composer/params/fonts-list.php' );

		$this->font_family_arr['none'] = __( 'Theme Default', 'rigel' );
		foreach ( $fonts['items'] as $font ) {
			$this->font_family_arr[$font['family']] = $font['family'];
			$this->font_variants[$font['family']] = $font['variants'];
			$GLOBALS['$font_family_arr'] = $this->font_family_arr;
			$GLOBALS['$font_variants'] = $this->font_variants;
		}

	}

	public function amz_change_gfont_weight() {
		if($_POST['font']){
			echo json_encode( $this->font_variants[$_POST['font']] );
		}else{
			echo 'regular';
		}
		die();
	}
	
}

$Rigel_Base_Plugin = new Rigel_Base_Plugin();
