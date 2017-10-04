<?php
/**
 * Rigel functions and definitions
 *
 * @package Rigel
 */

if( !function_exists( 'rigel_require_file' ) ) {
	function rigel_require_file ( $file_path ) {
	    require_once ( $file_path );
	}
}


if ( ! function_exists( 'rigel_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function rigel_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Rigel, use a find and replace
	 * to change 'rigel' to the name of your theme in all the template files
	 */

	load_theme_textdomain( 'rigel', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// wp menus
	add_theme_support( 'menus' );

	add_theme_support( 'custom-header' );

	//WooCommerce theme support
	if ( class_exists( 'WooCommerce' ) ) {
		add_theme_support( 'woocommerce' );
	}
    
    add_theme_support( 'wc-product-gallery-slider' );

	// registering wp3+ menus
	register_nav_menus(
		array(
			'main-nav'       => esc_html__( 'The Main Menu', 'rigel' ),   // main nav in header
			'main-nav-left'  => esc_html__( 'Left Main Menu', 'rigel' ),   // main nav Left in header
			'main-nav-right' => esc_html__( 'Right Main Menu', 'rigel' ),   // main nav Right in header
			'top-head-nav'   => esc_html__( 'Top Header Nav', 'rigel' ),
			'left-nav'       => esc_html__( 'Left Side Nav', 'rigel' ),
			'right-nav'      => esc_html__( 'Right Side Nav', 'rigel' ),
			'404-nav'        => esc_html__( '404 Nav', 'rigel' )
		)
	);


	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'audio',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'pix_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // rigel_setup
add_action( 'after_setup_theme', 'rigel_setup' );

function rigel_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'admin_init', 'rigel_add_editor_styles' );


/*********************
MENUS & NAVIGATION
*********************/

// the main menu
function rigel_main_nav() {

	$prefix = rigel_get_prefix();
	$id = get_the_ID();
		
	$arg = array(
		'container'       => false,						// remove nav container
		'container_class' => 'menu clearfix',           // class of container (should you choose to use it)
		'menu_class'      => 'menu clearfix',         	// adding custom nav class
		'theme_location'  => 'main-nav',                // where it's located in the theme
		'before'          => '',                        // before the menu
		'after'           => '<span class="pix-dropdown-arrow"></span>', // after the menu
		'link_before'     => '',                        // before each link
		'link_after'      => '', 						// after each link
		'depth'           => 3,                         // limit the depth of the nav
		'fallback_cb'     => '',      					// fallback function
		'walker'          => new Rigel_Menu_Extend_Walker()
	);

	$menu = rigel_get_meta_value( $id, '_amz_main_navigation', 'default' );
	if( 'default' != $menu ) {
		$arg['menu'] = $menu;
	}	

	// display the wp3 menu if available
	wp_nav_menu($arg);

}

function rigel_main_left_nav() {

	$prefix = rigel_get_prefix();
	$id = get_the_ID();

	$arg = array(
		'container'       => false,						// remove nav container
		'container_class' => 'menu clearfix',           // class of container (should you choose to use it)
		'menu_class'      => 'menu clearfix',         	// adding custom nav class
		'theme_location'  => 'main-nav-left',                // where it's located in the theme
		'before'          => '',                        // before the menu
		'after'           => '<span class="pix-dropdown-arrow"></span>', // after the menu
		'link_before'     => '',                        // before each link
		'link_after'      => '', 						// after each link
		'depth'           => 3,                         // limit the depth of the nav
		'fallback_cb'     => '',      					// fallback function
		'walker'          => new Rigel_Menu_Extend_Walker()
	);

	$menu = rigel_get_meta_value( $id, '_amz_left_navigation', 'default' );
	if( 'default' != $menu ) {
		$arg['menu'] = $menu;
	}

	// display the wp3 menu if available
	wp_nav_menu($arg);

}

function rigel_main_right_nav() {

	$prefix = rigel_get_prefix();
	$id = get_the_ID();

	// display the wp3 menu if available
	$arg = array(
		'container'       => false,						// remove nav container
		'container_class' => 'menu clearfix',           // class of container (should you choose to use it)
		'menu_class'      => 'menu clearfix',         	// adding custom nav class
		'theme_location'  => 'main-nav-right',                // where it's located in the theme
		'before'          => '',                        // before the menu
		'after'           => '<span class="pix-dropdown-arrow"></span>', // after the menu
		'link_before'     => '',                        // before each link
		'link_after'      => '', 						// after each link
		'depth'           => 3,                         // limit the depth of the nav
		'fallback_cb'     => '',      					// fallback function
		'walker'          => new Rigel_Menu_Extend_Walker()
	);

	$menu = rigel_get_meta_value( $id, '_amz_right_navigation', 'default' );
	if( 'default' != $menu ) {
		$arg['menu'] = $menu;
	}

	// display the wp3 menu if available
	wp_nav_menu($arg);
}

function rigel_404_nav() {
	// display the wp3 menu if available
	wp_nav_menu(
		array(
			'theme_location' => '404-nav',
			'container'      => false,
			'menu_class'     => 'alignCenter nav404',
			'echo'           => true,
			'before'         => '&emsp;',
			'after'          => '&emsp;',
			'link_before'    => '',
			'link_after'     => '',
			'depth'          => 1,
			'fallback_cb'    => 'rigel_nav_fallback'
			)
	);
}

function rigel_top_nav() {
	// display the wp3 menu if available
	wp_nav_menu(
		array(
			'theme_location' => 'top-head-nav',
			'container'      => false,
			'menu_class'     => 'top-head-nav clearfix',
			'echo'           => true,
			'before'         => '',
			'after'          => '',
			'link_before'    => '',
			'link_after'     => '',
			'depth'          => 1,
			'fallback_cb'    => 'rigel_top_nav_fallback'
			)
	);
}

// this is the fallback for header menu
function rigel_nav_fallback() {
	echo '<p><a href="'.esc_url(home_url( '/' )).'/wp-admin/nav-menus.php">'.esc_html__('Click Here to create/add Menu from Admin Page','rigel' ).'</a></p>';
}
// this is the fallback for header menu
function rigel_top_nav_fallback() {
	echo '<a class="pull-left" href="'.esc_url(home_url( '/' )).'/wp-admin/nav-menus.php">'.esc_html__('add Menu from Admin Page','rigel' ).'</a>';
}

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function rigel_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'rigel_content_width', 840 );
}
add_action( 'after_setup_theme', 'rigel_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function rigel_widgets_init() {

	register_sidebar(array(
		'id' => 'primary-sidebar',
		'name' => esc_html__( 'Primary Sidebar', 'rigel' ),
		'description' => esc_html__( 'The primary sidebar this will be the default sidebar for pages.', 'rigel' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
		));

	register_sidebar(array(
		'id' => 'blog-sidebar',
		'name' => esc_html__( 'Blog Sidebar', 'rigel' ),
		'description' => esc_html__( 'This is default sidebar for Blog, catergories, Archives and single posts pages.', 'rigel' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
		));
	
	register_sidebar(array(
		'id' => 'footer-widgets',
		'name' => esc_html__('Footer Widgets', 'rigel' ),
		'description' => esc_html__('Add Widgets to display in footer.', 'rigel' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
		));

	if (class_exists('Woocommerce')) {
		register_sidebar(array(
			'id' => 'shop',
			'name' => esc_html__('Shop', 'rigel' ),
			'description' => esc_html__('Add Widgets to display in Shop Page.', 'rigel' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>',
		));
	}

}
add_action( 'widgets_init', 'rigel_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function rigel_scripts_and_styles() {

	wp_enqueue_style( 'rigel-style', get_stylesheet_uri() );

	wp_enqueue_style( 'rigel-icon-fonts', get_template_directory_uri() . '/_css/pix-icons.css', array(), '1.5.1', 'all' );
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/_css/animate.min.css', array(), '1.5.1', 'all' );
	wp_enqueue_style( 'rigel-plugin-stylesheet', get_template_directory_uri() . '/_css/plugins.css', array(), '1.5.1', 'all' );
	wp_enqueue_style( 'rigel-stylesheet', get_template_directory_uri() . '/_css/main.css', array(), '1.5.1', 'all' );
	wp_enqueue_style( 'rigel-responsive', get_template_directory_uri() . '/_css/responsive.css', array(), '1.5.1', 'all' );

	if ( class_exists( 'Woocommerce' ) ) {
		wp_enqueue_style( 'rigel-woo-stylesheet', get_template_directory_uri() . '/_css/woo.css', array('rigel-plugin-stylesheet'), '1.5.1', 'all' );
	}

	$to_last_saved_time = get_theme_mod( 'to_last_saved_time', '1.5.1' );
	if( is_multisite() ) {
		$uploads = wp_upload_dir();
		wp_enqueue_style( 'rigel-custom-css', $uploads['baseurl'] . '/custom.css', array(), $to_last_saved_time, 'all' );
	} else {
		wp_enqueue_style( 'rigel-custom-css', get_template_directory_uri() . '/_css/custom.css', array(), $to_last_saved_time, 'all' );
	}
	
	//For demo purpose
	if( isset( $_GET['pri_color'] ) ) {
		wp_enqueue_style( 'rigel-dynamic-css', get_template_directory_uri() . '/_css/dynamic-css.php?pri_color='.$_GET['pri_color'], array( 'rigel-custom-css' ), '', 'all' );
	}
	

	//JavaScript
	$protocol = is_ssl() ? 'https' : 'http';
	
	wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/_js/waypoints.min.js', array( 'jquery' ), '1.0', true );

	$api_key = rigel_get_option_value( 'api_key', '' );
	wp_enqueue_script( 'gmap', $protocol.'://maps.googleapis.com/maps/api/js?key='. $api_key, array( 'jquery' ), '3.0', false );

	wp_enqueue_script( 'rigel-plugins-js', get_template_directory_uri() . '/_js/plugins.js', array( 'jquery' ), '1.5.1', true );

	wp_enqueue_script( 'rigel-scripts-js', get_template_directory_uri() . '/_js/scripts.js', array( 'jquery', 'waypoints', 'rigel-plugins-js' ), '1.5.1', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_localize_script( 'rigel-plugins-js', 'rigel_notice',
		array(
			'rootUrl' => esc_url(home_url( '/' )),
			'ajaxurl' => esc_url( admin_url( 'admin-ajax.php' ) ),
			'nameError' => esc_html__('Please enter your name!', 'rigel' ),
			'nameLenError' => esc_html__('Your name needs to be at least {0} characters', 'rigel' ),
			'emailError' => esc_html__('Please enter a valid email address.', 'rigel' ),
			'emailLenError' => esc_html__('Your email address must be in the format of name@domain.com', 'rigel' ),
			'subjectError' => esc_html__('You need to enter a subject!', 'rigel' ),
			'subjectLenError' => esc_html__('Subject needs to be at least {0} characters', 'rigel' ),                           
			'messageError' => esc_html__('You need to enter a message!', 'rigel' ),
			'messageLenError' => esc_html__('Message needs to be at least {0} characters', 'rigel' ),
			'rtl'     => is_rtl() ? 'true' : 'false',
			'all_post_loaded_text' => esc_html__( 'All Items Loaded', 'rigel' )
		)
	);
}
add_action( 'wp_enqueue_scripts', 'rigel_scripts_and_styles' );



function rigel_add_inline_css() {

    $custom_css = rigel_get_option_value( 'custom_css', '' );

    if( !empty( $custom_css ) ) {
		wp_add_inline_style( 'rigel-custom-css', wp_strip_all_tags( stripslashes( $custom_css ) ) );
    }

}
add_action( 'wp_enqueue_scripts', 'rigel_add_inline_css' );

/**
* Theme Framework
*/
require get_template_directory() . '/framework/theme-init.php';


function rigel_custom_nav_attributes ( $atts, $item, $args ) {
    $atts['data-scroll'] = 'true';
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'rigel_custom_nav_attributes', 10, 3 );


/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function rigel_body_classes( $classes ) {

	$prefix = rigel_get_prefix();
	$id = get_the_id();

	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	/* Preloader */
	$rigel_preloader = rigel_get_option_value( 'rigel_preloader', 0 );
	if( $rigel_preloader && ! isset( $_GET['vc_editable'] ) ){
		$classes[] = 'pix-preloader-enabled';
	}

	/* Preloader */
	$custom_scroll = rigel_get_option_value( 'custom_scroll', 0 );
	if( $custom_scroll ){
		$classes[] = 'custom-scroll';
	}

	return $classes;
}
add_filter( 'body_class', 'rigel_body_classes' );

add_filter( 'upload_mimes', 'rigel_myme_types', 1, 1 );
function rigel_myme_types( $mime_types ) {
  $mime_types['svg'] = 'image/svg+xml'; // Adding .svg extension
  $mime_types['ttf'] = 'application/x-font-ttf'; 
  $mime_types['woff'] = 'application/x-font-woff';
  $mime_types['eot'] = 'application/x-font-eot';
  
  return $mime_types;
}

remove_filter('widget_text_content', 'wpautop');
