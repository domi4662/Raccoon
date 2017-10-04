<?php
/**
 * Importer Path
 */
if( ! function_exists( 'amz_importer_get_path_locate' ) ) {
	function amz_importer_get_path_locate() {
		$dirname        = wp_normalize_path( dirname( __FILE__ ) );
		$plugin_dir     = wp_normalize_path( WP_PLUGIN_DIR );
		$located_plugin = ( preg_match( '#'. $plugin_dir .'#', $dirname ) ) ? true : false;
		$directory      = ( $located_plugin ) ? $plugin_dir : get_template_directory();
		$directory_uri  = ( $located_plugin ) ? WP_PLUGIN_URL : get_template_directory_uri();
		$basename       = str_replace( wp_normalize_path( $directory ), '', $dirname );
		$dir            = $directory . $basename;
		$uri            = $directory_uri . $basename;
		return apply_filters( 'amz_importer_get_path_locate', array(
			'basename' => wp_normalize_path( $basename ),
			'dir'      => wp_normalize_path( $dir ),
			'uri'      => $uri
			) );
	}
}

/**
 * Importer constants
 */
$get_path = amz_importer_get_path_locate();

define( 'AMZ_IMPORTER_VER' , '1.0.0' );
define( 'AMZ_IMPORTER_DIR' , $get_path['dir'] );
define( 'AMZ_IMPORTER_URI' , $get_path['uri'] );
define( 'AMZ_IMPORTER_CONTENT_DIR' , AMZ_IMPORTER_DIR . '/demos/' );
define( 'AMZ_IMPORTER_CONTENT_URI' , AMZ_IMPORTER_URI . '/demos/' );



/**
 * Scripts and styles for admin
 */
function amz_importer_enqueue_scripts() {

	wp_enqueue_script( 'amz-importer', AMZ_IMPORTER_URI . '/assets/js/amz-importer.js', array( 'jquery' ), AMZ_IMPORTER_VER, true);
	wp_enqueue_style( 'amz-importer-css', AMZ_IMPORTER_URI . '/assets/css/amz-importer.css', null, AMZ_IMPORTER_VER);
}

add_action( 'admin_enqueue_scripts', 'amz_importer_enqueue_scripts' );

/**
 *
 * Decode string for backup options (Source from codestar)
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'cs_decode_string' ) ) {
	function cs_decode_string( $string ) {
		return unserialize( gzuncompress( stripslashes( call_user_func( 'base'. '64' .'_decode', rtrim( strtr( $string, '-_', '+/' ), '=' ) ) ) ) );
	}
}

/**
 * Load Importer
 */
require_once AMZ_IMPORTER_DIR . '/classes/abstract.class.php';
require_once AMZ_IMPORTER_DIR . '/classes/importer.class.php';

/**
 * large image size : 
 * small image size : 350 x 263
 * @var array
 */
$settings      = array(
    'menu_parent' => 'themes.php',
    'menu_title'  => __('Import Demos', 'amz-importer'),
    'menu_type'   => 'add_submenu_page',
    'menu_slug'   => 'amz_demo_importer',
    );
$options        = array(
    '_all' => array(
        'title'         => __('Import All Pages', 'amz-importer'),
        'preview_url'   => 'pixel8es.com/wpthemes/rigel/',
        'front_page'    => 'Home',
        'blog_page'     => 'Blog',
        'menus'         => array(
            'primary'   => 'Primary', // Menu Location and Title
            ),
        'main_demo' => true // main sure image size is larger
        ),
    'rigel-agency' => array(
        'title'         => __('Rigel Agency', 'amz-importer'),
        'preview_url'   => 'pixel8es.com/wpthemes/rigel/rigel-agency/',
        ),
    'rigel-barber' => array(
        'title'         => __('Rigel Barber', 'amz-importer'),
        'preview_url'   => 'pixel8es.com/wpthemes/rigel/rigel-barber/',
        ),
    'rigel-business' => array(
        'title'         => __('Rigel Business', 'amz-importer'),
        'preview_url'   => 'pixel8es.com/wpthemes/rigel/rigel-business/',
        ),
    'rigel-corporate' => array(
        'title'         => __('Rigel Corporate', 'amz-importer'),
        'preview_url'   => 'pixel8es.com/wpthemes/rigel/rigel-corporate/',
        ),
    'rigel-default' => array(
        'title'         => __('Rigel- Default', 'amz-importer'),
        'preview_url'   => 'pixel8es.com/wpthemes/rigel/rigel-default/',
        ),
    'rigel-digital-agency' => array(
        'title'         => __('Digital Agency', 'amz-importer'),
        'preview_url'   => 'pixel8es.com/wpthemes/rigel/digital-agency/',
        ),
    'rigel-freelancer' => array(
        'title'         => __('Rigel Freelancer', 'amz-importer'),
        'preview_url'   => 'pixel8es.com/wpthemes/rigel/rigel-freelancer/',
        ),
    'rigel-freelancer-2' => array(
        'title'         => __('Rigel Freelancer 2', 'amz-importer'),
        'preview_url'   => 'pixel8es.com/wpthemes/rigel/rigel-freelancer-2/',
        ),
    'rigel-portfolio' => array(
        'title'         => __('Rigel Portfolio', 'amz-importer'),
        'preview_url'   => 'pixel8es.com/wpthemes/rigel/rigel-portfolio/',
        ),
    'rigel-shop' => array(
        'title'         => __('Rigel Shop', 'amz-importer'),
        'preview_url'   => 'pixel8es.com/wpthemes/rigel/rigel-shop/',
        ),
    'rigel-startup' => array(
        'title'         => __('Rigel Startup', 'amz-importer'),
        'preview_url'   => 'pixel8es.com/wpthemes/rigel/rigel-startup/',
        ),
    'rigel-consulting' => array(
        'title'         => __('Rigel Consulting', 'amz-importer'),
        'preview_url'   => 'pixel8es.com/wpthemes/rigel/rigel-consulting/?pri_color=5472d2',
        ),
    'rigel-app-landing' => array(
        'title'         => __('Rigel App Landing', 'amz-importer'),
        'preview_url'   => 'pixel8es.com/wpthemes/rigel-apps',
        ),
    'rigel-business-2' => array(
        'title'         => __('Rigel Business 2', 'amz-importer'),
        'preview_url'   => 'pixel8es.com/wpthemes/rigel/rigel-business-2/?pri_color=0072ff',
        ),
    'rigel-business-3' => array(
        'title'         => __('Rigel Business 3', 'amz-importer'),
        'preview_url'   => 'pixel8es.com/wpthemes/rigel/rigel-business-3/',
        ),
    'rigel-business-4' => array(
        'title'         => __('Rigel Business 4', 'amz-importer'),
        'preview_url'   => 'pixel8es.com/wpthemes/rigel/rigel-business-4/?pri_color=3174ff',
        ),
    'rigel-creative-agency' => array(
        'title'         => __('Rigel Creative Agency', 'amz-importer'),
        'preview_url'   => 'pixel8es.com/wpthemes/rigel/rigel-creative-agency/?pri_color=f2ce08',
        ),
    'rigle-simple-portfolio-1' => array(
        'title'         => __('Rigel Simple Portfolio 1', 'amz-importer'),
        'preview_url'   => 'pixel8es.com/wpthemes/rigel/simple-portfolio-1',
        ),
    'rigel-agency-2' => array(
        'title'         => __('Rigel Agency 2', 'amz-importer'),
        'preview_url'   => 'pixel8es.com/wpthemes/rigel/rigel-agency-2/?pri_color=e2483c',
        ),
    'rigel-agency-3' => array(
        'title'         => __('Rigel Agency 3', 'amz-importer'),
        'preview_url'   => 'pixel8es.com/wpthemes/rigel/rigel-agency-3/?pri_color=1490d6',
        ),
    'rigel-minimal-agency' => array(
        'title'         => __('Rigel Minimal Agency', 'amz-importer'),
        'preview_url'   => 'pixel8es.com/wpthemes/rigel/rigel-minimal-agency',
        ),
    );
AMZ_Demo_Importer::instance( $settings, $options );
