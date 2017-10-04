<?php

/*
Register Fonts
*/
function rigel_theme_fonts_url() {

    global $smof_data;

    $font_url = '';

	if (!is_admin()) {

		$protocol = is_ssl() ? 'https' : 'http';

		//Subset
		$raw_subsets = (isset($smof_data['subset'])) ? $smof_data['subset'] : array("latin" => 1);

		$font_subsets = '';
		foreach ($raw_subsets as $key => $value) {
			if($value){
				$font_subsets .= $key .',';
			}
		}
		$font_subsets = rtrim($font_subsets, ",");

		//Advanced font Settings
		$afs = isset($smof_data['ad_font_settings']) ? $smof_data['ad_font_settings'] : '0';

		//Body Font
		$body_font = (isset($smof_data['custom_font_body']['g_face'])) ? $smof_data['custom_font_body']['g_face'] : 'Lato';
		$body_font .= (isset($smof_data['custom_font_body']['style'])) ? 
						':'.$smof_data['custom_font_body']['style'].','.$smof_data['custom_font_body']['style'].'italic,700,700italic' :
						':400,400italic,700,700italic';

		//Heading Font
		$headings_font = (isset($smof_data['custom_font_primary']['g_face'])) ? '|'.$smof_data['custom_font_primary']['g_face'] : '|montserrat';
		$headings_font .= (isset($smof_data['custom_font_primary']['style'])) ? 
						':'.$smof_data['custom_font_primary']['style'].','.$smof_data['custom_font_primary']['style'].'italic,400' :
						':700,700italic';

		//Content Fonts custom_font_content
		$sec_font = (isset($smof_data['custom_font_content']['g_face'])) ? '|'.$smof_data['custom_font_content']['g_face'] : '|Crimson+Text';
		$sec_font .= (isset($smof_data['custom_font_content']['style'])) ? 
						':'.$smof_data['custom_font_content']['style'].','.$smof_data['custom_font_content']['style'].'italic,700' :
						':400,700';

		if($afs == '0'){ 			

			/*
		    Translators: If there are characters in your language that are not supported
		    by chosen font(s), translate this to 'off'. Do not translate into your own language.
		     */

		    if ( 'off' !== _x( 'on', 'Google font: on or off', 'rigel' ) ) {
		        $font_url = add_query_arg( 'family', urlencode($body_font.$headings_font.$sec_font .'&subset='. $font_subsets), "//fonts.googleapis.com/css" );
		    }
		}
		else { // it runs only advance typography option is turned on

			//H1 Custom Font
			$h1 = (isset($smof_data['cf_h1']['g_face'])) ? '|'.$smof_data['cf_h1']['g_face'] : '';
			$h1 .= (isset($smof_data['cf_h1']['style'])) ? ':'.$smof_data['cf_h1']['style'] : '';

			//H2 Custom Font
			$h2 = (isset($smof_data['cf_h2']['g_face'])) ? '|'.$smof_data['cf_h2']['g_face'] : '';
			$h2 .= (isset($smof_data['cf_h2']['style'])) ? ':'.$smof_data['cf_h2']['style'] : '';

			//H3 Custom Font
			$h3 = (isset($smof_data['cf_h3']['g_face'])) ? '|'.$smof_data['cf_h3']['g_face'] : '';
			$h3 .= (isset($smof_data['cf_h3']['style'])) ? ':'.$smof_data['cf_h3']['style'] : '';

			//H4 Custom Font
			$h4 = (isset($smof_data['cf_h4']['g_face'])) ? '|'.$smof_data['cf_h4']['g_face'] : '';
			$h4 .= (isset($smof_data['cf_h4']['style'])) ? ':'.$smof_data['cf_h4']['style'] : '';

			//H5 Custom Font
			$h5 = (isset($smof_data['cf_h5']['g_face'])) ? '|'.$smof_data['cf_h5']['g_face'] : '';
			$h5 .= (isset($smof_data['cf_h5']['style'])) ? ':'.$smof_data['cf_h5']['style'] : '';

			//H6 Custom Font
			$h6 = (isset($smof_data['cf_h6']['g_face'])) ? '|'.$smof_data['cf_h6']['g_face'] : '';
			$h6 .= (isset($smof_data['cf_h6']['style'])) ? ':'.$smof_data['cf_h6']['style'] : '';

			//List Item Font
			$list = (isset($smof_data['cf_list']['g_face'])) ? '|'.$smof_data['cf_list']['g_face'] : '';
			$list .= (isset($smof_data['cf_list']['style'])) ? ':'.$smof_data['cf_list']['style'] : '';

			//Link Font
			$link = (isset($smof_data['cf_link']['g_face'])) ? '|'.$smof_data['cf_link']['g_face'] : '';
			$link .= (isset($smof_data['cf_link']['style'])) ? ':'.$smof_data['cf_link']['style'] : '';

			//Logo Font
			$logo = (isset($smof_data['cf_logo']['g_face'])) ? '|'.$smof_data['cf_logo']['g_face'] : '';
			$logo .= (isset($smof_data['cf_logo']['style'])) ? ':'.$smof_data['cf_logo']['style'] : '';

			//BlockQuote Font
			$blockquote = (isset($smof_data['cf_blockquote']['g_face'])) ? '|'.$smof_data['cf_blockquote']['g_face'] : '';
			$blockquote .= (isset($smof_data['cf_blockquote']['style'])) ? ':'.$smof_data['cf_blockquote']['style'] : '';

			//BlockQuote Font
			$menu = (isset($smof_data['cf_menu']['g_face'])) ? '|'.$smof_data['cf_menu']['g_face'] : '';
			$menu .= (isset($smof_data['cf_menu']['style'])) ? ':'.$smof_data['cf_menu']['style'] : '';

			//Menu Font
			$menu = (isset($smof_data['cf_menu']['g_face'])) ? '|'.$smof_data['cf_menu']['g_face'] : '';
			$menu .= (isset($smof_data['cf_menu']['style'])) ? ':'.$smof_data['cf_menu']['style'] : '';

			//Sub Menu Font
			$sub_menu = (isset($smof_data['cf_sub_menu']['g_face'])) ? '|'.$smof_data['cf_sub_menu']['g_face'] : '';
			$sub_menu .= (isset($smof_data['cf_sub_menu']['style'])) ? ':'.$smof_data['cf_sub_menu']['style'] : '';

			//Mega Menu Font
			$mega_menu = (isset($smof_data['cf_mega_menu']['g_face'])) ? '|'.$smof_data['cf_mega_menu']['g_face'] : '';
			$mega_menu .= (isset($smof_data['cf_mega_menu']['style'])) ? ':'.$smof_data['cf_mega_menu']['style'] : '';

			//Main Title Font
			$main_title = (isset($smof_data['cf_main_title']['g_face'])) ? '|'.$smof_data['cf_main_title']['g_face'] : '';
			$main_title .= (isset($smof_data['cf_main_title']['style'])) ? ':'.$smof_data['cf_main_title']['style'] : '';

			//Button Font
			$btn = (isset($smof_data['cf_btn']['g_face'])) ? '|'.$smof_data['cf_btn']['g_face'] : '';
			$btn .= (isset($smof_data['cf_btn']['style'])) ? ':'.$smof_data['cf_btn']['style'] : '';

			//Small Button Font
			$btn_small = (isset($smof_data['cf_btn_small']['g_face'])) ? '|'.$smof_data['cf_btn_small']['g_face'] : '';
			$btn_small .= (isset($smof_data['cf_btn_small']['style'])) ? ':'.$smof_data['cf_btn_small']['style'] : '';

			//Large Button Font
			$btn_lg = (isset($smof_data['cf_btn_lg']['g_face'])) ? '|'.$smof_data['cf_btn_lg']['g_face'] : '';
			$btn_lg .= (isset($smof_data['cf_btn_lg']['style'])) ? ':'.$smof_data['cf_btn_lg']['style'] : '';

			//Process Title Font
			$process_title = (isset($smof_data['cf_process_title']['g_face'])) ? '|'.$smof_data['cf_process_title']['g_face'] : '';
			$process_title .= (isset($smof_data['cf_process_title']['style'])) ? ':'.$smof_data['cf_process_title']['style'] : '';

			//Process Content Font
			$process_content = (isset($smof_data['cf_process_content']['g_face'])) ? '|'.$smof_data['cf_process_content']['g_face'] : '';
			$process_content .= (isset($smof_data['cf_process_content']['style'])) ? ':'.$smof_data['cf_process_content']['style'] : '';

			//Percent Text Font
			$percent_text = (isset($smof_data['cf_percent_text']['g_face'])) ? '|'.$smof_data['cf_percent_text']['g_face'] : '';
			$percent_text .= (isset($smof_data['cf_percent_text']['style'])) ? ':'.$smof_data['cf_percent_text']['style'] : '';

			//Percent Outside Font
			$percent_outside = (isset($smof_data['cf_percent_outside']['g_face'])) ? '|'.$smof_data['cf_percent_outside']['g_face'] : '';
			$percent_outside .= (isset($smof_data['cf_percent_outside']['style'])) ? ':'.$smof_data['cf_percent_outside']['style'] : '';

			//Textfield Font
			$txtfield = (isset($smof_data['cf_txtfield']['g_face'])) ? '|'.$smof_data['cf_txtfield']['g_face'] : '';
			$txtfield .= (isset($smof_data['cf_txtfield']['style'])) ? ':'.$smof_data['cf_txtfield']['style'] : '';

			//Staff Title Font
			$staff_title = (isset($smof_data['cf_staff_title']['g_face'])) ? '|'.$smof_data['cf_staff_title']['g_face'] : '';
			$staff_title .= (isset($smof_data['cf_staff_title']['style'])) ? ':'.$smof_data['cf_staff_title']['style'] : '';

			//Portfolio Filter Normal Font
			$filter_normal = (isset($smof_data['cf_filter_normal']['g_face'])) ? '|'.$smof_data['cf_filter_normal']['g_face'] : '';
			$filter_normal .= (isset($smof_data['cf_filter_normal']['style'])) ? ':'.$smof_data['cf_filter_normal']['style'] : '';

			//Pricing Table Title Font
			$plan_title = (isset($smof_data['cf_plan_title']['g_face'])) ? '|'.$smof_data['cf_plan_title']['g_face'] : '';
			$plan_title .= (isset($smof_data['cf_plan_title']['style'])) ? ':'.$smof_data['cf_plan_title']['style'] : '';

			//Pricing Table Price Font
			$plan_value = (isset($smof_data['cf_plan_value']['g_face'])) ? '|'.$smof_data['cf_plan_value']['g_face'] : '';
			$plan_value .= (isset($smof_data['cf_plan_value']['style'])) ? ':'.$smof_data['cf_plan_value']['style'] : '';

			//Pricing Table Currency Font
			$plan_valign = (isset($smof_data['cf_plan_valign']['g_face'])) ? '|'.$smof_data['cf_plan_valign']['g_face'] : '';
			$plan_valign .= (isset($smof_data['cf_plan_valign']['style'])) ? ':'.$smof_data['cf_plan_valign']['style'] : '';

			//Pricing Table Plan Month Font
			$plan_month = (isset($smof_data['cf_plan_month']['g_face'])) ? '|'.$smof_data['cf_plan_month']['g_face'] : '';
			$plan_month .= (isset($smof_data['cf_plan_month']['style'])) ? ':'.$smof_data['cf_plan_month']['style'] : '';

			//Testimonial Content Font
			$testimonial_content = (isset($smof_data['cf_testimonial_content']['g_face'])) ? '|'.$smof_data['cf_testimonial_content']['g_face'] : '';
			$testimonial_content .= (isset($smof_data['cf_testimonial_content']['style'])) ? ':'.$smof_data['cf_testimonial_content']['style'] : '';

			//Widget Title Font
			$widget_title = (isset($smof_data['cf_widget_title']['g_face'])) ? '|'.$smof_data['cf_widget_title']['g_face'] : '';
			$widget_title .= (isset($smof_data['cf_widget_title']['style'])) ? ':'.$smof_data['cf_widget_title']['style'] : '';

			//Twitter Content Font
			$cf_twitter = (isset($smof_data['cf_twitter']['g_face'])) ? '|'.$smof_data['cf_twitter']['g_face'] : '';
			$cf_twitter .= (isset($smof_data['cf_twitter']['style'])) ? ':'.$smof_data['cf_twitter']['style'] : '';

			/*
		    Translators: If there are characters in your language that are not supported
		    by chosen font(s), translate this to 'off'. Do not translate into your own language.
		     */

		    if ( 'off' !== _x( 'on', 'Google font: on or off', 'rigel' ) ) {
		        $font_url = add_query_arg( 'family', urlencode($body_font.$headings_font.$sec_font.$h1.$h2.$h3.$h4.$h5.$h6.$list.$link.$logo.$blockquote.$menu.$sub_menu.$mega_menu.$main_title.$btn.$btn_small.$btn_lg.$process_title.$process_content.$percent_text.$percent_outside.$txtfield.$staff_title.$filter_normal.$plan_title.$plan_value.$plan_valign.$plan_month.$testimonial_content.$widget_title.$cf_twitter .'&subset='. $font_subsets), "//fonts.googleapis.com/css" );
		     
		    }
		}


	}	    
    
    return $font_url;
}
/*
Enqueue scripts and styles.
*/
function rigel_theme_fonts_scripts() {
    wp_enqueue_style( 'pix_theme_fonts', rigel_theme_fonts_url(), array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'rigel_theme_fonts_scripts' );


// functions run on activation –> important flush to clear rewrites
/*if ( is_admin() && isset($_GET['activated'] ) && isset( $pagenow ) && $pagenow == 'themes.php' ) {
	$wp_rewrite->flush_rules();
}*/

//New Excerpt
function rigel_custom_excerpt_length( $length ) {
	global $smof_data;
	$blog_description_length = isset($smof_data['blog_description_length']) ? $smof_data['blog_description_length'] : '';
	if(empty($blog_description_length)){
		$blog_description_length = 580;
	}
	return $blog_description_length;
}
add_filter( 'excerpt_length', 'rigel_custom_excerpt_length', 999 );

/**
* Retina images
*
* This function is attached to the 'wp_generate_attachment_metadata' filter hook.
*/
function rigel_retina_support_attachment_meta( $metadata, $attachment_id ) {
	foreach ( $metadata as $key => $value ) {
		if ( is_array( $value ) ) {
			foreach ( $value as $image => $attr ) {
				if ( is_array( $attr ) )
					rigel_retina_support_create_images( get_attached_file( $attachment_id ), $attr['width'], $attr['height'], true );
			}
		}
	}

	return $metadata;
}
add_filter( 'wp_generate_attachment_metadata', 'rigel_retina_support_attachment_meta', 10, 2 );

/**
* Create retina-ready images
*
* Referenced via rigel_retina_support_attachment_meta().
*/
function rigel_retina_support_create_images( $file, $width, $height, $crop = false ) {
	if ( $width || $height ) {
		$resized_file = wp_get_image_editor( $file );
		if ( ! is_wp_error( $resized_file ) ) {
			$filename = $resized_file->generate_filename( $width . 'x' . $height . '@2x' );

			$resized_file->resize( $width * 2, $height * 2, $crop );
			$resized_file->save( $filename );

			$info = $resized_file->get_size();

			return array(
				'file' => wp_basename( $filename ),
				'width' => $info['width'],
				'height' => $info['height'],
				);
		}
	}
	return false;
}


/**
* Delete retina-ready images
*
* This function is attached to the 'delete_attachment' filter hook.
*/
function rigel_delete_retina_support_images( $attachment_id ) {
	$meta = wp_get_attachment_metadata( $attachment_id );
	$upload_dir = wp_upload_dir();
	if( !empty($meta) ) {
		$path = pathinfo( $meta['file'] );
		foreach ( $meta as $key => $value ) {
			if ( 'sizes' === $key ) {
				foreach ( $value as $sizes => $size ) {
					$original_filename = $upload_dir['basedir'] . '/' . $path['dirname'] . '/' . $size['file'];
					$retina_filename = substr_replace( $original_filename, '@2x.', strrpos( $original_filename, '.' ), strlen( '.' ) );
					if ( file_exists( $retina_filename ) )
						unlink( $retina_filename );
				}
			}
		}
	}
}
add_filter( 'delete_attachment', 'rigel_delete_retina_support_images' );

//Seperate font weight & font Style

if(!function_exists('rigel_font_variant')){
	function rigel_font_variant($fv = ''){

	    //Font Style
	    if(stristr($fv, 'italic') !== FALSE){
	        $fs = 'italic';
	    }else{
	        $fs = 'normal';
	    }

	    //Font Weight
	    $fw = substr($fv, 0, 3);
	    if($fw === FALSE || $fw == 'reg' || $fw == 'ita'){
	        $fw = '400';
	    }

	    return array($fs, $fw);
	}
}

// convert hex to rgba
function rigel_hex2rgb($hex) {
	$hex = str_replace("#", "", $hex);

	if(strlen($hex) == 3) {
		$r = hexdec(substr($hex,0,1).substr($hex,0,1));
		$g = hexdec(substr($hex,1,1).substr($hex,1,1));
		$b = hexdec(substr($hex,2,1).substr($hex,2,1));
	} else {
		$r = hexdec(substr($hex,0,2));
		$g = hexdec(substr($hex,2,2));
		$b = hexdec(substr($hex,4,2));
	}
	$rgb = array($r, $g, $b);
return implode(",", $rgb); // returns the rgb values separated by commas
//return $rgb; // returns an array with the rgb values
}

//Page Title Bar
function rigel_sub_banner( $title, $title_bar_size, $title_bar_style, $title_bar_bg_image, $title_bar_bg_color, $title_bar_text_color, $breadcrumbs, $s_header = 'sub_header1', $s_header_trans = 0 ) {

	global $smof_data;

	$s_header = 'sub-'.$s_header;

	$color = $class_con = $class_left = $class_right = $style = '';
	if ( $title_bar_size == 'small' ) {
		$rigel_header_text = 'left';	
	}else {
		$rigel_header_text = 'center';
	}

	if( $rigel_header_text == 'left' ){
		$class_left = 'col-md-8 col-sm-8';
		$class_right = 'col-md-4 col-sm-4';
		$class_con = 'row';
	}
	
	if(($title_bar_style == 'custom') && (!empty($title_bar_bg_image) || !empty($title_bar_bg_color) || !empty($title_bar_text_color))){

		$style .= ' style="';

			if( $title_bar_style == 'custom' && !empty($title_bar_bg_color)){
				$style .= !empty($title_bar_bg_color) ? 'background-color:'. $title_bar_bg_color .';' : '';
			}

			if( $title_bar_style == 'custom' && !empty($title_bar_bg_image)){
				$style .= 'background-image: url('.$title_bar_bg_image.');';
				$style .= 'background-size: cover;';
				$style .= 'background-repeat: no-repeat;background-position: center center;';
			}

			if( $title_bar_style == 'custom' && !empty($title_bar_text_color)){
				$color = !empty($title_bar_text_color) ? 'style="color:'. $title_bar_text_color .';"' : '';
			}

		$style .= '"';
	}

	echo '<div id="sub-header" class="clear '. $s_header .' '. (( 'enabled' == $s_header_trans ) ? 'header-trans' : '' ) .' clearfix align-'. $rigel_header_text .' '. $title_bar_size .' '. $title_bar_style .'" '. $style .'>
	<div class="container">
	<div id="banner" class="sub-header-inner '.$class_con.'">
		<header class="banner-header '. $class_left .'">
			<h2 '. $color .'>' . $title . '</h2>
		</header>
		<div class="pix-breadcrumbs '. $class_right .'">';
			$breadcrumbs_blog = isset($smof_data['blog_page_title']) ? $smof_data['blog_page_title'] : esc_html__('Blog', 'rigel');

			if( $breadcrumbs == 'show' ){

				if( function_exists('rigel_breadcrumbs') && !is_singular( 'post' ) ) {

					if ( !is_home() ){
						rigel_breadcrumbs();
						
					}    
					elseif (is_home()){
						echo '<ul class="breadcrumb"><li><a href="' . esc_url(home_url( '/' )) . '" '. $color .'>Home</a></li><li> <span class="current" '. $color .'> '. $breadcrumbs_blog .'</span></li></ul>';
					}       
				}
				else if( function_exists('rigel_breadcrumbs') && is_singular( 'post' ) ) {					

					//Get show/hide meta details values from theme option
					$date = rigel_get_option_value( 'single_date', 1 );
					$author = rigel_get_option_value( 'single_author', 1 );
					$category = rigel_get_option_value( 'single_category', 1 );

					rigel_blog_meta( $date, $author, $category );
				}
			}

			echo '</div></div>
		</div>   
	</div>';    
}
//Breadcrumbs
function rigel_breadcrumbs() {

	if( rigel_is_shop() || rigel_is_product() || rigel_is_product_category() || rigel_is_product_tag() ) {

		woocommerce_breadcrumb();

		return;

	}

	$show_on_home = 1; // 1 - show breadcrumbs on the homepage, 0 - don't show
	$delimiter = ''; // delimiter between crumbs
	$home = esc_html__( 'Home', 'rigel' ); // text for the 'Home' link
	$show_current = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
	$before = '<span class="current">'; // tag before the current crumb
	$after = '</span>'; // tag after the current crumb

	global $post;
	$homeLink = home_url( '/' );

	if ( is_home() || is_front_page() ) {

		if ( $show_on_home == 1 ) {
			echo '<ul class="breadcrumb"><li><a href="' . esc_url( $homeLink ) . '">' . ucwords( $home ) . '</a></li></ul>';
		}

	}
	else {

		echo '<ul class="breadcrumb" itemprop="breadcrumb"><li><a href="' . esc_url( $homeLink ) . '">' . ucwords( $home ) . '</a> ' . $delimiter . '</li>';

			if ( is_category() ) {
				global $wp_query;
				$cat_obj = $wp_query->get_queried_object(); 
				$this_cat = $cat_obj->term_id;
				$this_cat = get_category( $this_cat );
				$parent_cat = get_category( $this_cat->parent );
				if ( $this_cat->parent != 0 ) {
					echo ( get_category_parents( $parent_cat, TRUE, ' ' . $delimiter . ' ' ) );
				}
				echo '<li>' .$before . esc_html( single_cat_title( '', false ) ) . $after.'</li>';

			}
			else if ( is_search() ) {
				echo '<li>' . $before . esc_html( 'Search', 'rigel' ) . $after .'</li>';

			}
			else if ( is_day() ) {
				echo '<li><a href="' . esc_url( get_year_link( get_the_time( 'Y' ) ) ) . '">' . esc_html( get_the_time( 'Y' ) ) . '</a> ' . $delimiter . '</li>';
				echo '<li><a href="' . esc_url( get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) ) . '">' . esc_html( get_the_time('F') ) . '</a> ' . $delimiter . '</li>';
				echo '<li>' . $before . esc_html( get_the_time('d') ) . $after . '</li>';

			}
			else if ( is_month() ) {
				echo '<li><a href="' . esc_url( get_year_link( get_the_time( 'Y' ) ) ) . '">' . esc_html( get_the_time('Y') ) . '</a> ' . $delimiter . '</li>';
				echo '<li>' . $before . esc_html( get_the_time('F') ) . $after . '</li>';

			}
			else if ( is_year() ) {
				echo '<li>' . $before . esc_html( get_the_time('Y') ) . $after . '</li>';

			}
			else if ( is_single() && !is_attachment() ) {
				if ( get_post_type() != 'post' ) {
					$post_type = get_post_type_object(get_post_type());
					$slug = $post_type->rewrite;
					if ( $show_current == 1 ){
						echo '<li> ' . $before . ucwords( esc_html( get_the_title() ) ) . $after . '</li>';
					}
				}
				else {
					$cat = get_the_category(); $cat = $cat[0];
					$cats = get_category_parents( $cat, TRUE, ' ' . $delimiter . ' ' );
					if ( $show_current == 0 ){
						$cats = preg_replace("/^(.+)\s$delimiter\s$/", "$1", $cats);
						echo '<li>'. $before . esc_html( $cats ) . $after . '</li>';
					}
					if ( $show_current == 1 ){
						echo '<li>'. $before . ucwords( rigel_shorten_text( esc_html( get_the_title() ), 20 ) ) . $after . '</li>';
					}
				}

			}
			else if ( !is_single() && !is_page() && get_post_type() != 'post' && !rigel_is_shop() && !is_404() ) {

				$post_type = get_post_type_object( get_post_type() );
				echo '<li>'. $before . esc_html( ucwords( $post_type->labels->singular_name ) ) . $after.'</li>';

			}
			else if ( is_attachment() ) {
				$parent = get_post( $post->post_parent );
				$cat = get_the_category( $parent->ID ); 
				if(!empty($cat)){
					$cat = $cat[0];
					echo get_category_parents( $cat, TRUE, ' ' . $delimiter . ' ' );
				}
				echo '<li><a href="' . esc_url( get_permalink( $parent ) ) . '">' . esc_html( ucwords( $parent->post_title ) ) . '</a></li>';
				if ( $show_current == 1 ) {
					echo '<li>' . $delimiter . ' ' . $before . ucwords( esc_html( get_the_title() ) ) . $after . '</li>';
				}

			} 
			elseif ( is_page() && !$post->post_parent ) {
				if ( $show_current == 1 ) {
					echo '<li>' . $before . ucwords( esc_html( get_the_title() ) ) . $after .'</li>';
				}

			}
			elseif ( is_page() && $post->post_parent ) {
				$parent_id  = $post->post_parent;
				$breadcrumbs = array();
				while ($parent_id) {
					$page = get_page( $parent_id );
					$breadcrumbs[] = '<li><a href="' . esc_url( get_permalink( $page->ID ) ) . '">' . esc_html( ucwords( get_the_title( $page->ID ) ) ) . '</a></li>';
					$parent_id  = $page->post_parent;
				}
				$breadcrumbs = array_reverse( $breadcrumbs );
				for ( $i = 0; $i < count( $breadcrumbs ); $i++ ) {
					echo $breadcrumbs[$i]; //escaped Properly on five lines before from here
					if ( $i != count( $breadcrumbs ) -1 ) {
						echo ' ' . $delimiter . ' ';
					}
				}
				if ( $show_current == 1 ) {
					echo '<li>' . $delimiter . ' ' . $before . ucwords( esc_html(get_the_title() ) ) . $after . '</li>';
				}

			}
			elseif ( is_tag() ) {
				echo '<li>' . $before . esc_html__( 'Posts Tag: ', 'rigel' ) . esc_html( ucwords(single_tag_title('', false) . '') ) . $after . '</li>';

			}
			elseif ( is_author() ) {
				global $author;
				$userdata = get_userdata($author);
				echo '<li>' .$before . esc_html__( 'Posted By: ', 'rigel' ) . esc_html( ucwords($userdata->display_name ) ) . $after .'</li>';

			}
			elseif ( is_404() ) {
				echo '<li>' .$before . esc_html__('Error 404', 'rigel' ) . $after .'</li>';
			}

			if ( get_query_var( 'paged' ) ) {
				if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) {
					echo ' (';
						echo esc_html__(' - Page', 'rigel' ) . ' ' . get_query_var( 'paged' );
					echo ')';
				}
			}

		echo '</ul>';

	}
}

/* WMPL */
function rigel_languages_list(){
	if(class_exists('SitePress')){
	
		global $smof_data;

		$show_lang_sel = isset($smof_data['show_lang_sel'])? $smof_data['show_lang_sel'] : 1;

		if($show_lang_sel){
			$lang_display_style = isset($smof_data['wpml_lang_style'])? $smof_data['wpml_lang_style'] : 'normal'; //normal, dropdown
			$lang_list_style = isset($smof_data['language_style'])? $smof_data['language_style'] : 'lang_code'; // lang_code (en / fr / ta), lang_name (english, tamil, french), flag, flag_with_name

			$languages = icl_get_languages('skip_missing=1&orderby=code');
			//var_dump($languages);

			$lang_count = count($languages);
			$count = 1;

			if(1 < $lang_count){
				$trans_status = esc_html__('translated', 'rigel' );			
			}else{
				$trans_status = esc_html__('not-translated', 'rigel' );
			}

			if(!empty($languages)){
				echo '<div id="lang-list" class="lang-'. $lang_display_style .' '. $lang_list_style .' '. $trans_status .'" >';
				if($lang_display_style == 'dropdown'){
						//Check If Drop-down Add Current
						if($lang_display_style == 'dropdown'){

							echo '<div id="lang-dropdown-btn">';
								foreach($languages as $l){
									if($l['active']){
										if($lang_list_style == 'lang_code'){
											echo $l['language_code'];
										}elseif ($lang_list_style == 'lang_name') {
											echo icl_disp_language($l['native_name'], $l['translated_name']);
										}elseif ($lang_list_style == 'flag') {
											if($l['country_flag_url']){
												echo '<img src="'.$l['country_flag_url'].'" height="12" alt="'.$l['language_code'].'" width="18" />';
											}
										}else{
											if($l['country_flag_url']){
												echo '<img src="'.$l['country_flag_url'].'" height="12" alt="'.$l['language_code'].'" width="18" />';
												echo ' ' . icl_disp_language($l['native_name'], $l['translated_name']);
											}
										}
										break;
									}
								}
							if(1 < $lang_count){	
								echo '<span class="pixicon-arrow-angle-down"></span></div>';
							}
							else{
								echo '<span class="already-liked">'. esc_html__('Not Translated','rigel' ) .'</span></div>';
							}
						}

					echo '<div class="lang-dropdown-inner" '. (1 < count($languages))  .'>';
				}

				foreach($languages as $l){

					if($l['active']){
						$active_class = ' class="active"';
					}else{
						$active_class = '';
					}
					// lang_code(en / fr / ta)
					if($lang_list_style == 'lang_code'){

						echo '<a href="'.esc_url($l['url']).'"'. $active_class .'>';
						echo $l['language_code'];
						echo '</a>';

						if($count != $lang_count && $lang_display_style != 'dropdown'){
							echo '<span class="slash">/</span>';
						}

					}
					 // lang_name (english, tamil, french)
					elseif ($lang_list_style == 'lang_name') {

						echo '<a href="'.esc_url($l['url']).'"'. $active_class .'>';
						echo icl_disp_language($l['native_name'], $l['translated_name']);
						echo '</a>';

						if($count != $lang_count && $lang_display_style != 'dropdown'){
							echo '<span class="slash">/</span>';
						}
					}
					// display flag
					elseif ($lang_list_style == 'flag'){

						if($l['country_flag_url']){
							echo '<a href="'.esc_url($l['url']).'"'. $active_class .'>';
							echo '<img src="'.$l['country_flag_url'].'" height="12" alt="'.$l['language_code'].'" width="18" />';
							echo '</a>';
						}
					}
					// flag with name
					elseif($lang_list_style == 'flag_with_name'){
						
						if($l['country_flag_url']){
							echo '<a href="'.esc_url($l['url']).'"'. $active_class .'>';
							echo '<img src="'.$l['country_flag_url'].'" height="12" alt="'.$l['language_code'].'" width="18" />';
							echo ' ' . icl_disp_language($l['native_name'], $l['translated_name']);
							echo '</a>';
						}
				
					}
					$count++;
				}

				if($lang_display_style == 'dropdown'){
					echo '</div>';
				}
				echo '</div>';
			}
		}
	}
}

function rigel_get_page_title() {

	if (is_home()) {
		global $smof_data;
		$page_title = isset($smof_data['blog_page_title']) ? $smof_data['blog_page_title'] : esc_html__('Blog', 'rigel' );
	}

	else if (is_category()) {
		$page_title = esc_html__('Posts Categorized:', 'rigel' ) . ' ' . single_cat_title( $prefix = '', $display = false );
	}

	elseif (is_tag()) { 
		$page_title = esc_html__('Posts Tagged:', 'rigel' ) . ' ' . single_tag_title( $prefix = '', $display = false );
	}

	elseif (is_author()) { 
		global $post;
		$author_id = $post->post_author;

		$page_title = esc_html__('Posts By:', 'rigel' ) . ' ' . get_the_author_meta('display_name', $author_id);

	}

	elseif (is_day()) { 
		$page_title = esc_html__('Daily Archives:', 'rigel' ) . ' ' . get_the_time('l, F j, Y');
	}

	elseif (is_month()) {  
		$page_title = esc_html__('Monthly Archives:', 'rigel' ) . ' ' . get_the_time('F Y');
	}

	elseif (is_year()) {  
		$page_title = esc_html__('Posts Categorized:', 'rigel' ) . ' ' . get_the_time('Y');
	}

	elseif (is_search()) {  
		$page_title = esc_html__('Search Result: ', 'rigel' ) .get_search_query();
	}

	elseif (is_404()) {  
		$page_title = esc_html__('404 Error', 'rigel' );
	}

	elseif (rigel_is_shop()) {  
		$page_title = isset($smof_data['shop_title']) ? $smof_data['shop_title'] : esc_html__('Shop', 'rigel' );
	}

	else {  
		$page_title = esc_html(get_the_title());
	}

	return $page_title;
}


if( !function_exists( 'rigel_pagination' ) ) {

	// Return pagination style
    function rigel_pagination( $args = array(), $values = array() ) {

        //Empty assignment
        $output = '';        

        // Set max number of pages
        if( $args == '' ) {
            global $wp_query;
            $max_num_pages = $wp_query->max_num_pages;
            if ( $max_num_pages <= 1 )
                return;
        }
        else {
            // Assign and call query
            $q = new WP_Query( $args );
            $max_num_pages = $q->max_num_pages;
            if ( $max_num_pages <= 1 )
                return;
        } 

        // Set page number
        if( get_query_var( 'paged' ) ) {
            $paged = get_query_var( 'paged' );
        }
        elseif( get_query_var( 'page' ) ) {
            $paged = get_query_var( 'page' );
        }
        else {
            $paged = 1;
        }

        // Add max number of pages to the values array
        $values['max']   = $max_num_pages;
        $values['prefix'] = rigel_get_prefix();

        if( 'load_more' == $values['style'] ) {

            $output .= "<div id='load-more-btn' class='load-more-btn'>

            	<div class='load-more-inner'>
	                <a href='#' class='btn btn-solid' data-paged='". esc_attr( $paged ) ."' data-args='". json_encode( $args ) ."' data-values='". json_encode( $values ) ."'>". esc_html( $values['loadmore_text'] ) ."</a>

	                <div class='spinner' style='display: none;'>
						<div class='preloader1'></div>
					</div>
				</div>

            </div>";

        }
        elseif( 'autoload' == $values['style'] ) {
            $output .= "<div id='load-more-btn' class='load-more-btn amz-autoload'>
            	<div class='load-more-inner'>
	                <a href='#' class='btn btn-solid' data-paged='". esc_attr( $paged ) ."' data-args='". json_encode( $args ) ."' data-values='". json_encode( $values ) ."'>". esc_html( $values['loadmore_text'] ) ."</a>

	                <div class='spinner' style='display: none;'>
						<div class='preloader1'></div>
					</div>
				</div>
				
            </div>";
        }
        elseif( 'number' == $values['style']  ) {

            $bignum = 999999999; 

            $base = str_replace( $bignum, '%#%', esc_url( get_pagenum_link($bignum) ) );
        
            $pagination = paginate_links( array(
                'base'         => $base,
                'format'       => '',
                'current'      => max( 1, $paged ),
                'total'        => $max_num_pages,
                'prev_text'    => '&larr;',
                'next_text'    => '&rarr;',
                'type'         => 'list',
                'end_size'     => 3,
                'mid_size'     => 3
            ) );

            $output .= '<nav class="pagination clearfix">';
                $output .= $pagination;
            $output .= '</nav>';

        }
        elseif( 'text' == $values['style']  ) {
            if( get_next_posts_link() || get_previous_posts_link() ) {
                $output .= '<nav class="wp-prev-next ">
                    <ul class="clearfix">';
                    if( get_next_posts_link() ) {
                        $output .= '<li class="prev-link">'.get_next_posts_link( __( '&laquo; Older Entries', 'rigel' )).'</li>';
                    }
                    if( get_previous_posts_link() ) {
                        $output .= '<li class="next-link">'.get_previous_posts_link( __( 'Newer Entries &raquo;', 'rigel' )).'</li>';
                    }
                    $output .= '</ul>
                </nav>';
            }
        }

        return $output;
    }
}

//Get saved themeoption array value
if(!function_exists('rigel_get_prefix')){

	function rigel_get_prefix() {

		if( is_singular( 'page' ) ) {
			$prefix = 'page_';
		}
		elseif ( is_singular( 'post' ) ) {
			$prefix = 'single_';
		}
		elseif( is_home() || is_front_page() ) {
			$prefix = 'blog_';
		}
		elseif ( is_archive() ) {
			$prefix = 'archive_';
		}
		elseif ( is_search() ) {
			$prefix = 'search_';
		}
		elseif ( is_singular( 'pix_portfolio' ) ) {
			$prefix = 'portfolio_';
		}
		elseif ( is_singular( 'pix_staffs' ) ) {
			$prefix = 'staff_';
		}
		elseif ( is_404() ) {
			$prefix = '404_';
		}
		elseif ( rigel_is_shop() ) {
			$prefix = 'shop_';
		}
		else {
			$prefix = 'page_';
		}

		return $prefix;
	}
}

//Get saved themeoption value
if(!function_exists('rigel_get_option_value')){

	function rigel_get_option_value($key, $default) {

		global $smof_data;

		$value = isset($smof_data[$key]) ? $smof_data[$key] : $default;

		return $value;
	}

}

//Get saved themeoption array value
if(!function_exists('rigel_get_option_array_value')){

	function rigel_get_option_array_value($key1, $key2, $default) {

		global $smof_data;

		$value = isset($smof_data[$key1][$key2]) ? $smof_data[$key1][$key2] : $default;

		return $value;
	}
}

//Sidebar
if( !function_exists( 'rigel_sidebar' ) ){

    function rigel_sidebar( $sidebar_name , $default ){
        echo '<div id="aside" class="sidebar col-md-3">';
            if ( is_active_sidebar( $sidebar_name ) ){
                dynamic_sidebar( $sidebar_name );
            }
            elseif( $sidebar_name == 0 ){

                if ( is_active_sidebar( $default ) ){
                    dynamic_sidebar( $default );
                }
                else{
                    echo '<p class="sidebar-info">'. esc_html__('Please active sidebar widget or disable it from theme option.', 'rigel' ).'</p>';
                }
            }
        echo '</div>';

    }
}

/*
 * Function: Feature Thumbnail
 * Version : 1.2
 */

if( ! function_exists( 'rigel_featured_thumbnail' ) ) {

    function rigel_featured_thumbnail( $width, $height, $only_src, $show_placeholder, $force_lazy_load_off ) {

        $lazy_load = rigel_get_option_value( 'lazy_load', 1 );

        if( $force_lazy_load_off ) { // if it's turned on, it force the lazy load to turned off
            $lazy_load = 0;
        }

        $image_thumb_url = '';

        if( has_post_thumbnail() ){

            $image_id = get_post_thumbnail_id();

            $image_thumb_url = wp_get_attachment_image_src( $image_id, 'full' );
        }

        if( !is_int( $width ) ) {
            $width = 1920;
        } 

        if( !is_int( $height ) ) {
            $height = 1020;
        }

        $output = '';

        if( ! empty( $image_thumb_url ) ) {
            $img = aq_resize( $image_thumb_url[0], $width , $height, true, true );

            if( $only_src ) {
                if($img){
                    $output = $img;
                }
                else{
                	$url = get_the_post_thumbnail( get_the_ID(), 'full' );
                    $output = $image_thumb_url[0];
                }
            }
            else {

                $img_url = ( $img ) ? $img : $image_thumb_url[0];

                if( $img ) {
                    $img_url = $img;
                } else {
                    $img_url = $image_thumb_url[0];
                    $width = $image_thumb_url[1];
                    $height = $image_thumb_url[2];
                }

                if ( $lazy_load ) {
                    $placeholder = get_template_directory_uri(). '/_img/img-placeholder.png';
                    $output = '<img class="amz-lazy" src="'. esc_url( $placeholder ) .'" data-original="' . esc_url( $img_url ) . '">';
                } else {
                    
                    $output = '<img src="' . esc_url( $img_url ) . '" alt="">';
                }

            }
        }
        else if( empty( $image_thumb_url ) && $show_placeholder ) {
            $protocol = is_ssl() ? 'https' : 'http';

            if( $only_src ) {
                $output = $protocol.'://placehold.it/'.$width.'x'.$height;
            }
            else {
                $output = '<img src="'.esc_url( $protocol.'://placehold.it/'.$width.'x'.$height ) .'" alt="">';
            }
        }

        return $output;                  

    }
}

/*
 * Function : Get Image Src from Media Id
 * Version  : 1.0
 * Required : Aqua Resize
 */

if( ! function_exists( 'rigel_get_image_by_id' ) ) {

    function rigel_get_image_by_id( $width, $height, $image_id, $only_src = true, $placeholder = false, $force_lazy_load_off = true ) {

    	//Lazy load
		global $smof_data;
    	$lazy_load = isset( $smof_data['lazy_load'] ) ? $smof_data['lazy_load'] : 1;

    	if( $force_lazy_load_off ) { // if it's turned on, it force the lazy load to turned off
    		$lazy_load = 0;
    	}

        $image_thumb_url = '';

        if( !empty( $image_id ) ) {

			$image_thumb_url = wp_get_attachment_image_src( $image_id, 'full' ); // full iamge URL
        }

        if( !is_int( $width ) ) {
            $width = 1920;
        } 

        if( !is_int( $height ) ) {
            $height = 1020;
        }

        $output = '';

        if( ! empty( $image_thumb_url ) ) {
            $img = aq_resize( $image_thumb_url[0], $width , $height, true, true );

            if( $only_src ) {
                if($img){
                    $output = $img;
                }
                else{
                    $output = $image_thumb_url[0];
                }
            }
            else {

            	$img_url = ( $img ) ? $img : $image_thumb_url[0];

            	if( $img ) {
            		$img_url = $img;
            	} else {
            		$img_url = $image_thumb_url[0];
            		$width = $image_thumb_url[1];
            		$height = $image_thumb_url[2];
            	}

            	if ( $lazy_load ) {
            		$placeholder = get_template_directory_uri(). '/_img/img-placeholder.png';
            		$output = '<img class="amz-lazy" src="'. $placeholder .'" data-original="' . esc_url( $img_url ) . '" >';
            	} else {
            		
                	$output = '<img src="' . esc_url( $img_url ) . '" alt="">';
            	}

            }
        }
        else if( empty( $image_thumb_url ) && $placeholder ) {
            $protocol = is_ssl() ? 'https' : 'http';

            if( $only_src ) {
                $output = $protocol.'://placehold.it/'.$width.'x'.$height;
            }
            else {
                $output = '<img src="'.$protocol.'://placehold.it/'.$width.'x'.$height.'" alt="" >';
            }
        }

        return $output;                  

    }
}

/*
 * Function : Get Metabox value
 * Version  : 1.1
 * Required : SMOF Theme Option
 * Desc  : It's only for get values from metabox
 */
if(!function_exists('rigel_get_meta_value')){

    function rigel_get_meta_value( $id, $meta_key, $meta_default = '', $themeoption_key = '', $themeoption_default = '' ) {

    	$value = ( null != get_post_meta( $id, $meta_key, true ) ) ? get_post_meta( $id, $meta_key, true ) : $meta_default;

    	if( ( 'default' == $value || '' == $value ) && !empty( $themeoption_key ) ) {
    		$value = rigel_get_option_value( $themeoption_key, $themeoption_default );
    	}

    	return $value;
    }
}

//rigel_shorten_text
function rigel_shorten_text( $text , $no_of__limit ) {
	$chars_limit = $no_of__limit;
	$chars_text = strlen($text);
	$text = $text." ";
	$text = substr($text,0,$chars_limit);
	$text = substr($text,0,strrpos($text,' '));
	if ($chars_text > $chars_limit) {
		$text = $text."...";
	}
	return $text;
}

function rigel_title_tag( $title_tag ){
	$title_tag_array = array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6' );

	if( in_array( $title_tag, $title_tag_array ) ) {
		return $title_tag;
	}
	else {
		return 'h2';
	}
}

function rigel_split_letter( $button_text ){

	$button_text_html = '';
	if ( ! empty ( $button_text ) ) {
		foreach ( str_split( $button_text ) as $value ) {
			if($value == ' ' ){
				$button_text_html .= ' ';
			}else{
				$button_text_html .= '<span>'. esc_html($value) .'</span>';
			}
		}
	}

	return $button_text_html;
	
}

function rigel_is_shop() {
	if ( function_exists('is_shop') ){
		return is_shop();
	} else {
		return false;
	}
	
}


function rigel_is_product_category () {
	if ( function_exists('is_product_category') ){
		return is_product_category();
	} else {
		return false;
	}
}

function rigel_is_product_tag () {
	if ( function_exists('is_product_tag') ){
		return is_product_tag();
	} else {
		return false;
	}
}

function rigel_is_product() {
	if ( function_exists('is_product') ){
		return is_product();
	} else {
		return false;
	}
}

/* returns class if vc_row exsist in content or vc disabled */
function rigel_check_vc_active() {
	global $post;

	if( ! defined('WPB_VC_VERSION') || ( $post && ! preg_match( '/vc_row/', $post->post_content ) ) ) {
		return ' container no-vc-active';
	} else {
		return '';
	}

}
