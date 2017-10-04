<?php
class Rigel_Menu_Extend {

	/*--------------------------------------------*
	 * Constructor
	 *--------------------------------------------*/

	/**
	 * Initializes the plugin by setting localization, filters, and administration functions.
	 */
	function __construct() {

		// add custom menu fields to menu
		add_filter( 'wp_setup_nav_menu_item', array( $this, 'rigel_add_custom_nav_fields' ) );
		
		// save menu custom fields
		add_action( 'wp_update_nav_menu_item', array( $this, 'rigel_update_custom_nav_fields'), 10, 3 );
		
		// edit menu walker
		add_filter( 'wp_edit_nav_menu_walker', array( $this, 'rigel_edit_walker'), 10, 2 );

		//adding required menu scripts
		add_action( 'admin_enqueue_scripts', array( $this,'rigel_menu_admin_scripts') );

	} // end constructor


	/**
	 * Load Required Styles and scripts 
	 * only for Nav Menu page.
	 * 
	*/
	function rigel_menu_admin_scripts($hook_suffix) {
		if('nav-menus.php' ==  $hook_suffix){
			//Loading Css
			wp_enqueue_style('menu_font_style'	, get_template_directory_uri() ."/_css/pix-icons.css");
			wp_enqueue_style('menu_style', RIGEL_EXTRAS_URI ."/menu-extend/css/style.css");
			//Load Insert Icon Plugin
			wp_enqueue_media();
			wp_enqueue_script( 'rigel_media_manager', RIGEL_FRAMEWORK_URI .'/admin/_js/media-upload.js', array( 'jquery' ));
			wp_enqueue_script( 'menu_js', RIGEL_EXTRAS_URI .'/menu-extend/js/dialog.js', array( 'jquery' ));
			
		}
	}	
	

	/**
	 * Add custom fields to $item nav object
	 * in order to be used in custom Walker
	 *
	 * @access      public
	 * @since       1.0 
	 * @return      void
	*/
	function rigel_add_custom_nav_fields( $menu_item ) {

		$menu_item->icon = get_post_meta( $menu_item->ID, '_menu_item_icon', true );
		$menu_item->megamenu = get_post_meta( $menu_item->ID, '_menu_item_megamenu', true );
		$menu_item->megamenucol = get_post_meta( $menu_item->ID, '_menu_item_megamenucol', true );
		$menu_item->megamenupos = get_post_meta( $menu_item->ID, '_menu_item_megamenupos', true );
		$menu_item->megamenutitle = get_post_meta( $menu_item->ID, '_menu_item_megamenutitle', true );
		$menu_item->megamenubgimg = get_post_meta( $menu_item->ID, '_menu_item_megamenubgimg', true );
		return $menu_item;
	
	}
	
	
	/**
	 * Save menu custom fields
	 *
	 * @access      public
	 * @since       1.0 
	 * @return      void
	*/
	function rigel_update_custom_nav_fields( $menu_id, $menu_item_db_id, $args ) {
	
		// Check if element is properly sent
		if ( isset($_REQUEST['menu-item-icon']) && is_array( $_REQUEST['menu-item-icon']) ) {
			$icon_value = (isset($_REQUEST['menu-item-icon'][$menu_item_db_id]) && $_REQUEST['menu-item-icon'][$menu_item_db_id])  ? $_REQUEST['menu-item-icon'][$menu_item_db_id] : '';
			update_post_meta( $menu_item_db_id, '_menu_item_icon', $icon_value );
		}

		if ( isset($_REQUEST['menu-item-megamenu']) && is_array( $_REQUEST['menu-item-megamenu']) && isset($_REQUEST['menu-item-megamenu'][$menu_item_db_id]) ){			
			update_post_meta( $menu_item_db_id, '_menu_item_megamenu', true );
		}else{
			update_post_meta( $menu_item_db_id, '_menu_item_megamenu', false );
		}

		if ( isset($_REQUEST['menu-item-megamenucol']) && is_array( $_REQUEST['menu-item-megamenucol']) ) {
			$megamenucol_value = (isset($_REQUEST['menu-item-megamenucol'][$menu_item_db_id]) && $_REQUEST['menu-item-megamenucol'][$menu_item_db_id])  ? $_REQUEST['menu-item-megamenucol'][$menu_item_db_id] : '';
			update_post_meta( $menu_item_db_id, '_menu_item_megamenucol', $megamenucol_value );
		}

		if ( isset($_REQUEST['menu-item-megamenupos']) && is_array( $_REQUEST['menu-item-megamenupos']) && isset($_REQUEST['menu-item-megamenupos'][$menu_item_db_id]) ){			
			update_post_meta( $menu_item_db_id, '_menu_item_megamenupos', true );
		}else{
			update_post_meta( $menu_item_db_id, '_menu_item_megamenupos', false );
		}

		if ( isset($_REQUEST['menu-item-megamenutitle']) && is_array( $_REQUEST['menu-item-megamenutitle']) && isset($_REQUEST['menu-item-megamenutitle'][$menu_item_db_id]) ){			
			update_post_meta( $menu_item_db_id, '_menu_item_megamenutitle', true );
		}else{
			update_post_meta( $menu_item_db_id, '_menu_item_megamenutitle', false );
		}

		if ( isset($_REQUEST['menu-item-megamenubgimg']) && is_array( $_REQUEST['menu-item-megamenubgimg']) && isset($_REQUEST['menu-item-megamenubgimg'][$menu_item_db_id]) ){
			update_post_meta( $menu_item_db_id, '_menu_item_megamenubgimg', $_REQUEST['menu-item-megamenubgimg'][$menu_item_db_id] );
		}else{
			update_post_meta( $menu_item_db_id, '_menu_item_megamenubgimg', '[]' );
		}

		
	}
	
	/**
	 * Define new Walker edit
	 *
	 * @access      public
	 * @since       1.0 
	 * @return      void
	*/
	function rigel_edit_walker($walker,$menu_id) {
	
		return 'Rigel_Walker_Nav_Menu_Edit_Custom';
	
	}

}

// instantiate class
$GLOBALS['rigel_entend_menu'] = new Rigel_Menu_Extend();

rigel_require_file( RIGEL_EXTRAS .'/menu-extend/edit_custom_walker.php' );
rigel_require_file( RIGEL_EXTRAS .'/menu-extend/custom_walker.php' );