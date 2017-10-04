<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Funtions Required For Header
 *
 * @return required meta tags and link tags for favicon, Apple Touch Icon etc
 */

if ( ! function_exists( 'rigel_head' ) ) {

	function rigel_head() { 
		global $smof_data;

		$mobile_responsive = isset( $smof_data['mobile_responsive'] ) ? $smof_data['mobile_responsive'] : 1;

		$rigel_theme_pri_color = isset( $smof_data['pri_color'] ) ? $smof_data['pri_color'] : '';

		if ( '1' == $mobile_responsive ) : ?>

			<meta name="HandheldFriendly" content="True">
			<meta name="MobileOptimized" content="320">
			<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, minimum-scale=1.0"/>

		<?php
		endif;

		// Apple Touch Icon
		if ( isset( $smof_data['apple_touch_icon'] ) && !empty( $smof_data['apple_touch_icon'] ) ) : ?>
			<link rel="apple-touch-icon" href="<?php echo esc_url($smof_data['apple_touch_icon']); ?>">		
		<?php
		endif;

		// For Android L header		
		if ( ! empty( $rigel_theme_pri_color ) ) : ?>
		<meta name="theme-color" content="<?php echo esc_attr( $rigel_theme_pri_color ); ?>">
		<?php
		endif;
	}

}


/* =============================================================================
Page Headers
========================================================================== */
//Social Icons
function rigel_social_icons() {
	global $smof_data;
	$facebook = isset($smof_data['top_facebook']) ? $smof_data['top_facebook'] : '';
	$twitter = isset($smof_data['top_twitter']) ? $smof_data['top_twitter'] : '';
	$gplus = isset($smof_data['top_gplus']) ? $smof_data['top_gplus'] : '';
	$linkedIn = isset($smof_data['top_linkedin']) ? $smof_data['top_linkedin'] : '';
	$dribble = isset($smof_data['top_dribble']) ? $smof_data['top_dribble'] : '';
	$flickr = isset($smof_data['top_flickr']) ? $smof_data['top_flickr'] : '';
	$pinterest = isset($smof_data['top_pinterest']) ? $smof_data['top_pinterest'] : '';
	$tumblr  = isset($smof_data['top_tumblr']) ? $smof_data['top_tumblr'] : '';
	$rss = isset($smof_data['top_rss']) ? $smof_data['top_rss'] : '';
	$instagram  = isset($smof_data['top_instagram']) ? $smof_data['top_instagram'] : '';

	$social_icons = '<div class="header-elem"><p class="social-icons">';

	if( !empty( $facebook ) ) {
		$social_icons .= '<a href="'.esc_url( $facebook ).'" target="_blank" title="Facebook" class="facebook"><i class="pixicon-facebook"></i></a>';
	}

	if( !empty( $twitter ) ) {
		$social_icons .= '<a href="'.esc_url( $twitter ).'" target="_blank" title="Twitter" class="twitter"><i class="pixicon-twitter"></i></a>';
	}

	if( !empty( $gplus ) ) {
		$social_icons .= '<a href="'. esc_url( $gplus ).'" target="_blank" title="Gplus" class="google-plus"><i class="pixicon-gplus"></i></a>';
	}

	if( !empty( $linkedIn ) ) {
		$social_icons .= '<a href="'. esc_url( $linkedIn ).'" target="_blank" title="linkedin" class="linkedin"><i class="pixicon-linked-in"></i></a>';
	}

	if( !empty( $dribble ) ) {
		$social_icons .= '<a href="'. esc_url( $dribble ).'" target="_blank" title="Dribble" class="dribbble"><i class="pixicon-dribbble"></i></a>';
	}

	if( !empty( $flickr ) ) {
		$social_icons .= '<a href="'. esc_url( $flickr ).'" target="_blank" title="Flickr" class="flickr"><i class="pixicon-flickr"></i></a>';
	}

	if( !empty( $pinterest ) ) {
		$social_icons .= '<a href="'. esc_url( $pinterest ).'" target="_blank" title="Pinterest" class="pinterest"><i class="pixicon-pinterest"></i></a>';
	}

	if( !empty( $tumblr ) ) {
		$social_icons .= '<a href="'. esc_url( $tumblr ).'" target="_blank" title="Tumblr" class="tumblr"><i class="pixicon-tumblr"></i></a>';
	}

	if( !empty( $rss ) ) {
		$social_icons .= '<a href="'. esc_url( $rss ).'" target="_blank" title="RSS" class="rss"><i class="pixicon-rss"></i></a>';
	}

	if( !empty( $instagram ) ) {
		$social_icons .= '<a href="'. esc_url( $instagram ).'" target="_blank" title="Instagram" class="instagram"><i class="pixicon-instagram"></i></a>';
	}

	$social_icons .= '</p></div>';

	return $social_icons;
}

// Header Info
function rigel_header_contact_info_tel() {
	global $smof_data;
	$top_tel = isset($smof_data['top_tel']) ? $smof_data['top_tel'] : '';

	if( !empty( $top_tel ) ) { 
		$header_info = '<div class="header-elem"><p class="top-details clearfix">';
			$header_info .= '<span><i class="pixs pix-telephone"></i>'.esc_html( $top_tel ).'</span>';
		$header_info .= '</p></div>';
	}	

	return $header_info;
}

// Header Info
function rigel_header_contact_info_email() {
	global $smof_data;
	$top_email = isset($smof_data['top_email']) ? $smof_data['top_email'] : '';


	if( !empty($top_email)) {
		$header_info = '<div class="header-elem"><p class="top-details clearfix">';
			$header_info .= '<span><a href="mailto:'. sanitize_email( $top_email ) .'"><i class="pixs pix-mail"></i> '. esc_html( $top_email ) .'</a></span>';
		$header_info .= '</p></div>';
	}

	return $header_info;
}

// Header Search
function rigel_header_search() {
	global $smof_data;
	$search = isset($smof_data['top_search']) ? $smof_data['top_search'] : '1';
	$search_text = isset($smof_data['search_text']) ? $smof_data['search_text'] : 'Search';
	if( $search == 1) {
		$form = '<div class="search-btn"><i class="pix-icon pixicon-elegant-search"></i><form role="search" method="get" class="topSearchForm" action="' . esc_url(home_url( '/' ) ) . '" ><input type="text" value="' . esc_attr( get_search_query() ) . '" name="s" class="textfield" placeholder="'.esc_attr( $search_text ).'" autocomplete="off"></form></div>';
	}else{
		$form = '';
	}
	return $form;
}


/*------------[ Header Elements ]-------------*/
function rigel_display_header_elements( $elems, $header_pos = 'default-header-lang', $page_side = '' ){

	if( $elems == 'tel' ){

		echo rigel_header_contact_info_tel();	

	}elseif( $elems == 'email' ){

		echo rigel_header_contact_info_email();

	}elseif( $elems == 'lang' ){

		if( class_exists( 'SitePress' ) ) {
			echo '<div class="header-elem">';
				echo '<div class="default-header-lang '. esc_attr( $header_pos ) . ' '. esc_attr( $page_side ) .'">';
				rigel_languages_list(); 
				echo '</div>';
			echo '</div>';
		}	

	}elseif( $elems == 'cart' ){

		rigel_woo_cart();	

	}elseif( $elems == 'sicons' ){

		echo rigel_social_icons();

	}elseif( $elems == 'menu' ){

		echo '<div class="header-elem">';
			rigel_top_nav();	
		echo '</div>';

	}elseif( $elems == 'search' ){

		echo '<div class="header-elem">';
			get_search_form();			
		echo '</div>';

	}elseif( $elems == 'text' ){
		$top_text = rigel_get_option_value( 'top_text', '' );
		if( !empty( $top_text ) ){
			echo '<div class="header-elem">';
				echo '<p>'. esc_html( $top_text ) .'</p>';	
			echo '</div>';
		}		

	}elseif( $elems == 'search_icon' ){

		echo '<div class="header-elem">';
			echo rigel_header_search();
		echo '</div>';
	}elseif( $elems == 'copyright_text' ){

		echo '<div class="header-elem">';

			$copyright_allowed_html_array = array(
				'a' => array(
					'href' => array(),
					'title' => array()
					),
				'p' => array()
			);
			

			$f_copyright_t = rigel_get_option_value( 'f_copyright_t', shortcode_exists( 'blog-link' ) ? sprintf( __( '<p>&copy; %s %s, All Rights Reserved.</p>', 'rigel' ), date( 'Y' ), do_shortcode( '[blog-link]' ) ) : sprintf( __( '<p>&copy; %s %s, All Rights Reserved.</p>', 'rigel' ), date( 'Y' ), get_bloginfo( 'name' ) ) );

			echo $f_copyright_t;

		echo '</div>';
	}
}

/*------------[ Preloader ]-------------*/
if ( ! function_exists( 'rigel_preloader' ) ){

	function rigel_preloader(){
		global $smof_data;
		$rigel_preloader = isset($smof_data['rigel_preloader']) ? $smof_data['rigel_preloader'] : 0;

		if(  ! isset( $_GET['vc_editable'] ) && ( isset( $smof_data['rigel_preloader'] ) && ( true == $smof_data['rigel_preloader'] ) ) ) : ?>
			<div id="preloader-con">
				<div class="preloader preloader-1"></div>
			</div>
		<?php
		endif;
	}

}


/* WOO Cart */

function rigel_woo_cart(){

	global $smof_data;
	$show_cart_btn = 1;
	if($show_cart_btn){

		if (class_exists('Woocommerce')) {
			global $woocommerce; 
			echo '<div class="header-elem"><div class="pix-cart">';
	?>      

			<div class="cart-trigger">
				<div class="pix-cart-contents-con">					
					<a class="pix-cart-contents" href="<?php echo esc_url($woocommerce->cart->get_cart_url()); ?>" title="<?php _e('View your shopping cart', 'rigel' ); ?>"><span class="pixicon-cart pix-cart-icon"></span><span class="pix-item-icon"><?php echo esc_html($woocommerce->cart->cart_contents_count); ?></span></a>
				</div>

				<?php
					if( !is_cart() && !is_checkout()){
						//Dropwon widget 
						echo '<div class="woo-cart-dropdown">';
							// woocommerce_mini_cart();
						the_widget('WC_Widget_Cart');
						echo '</div>';
					}
				?>

			</div>
			   
	<?php    
			echo '</div></div>';

		}

	}
}
