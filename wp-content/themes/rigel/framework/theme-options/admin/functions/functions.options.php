<?php

add_action('init','of_options');

if (!function_exists('of_options'))
{
	
	function of_options()
	{
		//Access the WordPress Categories via an Array
		$of_categories 		= array();  
		$of_categories_obj 	= get_categories('hide_empty=0');
		foreach ($of_categories_obj as $of_cat) {
			$of_categories[$of_cat->cat_ID] = $of_cat->cat_name;}
		$categories_tmp 	= array_unshift($of_categories, "Select a category:");    
		   
		//Access the WordPress Pages via an Array
		$of_pages 			= array();
		$of_pages_obj 		= get_pages('sort_column=post_parent,menu_order');    
		foreach ($of_pages_obj as $of_page) {
			$of_pages[$of_page->ID] = $of_page->post_name; }
		$of_pages_tmp 		= array_unshift($of_pages, "Select a page:");       
	
		//Ajax Style
		$ajax_style = array("style1" => "Style1","style2" => "Style2", "style3" => "Style3", "style4" => "Style4", "style5" => "Style5", "style6" => "Style6", "style7" => "Style7", "style8" => "Style8", "style9" => "Style9", "style10" => "Style10");

		//Ajax Animation Style
		$ajax_trans_in = array("fadeIn" => "Fade In", "fadeInUp" => "Fade In Up", "fadeInDown" => "Fade In Down", "fadeInLeft" => "Fade In Left", "fadeInRight" => "Fade In Right", "zoomIn" => "Zoom In", "zoomInUp" => "Zoom In Up", "zoomInDown" => "Zoom In Down", "zoomInLeft" => "Zoom In Left", "zoomInRight" => "Zoom In Right");
		$ajax_trans_out = array("fadeOut" => "Fade Out", "fadeOutUp" => "Fade Out Up", "fadeOutDown" => "Fade Out Down", "fadeOutLeft" => "Fade Out Left", "fadeOutRight" => "Fade Out Right", "zoomOut" => "Zoom Out", "zoomOutUp" => "Zoom Out Up", "zoomOutDown" => "Zoom Out Down", "zoomOutLeft" => "Zoom Out Left", "zoomOutRight" => "Zoom Out Right");

		//Preloader Animation Style
		$preloader_trans_in = array("fadeIn" => "Fade In", "fadeInUp" => "Fade In Up", "fadeInDown" => "Fade In Down", "fadeInLeft" => "Fade In Left", "fadeInRight" => "Fade In Right", "zoomIn" => "Zoom In", "zoomInUp" => "Zoom In Up", "zoomInDown" => "Zoom In Down", "zoomInLeft" => "Zoom In Left", "zoomInRight" => "Zoom In Right");

		//Blog & Single Blog & Archives
		$sidebar = array( "left-sidebar" => "Left Sidebar", "right-sidebar" => "Right Sidebar", "full-width" => "Full Width" );
		$blog_styles = array( "masonry" => "Masonry","grid" => "Grid", "normal" => "Normal" );

		$pagination = array( "load_more" => "Load More Button", "autoload" => "Autoload", "number" => "Number", "text" => "Text" );

		$animation = array("flash" => "flash", "bounce" => "bounce","shake" => "shake", "tada" => "tada", "swing" => "swing", "wobble" => "wobble", "pulse" => "pulse", "flip" => "flip", "flipInX" => "flipInX", "flipInY" => "flipInY", "fadeIn" => "fadeIn", "fadeInUp" => "fadeInUp", "fadeInDown" => "fadeInDown", "fadeInLeft" => "fadeInLeft", "fadeInRight" => "fadeInRight", "fadeInUpBig" => "fadeInUpBig", "fadeInDownBig" => "fadeInDownBig", "fadeInLeftBig" => "fadeInLeftBig", "fadeInRightBig" => "fadeInRightBig", "slideInDown" => "slideInDown", "slideInLeft" => "slideInLeft", "slideInRight" => "slideInRight", "bounceIn" => "bounceIn", "bounceInUp" => "bounceInUp", "bounceInDown" => "bounceInDown", "bounceInLeft" => "bounceInLeft", "bounceInRight" => "bounceInRight", "rotateIn" => "rotateIn", "rotateInDownLeft" => "rotateInDownLeft","rotateInDownRight" => "rotateInDownRight", "rotateInUpLeft" => "rotateInUpLeft", "rotateInUpRight" => "rotateInUpRight", "lightSpeedIn" => "lightSpeedIn", "hinge" => "hinge", "rollIn" =>"rollIn");

		$order_by = array("date" => "Date","title" => "Title", "rand" => "Random"); 
		$order = array("asc" => "Ascending","desc" => "Descending");

		//Search Result
		if (class_exists('Woocommerce')) {
			$search_exclude = array("post" => "Post","page" => "Page","product" => "Product","pix_staffs" => "Staffs","pix_portfolio" => "Portfolio","pix_testimonial" => "Testimonial");
		}
		else {
			$search_exclude = array("post" => "Post","page" => "Page","pix_staffs" => "Staffs","pix_portfolio" => "Portfolio","pix_testimonial" => "Testimonial");
		}

		//Body & Footer Background Options
		$url =  ADMIN_DIR . 'assets/images/';

		$headers = array(
			'header-1'     => $url . '/header-layout/header-1.png',
			'header-2'     => $url . '/header-layout/header-2.png',
			'header-3'     => $url . '/header-layout/header-3.png',
			'left-header'  => $url . '/header-layout/left-header.png'
		);

		$page_layout = array(
			'default'       => $url . '/page-layout/full_width.png',
			'left-sidebar'  => $url . '/page-layout/left_sidebar.png',
			'right-sidebar' => $url . '/page-layout/right_sidebar.png',
			'left-nav'      => $url . '/page-layout/left_nav.png',
			'right-nav'     => $url . '/page-layout/right_nav.png'
			);

		$footer = array(
			'col3'      => $url . '/footer-layout/3col.png',
			'col4'      => $url . '/footer-layout/4col.png',
			);

		$pattern = array(
			'none'  => $url . '/body-bg/none.png',
			'pat-1' => $url . '/body-bg/pat-1.png',
			'pat-2' => $url . '/body-bg/pat-2.png',
			'pat-3' => $url . '/body-bg/pat-3.png',
			'pat-4' => $url . '/body-bg/pat-4.png',
			'pat-5' => $url . '/body-bg/pat-5.png',
			);

		$bg_attachment = array("fixed" => "Fixed","scroll" => "Scroll");
		$bg_size = array("auto" => "Auto", "cover" => "Cover","contain" => "Contain");
		$bg_repeat = array("repeat" => "Repeat","repeat-x" => "Repeat-x", "Repeat-Y" => "Repeat-Y", "no-repeat" => "No Repeat");

		//font sizes
		$font_sizes = array();
		for ($i = 9; $i < 50; $i++){ 
			$font_sizes[$i.'px'] = $i.'px'; 
		}

		//Header & Footer widget columns
		$columns = array( 
			"col3" => esc_html( "Three", "rigel" ),
			"col4" => esc_html( "Four", "rigel" )
		);

		$copyright_allowed_html_array = array(
			'a' => array(
				'href' => array(),
				'title' => array()
				),
			'p' => array()
		);
		

		/*-----------------------------------------------------------------------------------*/
		/* TO DO: Add options/functions that use these */
		/*-----------------------------------------------------------------------------------*/
		
		//More Options
		$uploads_arr 		= wp_upload_dir();
		$all_uploads_path 	= $uploads_arr['path'];
		$all_uploads 		= get_option('of_uploads');
		$other_entries 		= array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
		$body_repeat 		= array("no-repeat","repeat-x","repeat-y","repeat");
		$body_pos 			= array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");
		
		// Image Alignment radio box
		$of_options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 
		
		// Image Links to Options
		$of_options_image_link_to = array("image" => "The Image","post" => "The Post");

		$theme_color_url =  ADMIN_DIR . 'assets/images/color-bg/'; 

/*-----------------------------------------------------------------------------------*/
/* The Options Array */
/*-----------------------------------------------------------------------------------*/

// Set the Options Array
global $of_options;
$of_options = array();

//Top Header
$of_options[] = array( "name" => esc_html__("Top Header", 'rigel' ),
					"type" => "heading",
					"custom_class" => "top-header");

$of_options[] = array(
					"id" => "introduction",
					"std" => __("<h3 style=\"margin: 0 0 10px;\">Email and Phone Number in Top left</h3>
					Enter the value to display email and phone, Leave it empty if you don't want display",'rigel' ),
					"icon" => true,
					"type" => "info");									
					
					
$of_options[] = array( "name" => esc_html__("Email", 'rigel' ),
					"desc" => esc_html__("Please Enter Email address.", 'rigel' ),
					"id" => "top_email",
					"std" => "info@yoursite.com",
					"type" => "text"); 		
					
$of_options[] = array( "name" => esc_html__("Telephone", 'rigel' ),
					"desc" => esc_html__("Please Enter Telephone Number.", 'rigel' ),
					"id" => "top_tel",
					"std" => "+ (009) 123 4567",
					"type" => "text");

$of_options[] = array( "name" => esc_html__("Top Header Text", 'rigel' ),
					"desc" => esc_html__("Please Enter Text Here.", 'rigel' ),
					"id" => "top_text",
					"std" => "Enter Your Text...",
					"type" => "text"); 							
					

$of_options[] = array( 
					"id" => "introduction",
					"std" => __("<h3 style=\"margin: 0 0 10px;\">Social Networking Icons.</h3>
					Enter the url to display social networking icons you want, Leave it empty if you don't want display", 'rigel' ),
					"icon" => true,
					"type" => "info");									
					
					
$of_options[] = array( "name" => esc_html__("Facebook URL", 'rigel' ),
					"desc" => esc_html__("Please Enter Facebook URL, This will display in header.", 'rigel' ),
					"id" => "top_facebook",
					"std" => "",
					"type" => "text"); 					

$of_options[] = array( "name" => esc_html__("Twitter", 'rigel' ),
					"desc" => esc_html__("Please Enter Twitter Url, This will display in header.", 'rigel' ),
					"id" => "top_twitter",
					"std" => "",
					"type" => "text");
										
$of_options[] = array( "name" => esc_html__("Google Plus URL", 'rigel' ),
					"desc" => esc_html__("Please Enter G+ URL, This will display in header.", 'rigel' ),
					"id" => "top_gplus",
					"std" => "",
					"type" => "text");
										
$of_options[] = array( "name" => esc_html__("LinkedIn URL", 'rigel' ),
					"desc" => esc_html__("Enter your linkedin URL, This will display in header.", 'rigel' ),
					"id" => "top_linkedin",
					"std" => "",
					"type" => "text");
										
$of_options[] = array( "name" => esc_html__("Dribbble URL", 'rigel' ),
					"desc" => esc_html__("Enter your dribbble URL, This will display in header.", 'rigel' ),
					"id" => "top_dribble",
					"std" => "",
					"type" => "text");
										
$of_options[] = array( "name" => esc_html__("Flickr URL", 'rigel' ),
					"desc" => esc_html__("Enter your flickr URL, This will display in header.", 'rigel' ),
					"id" => "top_flickr",
					"std" => "",
					"type" => "text");
										
$of_options[] = array( "name" => esc_html__("Pinterest URL", 'rigel' ),
					"desc" => esc_html__("Enter your pinterest URL, This will display in header.", 'rigel' ),
					"id" => "top_pinterest",
					"std" => "",
					"type" => "text");
					
$of_options[] = array( "name" => esc_html__("Tumblr URL", 'rigel' ),
					"desc" => esc_html__("Enter your tumblr  URL, This will display in header.", 'rigel' ),
					"id" => "top_tumblr",
					"std" => "",
					"type" => "text");
										
$of_options[] = array( "name" => esc_html__("RSS URL", 'rigel' ),
					"desc" => esc_html__("Enter your rss URL, This will display in header.", 'rigel' ),
					"id" => "top_rss",
					"std" => "",
					"type" => "text");
										
$of_options[] = array( "name" => esc_html__("Instagram URL", 'rigel' ),
					"desc" => esc_html__("Enter your instagram URL, This will display in header.", 'rigel' ),
					"id" => "top_instagram",
					"std" => "",
					"type" => "text");

$of_options[] = array( 	"name" 		=> esc_html__("Enable Search Bar", 'rigel' ),
						"desc" 		=> esc_html__("Do you want to display search bar on top header?", 'rigel' ),
						"id" 		=> "top_search",
						"std" 		=> 1,
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Header Options", 'rigel' ),
						"type" 		=> "heading"
				);


$of_options[] = array( 	"name" 		=> esc_html__("Header Layout", 'rigel' ),
						"id" 		=> "header_option",
						"std" 		=> "header-1",
						"type" 		=> "images",
						"options" 	=> $headers
				);

$of_options[] = array( 	"name" 		=> esc_html__("Header on Load", 'rigel' ),
						"desc" 		=> esc_html__("Do you want to hide header on load and show only sticky menu?", 'rigel' ),
						"id" 		=> "header_show",
						"std" 		=> 1,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Drop Down Menu Style", 'rigel' ),
						"desc" 		=> esc_html__("Select dropdown menu style.", 'rigel' ),
						"id" 		=> "sub_menu",
						"std" 		=> 1,
						"on" 		=> "Dark",
						"off" 		=> "Light",
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Sticky Header", 'rigel' ),
						"desc" 		=> esc_html__("Enable or disable Sticky Header", 'rigel' ),
						"id" 		=> "header_sticky",
						"std" 		=> 1,
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Show Mobile Menu Dropdown", 'rigel' ),
						"desc" 		=> esc_html__("Choose Yes to show sub menus (as dropdown) in mobile menu.", 'rigel' ),
						"id" 		=> "mobile_menu_dropdown",
						"std" 		=> 1,
						"on" 		=> "Yes",
						"off" 		=> "No",
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("WPML Language Selector Style", 'rigel' ),
						"desc" 		=> esc_html__("Choose Language Selector Style", 'rigel' ),
						"id" 		=> "wpml_lang_style",
						"std" 		=> "search",
						"type" 		=> "select",
						"options" 	=> array('normal' => 'Normal', 'dropdown' => 'Dropdown')
				);

$of_options[] = array( 	"name" 		=> esc_html__("WPML Language Display Style", 'rigel' ),
						"desc" 		=> esc_html__("Choose Language Display Style", 'rigel' ),
						"id" 		=> "language_style",
						"std" 		=> "search",
						"type" 		=> "select",
						"options" 	=> array('lang_code' => 'Language Code', 'lang_name' => 'Language Name', 'flag' => 'Flag', 'flag_with_name' => 'Flag With Name')
				);

$of_options[] = array( 	"name" 		=> esc_html__("Header Transparency", 'rigel' ),
						"desc" 		=> esc_html__("Choose the header text color", 'rigel' ),
						"id" 		=> "header_trans",
						"std" 		=> "disabled",
						"type" 		=> "select",
						"options" 	=> array('enabled' => 'Enabled', 'disabled' => 'Disabled')
				);

$of_options[] = array( 	"name" 		=> esc_html__("Choose Percentage of fixed Header Transparency", 'rigel' ),
						"desc" 		=> esc_html__("How much transparency you want to apply for fixed header", 'rigel' ),
						"id" 		=> "header_trans_val",
						"std" 		=> "0",
						"min" 		=> "0",
						"step"		=> "10",
						"max" 		=> "90",
						"type" 		=> "sliderui" 
				);

$of_options[] = array( 	"name" 		=> esc_html__("Header Text Color", 'rigel' ),
						"desc" 		=> esc_html__("Choose the header text color", 'rigel' ),
						"id" 		=> "header_text_color",
						"std" 		=> "dark-header",
						"type" 		=> "select",
						"options" 	=> array('dark-header' => 'Dark', 'light-header' => 'Light')
				);

$of_options[] = array( 	"name" 		=> esc_html__("Animation Transition", 'rigel' ),
						"desc" 		=> esc_html__("Choose animation transition for posts", 'rigel' ),
						"id" 		=> "transition",
						"std" 		=> "fadeInUp",
						"type" 		=> "select",
						"fold" 		=> "blog_animate",
						"options" 	=> $animation
				);

$of_options[] = array( 	"name" 		=> esc_html__("Show/Hide Title Bar", 'rigel' ),
						"desc" 		=> esc_html__("Do you want to display title bar?", 'rigel' ),
						"id" 		=> "title_bar",
						"std" 		=> "show",
						"type" 		=> "select",
						"options" 	=> array(
							"show"  => "Show",
							"hide"  => "Hide",
						)
				);

$of_options[] = array( 	"name" 		=> esc_html__("Show / Hide breadcrumbs", 'rigel' ),
						"desc" 		=> esc_html__("Do you want to display breadcrumbs?", 'rigel' ),
						"id" 		=> "breadcrumbs",
						"std" 		=> "show",
						"type" 		=> "select",
						"options" 	=> array(
							"show"  => "Show",
							"hide"  => "Hide",
						)
				);

$of_options[] = array( 	"name" 		=> esc_html__("Title Bar Style", 'rigel' ),
						"desc" 		=> esc_html__("Select title bar style", 'rigel' ),
						"id" 		=> "title_bar_style",
						"std" 		=> "default",
						"type" 		=> "select",
						'options' 	  => array(
							'default'   => 'Default',
							'custom'  => 'Custom'
						),
				);

$of_options[] = array( 	"name" 		=> esc_html__("Title bar background color", 'rigel' ),
						"desc" 		=> esc_html__("It applies title bar background color", 'rigel' ),
						"id" 		=> "title_bar_bg_color",
						"std" 		=> "",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Title bar text color", 'rigel' ),
						"desc" 		=> esc_html__("It applies title bar text color", 'rigel' ),
						"id" 		=> "title_bar_text_color",
						"std" 		=> "",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Title Bar Size", 'rigel' ),
						"desc" 		=> esc_html__("Select title bar size", 'rigel' ),
						"id" 		=> "title_bar_size",
						"std" 		=> "medium",
						"type" 		=> "select",
						'options' 	  => array(
							'small'   => 'Small',
							'medium'  => 'Medium',
							'large'   => 'Large',
						),
				);

$of_options[] = array( "name" => esc_html__("Upload Title bar background image", 'rigel' ),
					"desc" => esc_html__("It applies title bar background image.", 'rigel' ),
					"id" => "title_bar_bg_image",
					"std" => '',
					"mod" => "min",
					"type" => "media"
				);

//General Settings
$of_options[] = array( "name" => esc_html__("General", 'rigel' ),
					"type" => "heading");
					
$of_options[] = array(
					"id" => "introduction",
					"std" => __("<h3 style=\"margin: 0 0 10px;\">Welcome to Rigel WordPress Responsive Theme.</h3>
					Adjust the options here and change the theme like you want", 'rigel' ),
					"icon" => true,
					"type" => "info");									

/*$of_options[] = array( "name" => "Upload WordPress Login Page Logo",
					"desc" => "Upload WordPress Login Page Logo.",
					"id" => "login_page_logo",
					"std" => get_template_directory_uri().'/library/img/logo.png',
					"mod" => "min",
					"type" => "media");*/
					
$of_options[] = array( "name" => esc_html__("Upload Logo", 'rigel' ),
					"desc" => esc_html__("Upload a custom logo. Height should be within 80px.", 'rigel' ),
					"id" => "custom_logo",
					"std" => get_template_directory_uri().'/_img/logo.png',
					"mod" => "min",
					"type" => "media");

$of_options[] = array( "name" => esc_html__("Upload Retina Logo", 'rigel' ),
					"desc" => esc_html__("Upload a retina logo. width and height should be double size (width X 2 & height X 2) of above (original) logo.", 'rigel' ),
					"id" => "retina_logo",
					"std" => get_template_directory_uri().'/_img/retina-logo.png',
					"mod" => "min",
					"type" => "media");
					
$of_options[] = array( "name" => esc_html__("Upload Sticky Logo", 'rigel' ),
					"desc" => esc_html__("Upload a custom Sticky logo. Height should be within 40px.", 'rigel' ),
					"id" => "sticky_logo",
					"std" => get_template_directory_uri().'/_img/sticky-logo.png',
					"mod" => "min",
					"type" => "media");

$of_options[] = array( "name" => esc_html__("Upload White Logo", 'rigel' ),
					"desc" => esc_html__("Upload a custom white logo. Height should be within 80px.", 'rigel' ),
					"id" => "custom_logo_light",
					"std" => get_template_directory_uri().'/_img/logo-white.png',
					"mod" => "min",
					"type" => "media");

$of_options[] = array( "name" => esc_html__("Upload Retina White Logo", 'rigel' ),
					"desc" => esc_html__("Upload a retina white logo. width and height should be double size (width X 2 & height X 2) of above (original) logo.", 'rigel' ),
					"id" => "retina_logo_light",
					"std" => get_template_directory_uri().'/_img/retina-logo-white.png',
					"mod" => "min",
					"type" => "media");
					
$of_options[] = array( "name" => esc_html__("Apple Touch Icon", 'rigel' ),
						"desc" => esc_html__("Size: 57x57 for older iPhones, 72x72 for iPads, 114x114 for iPhone4's retina display (IMHO, just go ahead and use the biggest one). Transparency is not recommended (iOS will put a black BG behind the icon)", 'rigel' ),
						"id" => "apple_touch_icon",
						"std" => get_template_directory_uri().'/_images/apple-icon-touch.png',
						"mod" => "min",
						"type" => "media"
					);

$of_options[] = array( "name" => esc_html__("Google Map API Key", 'rigel' ),
					"desc" => esc_html__("Please Enter Search Text Here.", 'rigel' ),
					"id" => "api_key",
					"std" => "",
					"type" => "text"
					);

$of_options[] = array( 	"name" 		=> esc_html__("Enable Smooth Scroll", 'rigel' ),
						"desc" 		=> esc_html__("Do you want to enable smooth scroll?", 'rigel' ),
						"id" 		=> "custom_scroll",
						"std" 		=> 0,
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"type" 		=> "switch"
				);

$of_options[] = array( "name" => esc_html__("Enable Preloader", 'rigel' ),
					"desc" => esc_html__("Do you want to like to enable preloader?", 'rigel' ),
					"id"   => "rigel_preloader",
					"std"  => 0,
					"on"   => "Yes",
					"off"  => "No",
					"type" => "switch"
                );

$of_options[] = array( 	"name" 		=> esc_html__("Preloader Animation In", 'rigel' ),
						"desc" 		=> esc_html__("Choose a preloader animation", 'rigel' ),
						"id" 		=> "preloadtrans",
						"std" 		=> "fadeInUp",
						"fold"		=> "rigel_preloader",
						"type" 		=> "select",
						"options" 	=> $preloader_trans_in
				);

$of_options[] = array( "name" => esc_html__("Responsive", 'rigel' ),
					"desc" => esc_html__("Please choose responsive.", 'rigel' ),
					"id" => "mobile_responsive",
					"std" => 1,
					"on" => "ON",
					"off" => "OFF",
					"type" => "switch"
				);

$of_options[] = array( "name" => esc_html__("Search Text", 'rigel' ),
					"desc" => esc_html__("Please Enter Search Text Here.", 'rigel' ),
					"id" => "search_text",
					"std" => "Search",
					"type" => "text"
					);

$of_options[] = array( "name" => esc_html__("Portfolio Slug", 'rigel' ),
					"desc" => esc_html__("Please Enter the slug for Portfolio", 'rigel' ),
					"id" => "slug_portfolio",
					"std" => "portfolio",
					"type" => "text"
					);

$of_options[] = array( "name" => esc_html__("Staff Slug", 'rigel' ),
					"desc" => esc_html__("Please Enter the slug for Staff", 'rigel' ),
					"id" => "slug_staff",
					"std" => "staff",
					"type" => "text"
					);

$of_options[] = array( "name" => esc_html__("Testimonial Slug", 'rigel' ),
					"desc" => esc_html__("Please Enter the slug for Testimonial", 'rigel' ),
					"id" => "slug_testimonial",
					"std" => "testimonial",
					"type" => "text"
					);
					
$of_options[] = array( 	"name" 		=> esc_html__("Show Go to Top Button", 'rigel' ),
						"desc" 		=> esc_html__("Show/Hide Go to Top Button in the page", 'rigel' ),
						"id" 		=> "go_to_top",
						"std" 		=> 1,
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Pagination Type", 'rigel' ),
						"desc" 		=> esc_html__("Choose the Pagination type here", 'rigel' ),
						"id" 		=> "pagination_type",
						"std" 		=> 0,
						"on" 		=> "Ajax Pagination",
						"off" 		=> "Number Pagination",
						"type" 		=> "switch",
						"folds"		=> 1
				);

$of_options[] = array( "name" => esc_html__("Load More Text", 'rigel' ),
					"desc"    => esc_html__("Type load more text", 'rigel' ),
					"id"      => "loadmore_text",
					"std"     => "Load More",
					"type"    => "text",
					"fold"    => "pagination_type"
				); 

$of_options[] = array( "name" => esc_html__("Loading Text", 'rigel' ),
					"desc" => esc_html__("Type load more text", 'rigel' ),
					"id" => "loading_text",
					"std" => "Loading...",
					"type" => "text",
					"fold"    => "pagination_type"
				);
																		  
$of_options[] = array( "name" => esc_html__("Custom CSS", 'rigel' ),
					"desc" => esc_html__("Type your custom CSS rules.", 'rigel' ),
					"id" => "custom_css",
					"std" => "",
					"type" => "textarea");     

				
$of_options[] = array( "name" => esc_html__("Google Analytics ID", 'rigel' ),
					"desc" => esc_html__("Paste your Google Analytics ID. Ex:UA-XXXXXX-XX This will be added into the footer template of your theme.", 'rigel' ),
					"id" => "google_analytics",
					"std" => "",
					"type" => "text");							
													
$of_options[] = array( "name" => esc_html__("Tracking Code", 'rigel' ),
					"desc" => esc_html__("Paste your Other tracking code here. This will be added into the footer template of your theme.", 'rigel' ),
					"id" => "tracking_code",
					"std" => "",
					"type" => "textarea");

//Header Builder
$of_options[] = array( 	"name" 		=> esc_html__("Header Builder", 'rigel' ),
						"type" 		=> "heading"
				);

$of_options[] = array( 
					"id" => "introduction",
					"std" => __("<h3>Grey Header Area</h3> This is the setting for grey Header Area which can be displayed above or below Main Header depends on header settings", 'rigel' ),
					"icon" => true,
					"type" => "info");


$of_options[] = array(  "name"  => esc_html__("Top Header", 'rigel' ),
						"desc"  => esc_html__("Do you want to display top header?", 'rigel' ),
						"id"    => "top_header",
						"std"   => 0,
						"on"    => "Yes",
						"off"   => "No",
						"folds" => 1,
						"type"  => "switch"
					);

$of_options[] = array(  "name"  => esc_html__("Top Header Position", 'rigel' ),
						"desc"  => esc_html__("Select the top header position.", 'rigel' ),
						"id"    => "top_header_position",
						"std"   => 0,
						"on"    => "Bottom",
						"off"   => "Top",
						"fold" 		=> "top_header",
						"type"  => "switch"
					);

// Top Left Header Element
$header_top_elem = array
( 
	"disabled" => array (
		"placebo" 	=> "placebo", //REQUIRED!
		"menu"		=> "Menu",
		"search_icon"	=> "Search",
		"cart"		=> "Woocommerce cart",
		"lang"		=> "WMPL Language Selector",
		"text"		=> "Custom Text"
	), 
	"left" => array (
		"placebo" 		=> "placebo", //REQUIRED!
		"email"		=> "Email",
		"tel"		=> "Telephone",
	),
	"right" => array (
		"placebo" 		=> "placebo", //REQUIRED!
		"sicons"	=> "Social Icons",
	),
);

$of_options[] = array( 	"name" 		=> esc_html__("Top Header Elements Position", 'rigel' ),
						"desc" 		=> esc_html__("Choose what you want to display on Left / Right Side of Top Header Area", 'rigel' ),
						"id" 		=> "grey_header_sorter",
						"std" 		=> $header_top_elem,
						"type" 		=> "sorter"
				);

// Main Header Element
$main_header_elem = array
( 
	"disabled" => array (
		"placebo" 	=> "placebo", //REQUIRED!	
		"sicons"	=> "Social Icons",
		"search"	=> "Search Form",
	),	
	"left" => array (
		"placebo" 		=> "placebo", //REQUIRED!
		"email"		=> "Email",
		"tel"		=> "Telephone",		
	),
	"right" => array (
		"placebo" 		=> "placebo", //REQUIRED!
		"lang"		=> "WMPL Language Selector",
		"search_icon"	=> "Search Icon",
		"cart"		=> "Woocommerce cart",
		
	),
);

$of_options[] = array( 
					"id" => "introduction",
					"std" => __("<h3>Main Header</h3> This is the setting for Main Header Layout", 'rigel' ),
					"icon" => true,
					"type" => "info");

$of_options[] = array( 	"name" 		=> esc_html__("Main Header", 'rigel' ),
						"desc" 		=> esc_html__("Choose what you want to display in Main Header Left / Right Side", 'rigel' ),
						"id" 		=> "main_sorter",
						"std" 		=> $main_header_elem,
						"type" 		=> "sorter"
				);



// Side Header Element
$side_header_elem = array
( 
	"disabled" => array (
		"placebo"     => "placebo", //REQUIRED!	
		"sicons"      => "Social Icons",
		"search"      => "Search Form",
		"lang"        => "WMPL Language Selector",
		"search_icon" => "Search Icon",
		"cart"        => "Woocommerce cart",
		"tel"     => "Telephone",	
	),	
	"left" => array (
		"placebo" => "placebo", //REQUIRED!
		"sicons"      => "Social Icons",	
		"copyright_text" => "Copyright Text"
	),
);

$of_options[] = array( 	"name" 		=> esc_html__("Side Header Widget", 'rigel' ),
						"desc" 		=> esc_html__("Choose what you want to display in side header widget", 'rigel' ),
						"id" 		=> "side_sorter",
						"std" 		=> $side_header_elem,
						"type" 		=> "sorter"
				);

// Menu Right Element
$menu_right_elem = array
( 
	"disabled" => array (
		"placebo" 	=> "placebo", //REQUIRED!		
		"lang"		=> "WMPL Language Selector",
		"cart"		=> "Woocommerce cart",	
		"sicons"	=> "Social Icons"
	), 
	"enabled" => array (
		"placebo"        => "placebo", //REQUIRED!
		"search_icon"	=> "Search Icon"
	)
);

$of_options[] = array( 
					"id" => "introduction",
					"std" => __("<h3>Header 3 Menu Widget</h3> This is the setting for Header 3 Menu Widget", 'rigel' ),
					"icon" => true,
					"type" => "info");

$of_options[] = array( 	"name" 		=> esc_html__("Header 3 Menu Widget", 'rigel' ),
						"desc" 		=> esc_html__("Choose what you want to display in Header 3 menu right side widget", 'rigel' ),
						"id" 		=> "nav_right",
						"std" 		=> $menu_right_elem,
						"type" 		=> "sorter"
				);

$of_options[] = array(
					"id" => "introduction",
					"std" => __("<h3>Header Styling Options</h3> This is the setting for Main Header. Header layout Can be change in header settings", 'rigel' ),
					"icon" => true,
					"type" => "info");

$of_options[] = array(  "name"  => esc_html__("Custom Header Styles", 'rigel' ),
						"desc"  => esc_html__("Do you like to use Custom Header Styles, Please enable it and choose the Top header and Main header styling adjustments. If it's disabled, the default style will apply and custom styles are won't apply.", 'rigel' ),
						"id"    => "custom_header_styles",
						"std"   => 0,
						"on"    => "Yes",
						"off"   => "No",
						"folds" => 1,
						"type"  => "switch"
					);

$of_options[] = array( 	"name" 		=> esc_html__("Top Header Background Color", 'rigel' ),
						"desc" 		=> esc_html__("Choose the color value for top header background color", 'rigel' ),
						"id" 		=> "top_header_background_color",
						"std" 		=> "",
						"fold" 		=> "custom_header_styles",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Top Header Color", 'rigel' ),
						"desc" 		=> esc_html__("Choose the color value for top header text color", 'rigel' ),
						"id" 		=> "top_header_color",
						"std" 		=> "",
						"fold" 		=> "custom_header_styles",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Top Header Link Color", 'rigel' ),
						"desc" 		=> esc_html__("Choose the color value for top header link text color", 'rigel' ),
						"id" 		=> "top_header_link_color",
						"std" 		=> "",
						"fold" 		=> "custom_header_styles",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Top Header Link Hover Color", 'rigel' ),
						"desc" 		=> esc_html__("Choose the color value for top header link hover color", 'rigel' ),
						"id" 		=> "top_header_link_hover_color",
						"std" 		=> "",
						"fold" 		=> "custom_header_styles",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Header Background Color", 'rigel' ),
						"desc" 		=> esc_html__("Choose the color value for header background color", 'rigel' ),
						"id" 		=> "main_header_background_color",
						"std" 		=> "",
						"fold" 		=> "custom_header_styles",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Header Color", 'rigel' ),
						"desc" 		=> esc_html__("Choose the color value for header text color", 'rigel' ),
						"id" 		=> "main_header_color",
						"std" 		=> "",
						"fold" 		=> "custom_header_styles",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Header Link Color", 'rigel' ),
						"desc" 		=> esc_html__("Choose the color value for header link text color", 'rigel' ),
						"id" 		=> "main_header_link_color",
						"std" 		=> "",
						"fold" 		=> "custom_header_styles",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Header Link Hover Color", 'rigel' ),
						"desc" 		=> esc_html__("Choose the color value for header link hover color", 'rigel' ),
						"id" 		=> "main_header_link_hover_color",
						"std" 		=> "",
						"fold" 		=> "custom_header_styles",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Menu Background Color", 'rigel' ),
						"desc" 		=> esc_html__("Choose the color value for menu background color", 'rigel' ),
						"id" 		=> "menu_background_color",
						"std" 		=> "",
						"fold" 		=> "custom_header_styles",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Menu Link Color", 'rigel' ),
						"desc" 		=> esc_html__("Choose the color value for menu link color", 'rigel' ),
						"id" 		=> "menu_link_color",
						"std" 		=> "",
						"fold" 		=> "custom_header_styles",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Menu Link Hover Color", 'rigel' ),
						"desc" 		=> esc_html__("Choose the color value for menu link hover color", 'rigel' ),
						"id" 		=> "menu_link_hover_color",
						"std" 		=> "",
						"fold" 		=> "custom_header_styles",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Sticky Menu Link Color", 'rigel' ),
						"desc" 		=> esc_html__("Choose the color value for sticky menu link color", 'rigel' ),
						"id" 		=> "sticky_menu_link_color",
						"std" 		=> "",
						"fold" 		=> "custom_header_styles",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Sticky Menu Link Hover Color", 'rigel' ),
						"desc" 		=> esc_html__("Choose the color value for sticky menu link hover color", 'rigel' ),
						"id" 		=> "sticky_menu_link_hover_color",
						"std" 		=> "",
						"fold" 		=> "custom_header_styles",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Sub Menu Background Color", 'rigel' ),
						"desc" 		=> esc_html__("Choose the color value for sub menu background color", 'rigel' ),
						"id" 		=> "sub_menu_background_color",
						"std" 		=> "",
						"fold" 		=> "custom_header_styles",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Sub Menu Border Color", 'rigel' ),
						"desc" 		=> esc_html__("Choose the color value for sub menu border color", 'rigel' ),
						"id" 		=> "sub_menu_border_color",
						"std" 		=> "",
						"fold" 		=> "custom_header_styles",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Sub Menu Link Color", 'rigel' ),
						"desc" 		=> esc_html__("Choose the color value for sub menu link text color", 'rigel' ),
						"id" 		=> "sub_menu_link_color",
						"std" 		=> "",
						"fold" 		=> "custom_header_styles",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Sub Menu Link Hover Color", 'rigel' ),
						"desc" 		=> esc_html__("Choose the color value for sub menu link hover color", 'rigel' ),
						"id" 		=> "sub_menu_link_hover_color",
						"std" 		=> "",
						"fold" 		=> "custom_header_styles",
						"type" 		=> "color"
				);

//Blog Settings
$of_options[] = array( 	"name" 		=> esc_html__("Blog", 'rigel' ),
						"type" 		=> "heading"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Blog Title", 'rigel' ),
						"desc" 		=> esc_html__("Enter the title", 'rigel' ),
						"id" 		=> "blog_page_title",
						"std" 		=> "Blog",
						"type" 		=> "text"
				);


$of_options[] = array( 	"name" 		=> esc_html__("Pagination Type", 'rigel' ),
						"desc" 		=> esc_html__("Choose pagination type", 'rigel' ),
						"id" 		=> "blog_pagination",
						"std" 		=> "number",
						"type" 		=> "select",
						"options" 	=> $pagination
				);

$of_options[] = array( "name" => esc_html__("Load More Text", 'rigel' ),
					"desc"    => esc_html__("Type load more text", 'rigel' ),
					"id"      => "blog_loadmore_text",
					"std"     => "Load More",
					"type"    => "text"
				);

$of_options[] = array( "name" => esc_html__("All Posts Loaded Text", 'rigel' ),
					"desc"    => esc_html__("Type load more text", 'rigel' ),
					"id"      => "blog_allpost_loaded_text",
					"std"     => "All Posts Loaded",
					"type"    => "text"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Style", 'rigel' ),
						"desc" 		=> esc_html__("Choose styles", 'rigel' ),
						"id" 		=> "blog_styles",
						"std" 		=> "masonry",
						"type" 		=> "select",
						"options" 	=> $blog_styles
				);

$of_options[] = array( "name" => esc_html__("Choose the Registered Sidebar", 'rigel' ),
					"desc" => esc_html__("Please choose the sidebar you have created", 'rigel' ),
					"id" => "blog_select_sidebar",
					"std" => "blog-sidebar",
					"type" => "select_sidebar"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Sidebar Position", 'rigel' ),
						"desc" 		=> esc_html__("Choose sidebar position", 'rigel' ),
						"id" 		=> "blog_sidebar",
						"std" 		=> "left-sidebar",
						"type" 		=> "select",
						"options" 	=> $sidebar
				);

$of_options[] = array( 	"name" 		=> esc_html__("Show/Hide Title Bar", 'rigel' ),
						"desc" 		=> esc_html__("Do you want to display title bar?", 'rigel' ),
						"id" 		=> "blog_title_bar",
						"std" 		=> "show",
						"type" 		=> "select",
						"options" 	=> array(
							"show"  => "Show",
							"hide"  => "Hide",
						)
				);

$of_options[] = array( 	"name" 		=> esc_html__("Show / Hide breadcrumbs", 'rigel' ),
						"desc" 		=> esc_html__("Do you want to display breadcrumbs?", 'rigel' ),
						"id" 		=> "blog_breadcrumbs",
						"std" 		=> "show",
						"type" 		=> "select",
						"options" 	=> array(
							"show"  => "Show",
							"hide"  => "Hide",
						)
				);

$of_options[] = array( 	"name" 		=> esc_html__("Title Bar Style", 'rigel' ),
						"desc" 		=> esc_html__("Select title bar style", 'rigel' ),
						"id" 		=> "blog_title_bar_style",
						"std" 		=> "default",
						"type" 		=> "select",
						'options' 	  => array(
							'default'   => 'Default',
							'custom'  => 'Custom'
						),
				);

$of_options[] = array( 	"name" 		=> esc_html__("Title Bar Size", 'rigel' ),
						"desc" 		=> esc_html__("Select title bar size", 'rigel' ),
						"id" 		=> "blog_title_bar_size",
						"std" 		=> "medium",
						"type" 		=> "select",
						'options' 	  => array(
							'small'   => 'Small',
							'medium'  => 'Medium',
							'large'   => 'Large',
						),
				);

$of_options[] = array( 	"name" 		=> esc_html__("Title bar background color", 'rigel' ),
						"desc" 		=> esc_html__("It applies title bar background color", 'rigel' ),
						"id" 		=> "blog_title_bar_bg_color",
						"std" 		=> "",
						"type" 		=> "color"
				);

$of_options[] = array( "name" => esc_html__("Upload Title bar background image", 'rigel' ),
					"desc" => esc_html__("It applies title bar background image.", 'rigel' ),
					"id" => "blog_title_bar_bg_image",
					"std" => '',
					"mod" => "min",
					"type" => "media"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Title bar text color", 'rigel' ),
						"desc" 		=> esc_html__("It applies title bar text color", 'rigel' ),
						"id" 		=> "blog_title_bar_text_color",
						"std" 		=> "",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Body background color", 'rigel' ),
						"desc" 		=> esc_html__("It applies body background color for blog page", 'rigel' ),
						"id" 		=> "blog_body_bgcolor",
						"std" 		=> "#f6f6f6",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Header Transparency", 'rigel' ),
						"desc" 		=> esc_html__("Enable / Disable Header Transparency for this page", 'rigel' ),
						"id" 		=> "blog_header_trans",
						"std" 		=> "default",
						"type" 		=> "select",
						'options' 	  => array(
							'default'   => 'Default',
							'enabled'  => 'Enabled',
							'disabled'  => 'Disabled'
						),
				);

$of_options[] = array( 	"name" 		=> esc_html__("Header Transparency Value", 'rigel' ),
						"desc" 		=> esc_html__("Choose a transparency for the header background color (0 = fully transparent, 50 = 50% transparent & 100 = opaque)", 'rigel' ),
						"id" 		=> "blog_header_trans_val",
						"std" 		=> "",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Slider Shortcode", 'rigel' ),
						"desc" 		=> esc_html__("Type the slider shortcode here", 'rigel' ),
						"id" 		=> "blog_slider_shortcode",
						"std" 		=> "[rev slidename]",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Enable/Disable Animation", 'rigel' ),
						"desc" 		=> esc_html__("Do you want to animate posts?", 'rigel' ),
						"id" 		=> "blog_animate",
						"std" 		=> 1,
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"folds" 		=> 1,
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Animation Transition", 'rigel' ),
						"desc" 		=> esc_html__("Choose animation transition for posts", 'rigel' ),
						"id" 		=> "blog_transition",
						"std" 		=> "fadeInUp",
						"type" 		=> "select",
						"fold" 		=> "blog_animate",
						"options" 	=> $animation
				);

$of_options[] = array( 	"name" 		=> esc_html__("Transition Duration", 'rigel' ),
						"desc" 		=> esc_html__("Enter the Duration (Ex: 500ms or 1s)", 'rigel' ),
						"id" 		=> "blog_duration",
						"std" 		=> "500ms",
						"fold" 		=> "blog_animate",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Title Limit", 'rigel' ),
						"desc" 		=> esc_html__("Type the numerical value for the post title", 'rigel' ),
						"id" 		=> "blog_title_limit",
						"std" 		=> 80,
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Content Limit", 'rigel' ),
						"desc" 		=> esc_html__("Type the numerical value for the blog content", 'rigel' ),
						"id" 		=> "blog_content_limit",
						"std" 		=> 20,
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Show/Hide Date", 'rigel' ),
						"desc" 		=> esc_html__("Do you want to display date?", 'rigel' ),
						"id" 		=> "blog_date",
						"std" 		=> 1,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Show/Hide Author Name", 'rigel' ),
						"desc" 		=> esc_html__("Do you want to display author name?", 'rigel' ),
						"id" 		=> "blog_author",
						"std" 		=> 1,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Show/Hide Category", 'rigel' ),
						"desc" 		=> esc_html__("Do you want to display category?", 'rigel' ),
						"id" 		=> "blog_category",
						"std" 		=> 1,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"type" 		=> "switch"
				);


//Single Post Setting
$of_options[] = array( 	"name" 		=> esc_html__("Single Blog", 'rigel' ),
						"type" 		=> "heading"
				);

$of_options[] = array( "name" => esc_html__("Choose the Registered Sidebar", 'rigel' ),
					"desc" => esc_html__("Please choose the sidebar you have created", 'rigel' ),
					"id" => "single_select_sidebar",
					"std" => "blog-sidebar",
					"type" => "select_sidebar"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Single Post Sidebar Position", 'rigel' ),
						"desc" 		=> esc_html__("Choose sidebar position", 'rigel' ),
						"id" 		=> "single_layout",
						"std" 		=> "right-sidebar",
						"type" 		=> "select",
						"options" 	=> $sidebar
				);

$of_options[] = array( 	"name" 		=> esc_html__("Show/Hide Meta", 'rigel' ),
						"desc" 		=> esc_html__("Do you want to display meta?", 'rigel' ),
						"id" 		=> "single_meta",
						"std" 		=> 1,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"folds"		=> 1,
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Show/Hide Date", 'rigel' ),
						"desc" 		=> esc_html__("Do you want to display date", 'rigel' ),
						"id" 		=> "single_date",
						"std" 		=> 1,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"fold"		=> "single_meta",
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Show/Hide Author Name", 'rigel' ),
						"desc" 		=> esc_html__("Do you want to display author name", 'rigel' ),
						"id" 		=> "single_author",
						"std" 		=> 1,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"fold"		=> "single_meta",
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Show/Hide Category", 'rigel' ),
						"desc" 		=> esc_html__("Do you want to display category", 'rigel' ),
						"id" 		=> "single_category",
						"std" 		=> 1,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"fold"		=> "single_meta",
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Show/Hide Author Box Section", 'rigel' ),
						"desc" 		=> esc_html__("Do you want to display author box section", 'rigel' ),
						"id" 		=> "single_show_author_box",
						"std" 		=> 1,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"folds"		=> 1,
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Author Box Title", 'rigel' ),
						"desc" 		=> esc_html__("Type the author box title", 'rigel' ),
						"id" 		=> "single_author_box_title",
						"std" 		=> "About the Author",
						"fold"		=> "single_show_author_box",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Show/Hide Related Posts Section", 'rigel' ),
						"desc" 		=> esc_html__("Do you want to display related post section", 'rigel' ),
						"id" 		=> "single_show_related_post",
						"std" 		=> 1,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"folds"		=> 1,
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Related Post Title", 'rigel' ),
						"desc" 		=> esc_html__("Type the related post section title here", 'rigel' ),
						"id" 		=> "single_related_title",
						"std" 		=> "Related Post",
						"fold"		=> "single_show_related_post",
						"type" 		=> "text"

				);

$of_options[] = array( 	"name" 		=> esc_html__("Number of Related Post", 'rigel' ),
						"desc" 		=> esc_html__("How many related posts you want to show", 'rigel' ),
						"id" 		=> "single_related_post_no",
						"std" 		=> "6",
						"fold"		=> "single_show_related_post",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Order By", 'rigel' ),
						"desc" 		=> esc_html__("Choose the order by selection ", 'rigel' ),
						"id" 		=> "single_related_orderby",
						"std" 		=> "date",
						"fold"		=> "single_show_related_post",
						"type" 		=> "select",
						"options" 	=> $order_by
				);

$of_options[] = array( 	"name" 		=> esc_html__("Sorting Order", 'rigel' ),
						"desc" 		=> esc_html__("Choose the sorting order", 'rigel' ),
						"id" 		=> "single_related_order",
						"std" 		=> "date",
						"fold"		=> "single_show_related_post",
						"type" 		=> "select",
						"options" 	=> $order
				);


$of_options[] = array( 	"name" 		=> esc_html__("Show/Hide comment template", 'rigel' ),
						"desc" 		=> esc_html__("Do you want to display comment template, it affects comment section and comment form", 'rigel' ),
						"id" 		=> "single_comment",
						"std" 		=> 1,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"folds"		=> 1,
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Comment Section Title", 'rigel' ),
						"desc" 		=> esc_html__("Type the comment section title here", 'rigel' ),
						"id" 		=> "single_comment_title",
						"std" 		=> "Comments",
						"fold"		=> "single_comment",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Comment form Title", 'rigel' ),
						"desc" 		=> esc_html__("Type the comment form title here", 'rigel' ),
						"id" 		=> "single_comment_form_title",
						"std" 		=> "Leave a Comments",
						"fold"		=> "single_comment",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Comment form button text", 'rigel' ),
						"desc" 		=> esc_html__("Type the comment form button text here", 'rigel' ),
						"id" 		=> "single_comment_form_btn_text",
						"std" 		=> "Add Comment",
						"fold"		=> "single_comment",
						"type" 		=> "text"
				);


//Archive Settings
$of_options[] = array( 	"name" 		=> esc_html__("Archives", 'rigel' ),
						"type" 		=> "heading"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Style", 'rigel' ),
						"desc" 		=> esc_html__("Choose styles", 'rigel' ),
						"id" 		=> "archive_styles",
						"std" 		=> "masonry",
						"type" 		=> "select",
						"options" 	=> $blog_styles
				);



$of_options[] = array( 	"name" 		=> esc_html__("Pagination Type", 'rigel' ),
						"desc" 		=> esc_html__("Choose pagination type", 'rigel' ),
						"id" 		=> "archive_pagination",
						"std" 		=> "number",
						"type" 		=> "select",
						"options" 	=> $pagination
				);

$of_options[] = array( "name" => esc_html__("Load More Text", 'rigel' ),
					"desc"    => esc_html__("Type load more text", 'rigel' ),
					"id"      => "archive_loadmore_text",
					"std"     => "Load More",
					"type"    => "text"
				);

$of_options[] = array( "name" => esc_html__("All Posts Loaded Text", 'rigel' ),
					"desc"    => esc_html__("Type load more text", 'rigel' ),
					"id"      => "archive_allpost_loaded_text",
					"std"     => "All Posts Loaded",
					"type"    => "text"
				);

$of_options[] = array( "name" => esc_html__("Choose the Registered Sidebar", 'rigel' ),
					"desc" => esc_html__("Please choose the sidebar you have created", 'rigel' ),
					"id" => "archive_select_sidebar",
					"std" => "blog-sidebar",
					"type" => "select_sidebar"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Sidebar Position", 'rigel' ),
						"desc" 		=> esc_html__("Choose sidebar position", 'rigel' ),
						"id" 		=> "archive_sidebar",
						"std" 		=> "left-sidebar",
						"type" 		=> "select",
						"options" 	=> $sidebar
				);

$of_options[] = array( 	"name" 		=> esc_html__("Show/Hide Title Bar", 'rigel' ),
						"desc" 		=> esc_html__("Do you want to display title bar?", 'rigel' ),
						"id" 		=> "archive_title_bar",
						"std" 		=> "show",
						"type" 		=> "select",
						"options" 	=> array(
							"show"  => "Show",
							"hide"  => "Hide",
						)
				);

$of_options[] = array( 	"name" 		=> esc_html__("Show / Hide breadcrumbs", 'rigel' ),
						"desc" 		=> esc_html__("Do you want to display breadcrumbs?", 'rigel' ),
						"id" 		=> "archive_breadcrumbs",
						"std" 		=> "show",
						"type" 		=> "select",
						"options" 	=> array(
							"show"  => "Show",
							"hide"  => "Hide",
						)
				);

$of_options[] = array( 	"name" 		=> esc_html__("Title Bar Style", 'rigel' ),
						"desc" 		=> esc_html__("Select title bar style", 'rigel' ),
						"id" 		=> "archive_title_bar_style",
						"std" 		=> "default",
						"type" 		=> "select",
						'options' 	  => array(
							'default'   => 'Default',
							'custom'  => 'Custom'
						),
				);

$of_options[] = array( 	"name" 		=> esc_html__("Title Bar Size", 'rigel' ),
						"desc" 		=> esc_html__("Select title bar size", 'rigel' ),
						"id" 		=> "archive_title_bar_size",
						"std" 		=> "medium",
						"type" 		=> "select",
						'options' 	  => array(
							'small'   => 'Small',
							'medium'  => 'Medium',
							'large'   => 'Large',
						),
				);

$of_options[] = array( 	"name" 		=> esc_html__("Title bar background color", 'rigel' ),
						"desc" 		=> esc_html__("It applies title bar background color", 'rigel' ),
						"id" 		=> "archive_title_bar_bg_color",
						"std" 		=> "",
						"type" 		=> "color"
				);

$of_options[] = array( "name" => esc_html__("Upload Title bar background image", 'rigel' ),
					"desc" => esc_html__("It applies title bar background image.", 'rigel' ),
					"id" => "archive_title_bar_bg_image",
					"std" => '',
					"mod" => "min",
					"type" => "media"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Title bar text color", 'rigel' ),
						"desc" 		=> esc_html__("It applies title bar text color", 'rigel' ),
						"id" 		=> "archive_title_bar_text_color",
						"std" 		=> "",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Body background color", 'rigel' ),
						"desc" 		=> esc_html__("It applies body background color for archive page", 'rigel' ),
						"id" 		=> "archive_body_bgcolor",
						"std" 		=> "",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Header Transparency", 'rigel' ),
						"desc" 		=> esc_html__("Enable / Disable Header Transparency for this page", 'rigel' ),
						"id" 		=> "archive_header_trans",
						"std" 		=> "default",
						"type" 		=> "select",
						'options' 	  => array(
							'default'   => 'Default',
							'enabled'  => 'Enabled',
							'disabled'  => 'Disabled'
						),
				);

$of_options[] = array( 	"name" 		=> esc_html__("Header Transparency Value", 'rigel' ),
						"desc" 		=> esc_html__("Choose a transparency for the header background color (0 = fully transparent, 50 = 50% transparent & 100 = opaque)", 'rigel' ),
						"id" 		=> "archive_header_trans_val",
						"std" 		=> "",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Enable/Disable Animation", 'rigel' ),
						"desc" 		=> esc_html__("Do you want to animate posts", 'rigel' ),
						"id" 		=> "archive_animate",
						"std" 		=> 1,
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"folds" 		=> 1,
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Animation Transition", 'rigel' ),
						"desc" 		=> esc_html__("Choose animation transition for posts", 'rigel' ),
						"id" 		=> "archive_transition",
						"std" 		=> "fadeInUp",
						"type" 		=> "select",
						"fold" 		=> "archive_animate",
						"options" 	=> $animation
				);

$of_options[] = array( 	"name" 		=> esc_html__("Transition Duration", 'rigel' ),
						"desc" 		=> esc_html__("Enter the Duration (Ex: 500ms or 1s)", 'rigel' ),
						"id" 		=> "archive_duration",
						"std" 		=> "500ms",
						"fold" 		=> "archive_animate",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Title Limit", 'rigel' ),
						"desc" 		=> esc_html__("Type the numerical value for the post title", 'rigel' ),
						"id" 		=> "archive_title_limit",
						"std" 		=> 80,
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Content Limit", 'rigel' ),
						"desc" 		=> esc_html__("Type the numerical value for the content", 'rigel' ),
						"id" 		=> "archive_content_limit",
						"std" 		=> 20,
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Show/Hide Date", 'rigel' ),
						"desc" 		=> esc_html__("Do you want to display date?", 'rigel' ),
						"id" 		=> "archive_date",
						"std" 		=> 1,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Show/Hide Author Name", 'rigel' ),
						"desc" 		=> esc_html__("Do you want to display author name?", 'rigel' ),
						"id" 		=> "archive_author",
						"std" 		=> 1,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Show/Hide Category", 'rigel' ),
						"desc" 		=> esc_html__("Do you want to display category?", 'rigel' ),
						"id" 		=> "archive_category",
						"std" 		=> 1,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"type" 		=> "switch"
				);

//Search Settings
$of_options[] = array( 	"name" 		=> esc_html__("Search Page", 'rigel' ),
						"type" 		=> "heading"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Search Exclude", 'rigel' ),
						"desc" 		=> esc_html__("Exclude Search result here", 'rigel' ),
						"id" 		=> "search_exclude",
						"std" 		=> array(),
						"type" 		=> "multicheck",
						"options" 	=> $search_exclude
				);	

$of_options[] = array( 	"name" 		=> esc_html__("Pagination Type", 'rigel' ),
						"desc" 		=> esc_html__("Choose pagination type", 'rigel' ),
						"id" 		=> "search_pagination",
						"std" 		=> "number",
						"type" 		=> "select",
						"options" 	=> $pagination
				);

$of_options[] = array( "name" => esc_html__("Load More Text", 'rigel' ),
					"desc"    => esc_html__("Type load more text", 'rigel' ),
					"id"      => "search_loadmore_text",
					"std"     => "Load More",
					"type"    => "text"
				);

$of_options[] = array( "name" => esc_html__("All Posts Loaded Text", 'rigel' ),
					"desc"    => esc_html__("Type load more text", 'rigel' ),
					"id"      => "search_allpost_loaded_text",
					"std"     => "All Posts Loaded",
					"type"    => "text"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Style", 'rigel' ),
						"desc" 		=> esc_html__("Choose styles", 'rigel' ),
						"id" 		=> "search_styles",
						"std" 		=> "masonry",
						"type" 		=> "select",
						"options" 	=> $blog_styles
				);

$of_options[] = array( "name" => esc_html__("Choose the Registered Sidebar", 'rigel' ),
					"desc" => esc_html__("Please choose the sidebar you have created", 'rigel' ),
					"id" => "search_select_sidebar",
					"std" => "0",
					"type" => "select_sidebar",
					"hide" => array('blog-sidebar')
				);

$of_options[] = array( 	"name" 		=> esc_html__("Sidebar Position", 'rigel' ),
						"desc" 		=> esc_html__("Choose sidebar position", 'rigel' ),
						"id" 		=> "search_sidebar",
						"std" 		=> "left-sidebar",
						"type" 		=> "select",
						"options" 	=> $sidebar
				);

$of_options[] = array( 	"name" 		=> esc_html__("Show/Hide Title Bar", 'rigel' ),
						"desc" 		=> esc_html__("Do you want to display title bar?", 'rigel' ),
						"id" 		=> "search_title_bar",
						"std" 		=> "show",
						"type" 		=> "select",
						"options" 	=> array(
							"show"  => "Show",
							"hide"  => "Hide",
						)
				);

$of_options[] = array( 	"name" 		=> esc_html__("Show / Hide breadcrumbs", 'rigel' ),
						"desc" 		=> esc_html__("Do you want to display breadcrumbs?", 'rigel' ),
						"id" 		=> "search_breadcrumbs",
						"std" 		=> "show",
						"type" 		=> "select",
						"options" 	=> array(
							"show"  => "Show",
							"hide"  => "Hide",
						)
				);

$of_options[] = array( 	"name" 		=> esc_html__("Title Bar Style", 'rigel' ),
						"desc" 		=> esc_html__("Select title bar style", 'rigel' ),
						"id" 		=> "search_title_bar_style",
						"std" 		=> "default",
						"type" 		=> "select",
						'options' 	  => array(
							'default'   => 'Default',
							'custom'  => 'Custom'
						),
				);

$of_options[] = array( 	"name" 		=> esc_html__("Title Bar Size", 'rigel' ),
						"desc" 		=> esc_html__("Select title bar size", 'rigel' ),
						"id" 		=> "search_title_bar_size",
						"std" 		=> "medium",
						"type" 		=> "select",
						'options' 	  => array(
							'small'   => 'Small',
							'medium'  => 'Medium',
							'large'   => 'Large',
						),
				);

$of_options[] = array( 	"name" 		=> esc_html__("Title bar background color", 'rigel' ),
						"desc" 		=> esc_html__("It applies title bar background color", 'rigel' ),
						"id" 		=> "search_title_bar_bg_color",
						"std" 		=> "",
						"type" 		=> "color"
				);

$of_options[] = array( "name" => esc_html__("Upload Title bar background image", 'rigel' ),
					"desc" => esc_html__("It applies title bar background image.", 'rigel' ),
					"id" => "search_title_bar_bg_image",
					"std" => '',
					"mod" => "min",
					"type" => "media"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Title bar text color", 'rigel' ),
						"desc" 		=> esc_html__("It applies title bar text color", 'rigel' ),
						"id" 		=> "search_title_bar_text_color",
						"std" 		=> "",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Body background color", 'rigel' ),
						"desc" 		=> esc_html__("It applies body background color for search page", 'rigel' ),
						"id" 		=> "search_body_bgcolor",
						"std" 		=> "#f6f6f6",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Header Transparency", 'rigel' ),
						"desc" 		=> esc_html__("Enable / Disable Header Transparency for this page", 'rigel' ),
						"id" 		=> "search_header_trans",
						"std" 		=> "default",
						"type" 		=> "select",
						'options' 	  => array(
							'default'   => 'Default',
							'enabled'  => 'Enabled',
							'disabled'  => 'Disabled'
						),
				);

$of_options[] = array( 	"name" 		=> esc_html__("Header Transparency Value", 'rigel' ),
						"desc" 		=> esc_html__("Choose a transparency for the header background color (0 = fully transparent, 50 = 50% transparent & 100 = opaque)", 'rigel' ),
						"id" 		=> "search_header_trans_val",
						"std" 		=> "",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Enable/Disable Animation", 'rigel' ),
						"desc" 		=> esc_html__("Do you want to animate search posts", 'rigel' ),
						"id" 		=> "search_animate",
						"std" 		=> 1,
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"folds" 		=> 1,
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Animation Transition", 'rigel' ),
						"desc" 		=> esc_html__("Choose animation transition for search posts", 'rigel' ),
						"id" 		=> "search_transition",
						"std" 		=> "fadeInUp",
						"type" 		=> "select",
						"fold" 		=> "search_animate",
						"options" 	=> $animation
				);

$of_options[] = array( 	"name" 		=> esc_html__("Transition Duration", 'rigel' ),
						"desc" 		=> esc_html__("Enter the Duration (Ex: 500ms or 1s)", 'rigel' ),
						"id" 		=> "search_duration",
						"std" 		=> "500ms",
						"fold" 		=> "search_animate",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Title Limit", 'rigel' ),
						"desc" 		=> esc_html__("Type the numerical value for the post title", 'rigel' ),
						"id" 		=> "search_title_limit",
						"std" 		=> 80,
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Content Limit", 'rigel' ),
						"desc" 		=> esc_html__("Type the numerical value for the content", 'rigel' ),
						"id" 		=> "search_content_limit",
						"std" 		=> 20,
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Show/Hide Date", 'rigel' ),
						"desc" 		=> esc_html__("Do you want to display date?", 'rigel' ),
						"id" 		=> "search_date",
						"std" 		=> 1,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Show/Hide Author Name", 'rigel' ),
						"desc" 		=> esc_html__("Do you want to display author name?", 'rigel' ),
						"id" 		=> "search_author",
						"std" 		=> 1,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Show/Hide Category", 'rigel' ),
						"desc" 		=> esc_html__("Do you want to display category?", 'rigel' ),
						"id" 		=> "search_category",
						"std" 		=> 1,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"type" 		=> "switch"
				);

//Portfolio Setting
$of_options[] = array( 	"name" 		=> esc_html__("Portfolio", 'rigel' ),
						"type" 		=> "heading"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Client Title", 'rigel' ),
						"desc" 		=> esc_html__("Type the client title here", 'rigel' ),
						"id" 		=> "portfolio_client_title",
						"std" 		=> "Clients:",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Task Title", 'rigel' ),
						"desc" 		=> esc_html__("Type the task title here", 'rigel' ),
						"id" 		=> "portfolio_task_title",
						"std" 		=> "Tasks:",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Show/Hide Date", 'rigel' ),
						"desc" 		=> esc_html__("Do you want to display date?", 'rigel' ),
						"id" 		=> "portfolio_date",
						"std" 		=> 1,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Date Title", 'rigel' ),
						"desc" 		=> esc_html__("Type the date title here", 'rigel' ),
						"id" 		=> "portfolio_date_title",
						"std" 		=> "Date:",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Show/Hide Share", 'rigel' ),
						"desc" 		=> esc_html__("Do you want display share option?", 'rigel' ),
						"id" 		=> "portfolio_share",
						"std" 		=> 1,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"folds"		=> 1,
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Facebook Share Button", 'rigel' ),
						"desc" 		=> esc_html__("Do you want display facebook share option?", 'rigel' ),
						"id" 		=> "portfolio_share_facebook",
						"std" 		=> 1,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"fold"		=> "portfolio_share",
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Twitter Share Button", 'rigel' ),
						"desc" 		=> esc_html__("Do you want display twitter share option?", 'rigel' ),
						"id" 		=> "portfolio_share_twitter",
						"std" 		=> 1,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"fold"		=> "portfolio_share",
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Google Plus Share Button", 'rigel' ),
						"desc" 		=> esc_html__("Do you want display gplus share option?", 'rigel' ),
						"id" 		=> "portfolio_share_gplus",
						"std" 		=> 1,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"fold"		=> "portfolio_share",
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Pinterest Share Button", 'rigel' ),
						"desc" 		=> esc_html__("Do you want display pinterest share option?", 'rigel' ),
						"id" 		=> "portfolio_share_pinterest",
						"std" 		=> 1,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"fold"		=> "portfolio_share",
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Tumblr Share Button", 'rigel' ),
						"desc" 		=> esc_html__("Do you want display tumblr share option?", 'rigel' ),
						"id" 		=> "portfolio_share_tumblr",
						"std" 		=> 1,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"fold"		=> "portfolio_share",
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("LinkedIn Share Button", 'rigel' ),
						"desc" 		=> esc_html__("Do you want display linkedin share option?", 'rigel' ),
						"id" 		=> "portfolio_share_linkedin",
						"std" 		=> 1,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"fold"		=> "portfolio_share",
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Launch Button", 'rigel' ),
						"desc" 		=> esc_html__("Do you want to display launch button?", 'rigel' ),
						"id" 		=> "portfolio_btn",
						"std" 		=> 1,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Launch Button", 'rigel' ),
						"desc" 		=> esc_html__("Type the launch button text here", 'rigel' ),
						"id" 		=> "portfolio_btn_text",
						"std" 		=> "Launch",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Portfolio Page URL", 'rigel' ),
						"desc" 		=> esc_html__("Type the portfolio page url here", 'rigel' ),
						"id" 		=> "portfolio_parent_url",
						"std" 		=> "",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Diplay Next/Previous items arrows", 'rigel' ),
						"desc" 		=> esc_html__("Do you want to display next/previous arrows?", 'rigel' ),
						"id" 		=> "portfolio_pagination",
						"std" 		=> 1,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Show/Hide Related Projects", 'rigel' ),
						"desc" 		=> esc_html__("Do you want to display related project section?", 'rigel' ),
						"id" 		=> "portfolio_show_related_portfolio",
						"std" 		=> 1,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"folds"		=> 1,
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Related Projects Main Title", 'rigel' ),
						"desc" 		=> esc_html__("Type the related project main title", 'rigel' ),
						"id" 		=> "portfolio_related_main_title",
						"std" 		=> "YOU MAY ALSO LIKE",
						"fold"		=> "portfolio_show_related_portfolio",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Related Projects Sub Title", 'rigel' ),
						"desc" 		=> esc_html__("Type the related project sub title", 'rigel' ),
						"id" 		=> "portfolio_related_sub_title",
						"std" 		=> "Related Projects",
						"fold"		=> "portfolio_show_related_portfolio",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Related Projects Post Count", 'rigel' ),
						"desc" 		=> esc_html__("Type the related project post count", 'rigel' ),
						"id" 		=> "portfolio_post_count",
						"std" 		=> 6,
						"fold"		=> "portfolio_show_related_portfolio",
						"type" 		=> "text"
				);

//Single Staff Setting
$of_options[] = array( 	"name" 		=> esc_html__("Single Staff", 'rigel' ),
						"type" 		=> "heading"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Display Staff Image", 'rigel' ),
						"desc" 		=> esc_html__("Do you want to display staff images?", 'rigel' ),
						"id" 		=> "staff_image",
						"std" 		=> 1,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"folds"		=> 1,
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Single Staff Image Width", 'rigel' ),
						"desc" 		=> esc_html__("Type the single staff image width. Default: 300", 'rigel' ),
						"id" 		=> "staff_image_width",
						"std" 		=> "300",
						"fold"		=> "staff_image",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Single Staff Image Height", 'rigel' ),
						"desc" 		=> esc_html__("Type the single staff image Height. Default: 400", 'rigel' ),
						"id" 		=> "staff_image_height",
						"std" 		=> "400",
						"fold"		=> "staff_image",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Display Staff Job", 'rigel' ),
						"desc" 		=> esc_html__("Do you want to display staff job?", 'rigel' ),
						"id" 		=> "staff_job",
						"std" 		=> 1,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Display Staff Social Icons", 'rigel' ),
						"desc" 		=> esc_html__("Do you want to display staff social icons?", 'rigel' ),
						"id" 		=> "staff_social",
						"std" 		=> 1,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Display Staff Email Link", 'rigel' ),
						"desc" 		=> esc_html__("Do you want to display staff email link?", 'rigel' ),
						"id" 		=> "staff_email",
						"std" 		=> 1,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"type" 		=> "switch"
				);

if (class_exists('Woocommerce')) {

	//Shop Setting
	$of_options[] = array( 	"name" 		=> esc_html__("Shop", 'rigel' ),
							"type" 		=> "heading"
					);


	$of_options[] = array( 	"name" 		=> esc_html__("Shop Page Title", 'rigel' ),
						"desc" 		=> esc_html__("Type shop page title here", 'rigel' ),
						"id" 		=> "shop_title",
						"std" 		=> 'Shop',
						"type" 		=> "text"
				);

	$of_options[] = array( 	"name" 		=> esc_html__("Shop Layout", 'rigel' ),
						"id" 		=> "shop_layout",
						"std" 		=> "default",
						"type" 		=> "images",
						"options" 	=> $page_layout
				);

	$of_options[] = array( "name" => esc_html__("Choose the Registered Sidebar", 'rigel' ),
					"desc" => esc_html__("Please choose the sidebar you have created", 'rigel' ),
					"id" => "shop_select_sidebar",
					"std" => "0",
					"type" => "select_sidebar",
					"hide" => array('shop')
				);

	$of_options[] = array( 	"name" 		=> esc_html__("Shop Page Columns", 'rigel' ),
					"desc" 		=> esc_html__("Choose shop page columns", 'rigel' ),
					"id" 		=> "shop_columns",
					"std" 		=> "4",
					"type" 		=> "select",
					"options" 	=> array(
						"3" => "3 Column",
						"4" => "4 Column",
					)
			);

	$of_options[] = array( 	"name" 		=> esc_html__("Number of Products", 'rigel' ),
							"desc" 		=> esc_html__("How many products you want to display per page?", 'rigel' ),
							"id" 		=> "shop_count",
							"std" 		=> '8',
							"type" 		=> "text"
					);

	$of_options[] = array( 	"name" 		=> esc_html__("Product width", 'rigel' ),
							"desc" 		=> esc_html__("Type the width of the products", 'rigel' ),
							"id" 		=> "shop_width",
							"std" 		=> '396',
							"type" 		=> "text"
					);

	$of_options[] = array( 	"name" 		=> esc_html__("Product height", 'rigel' ),
							"desc" 		=> esc_html__("Type the height of the products", 'rigel' ),
							"id" 		=> "shop_height",
							"std" 		=> '396',
							"type" 		=> "text"
					);

	$of_options[] = array( 	"name" 		=> esc_html__("Show/Hide Title Bar", 'rigel' ),
						"desc" 		=> esc_html__("Do you want to display title bar?", 'rigel' ),
						"id" 		=> "shop_title_bar",
						"std" 		=> "show",
						"type" 		=> "select",
						"options" 	=> array(
							"show"  => "Show",
							"hide"  => "Hide",
						)
				);

$of_options[] = array( 	"name" 		=> esc_html__("Show / Hide breadcrumbs", 'rigel' ),
						"desc" 		=> esc_html__("Do you want to display breadcrumbs?", 'rigel' ),
						"id" 		=> "shop_breadcrumbs",
						"std" 		=> "show",
						"type" 		=> "select",
						"options" 	=> array(
							"show"  => "Show",
							"hide"  => "Hide",
						)
				);

$of_options[] = array( 	"name" 		=> esc_html__("Title Bar Style", 'rigel' ),
						"desc" 		=> esc_html__("Select title bar style", 'rigel' ),
						"id" 		=> "shop_title_bar_style",
						"std" 		=> "default",
						"type" 		=> "select",
						'options' 	  => array(
							'default'   => 'Default',
							'custom'  => 'Custom'
						),
				);

$of_options[] = array( 	"name" 		=> esc_html__("Title Bar Size", 'rigel' ),
						"desc" 		=> esc_html__("Select title bar size", 'rigel' ),
						"id" 		=> "shop_title_bar_size",
						"std" 		=> "medium",
						"type" 		=> "select",
						'options' 	  => array(
							'small'   => 'Small',
							'medium'  => 'Medium',
							'large'   => 'Large',
						),
				);

$of_options[] = array( 	"name" 		=> esc_html__("Title bar background color", 'rigel' ),
						"desc" 		=> esc_html__("It applies title bar background color", 'rigel' ),
						"id" 		=> "shop_title_bar_bg_color",
						"std" 		=> "",
						"type" 		=> "color"
				);

$of_options[] = array( "name" => esc_html__("Upload Title bar background image", 'rigel' ),
					"desc" => esc_html__("It applies title bar background image.", 'rigel' ),
					"id" => "shop_title_bar_bg_image",
					"std" => '',
					"mod" => "min",
					"type" => "media"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Title bar text color", 'rigel' ),
						"desc" 		=> esc_html__("It applies title bar text color", 'rigel' ),
						"id" 		=> "shop_title_bar_text_color",
						"std" 		=> "",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Body background color", 'rigel' ),
						"desc" 		=> esc_html__("It applies body background color for shop page", 'rigel' ),
						"id" 		=> "shop_body_bgcolor",
						"std" 		=> "#f6f6f6",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Header Transparency", 'rigel' ),
						"desc" 		=> esc_html__("Enable / Disable Header Transparency for this page", 'rigel' ),
						"id" 		=> "shop_header_trans",
						"std" 		=> "default",
						"type" 		=> "select",
						'options' 	  => array(
							'default'   => 'Default',
							'enabled'  => 'Enabled',
							'disabled'  => 'Disabled'
						),
				);

$of_options[] = array( 	"name" 		=> esc_html__("Header Transparency Value", 'rigel' ),
						"desc" 		=> esc_html__("Choose a transparency for the header background color (0 = fully transparent, 50 = 50% transparent & 100 = opaque)", 'rigel' ),
						"id" 		=> "shop_header_trans_val",
						"std" 		=> "",
						"type" 		=> "text"
				);

}


//Footer Options
$of_options[] = array( 	"name" 		=> esc_html__("Footer Options", 'rigel' ),
						"type" 		=> "heading"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Choose Fixed Footer?", 'rigel' ),
						"desc" 		=> esc_html__("Do you want Footer Fixed?", 'rigel' ),
						"id" 		=> "footer_fixed",
						"std" 		=> 0,
						"on" 		=> "Yes",
						"off" 		=> "No",
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Choose Footer Custom Style", 'rigel' ),
						"desc" 		=> esc_html__("Do you want to customize the footer appearance?", 'rigel' ),
						"id" 		=> "f_customization",
						"std" 		=> 0,
						"on" 		=> "Yes",
						"off" 		=> "No",
						"folds"		=> 1,
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Footer Widget Title Color", 'rigel' ),
						"desc" 		=> esc_html__("This is the footer widget title color", 'rigel' ),
						"id" 		=> "custom_f_title_color",
						"std" 		=> "",
						"fold"		=> "f_customization",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Footer Text Color", 'rigel' ),
						"desc" 		=> esc_html__("This is the footer text color", 'rigel' ),
						"id" 		=> "custom_f_txt_color",
						"std" 		=> "",
						"fold"		=> "f_customization",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Footer Link Color", 'rigel' ),
						"desc" 		=> esc_html__("This is the footer link color", 'rigel' ),
						"id" 		=> "custom_f_link_color",
						"std" 		=> "",
						"fold"		=> "f_customization",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Footer Link Hover Color", 'rigel' ),
						"desc" 		=> esc_html__("This is the footer link hover color", 'rigel' ),
						"id" 		=> "custom_f_link_hover_color",
						"std" 		=> "",
						"fold"		=> "f_customization",
						"type" 		=> "color"
				);


$of_options[] = array( 	"name" 		=> esc_html__("Footer Background Color", 'rigel' ),
						"desc" 		=> esc_html__("This is the footer background color", 'rigel' ),
						"id" 		=> "custom_f_bg_color",
						"std" 		=> "",
						"fold"		=> "f_customization",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Choose Footer Pattern", 'rigel' ),
						"desc" 		=> esc_html__("Select the footer pattern it affects only footer widget area section", 'rigel' ),
						"id" 		=> "custom_f_bg_pattern",
						"std" 		=> "none",
						"type" 		=> "images",
						"fold"		=> "f_customization",
						"options" 	=> $pattern
				);

$of_options[] = array( "name" => esc_html__("Upload Footer Background", 'rigel' ),
					"desc" => esc_html__("Upload a custom footer background. Height should be more than 1360px.", 'rigel' ),
					"id" => "custom_f_bg",
					"std" => '',
					"mod" => "min",
					"fold"		=> "f_customization",
					"type" => "media");


$of_options[] = array( 	"name" 		=> esc_html__("Background Attachment", 'rigel' ),
						"desc" 		=> esc_html__("Choose the footer background image attachment", 'rigel' ),
						"id" 		=> "custom_f_bg_attachment",
						"std" 		=> "scroll",
						"fold"		=> "f_customization",
						"type" 		=> "select",
						"options" 	=> $bg_attachment
				);

$of_options[] = array( 	"name" 		=> esc_html__("Background Size", 'rigel' ),
						"desc" 		=> esc_html__("Choose the footer background image size", 'rigel' ),
						"id" 		=> "custom_f_bg_size",
						"std" 		=> "cover",
						"fold"		=> "f_customization",
						"type" 		=> "select",
						"options" 	=> $bg_size
				);

$of_options[] = array( 	"name" 		=> esc_html__("Background Repeat", 'rigel' ),
						"desc" 		=> esc_html__("Choose the footer background image repeat option", 'rigel' ),
						"id" 		=> "custom_f_bg_repeat",
						"std" 		=> "cover",
						"fold"		=> "f_customization",
						"type" 		=> "select",
						"options" 	=> $bg_repeat
				);


$of_options[] = array( 	"name" 		=> esc_html__("Show/Hide Footer Widget", 'rigel' ),
						"desc" 		=> esc_html__("Do you want to display the footer widget?", 'rigel' ),
						"id" 		=> "f_widget",
						"std" 		=> 1,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"folds"		=> 1,
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Footer Layout", 'rigel' ),
						"id" 		=> "footer_option",
						"std" 		=> "col3",
						"type" 		=> "images",
						"options" 	=> $footer
				);

$of_options[] = array( 	"name" 		=> esc_html__("Footer Style", 'rigel' ),
						"desc" 		=> esc_html__("Select footer style.", 'rigel' ),
						"id" 		=> "footer_style",
						"std" 		=> 0,
						"on" 		=> "Dark",
						"off" 		=> "Light",
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Show/Hide Small footer", 'rigel' ),
						"desc" 		=> esc_html__("Do you want to display the small footer?", 'rigel' ),
						"id" 		=> "f_small",
						"std" 		=> 1,
						"on" 		=> "Show",
						"off" 		=> "Hide",
						"folds"		=> 2,
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Copyright Style", 'rigel' ),
						"desc" 		=> esc_html__("Do you want to display the small footer?", 'rigel' ),
						"id" 		=> "copyright_side",
						"std" 		=> 0,
						"on" 		=> "Left and Right Side",
						"off" 		=> "Centered",
						"folds" 	=> 1,
						"fold" 		=> "f_small",
						"type" 		=> "switch"
				);

$copyright_elem = array
( 
	"disabled" => array (
		"placebo" 	=> "placebo", //REQUIRED!
		"sicons"         => "Social Icons"
	),
	"left" => array (
		"copyright_text" => "Copyright Text"
	),
	"right" => array (
		"placebo" => "placebo", //REQUIRED!
		"menu"    => "Menu"
	),
);

$of_options[] = array( 	"name" 		=> esc_html__("Copyright elements", 'rigel' ),
						"desc" 		=> esc_html__("Choose what you want to display on Footer Area", 'rigel' ),
						"id" 		=> "copyright_sorter",
						"std" 		=> $copyright_elem,
						"fold" 		=> "copyright_side",
						"type" 		=> "sorter"
				);

$of_options[] = array( "name" => esc_html__("Copyright Text", 'rigel' ),
					"desc" => esc_html__("Type Copyright Text", 'rigel' ),
					"id"   => "copyright_text",
					"std"  => shortcode_exists( 'blog-link' ) ? sprintf( __( '<p>&copy; %s %s, All Rights Reserved.</p>', 'rigel' ), date( 'Y' ), do_shortcode( '[blog-link]' ) ) : sprintf( __( '<p>&copy; %s %s, All Rights Reserved.</p>', 'rigel' ), date( 'Y' ), get_bloginfo( 'name' ) ),
					"fold" => "f_small",
					"type"	=> "textarea");

$of_options[] = array( 	"name" 		=> esc_html__("Copyright Background Color", 'rigel' ),
						"desc" 		=> esc_html__("This is the copyright background color", 'rigel' ),
						"id" 		=> "custom_fc_bg_color",
						"std" 		=> "",
						"fold" => "f_small",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Copyright Text Color", 'rigel' ),
						"desc" 		=> esc_html__("This is the copyright text color", 'rigel' ),
						"id" 		=> "custom_fc_txt_color",
						"std" 		=> "",
						"fold" => "f_small",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Copyright Link Color", 'rigel' ),
						"desc" 		=> esc_html__("This is the copyright link color", 'rigel' ),
						"id" 		=> "custom_fc_link_color",
						"std" 		=> "",
						"fold" => "f_small",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Copyright Link Hover Color", 'rigel' ),
						"desc" 		=> esc_html__("This is the copyright link hover color", 'rigel' ),
						"id" 		=> "custom_fc_link_hover_color",
						"std" 		=> "",
						"fold" => "f_small",
						"type" 		=> "color"
				);

//Styling Options
$of_options[] = array( "name" => esc_html__("Styling Options", 'rigel' ),
					"type" => "heading");

$of_options[] = array( "name" => esc_html__("Custom Styles", 'rigel' ),
					"desc" => esc_html__("Do you like to use Custom Styles, Please enable it and choose the Background color, Primary color, Selection text color, selection background color, link hover color. If it's disabled, the default style will apply and custom styles are won't apply.", 'rigel' ),
					"id" => "custom_styles",
					"std" => 0,
					"on" => "Yes",
					"off" => "No",
					"type" => "switch"
				);

$of_options[] = array( "name" => esc_html__("Customize Body Background", 'rigel' ),
					"desc" => esc_html__("Do you want to customize the body backgound?", 'rigel' ),
					"id" => "customize_body_bg",
					"std" => 0,
					"on" => "Yes",
					"off" => "No",
					"type" => "switch"
				);
				
$of_options[] = array( 	"name" 		=> esc_html__("Body Background Color", 'rigel' ),
						"desc" 		=> esc_html__("Pick a background color for the theme (default: #fff).", 'rigel' ),
						"id" 		=> "body_background",
						"std" 		=> "#fff",
						"fold"		=> "customize_body_bg",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Choose Body Pattern", 'rigel' ),
						"id" 		=> "custom_body_bg_pattern",
						"std" 		=> "none",
						"type" 		=> "images",
						"fold"		=> "customize_body_bg",
						"options" 	=> $pattern
				);

$of_options[] = array( "name" => esc_html__("Upload Body Background Image", 'rigel' ),
					"desc" => esc_html__("Upload a body background image", 'rigel' ),
					"id" => "custom_body_bg",
					"std" => '',
					"mod" => "min",
					"fold"		=> "customize_body_bg",
					"type" => "media");

$of_options[] = array( 	"name" 		=> esc_html__("Background Attachment", 'rigel' ),
						"desc" 		=> esc_html__("Choose the body background image attachment", 'rigel' ),
						"id" 		=> "custom_body_bg_attachment",
						"std" 		=> "scroll",
						"fold"		=> "customize_body_bg",
						"type" 		=> "select",
						"options" 	=> $bg_attachment
				);

$of_options[] = array( 	"name" 		=> esc_html__("Background Size", 'rigel' ),
						"desc" 		=> esc_html__("Choose the body background image size", 'rigel' ),
						"id" 		=> "custom_body_bg_size",
						"std" 		=> "cover",
						"fold"		=> "customize_body_bg",
						"type" 		=> "select",
						"options" 	=> $bg_size
				);

$of_options[] = array( 	"name" 		=> esc_html__("Background Repeat", 'rigel' ),
						"desc" 		=> esc_html__("Choose the body background image repeat option", 'rigel' ),
						"id" 		=> "custom_body_bg_repeat",
						"std" 		=> "cover",
						"fold"		=> "customize_body_bg",
						"type" 		=> "select",
						"options" 	=> $bg_repeat
				);

$of_options[] = array( 	"name" 		=> esc_html__("Primary Color", 'rigel' ),
						"desc" 		=> esc_html__("This is the primary color for the theme.(its applied for most of the items in the theme such as button, link etc..", 'rigel' ),
						"id" 		=> "pri_color",
						"std" 		=> "",
						"type" 		=> "color"
				);
$of_options[] = array( 	"name" 		=> esc_html__("Selection Text Color", 'rigel' ),
						"desc" 		=> esc_html__("This is the text color when selecting the text.", 'rigel' ),
						"id" 		=> "selection_text_color",
						"std" 		=> "",
						"type" 		=> "color"
				);
$of_options[] = array( 	"name" 		=> esc_html__("Selection Text Background Color", 'rigel' ),
						"desc" 		=> esc_html__("This is the text background color when selecting the text.", 'rigel' ),
						"id" 		=> "selection_bg_color",
						"std" 		=> "",
						"type" 		=> "color"
				);


$of_options[] = array( 	"name" 		=> esc_html__("Highlight Color", 'rigel' ),
						"desc" 		=> esc_html__("This is the highlight color for the theme.", 'rigel' ),
						"id" 		=> "highlight_color",
						"std" 		=> "",
						"type" 		=> "color"
				);

//Twitter Api Settings
$of_options[] = array( "name" => esc_html__("Twitter API Key", "rigel"),
						"type" => "heading"
						);	

$of_options[] = array( "name" => esc_html__("Consumer Key", "rigel"),
						"desc" => esc_html__("Paste your Twitter API's Consumer Key", "rigel"),
						"id" => "twitter_api_consumer_key",
						"std" => "",
						"type" => "text"
						);	

$of_options[] = array( "name" => esc_html__("Consumer Secret Key", "rigel"),
						"desc" => esc_html__("Paste your Twitter API's Consumer Secret Key", "rigel"),
						"id" => "twitter_api_consumer_secret_key",
						"std" => "",
						"type" => "text"
						);	

$of_options[] = array( "name" => esc_html__("Access Token", "rigel"),
						"desc" => esc_html__("Paste your Twitter API's Access Token", "rigel"),
						"id" => "twitter_api_access_token",
						"std" => "",
						"type" => "text"
						);	

$of_options[] = array( "name" => esc_html__("Access Token Secret Key", "rigel"),
						"desc" => esc_html__("Paste your Twitter API's Access Token Secret Key", "rigel"),
						"id" => "twitter_api_access_token_secret_key",
						"std" => "",
						"type" => "text"
						);

$of_options[] = array( "name" => esc_html__("Twitter Cache Duration (in seconds)", "rigel"),
						"desc" => esc_html__("Set how often you want to check for new tweets? By default, results are cached for 1 hour to help you avoid hitting the API limits.", "rigel"),
						"id" => "twitter_cache_expire",
						"std" => 3600,
						"type" => "text"
						);

//Typography
$of_options[] = array( "name" => esc_html__("Typography", 'rigel' ),
					"type" => "heading");

$of_options[] = array( 	"name" 		=> esc_html__("Body Fonts", 'rigel' ),
						"desc" 		=> esc_html__("Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply). This font will for body texts", 'rigel' ),
						"id" 		=> "custom_font_body",
						"std" 		=> array(
											'size'  => '14px',
											'g_face' => 'Lato',
											'face'  => 'Arial, sans-serif',
											'style' => 'regular',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> esc_html__("Primary Fonts", 'rigel' ),
						"desc" 		=> esc_html__("Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply). This font will apply for Headings, main menu, Titles etc. To take full contorl turn on advance font settings from below and enjoy!", 'rigel' ),
						"id" 		=> "custom_font_primary",
						"std" 		=> array(
											'g_face' => 'Montserrat',
											'face'  => 'Arial, sans-serif',
											'style' => '700'
										),
						"type" 		=> "select_google_font",
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> esc_html__("Content Fonts", 'rigel' ),
						"desc" 		=> esc_html__("Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply). This font will apply for most of the sections in the theme including paragraph, lists, blockquote, testimonial, sub menu etc. To take full contorl turn on advance font settings from below and enjoy!", 'rigel' ),
						"id" 		=> "custom_font_content",
						"std" 		=> array(
											'g_face' => 'Crimson Text',
											'face'  => 'Arial, sans-serif',
											//'style' => 'regular',
										),
						"type" 		=> "select_google_font",
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);


//Subset
$subset = array(
			'latin' => 'Latin',
			'cyrillic-ext' => 'Cyrillic Extended (cyrillic-ext) ',
			'greek-ext' => 'Greek Extended (greek-ext)',
			'greek' => 'Greek (greek)',
			'vietnamese' => 'Vietnamese (vietnamese)',
			'latin-ext' => 'Latin Extended (latin-ext)',
			'cyrillic' => 'Cyrillic (cyrillic)'
			);

$of_options[] = array( 	"name" 		=> esc_html__("Choose the character sets you want:", 'rigel' ),
						"desc" 		=> esc_html__("If you choose only the languages that you need, you'll help prevent slowness on your webpage.", 'rigel' ),
						"id" 		=> "subset",
						"std" 		=> array("latin"),
						"type" 		=> "multicheck",
						"options" 	=> $subset
				);

//Advance Typography Options
$of_options[] = array( "name" => esc_html__("Advance Typography", 'rigel' ),
					"type" => "heading");

$of_options[] = array( "name" => esc_html__("Advance Font Setting", 'rigel' ),
					"desc" => esc_html__("Do you like to Enable Advance Font Settings? By enabling this you can choose font each and every possible section. choose less number of fonts, it will to help prevent slowness on your webpage.", 'rigel' ),
					"id" => "ad_font_settings",
					"std" => 0,
					"on" => "Yes",
					"off" => "No",
					"folds"		=> 1,
					"type" => "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("H1 Font", 'rigel' ),
						"desc" 		=> esc_html__("This font will apply for h1 tag blog and pages. (This will not apply in Title Shortcode). Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", 'rigel' ),
						"id" 		=> "cf_h1",
						"std" 		=> array(
											'size'  => '24px',
											'g_face' => 'Montserrat',
											'face'  => 'Arial, sans-serif',
											'style' => '700',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> "ad_font_settings",
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> esc_html__("H2 Font", 'rigel' ),
						"desc" 		=> esc_html__("This font will apply for h2 tag blog and pages. (This will not apply in Title Shortcode). Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", 'rigel' ),
						"id" 		=> "cf_h2",
						"std" 		=> array(
											'size'  => '21px',
											'g_face' => 'Montserrat',
											'face'  => 'Arial, sans-serif',
											'style' => '700',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> "ad_font_settings",
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> esc_html__("H3 Font", 'rigel' ),
						"desc" 		=> esc_html__("This font will apply for h2 tag blog and pages. (This will not apply in Title Shortcode). Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", 'rigel' ),
						"id" 		=> "cf_h3",
						"std" 		=> array(
											'size'  => '18px',
											'g_face' => 'Montserrat',
											'face'  => 'Arial, sans-serif',
											'style' => '700',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> "ad_font_settings",
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> esc_html__("H4 Font", 'rigel' ),
						"desc" 		=> esc_html__("This font will apply for h2 tag blog and pages. (This will not apply in Title Shortcode). Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", 'rigel' ),
						"id" 		=> "cf_h4",
						"std" 		=> array(
											'size'  => '16px',
											'g_face' => 'Montserrat',
											'face'  => 'Arial, sans-serif',
											'style' => '700',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> "ad_font_settings",
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> esc_html__("H5 Font", 'rigel' ),
						"desc" 		=> esc_html__("This font will apply for h2 tag blog and pages. (This will not apply in Title Shortcode). Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", 'rigel' ),
						"id" 		=> "cf_h5",
						"std" 		=> array(
											'size'  => '14px',
											'g_face' => 'Montserrat',
											'face'  => 'Arial, sans-serif',
											'style' => '700',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> "ad_font_settings",
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> esc_html__("H6 Font", 'rigel' ),
						"desc" 		=> esc_html__("This font will apply for h2 tag blog and pages. (This will not apply in Title Shortcode). Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", 'rigel' ),
						"id" 		=> "cf_h6",
						"std" 		=> array(
											'size'  => '12px',
											'g_face' => 'Montserrat',
											'face'  => 'Arial, sans-serif',
											'style' => '700',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> "ad_font_settings",
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> esc_html__("Title Font", 'rigel' ),
						"desc" 		=> esc_html__("This font will apply for Title Style.Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", 'rigel' ),
						"id" 		=> "cf_main_title",
						"std" 		=> array(
											'size'  => '21px',
											'g_face' => 'Montserrat',
											'face'  => 'Arial, sans-serif',
											'style' => '700',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> "ad_font_settings",
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> esc_html__("List Item Font", 'rigel' ),
						"desc" 		=> esc_html__("This font will apply for li tag.Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", 'rigel' ),
						"id" 		=> "cf_list",
						"std" 		=> array(
											'size'  => '14px',
											'g_face' => 'Lato',
											'face'  => 'Arial, sans-serif',
											'style' => '400',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> "ad_font_settings",
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> esc_html__("Link Font", 'rigel' ),
						"desc" 		=> esc_html__("This font will apply for link tag.Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", 'rigel' ),
						"id" 		=> "cf_link",
						"std" 		=> array(
											'size'  => '14px',
											'g_face' => 'Lato',
											'face'  => 'Arial, sans-serif',
											'style' => '400',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> "ad_font_settings",
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> esc_html__("Logo Font", 'rigel' ),
						"desc" 		=> esc_html__("This font will apply for Text Logo.Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", 'rigel' ),
						"id" 		=> "cf_logo",
						"std" 		=> array(
											'size'  => '30px',
											'g_face' => 'Montserrat',
											'face'  => 'Arial, sans-serif',
											'style' => '700',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> "ad_font_settings",
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> esc_html__("BlockQuote Font", 'rigel' ),
						"desc" 		=> esc_html__("This font will apply for blockquote tag.Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", 'rigel' ),
						"id" 		=> "cf_blockquote",
						"std" 		=> array(
											'size'  => '14px',
											'g_face' => 'Lato',
											'face'  => 'Arial, sans-serif',
											'style' => '400italic',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> "ad_font_settings",
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> esc_html__("Main Menu Font", 'rigel' ),
						"desc" 		=> esc_html__("This font will apply for Main Menu Style.Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", 'rigel' ),
						"id" 		=> "cf_menu",
						"std" 		=> array(
											'size'  => '14px',
											'g_face' => 'Montserrat',
											'face'  => 'Arial, sans-serif',
											'style' => '700',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> "ad_font_settings",
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> esc_html__("Sub Menu Font", 'rigel' ),
						"desc" 		=> esc_html__("This font will apply for Sub Menu Style.Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", 'rigel' ),
						"id" 		=> "cf_sub_menu",
						"std" 		=> array(
											'size'  => '14px',
											'g_face' => 'Lato',
											'face'  => 'Arial, sans-serif',
											'style' => '400',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> "ad_font_settings",
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> esc_html__("Mega Menu Title Font", 'rigel' ),
						"desc" 		=> esc_html__("This font will apply for Mega Menu Title Style.Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", 'rigel' ),
						"id" 		=> "cf_mega_menu",
						"std" 		=> array(
											'size'  => '14px',
											'g_face' => 'Montserrat',
											'face'  => 'Arial, sans-serif',
											'style' => '700',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> "ad_font_settings",
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);


$of_options[] = array( 	"name" 		=> esc_html__("Button Small Font", 'rigel' ),
						"desc" 		=> esc_html__("Choose the button large text font size", 'rigel' ),
						"id" 		=> "cf_btn_small",
						"std" 		=> "13px",
						"type" 		=> "select",
						"mod" 		=> "mini",
						"fold"		=> "ad_font_settings",
						"options" 	=> $font_sizes
				);


$of_options[] = array( 	"name" 		=> esc_html__("Button Medium Font", 'rigel' ),
						"desc" 		=> esc_html__("This font will apply for Button Style.Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", 'rigel' ),
						"id" 		=> "cf_btn",
						"std" 		=> array(
											'size'  => '14px',
											'g_face' => 'Montserrat',
											'face'  => 'Arial, sans-serif',
											'style' => '700',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> "ad_font_settings",
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> esc_html__("Button Large Font", 'rigel' ),
						"desc" 		=> esc_html__("Choose the button large text font size", 'rigel' ),
						"id" 		=> "cf_btn_lg",
						"std" 		=> "16px",
						"type" 		=> "select",
						"mod" 		=> "mini",
						"fold"		=> "ad_font_settings",
						"options" 	=> $font_sizes
				); 

$of_options[] = array( 	"name" 		=> esc_html__("Process Title Font", 'rigel' ),
						"desc" 		=> esc_html__("This font will apply for Process Title Style.Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", 'rigel' ),
						"id" 		=> "cf_process_title",
						"std" 		=> array(
											'size'  => '21px',
											'g_face' => 'Montserrat',
											'face'  => 'Arial, sans-serif',
											'style' => '700',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> "ad_font_settings",
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				); 

$of_options[] = array( 	"name" 		=> esc_html__("Process Content Font", 'rigel' ),
						"desc" 		=> esc_html__("This font will apply for Process Content Style.Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", 'rigel' ),
						"id" 		=> "cf_process_content",
						"std" 		=> array(
											'size'  => '40px',
											'g_face' => 'Lato',
											'face'  => 'Arial, sans-serif',
											'style' => '400',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> "ad_font_settings",
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> esc_html__("Skill Percentage Text Font", 'rigel' ),
						"desc" 		=> esc_html__("This font will apply for Percentage Text Style.Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", 'rigel' ),
						"id" 		=> "cf_percent_text",
						"std" 		=> array(
											'size'  => '40px',
											'g_face' => 'Montserrat',
											'face'  => 'Arial, sans-serif',
											'style' => '700',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> "ad_font_settings",
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				); 

$of_options[] = array( 	"name" 		=> esc_html__("Skill Percentage Outside Title Font", 'rigel' ),
						"desc" 		=> esc_html__("This font will apply for Percentage Outside Title Style.Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", 'rigel' ),
						"id" 		=> "cf_percent_outside",
						"std" 		=> array(
											'size'  => '16px',
											'g_face' => 'Lato',
											'face'  => 'Arial, sans-serif',
											'style' => '700',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> "ad_font_settings",
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> esc_html__("Textfield Font", 'rigel' ),
						"desc" 		=> esc_html__("This font will apply for Textfield Style.Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", 'rigel' ),
						"id" 		=> "cf_txtfield",
						"std" 		=> array(
											'size'  => '14px',
											'g_face' => 'Lato',
											'face'  => 'Arial, sans-serif',
											'style' => '400italic',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> "ad_font_settings",
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> esc_html__("Staff Title Font", 'rigel' ),
						"desc" 		=> esc_html__("This font will apply for Staff Title Style.Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", 'rigel' ),
						"id" 		=> "cf_staff_title",
						"std" 		=> array(
											'size'  => '16px',
											'g_face' => 'Lato',
											'face'  => 'Arial, sans-serif',
											'style' => '700',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> "ad_font_settings",
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> esc_html__("Portfolio Filter Font", 'rigel' ),
						"desc" 		=> esc_html__("This font will apply for Portfolio Filter Style.Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", 'rigel' ),
						"id" 		=> "cf_filter_normal",
						"std" 		=> array(
											'g_face' => 'Montserrat',
											'face'  => 'Arial, sans-serif',
											'style' => '700',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> "ad_font_settings",
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> esc_html__("Pricing Table Title Font", 'rigel' ),
						"desc" 		=> esc_html__("This font will apply for Pricing Table Title Style.Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", 'rigel' ),
						"id" 		=> "cf_plan_title",
						"std" 		=> array(
											'size'  => '16px',
											'g_face' => 'Montserrat',
											'face'  => 'Arial, sans-serif',
											'style' => '600',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> "ad_font_settings",
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> esc_html__("Pricing Table Price Font", 'rigel' ),
						"desc" 		=> esc_html__("This font will apply for Pricing Table Price Style.Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", 'rigel' ),
						"id" 		=> "cf_plan_value",
						"std" 		=> array(
											'size'  => '32px',
											'g_face' => 'Lato',
											'face'  => 'Arial, sans-serif',
											'style' => '900',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> "ad_font_settings",
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> esc_html__("Pricing Table Currency Font", 'rigel' ),
						"desc" 		=> esc_html__("This font will apply for Pricing Table Currency Style.Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", 'rigel' ),
						"id" 		=> "cf_plan_valign",
						"std" 		=> array(
											'size'  => '13px',
											'g_face' => 'Lato',
											'face'  => 'Arial, sans-serif',
											'style' => '700',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> "ad_font_settings",
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> esc_html__("Pricing Table Price Period Font", 'rigel' ),
						"desc" 		=> esc_html__("This font will apply for Pricing Table Price Period Style.Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", 'rigel' ),
						"id" 		=> "cf_plan_month",
						"std" 		=> array(
											'size'  => '14px',
											'g_face' => 'Lato',
											'face'  => 'Arial, sans-serif',
											'style' => '400',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> "ad_font_settings",
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> esc_html__("Testimonial Content Font", 'rigel' ),
						"desc" 		=> esc_html__("This font will apply for Testimonial Content Style.Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", 'rigel' ),
						"id" 		=> "cf_testimonial_content",
						"std" 		=> array(
											'size'  => '16px',
											'g_face' => 'Lato',
											'face'  => 'Arial, sans-serif',
											'style' => '400italic',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> "ad_font_settings",
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> esc_html__("Widget Title Font", 'rigel' ),
						"desc" 		=> esc_html__("This font will apply for Widget Title Style.Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", 'rigel' ),
						"id" 		=> "cf_widget_title",
						"std" 		=> array(
											'size'  => '16px',
											'g_face' => 'Montserrat',
											'face'  => 'Arial, sans-serif',
											'style' => '700',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> "ad_font_settings",
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> esc_html__("Twitter Content Font", 'rigel' ),
						"desc" 		=> esc_html__("This font will apply for Twitter Content Style.Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", 'rigel' ),
						"id" 		=> "cf_twitter",
						"std" 		=> array(
											'size'  => '16px',
											'g_face' => 'Lato',
											'face'  => 'Arial, sans-serif',
											'style' => '400italic',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> "ad_font_settings",
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

// Backup Options
$of_options[] = array( 	"name" 		=> esc_html__("Custom Fonts", 'rigel' ),
						"type" 		=> "heading",						
				);

$of_options[] = array(
					"id" => "introduction",
					"std" => '<h3>'. esc_html__( 'Add you own Custom fonts.', 'rigel' ) . '</h3> ' . __('Add your own fonts here, once you added <strong>hit save button and refresh page</strong>, then you will see on your font on all fonts settings dropdown. <strong>Note:</strong> Once you added font here, it will automatically loaded on the site, but you have choose the font from styling options.', 'rigel' ),
					"icon" => true,
					"type" => "info");	

$of_options[] = array( 	"name" 		=> esc_html__("Add you own fonts here", 'rigel' ),
						"desc" 		=> esc_html__("Add your own fonts here, once you added your font refresh the page to see on your font on all fonts font refresh dropdown.", 'rigel' ),
						"id" 		=> "custom_fonts",
						"std" 		=> "",		
						"type" 		=> "custom_fonts"
				);

// Backup Options
$of_options[] = array( 	"name" 		=> esc_html__("Backup Options", 'rigel' ),
						"type" 		=> "heading",						
				);
				
$of_options[] = array( 	"name" 		=> esc_html__("Backup and Restore Options", 'rigel' ),
						"desc" 		=> esc_html__("You can use the two buttons below to backup your current options, and then restore it back at a later time. This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.", 'rigel' ),
						"id" 		=> "of_backup",
						"std" 		=> "",
						"type" 		=> "backup",
				);
				
$of_options[] = array( 	"name" 		=> esc_html__("Transfer Theme Options Data", 'rigel' ),
						"desc" 		=> esc_html__("You can tranfer the saved options data between different installs by copying the text inside the text box. To import data from another install, replace the data in the text box with the one from another install and click 'Import Options'.", 'rigel' ),
						"id" 		=> "of_transfer",
						"std" 		=> "",
						"type" 		=> "transfer",
						
				);
				
	}//End function: of_options()
}//End chack if function exists: of_options()
?>