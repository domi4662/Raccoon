<?php
 
if( ! class_exists( 'RigelSidebar' ) ){
	
	class RigelSidebar {
	
		var $sidebars  = array();
		var $stored    = "";
	    
		function __construct() {
			$this->stored	= 'rigel_sidebars';
			$this->title = esc_html__('Custom Widget Area','rigel' );
		    
			add_action( 'load-widgets.php', array( &$this, 'load_assets' ), 5 );
			add_action( 'widgets_init', array( &$this, 'register_custom_sidebars'), 1000 );
			add_action( 'wp_ajax_rigel_ajax_delete_custom_sidebar', array( &$this, 'delete_sidebar_area'), 1000 );
		}
		
		function load_assets() {
			add_action( 'admin_print_scripts', array( &$this, 'template_add_widget_field') );
			add_action( 'load-widgets.php', array( &$this, 'add_sidebar_area'), 100);


			wp_enqueue_style( 'sidebar_css' , RIGEL_EXTRAS_URI . '/rigel-sidebar/css/sidebar.css');			
			wp_enqueue_script('sidebar_js' , RIGEL_EXTRAS_URI . '/rigel-sidebar/js/sidebar.js');  
		}
		
		function template_add_widget_field() {
			$nonce =  wp_create_nonce ('pix-delete-sidebar');
			$nonce = '<input type="hidden" name="pix-delete-sidebar" value="'.$nonce.'" />';

			echo "\n<script type='text/html' id='pix-add-widget'>";
			echo "\n  <form class='pix-add-widget' method='POST'>";
			echo "\n  <h3>". esc_html($this->title) ."</h3>";
			echo "\n    <span class='input_wrap'><input type='text' value='' placeholder = '".esc_html__('Enter Name of the new Widget Area', 'rigel' )."' name='pix-add-widget' /></span>";
			echo "\n    <input class='button button button-primary' type='submit' value='".esc_html__('Add Widget Area', 'rigel' )."' />";
			echo "\n    ".$nonce;
			echo "\n  </form>";
			echo "\n</script>\n";
		}

		function add_sidebar_area() {
			if(!empty($_POST['pix-add-widget'])){
				$this->sidebars = get_option( $this->stored) ;
				$name = $this->get_name( $_POST['pix-add-widget'] );

				if( empty($this->sidebars) ){
					$this->sidebars = array( $name );
				}
				else{
					$this->sidebars = array_merge( $this->sidebars, array( $name ) );
				}

				update_option( $this->stored, $this->sidebars );
				wp_redirect( admin_url( 'widgets.php' ) );
				die();
			}
		}
				
		function delete_sidebar_area(){
			check_ajax_referer( 'pix-delete-sidebar' );

			if( !empty($_POST['name']) ) {
				$name = stripslashes($_POST['name']);
				$this->sidebars = get_option( $this->stored );

				if( ( $key = array_search( $name, $this->sidebars ) ) !== false ) {
					unset( $this->sidebars[$key] );
					update_option( $this->stored, $this->sidebars );
					echo "sidebar-deleted";
				}
			}

			die();
		}
		
		function get_name( $name ){
			if( empty( $GLOBALS['wp_registered_sidebars'] ) ) return $name;

			$taken = array();
			foreach ( $GLOBALS['wp_registered_sidebars'] as $sidebar ){
				$taken[] = $sidebar['name'];
			}

			if( empty( $this->sidebars ) ) $this->sidebars = array();
			$taken = array_merge( $taken, $this->sidebars );

			if( in_array( $name, $taken ) ){
				$counter  = substr( $name, -1 );  
				$new_name = "";

				if( !is_numeric( $counter ) ){
					$new_name = $name . " 1";
				}
				else {
					$new_name = substr( $name, 0, -1 ) . ( ( int ) $counter + 1 );
				}

				$name = $this->get_name( $new_name );
			}

			return $name;
		}			
				
		function register_custom_sidebars(){
		
			if(empty($this->sidebars)) $this->sidebars = get_option($this->stored);

			$args = array(
				'before_widget' => '<div class="widget %2$s clearfix">', 
				'after_widget'  => '</div>', 
				'before_title'  => '<h3 class="widgettitle">', 
				'after_title'   => '</h3>'
			);
				
			$args = apply_filters('pix_custom_widget_args', $args);

			if( is_array( $this->sidebars ) ){
				foreach ( $this->sidebars as $sidebar ){	
					$args['name']  = $sidebar;
					$args['id']  =  str_replace( ' ', '-', strtolower( $sidebar ) );
					$args['class'] = 'pix-custom';
					register_sidebar( $args );
				}
			}
		}
		
	}
}

new RigelSidebar();
