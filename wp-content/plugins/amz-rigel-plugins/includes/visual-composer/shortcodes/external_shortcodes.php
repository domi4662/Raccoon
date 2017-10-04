<?php

	/* =============================================================================
		Anything Carousel Shortcodes
	========================================================================== */
	function rigel_anything_carousel($atts, $content = null, $code){

		extract(shortcode_atts(array(
			'slides_per_view' => 1,
			'loop'            => 'false',
			'margin'          => '30',
			'center'          => 'false',
			'stage_padding'   => '0',
			'start_position'  => '0',
			'pagination'      => 'true',
			'touch_drag'      => 'true',
			'mouse_drag'      => 'true',
			'stop_on_hover'   => 'true',
			'slide_arrow'     => 'true',
			'arrow_type'      => '',
			'slide_speed'     => '5000',
			'autoplay'        => 'false',
			'animate_out'     => 'false',
			'animate_in'      => 'false',
			'anything_css'    => ''
		),$atts));

	 	if ( function_exists( 'vc_shortcode_custom_css_class' ) ) {
			$class_to_filter = vc_shortcode_custom_css_class( $anything_css, ' ' );
			$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $code, $atts );
		}

		$slides_per_view = ( $slides_per_view && is_numeric( $slides_per_view ) ) ? $slides_per_view : 3;

		$slider_data = ' data-items="'. esc_attr( $slides_per_view ) .'" data-loop="'. esc_attr( $loop ) .'" data-margin="'. esc_attr( $margin ) .'" data-center="'. esc_attr( $center ) .'" data-stage-padding="'. esc_attr( $stage_padding ) .'" data-start-position="'. esc_attr( $start_position ) .'" data-dots="'. esc_attr( $pagination ) .'" data-touch-drag="'. esc_attr( $touch_drag ) .'" data-mouse-drag="'. esc_attr( $mouse_drag ) .'" data-autoplay-hover-pause="'. esc_attr( $stop_on_hover ) .'" data-nav="'. esc_attr( $slide_arrow ) .'" data-autoplay-timeout="'. esc_attr( $slide_speed ) .'" data-autoplay="'. esc_attr( $autoplay ) . '" data-animate-in="'. esc_attr( $animate_in ) .'" data-animate-out="'. esc_attr( $animate_out ) .'"';

		$animateClass = ( $animate_in != 'false' ) ? ' amz-owl-animate' : '';

		$output = '<div class="owl-carousel row-carousel '. esc_attr( $arrow_type ) .'' . esc_attr( $animateClass ) . ( ( $pagination == 'false' ) ? ' no-pagi-carousel' : '' ) .' ' . $css_class . '"'. $slider_data .'>';
			$output .= do_shortcode( $content );
		$output .= '</div>';
		return $output;
	}

	add_shortcode( 'anything_carousel', 'rigel_anything_carousel' );
	

	/* =============================================================================
		Slider Shortcodes
	========================================================================== */
	function rigel_slider($atts, $content = null){
		extract(shortcode_atts(array(
			'pagination'     => 'true',
			'slide_arrow'    => 'false',
			'arrow_type'     => '',
			'autoplay'       => 'false',
			'slide_speed'    => '5000',
			'autoplay_pause' => 'true',
			'loop'           => 'true'
		),$atts));
		$output = '<div class="composer-primary-slider'. $arrow_type .'" data-items="1" data-loop="'. esc_attr( $loop ) .'" data-autoplay="'. esc_attr( $autoplay ) .'" data-autoplay-timeout="'. esc_attr( $slide_speed ) .'" data-nav="'. esc_attr( $slide_arrow ) .'" data-autoplay_hover_pause="'. esc_attr( $autoplay_pause ) .'" data-dots="'. esc_attr( $pagination ) .'">';
			$output .= do_shortcode( $content );
		$output .= '</div>';
		return $output;
	}

	add_shortcode( 'slider', 'rigel_slider' );

	/* =============================================================================
		Slide Shortcodes
	========================================================================== */
	function rigel_slide($atts, $content = null, $code){
		extract(shortcode_atts(array(
			'align' => '',
			'title' => '',
			'title_size' => '',
			'title_letter_spacing' => '',
			'title_uppercase' => 'uppercase',
			'title_margin' => '',
			'title_padding' => '',
			'title_line_height' => '',
			'title_bgcolor' => '',
			'title_color' => '',
			'content_size' => '',
			'content_letter_spacing' => '',
			'content_uppercase' => 'uppercase',
			'content_margin' => '',
			'content_padding' => '',
			'content_line_height' => '',
			'content_bgcolor' => '',
			'content_color' => '',
			'display_button' => 'yes',
			'button_link'  => '',
			'button_style' => 'outline',
			'button_hover_style' => 'outline',
			'button_type' => 'oval',
			'button_color' => 'color',
			'button_hover_color' => 'color',
			'button_align' => '',
			'custom_size' => 'no',
			'font_size' => '',
			'padding_custom' => '',
			'btn_bg_color' => '',
			'btn_text_color' => '',
			'btn_border_color' => '',
			'target' => '_self',
			'slide_css' => '',
			'enable_header_text' => 'yes',
			'header_text' => 'black',
		),$atts));

		$css_class = $font_class = $font = $data = $custom_title_style = $custom_content_style = '';

		if ( function_exists( 'vc_shortcode_custom_css_class' ) ) {
			$class_to_filter = vc_shortcode_custom_css_class( $slide_css, ' ' );
			$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $code, $atts );
		}		

		if( $enable_header_text == 'yes' ) {
			$data = ' data-header="' . esc_attr( $header_text ) . '"';
		} 

		if ( !empty($title_size) || !empty($title_letter_spacing) || !empty($title_margin) || !empty($title_padding) || $title_uppercase != 'uppercase' || !empty( $title_line_height ) || !empty($title_bgcolor) || !empty($title_color) ) {
			$custom_title_style .= ' style="';
			$custom_title_style .= ( !empty( $title_size ) ) ? ' font-size: '. $title_size .';': '';
			$custom_title_style .= ( !empty( $title_letter_spacing ) ) ? ' letter-spacing: '. $title_letter_spacing .';': '';
			$custom_title_style .= ( !empty( $title_margin ) ) ? ' margin: '. $title_margin .';': '';
			$custom_title_style .= ( !empty( $title_padding ) ) ? ' padding: '. $title_padding .';': '';
			$custom_title_style .= ( $title_uppercase != 'uppercase' ) ? ' text-transform: '. $title_uppercase .';': '';
			$custom_title_style .= ( !empty( $title_line_height ) ) ? ' line-height: '. $title_line_height .';': '';
			$custom_title_style .= ( !empty( $title_bgcolor ) ) ? ' background-color: '. $title_bgcolor .';': '';
			$custom_title_style .= ( !empty( $title_color ) ) ? ' color: '. $title_color .';': '';
			$custom_title_style .= '"';
		}

		if ( !empty($content_size) || !empty($content_letter_spacing) || !empty($content_margin) || !empty($content_padding) || !empty( $content_line_height ) || $content_uppercase != 'uppercase' || !empty($content_bgcolor) || !empty($content_color) ) {
			$custom_content_style .= ' style="';
			$custom_content_style .= ( !empty( $content_size ) ) ? ' font-size: '. $content_size .';': '';
			$custom_content_style .= ( !empty( $content_letter_spacing ) ) ? ' letter-spacing: '. $content_letter_spacing .';': '';
			$custom_content_style .= ( !empty( $content_margin ) ) ? ' margin: '. $content_margin .';': '';
			$custom_content_style .= ( !empty( $content_padding ) ) ? ' padding: '. $content_padding .';': '';
			$custom_content_style .= ( $content_uppercase != 'uppercase' ) ? ' text-transform: '. $content_uppercase .';': '';
			$custom_content_style .= ( !empty( $content_line_height ) ) ? ' line-height: '. $content_line_height .';': '';
			$custom_content_style .= ( !empty( $content_bgcolor ) ) ? ' background-color: '. $content_bgcolor .';': '';
			$custom_content_style .= ( !empty( $content_color ) ) ? ' color: '. $content_color .';': '';
			$custom_content_style .= '"';
		}


		if($custom_size == "yes" || $button_color == "custom_color"){
			$font = 'style="';
		}

		if($custom_size == "yes"){
			$font_class = " btn-custom";
			$font .= 'font-size:'. esc_attr( $font_size ) .';';
			$font .= 'padding: '. esc_attr( $padding_custom ) .';';
		}

		if($button_color == "custom_color"){
			$font .= 'background-color:'. esc_attr( $btn_bg_color ) .';';
			$font .= 'color: '. esc_attr( $btn_text_color ) .';';
			$font .= 'border-color: '. esc_attr( $btn_border_color ) .';';
		}

		if($custom_size == "yes" || $button_color == "custom_color"){
			$font .= '"';
		}

		$output = '<div class="slider-content '. esc_attr( $align ) .' ' . esc_attr( $css_class ) . '"' . $data . '>';

			$output .= '<div class="slider-wrap"><div class="slider-wrap-inner">';

				$output .= '<h2 class="slide-title"'. $custom_title_style .'>'. wp_kses_post( $title, array( 'br' => array() ) ) .'</h2>';
				$output .= '<p class="slide-content"'. $custom_content_style .'>'. esc_html( $content ). '</p>';
			
			
				if ( function_exists( 'vc_build_link' ) ) {
					$btn_att = vc_build_link( $button_link );
					$btn_att['href'] = ( isset( $btn_att['url'] ) && !empty( $btn_att['url'] ) ) ? $btn_att['url'] : '#';
					$btn_att['title'] = ( isset( $btn_att['title'] ) && !empty( $btn_att['title'] ) ) ? $btn_att['title'] : esc_html__( 'Read More','amz-rigel-plugins' );
					$btn_att['target'] = ( isset( $btn_att['target'] ) ) ? $btn_att['target'] : '';
					
					if( $display_button == 'yes' && !empty( $btn_att['href'] ) ){
						$output .= '<div class="pix_button '. esc_attr( $button_align ) .'"><a href="'. esc_url( $btn_att['href'] ) .'" '. ( ( !empty($btn_att['target'] ) ) ? ' target="'. esc_attr( $btn_att['target'] ) .'"' : '').' class="clear btn btn-'. esc_attr( $button_style ) .' btn-hover-'. esc_attr( $button_hover_style ) .' btn-'. esc_attr( $button_type ) .' '. esc_attr( $button_color ).' btn-hover-'. esc_attr( $button_hover_color ).''. $font_class .'"'. $font .'>'. esc_html( $btn_att['title'] ) .'</a></div>';
					}
				}

			$output .= '</div></div>';
		
		$output .= '</div>';

		return $output;

	}

	add_shortcode( 'slide', 'rigel_slide' );

	/* =============================================================================
		 Hover Box
	   ========================================================================== */

	function rigel_hover_box( $atts, $content = null, $code ) {
		extract( shortcode_atts( array(
			'front_image'        => '',
			'front_image_width'  => 480,
			'front_image_height' => 670,
			'hover_box_css'      => '',
			'animate_in'         => 'fadeIn',
			'duration_in'        => '',
			'delay_in'           => '',
			'animate_out'        => 'fadeOut',
			'duration_out'       => '',
			'delay_out'          => '',
			'hover_color'        => '',
			'overlay_css'        => '',
			'overlay'            => 'yes'
		),$atts ) );

		if ( function_exists( 'vc_shortcode_custom_css_class' ) ) {
			$class_to_filter = vc_shortcode_custom_css_class( $hover_box_css, ' ' );
			$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $code, $atts );

			$overlay_class_to_filter = vc_shortcode_custom_css_class( $overlay_css, ' ' );
			$overlay_css = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $overlay_class_to_filter, $code, $atts );

		}

		$animate_data = '';

		if( $overlay == 'yes' ) {

			$animate_class = !empty( $animate_out ) ? ' '. esc_attr( $animate_out ) : ' fadeout';

			$animate_data .= ' data-hover-animate';
			$animate_data .= !empty( $animate_in ) ? ' data-trans-in="'. esc_attr( $animate_in ) .'"' : 'fadeInUp';
			$animate_data .= !empty( $animate_out ) ? ' data-trans-out="'. esc_attr( $animate_out ) .'"' : 'fadeOutDown';

			$animate_data .= !empty( $duration_in ) 	? ' data-duration-in="'. esc_attr( $duration_in ) .'"' 	: '';
			$animate_data .= !empty( $duration_out ) ? ' data-duration-out="'. esc_attr( $duration_out ) .'"' : '';

			$animate_data .= !empty( $delay_in )		? ' data-delay-in="'. esc_attr( $delay_in ) .'"' 		: '';
			$animate_data .= !empty( $delay_out ) 	? ' data-delay-out="'. esc_attr( $delay_out ) .'"' 		: '';

			$hover_class = !empty( $hover_color ) ? ' style="background-color: '. $hover_color .';"': '';

		}
		
		$output = '<div class="hover-box">';
			if( !empty( $front_image ) ) {
				$image = rigel_get_image_by_id( $front_image_width, $front_image_height, $front_image, 0, 0, 1 );
				$output .= '<div class="hover-box-front">'. $image .'</div>';
			}
			$output .= '<div class="hover-box-back '. $css_class .'">';

			if( $overlay == 'yes' ) {
				$output .= '<div class="hover-box-overlay ' . $overlay_css .' '. esc_attr( $animate_class ) . '"'. $hover_class .'' . $animate_data . '></div>';
			}

			$output .= '<div class="hover-box-element-wrap">'. wpb_js_remove_wpautop( $content ) .'</div>';

			$output .= '</div>';
		$output .= '</div>';

		return $output;
	}

	add_shortcode( 'hover_box', 'rigel_hover_box' );

	function rigel_hover_elements( $atts, $content = null, $code ) {
		extract( shortcode_atts( array(
			'text_color' => 'light', // black, white, custom_color
			'custom_color' => '',
			'horizontal_align' => 'center', // center, left, right
			'vertical_align' => 'top', // middle, top, bottom
			'animate_in' => 'fadeIn',
			'duration_in' => '',
			'delay_in' => '',
			'animate_out' => 'fadeOut',
			'duration_out' => '',
			'delay_out' => '',
			'hover_box_css' => '',
			'on_hover' => 'yes',
		),$atts ) );

		// Empty Assignment
		$style = $animate_data = $animate_class = '';

		if ( function_exists( 'vc_shortcode_custom_css_class' ) ) {

			$class_to_filter = vc_shortcode_custom_css_class( $hover_box_css, ' ' );
			$hover_box_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $code, $atts );

		}

		$text_color = ( 'default' != $text_color ) ? $text_color : '';

		if( $on_hover == 'yes' ) {

			//Animation
			$animate_class = ! empty( $animate_out ) ? ' '. esc_attr( $animate_out ) : ' fadeOut';

			$animate_data .= ' data-hover-animate';
			$animate_data .= ! empty( $animate_in ) 	? ' data-trans-in="'. esc_attr( $animate_in ) .'"' 		: 'fadeIn';
			$animate_data .= ! empty( $animate_out ) 	? ' data-trans-out="'. esc_attr( $animate_out ) .'"' 	: 'fadeOut';

			$animate_data .= ! empty( $duration_in ) 	? ' data-duration-in="'. esc_attr( $duration_in ) .'"' 	: '';
			$animate_data .= ! empty( $duration_out ) ? ' data-duration-out="'. esc_attr( $duration_out ) .'"' : '';

			$animate_data .= !empty( $delay_in )		? ' data-delay-in="'. esc_attr( $delay_in ) .'"' 		: '';
			$animate_data .= !empty( $delay_out ) 	? ' data-delay-out="'. esc_attr( $delay_out ) .'"' 		: '';

		}
		

		$output = '<div class="hover-box-element '. $hover_box_class .' '. esc_attr( $animate_class . ' ' . $text_color . ' '. $horizontal_align . ' ' . $vertical_align ) .'" '. $animate_data . ' ' . $style .'>';

			if( $vertical_align == 'middle' ) {
				$output .= '<div class="hover-box-element-middle">';
			}

			$output .= wpb_js_remove_wpautop( $content );

			if( $vertical_align == 'middle' ) {
				$output .= '</div>';
			}

		$output .= '</div>';

		
		return $output;
	}

	add_shortcode( 'hover_elements', 'rigel_hover_elements' );
	
	/* =============================================================================
		 Staffs Shortcodes
	   ========================================================================== */

	//Staffs Loop
	function rigel_staffs( $atts, $content = null ){
		extract(shortcode_atts(array(
			'no_of_staff'       => 6,
			'exclude_staffs'    => '',
			'order_by'          => 'date', //'none', ID', 'author' , 'title', 'name', 'date', 'modified', 'parent', 'rand', 'menu_order'
			'order'             => 'asc', //desc, asc
			'staff_id'          => '',
			'columns'           => 'col3', //col2, col3, col4
			'title_tag'         => 'h3',
			'insert_type'       => 'posts',
			'single_staff_link' => 'yes',
			'margin'            => '',
			'slider'            => 'yes',
			'loop'              => 'false',
			'slide_margin'      => '30',
			'center'            => 'false',
			'stage_padding'     => '0',
			'start_position'    => '0',
			'pagination'        => 'true',
			'touch_drag'        => 'true',
			'mouse_drag'        => 'true',
			'stop_on_hover'     => 'true',
			'slide_arrow'       => 'true',
			'arrow_type'        => '',
			'slide_speed'       => '5000',
			'autoplay'          => 'false',
			'animate_out'       => 'false',
			'animate_in'        => 'false',
			'button_text'       => 'More Info'
		), $atts));

		$page_class = '';
		
		if( !empty($exclude_staffs ) ){
			$exclude_staffs= explode(',', $exclude_staffs);
		}
		else{
			$exclude_staffs = '';
		}


		if($staff_id != "" && $insert_type == 'id'){
			$staff_id= explode(',', $staff_id);

			$args = array(
				'post_status' => 'publish',
				'post_type' => 'pix_staffs',
				'order' => $order,
				'orderby' => 'post__in',
				'post__in' => $staff_id,
				'post__not_in' => $exclude_staffs
				
				);
		}else{
			$args = array(
				'post_status' => 'publish',
				'post_type' => 'pix_staffs',
				'orderby' => $order_by,
				'order' => $order,
				'posts_per_page' => ( !empty($no_of_staff ) && is_numeric( $no_of_staff ) )   ? $no_of_staff : -1,
				'post__not_in' => $exclude_staffs
				);
		}
		   
		if($columns == 'col3'){
			$shorten_length = 170;
			$class = 'col-md-4 col-sm-6';
			$width = '380';
			$height = '434';
			$slide_items = 3;
			$tablet_slide = 2;
		}
		elseif($columns == 'col2'){
			$shorten_length = 220;
			$class = 'col-md-6 col-sm-6';
			$width = '570';
			$height = '650';
			$slide_items = 2;
			$tablet_slide = 2;
		}else{
			$class = 'col-md-3 col-sm-6';
			$shorten_length = 120;
			$width = '285';
			$height = '334';
			$slide_items = 4;
			$tablet_slide = 3;
		}

		if($pagination == 'false'){
			$page_class = ' no-pagi-carousel';
		}

		//VC_COLUMNS
		if($slider == 'yes'){
			$data = 'data-items="'. esc_attr( $slide_items ) .'" data-loop="'. esc_attr( $loop ) .'" data-margin="'. esc_attr( $slide_margin ) .'" data-center="'. esc_attr( $center ) .'" data-stage-padding="'. esc_attr( $stage_padding ) .'" data-start-position="'. esc_attr( $start_position ) .'" data-dots="'. esc_attr( $pagination ) .'" data-touch-drag="'. esc_attr( $touch_drag ) .'" data-mouse-drag="'. esc_attr( $mouse_drag ) .'" data-autoplay-hover-pause="'. esc_attr( $stop_on_hover ) .'" data-nav="'. esc_attr( $slide_arrow ) .'" data-autoplay-timeout="'. esc_attr( $slide_speed ) .'" data-autoplay="'. esc_attr( $autoplay ) . '" data-animate-in="'. esc_attr( $animate_in ) .'" data-animate-out="'. esc_attr( $animate_out ) .'"';
			$output = '<div class="owl-carousel pix-staffs-con '.$columns.' '.$margin.' '. $arrow_type .''. $page_class .'" '. $data .'>';
		}else{
			$output = '<div class="wpb_row vc_row-fluid"><div class="no-carousel pix-staffs-con '.$columns.' '.$margin.'">';
		}
			

		query_posts( $args );

		if ( have_posts() ) : while ( have_posts() ) : the_post();

			$id = get_the_ID();

			$content = rigel_shorten_text( get_the_content(), $shorten_length ); //content

			if( 'yes' == $slider ) {
				$output .= '<div class="pix-staffs">';
				$output .= "\t".'<div class="pix-staff-wrapper">';
			}
			else {
				$output .= '<div class="'. esc_attr( $class ) .' wpb_column column_container pix-staffs pix-staffs-grid">';
				$output .= "\t".'<div class="wpb_wrapper pix-staff-wrapper">';
			}			

				$output .= '<div class="staff-container">'; //Staff Container

					//Staff Image
					$thumb = rigel_featured_thumbnail( $width, $height, 0, 1, 1 );					
					$output .= '<div class="staff-img-con"><div class="staff-img">' . $thumb .'</div></div>' ;
					

					//Staff Name and content
					$output .= '<div class="staff-content-wrap"><div class="staff-content">'; //Staff Container

						//staff social icons
						$social_icons 	 = '';

						$facebook = rigel_get_meta_value( $id, '_amz_facebook', '' );
						$twitter = rigel_get_meta_value( $id, '_amz_twitter', '' );
						$gplus = rigel_get_meta_value( $id, '_amz_gplus', '' );
						$dribbble = rigel_get_meta_value( $id, '_amz_dribbble', '' );
						$linkedin = rigel_get_meta_value( $id, '_amz_linkedin', '' );
						$flickr = rigel_get_meta_value( $id, '_amz_flickr', '' );
						$instagram = rigel_get_meta_value( $id, '_amz_instagram', '' );
						$email = rigel_get_meta_value( $id, '_amz_email', '' );

						$social_icons 	 .= !empty( $facebook ) ? '<a href="'. esc_url( $facebook ) .'" class="facebook"><i class="pixicon-facebook"></i></a> ' : '';
						$social_icons 	.= !empty($twitter) ? '<a href="'. esc_url($twitter)  .'" class="twitter"><i class="pixicon-twitter"></i></a> ' : '';
						$social_icons	.= !empty( $gplus ) ? '<a href="'. esc_url( $gplus ) 	 .'" class="gplus"><i class="pixicon-gplus"></i></a> ' : '';
						$social_icons	.= !empty( $linkedin )? '<a href="'. esc_url( $linkedin ) .'" class="linkedin"><i class="pixicon-linked-in"></i></a> ' : '';
						$social_icons 	.= !empty( $dribbble ) ? '<a href="'. esc_url( $dribbble )  .'" class="dribbble"><i class="pixicon-dribbble"></i></a> ' : '';
						$social_icons	.= !empty( $flickr ) ? '<a href="'. esc_url( $flickr )   .'" class="flickr"><i class="pixicon-flickr"></i></a> ' : '';
						$social_icons	.= !empty( $instagram ) ? '<a href="'. esc_url( $instagram )   .'" class="instagram"><i class="pixicon-instagram"></i></a> ' : '';
						$social_icons	.= !empty( $email ) ? '<a href="mailto:'. sanitize_email( $email ).'" class="staff_email"><i class="pixicon-envelope"></i></a> ' : '';

						if( ! empty ( $social_icons ) ) {
							$output .= '<div class="staff-social">'. $social_icons .'</div>';
						}

						//Author name		
						if ( $single_staff_link == 'yes' ) {
							$output .= '<'. rigel_title_tag( $title_tag ) .' class="title"><a href="'. esc_url( get_permalink() ) .'">'.esc_html( get_the_title() ).'</a></'. rigel_title_tag( $title_tag ) .'>'; //title
						} else {
							$output .= '<'. rigel_title_tag( $title_tag ) .' class="title">'.esc_html( get_the_title() ).'</'. rigel_title_tag( $title_tag ) .'>'; //title
						}
						
						// Jobs
						$jobs = get_the_term_list( $id, 'pix_jobs','',', ' );
						$jobs = !empty($jobs) ? strip_tags( $jobs ) : '';
						$output .= '<p class="jobs">'. $jobs .'</p>'; //jobs

					$output .= '</div></div>'; //End of Staff Content

				$output .= '</div>'; //End of Staff Container

			$output .= "\t".'</div>';
			$output .= '</div>';
		endwhile; 
		
		else:
			$output .= '<div>'.esc_html__('No Staff Posts Found.', 'amz-rigel-plugins').'</div>';
		endif;
	   
		wp_reset_query();

		if( 'yes' != $slider ){
			$output .= '</div>';
		}
		$output .= '</div>';
		return  $output;
	}
	
	add_shortcode( 'staffs', 'rigel_staffs' );

	/* =============================================================================
	 Portfolio Shortcodes
    ========================================================================== */
	function rigel_portfolio($atts, $content = null){
		extract(shortcode_atts(array(
			'portfolio_style'   => 'grid',//grid,masonry
			'no_of_items'       => 6,
			'exclude_portfolio' => '',
			'pix_filterable'    => 'yes',
			'order_by'          => 'date', //'none', ID', 'author' , 'title', 'name', 'date', 'modified', 'parent', 'rand', 'menu_order'
			'order'             => 'desc', //desc, asc
			'portfolio_id'      => '',
			'columns'           => 'col3', //col2, col3, col4
			'margin'            => '',
			'title_tag'         => 'h3',
			'insert_type'       => 'posts',
			'pagination'    	=> 'none', // none, load_more, autoload, number, text
			'loadmore_text'		=> esc_html__( 'Loadmore', 'amz-rigel-plugins' ),
			'slider'            => 'no',
			'loop'              => 'false',
			'slide_margin'      => '30',
			'center'            => 'false',
			'stage_padding'     => '0',
			'start_position'    => '0',
			'slider_pagination' => 'true',
			'touch_drag'        => 'true',
			'mouse_drag'        => 'true',
			'stop_on_hover'     => 'true',
			'slide_arrow'       => 'true',
			'arrow_type'        => '',
			'slide_speed'       => '5000',
			'autoplay'          => 'false',
			'animate_out'       => 'false',
			'animate_in'        => 'false',
		), $atts));

		$exclude_portfolio = !empty( $exclude_portfolio ) ? explode( ',', $exclude_portfolio ) : '';

		$pix_filterable = isset( $pix_filterable ) ? $pix_filterable : 'yes';
		   
		//Set values for Portfolio columns
		if( 'col3' == $columns ){
			$shorten_length = 50;
			$class = 'col-md-4 col-sm-6';
			$slide_items = 3;
			$tablet_slide = 2;
		}
		elseif( 'col2' == $columns ){
			$shorten_length = 120;
			$class = 'col-md-6 col-sm-6';
			$slide_items = 2;
			$tablet_slide = 2;
		}
		else {
			$class = 'col-md-3 col-sm-6';
			$shorten_length = 120;
			$slide_items = 4;
			$tablet_slide = 3;
		}

		//Adjust Width & Height
		if( 'grid' == $portfolio_style ) {
			if ( 'col3' == $columns ){	
				$width = 640;		
				$height = 740;
			}
			elseif( 'col2' == $columns ){
				$width = 960;			
				$height = 1060;
			}
			else {
				$width = 480;			
				$height = 580;
			}
		}

		$masonry_class = ( 'masonry' == $portfolio_style ) ? ' masonry-class' : '';

		$output = '';

		if( 'yes' != $slider ){
			$output = '<div class="loadmore-wrap no-portfolio-carousel '. esc_attr( $portfolio_style . $masonry_class ) .'">';
		}

		if( 'yes' != $slider && 'yes' == $pix_filterable ) {
			
			$terms = get_terms( 'pix_categories' ); 
			if( $terms ){
				$output .= '<div class="sorter">';

					$output .= '<ul id="filters" class="option-set clearfix">
						<li><a href="#" class="all selected" data-filter="*">'. esc_html__( 'All', 'amz-rigel-plugins' ).'</a></li>';

						$terms = get_terms( 'pix_categories' ); 
						foreach( $terms as $term ){ 
							$output .= '<li><a href="#" data-filter=".'. esc_attr( strtolower( str_replace(' ','-',$term->name ) ) ) .'">'. esc_html( $term->name ) .'</a></li>';    
						}
					$output .= '</ul>  
				</div>';
			}
			
		}

		$page_class = ( 'false' == $slider_pagination ) ? ' no-pagi-carousel' : '';

		//VC_COLUMNS
		if( 'yes' == $slider ){
			$data = 'data-items="'. esc_attr( $slide_items ) .'" data-loop="'. esc_attr( $loop ) .'" data-margin="'. esc_attr( $slide_margin ) .'" data-center="'. esc_attr( $center ) .'" data-stage-padding="'. esc_attr( $stage_padding ) .'" data-start-position="'. esc_attr( $start_position ) .'" data-dots="'. esc_attr( $slider_pagination ) .'" data-touch-drag="'. esc_attr( $touch_drag ) .'" data-mouse-drag="'. esc_attr( $mouse_drag ) .'" data-autoplay-hover-pause="'. esc_attr( $stop_on_hover ) .'" data-nav="'. esc_attr( $slide_arrow ) .'" data-autoplay-timeout="'. esc_attr( $slide_speed ) .'" data-autoplay="'. esc_attr( $autoplay ) . '" data-animate-in="'. esc_attr( $animate_in ) .'" data-animate-out="'. esc_attr( $animate_out ) .'"';
			$output .= '<div class="pix-portfolio portfolio-wrap owl-carousel '. esc_attr( $columns .' '. $margin .' '. $arrow_type . $page_class ) .'" '. $data .'>';
		}
		else{
			$output .= '<div class="wpb_row vc_row-fluid '. esc_attr( $margin ) .'"><div class="load-container portfolio-contents">';
			$data = '';
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

		//Query
		if( !empty( $portfolio_id ) && 'id' == $insert_type ){
			$portfolio_id = explode( ',', $portfolio_id );

			$args = array(
				'post_status' => 'publish',
				'post_type' => 'pix_portfolio',
				'posts_per_page' => -1,
				'order' => $order,
				'orderby' => 'post__in',
				'post__in' => $portfolio_id,
				'post__not_in' => $exclude_portfolio
			);
		}
		else{
			$args = array(
				'post_status' => 'publish',
				'post_type' => 'pix_portfolio',
				'posts_per_page' => $no_of_items,
				'paged' => $paged,
				'orderby' => $order_by,
				'order' => $order,
				'post__not_in' => $exclude_portfolio
			);
		}	

		query_posts( $args );

		if ( have_posts() ) : while ( have_posts() ) : the_post();			

			$id = get_the_ID();

			$portfolio_image_style = rigel_get_meta_value( $id, '_amz_portfolio_image_style', 'square' );

			if ( $portfolio_style == 'masonry' ) {

				// Temporary assignment
				if( $columns == 'col3' ){
					$temp_class = 'col-md-4 col-sm-6';
					$temp_width = 640;
					$temp_height = 640;
				}
				elseif( $columns == 'col2' ){
					$temp_class = 'col-md-6 col-sm-6';
					$temp_width = 960;
					$temp_height = 960;
				}
				else{
					$temp_class = 'col-md-3 col-sm-6';
					$temp_width = 480;
					$temp_height = 480;
				}

				// Reassign values
				if ( $portfolio_image_style == 'boxed' ) {
					$width = $temp_width * 2;
					$height = $temp_height * 2;

					if( $columns == 'col3' ){
						$class = 'col-sm-8';
					}elseif( $columns == 'col2' ){
						$class = 'col-sm-12';
					}else{
						$class = 'col-sm-6';
					}

				}
				elseif ( $portfolio_image_style == 'horizontal' ) {
					$width = $temp_width * 2;
					$height = $temp_height;

					if( $columns == 'col3' ){
						$class = 'col-sm-8';
					}
					elseif( $columns == 'col2' ){
						$class = 'col-sm-12';
					}
					else{
						$class = 'col-sm-6';
					}

				}
				elseif ( $portfolio_image_style == 'vertical' ) {

					$width = $temp_width;
					$height = $temp_height * 2;
					$class = $temp_class;

				}
				else {
					$width = $temp_width;
					$height = $temp_height;

					$class = $temp_class;
				}

				$masonry_class = ' masonry-class';

			}

			$terms = get_the_terms( $id,'pix_categories' );

			//Get Porfolio Image
			$gallery_json = rigel_get_meta_value( $id, '_amz_gallery' );
			$gallery = json_decode( $gallery_json, true );
			$thumb = !empty( $gallery ) ? 'background-image: url('.rigel_get_image_by_id( $width, $height, $gallery[0]['itemId'], 1, 1, 1 ).');' : '';

			if( 'yes' == $slider ) {
				$output .= '<div class="pix-portfolio-item">';

			}
			else{
				$output .= '<div class="load-element '. esc_attr( $class ) .' '. esc_attr( $portfolio_image_style ) .' pix-portfolio-item element ';

				if( !empty( $terms ) ) {
					foreach( $terms as $term ) {
						$output .= ' ' . esc_attr( strtolower( str_replace(' ','-', $term->name ) ) ) . ' '; 
					}
				}

				$output .= '">';
			}		
			

				$output .= '<div class="portfolio-container">'; //portfolio Container

					//terms
					$pix_cats = get_the_term_list( $id, 'pix_categories','',', ' );
					$pix_cats = !empty( $pix_cats ) ? strip_tags( $pix_cats ) : '';

					
					//portfolio Image
					$output .= '<div class="portfolio-img"style="'. $thumb .'"></div>';
							
					$output .=	'<div class="portfolio-hover">';
					
						$output .= '<div class="portfolio-link">';
						
							$output .= '<a href="'. esc_url( get_permalink() ) .'" class="portfolio-content">';
								
								$output .= '<'. rigel_title_tag( $title_tag ) .' class="title">'.esc_html( get_the_title() ).'</'. rigel_title_tag( $title_tag ) .'>';

								$output .= '<p>' . $pix_cats .'</p>';								

							$output .= '</a>'; // .portfolio-content

						$output .= '</div>'; // .portfolio-link

					$output .=	'</div>'; // .portfolio-hover

				$output .= '</div>'; // .portfolio-container

			$output .= '</div>'; // .pix-portfolio-item
		endwhile; 	
		
		else:
			$output .= '<div>'. esc_html__( 'No Portfolio Items Found.', 'amz-rigel-plugins' ) .'</div>';
		endif;
	   
	   wp_reset_query();

		if( $slider == 'yes' ){
			$output .= '</div>';
		}
		else{
			$output .= '</div></div>';
		}
		
		if( 'yes' != $slider ){

			if( $pagination != 'none' ) {

				//Build shortcode values as array for ajax load more
				$values                        = array();
				$values['portfolio_style']     = $portfolio_style;
				$values['columns']             = $columns;
				$values['title_tag']           = $title_tag;
				$values['style']               = $pagination;
				$values['action']              = 'rigel_load_portfolio';
				$values['loadmore_text']       = $loadmore_text;

				$output .= rigel_pagination( $args, $values ); // args, values
			}

			$output .= '</div>';
		}

		return  $output;
	}

	add_shortcode( 'portfolio', 'rigel_portfolio' );

	/* =============================================================================
	Testimonial Shortcodes
	========================================================================== */
	function rigel_testimonial($atts, $content = null){
		extract(shortcode_atts(array(
			'no_of_testimonial'   => 1,
			'exclude_testimonial' => '',
			'limit'               => '',
			'order_by'            => 'date', //'none', ID', 'author' , 'title', 'name', 'date', 'modified', 'parent', 'rand', 'menu_order'
			'order'               => 'desc', //desc, asc
			'testimonial_id'      => '',
			'insert_type'         => 'posts',
			'no_of_col'           =>  1,			
			'pagination'    	=> 'none', // none, loadmore, autoload, number, text
			'loadmore_text'		=> esc_html__( 'Loadmore', 'amz-rigel-plugins' ),
			'allpost_loaded_text'		=> esc_html__( 'All Items Loaded', 'amz-rigel-plugins' ),
			'autoplay'            => '4000',
			'slider'              => 'yes',
			'loop'                => 'false',
			'margin'              => '30',
			'center'              => 'false',
			'stage_padding'       => '0',
			'start_position'      => '0',
			'slider_pagination'   => 'true',
			'touch_drag'          => 'true',
			'mouse_drag'          => 'true',
			'stop_on_hover'       => 'true',
			'slide_arrow'         => 'true',
			'arrow_type'          => '',
			'slide_speed'         => '5000',
			'autoplay'            => 'false',
			'animate_out'         => 'false',
			'animate_in'          => 'false',
		), $atts));

		$page_class = ( 'false' == $slider_pagination ) ? ' no-pagi-carousel' : '';

		$exclude_testimonial= !empty( $exclude_testimonial ) ? explode( ',', $exclude_testimonial ) : '';

		// For owl carousel
		if ( 'yes' == $slider ) {
			$data = 'data-items="'. esc_attr( $no_of_col ) .'" data-loop="'. esc_attr( $loop ) .'" data-margin="'. esc_attr( $margin ) .'" data-center="'. esc_attr( $center ) .'" data-stage-padding="'. esc_attr( $stage_padding ) .'" data-start-position="'. esc_attr( $start_position ) .'" data-dots="'. esc_attr( $slider_pagination ) .'" data-touch-drag="'. esc_attr( $touch_drag ) .'" data-mouse-drag="'. esc_attr( $mouse_drag ) .'" data-autoplay-hover-pause="'. esc_attr( $stop_on_hover ) .'" data-nav="'. esc_attr( $slide_arrow ) .'" data-autoplay-timeout="'. esc_attr( $slide_speed ) .'" data-autoplay="'. esc_attr( $autoplay ) . '" data-animate-in="'. esc_attr( $animate_in ) .'" data-animate-out="'. esc_attr( $animate_out ) .'"';
			$owl_carousel = 'owl-carousel';
		}
		else {
			$data = '';
			$owl_carousel = 'no-owl-carousel';
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

		if( $testimonial_id != "" && $insert_type == 'id' ){
			$testimonial_id = explode(',', $testimonial_id);

			$args = array(
				'post_status' => 'publish',
				'post_type' => 'pix_testimonial',
				'order' => $order,
				'orderby' => 'post__in',
				'post__in' => $testimonial_id,
				'post__not_in' => $exclude_testimonial,
				'paged' => $paged
			);
		}
		else{
			$args = array(
				'post_status' => 'publish',
				'post_type' => 'pix_testimonial',
				'orderby' => $order_by,
				'order' => $order,
				'posts_per_page' => ( !empty($no_of_testimonial) && is_numeric($no_of_testimonial))   ? $no_of_testimonial : -1,
				'post__not_in' => $exclude_testimonial,
				'paged' => $paged
			);
		}

		query_posts( $args );

		$output = '<div class="loadmore-wrap">';

			$output .= '<div class="loadmore-container testimonials col '. esc_attr( $owl_carousel .' '. $no_of_col .'  '. $arrow_type .''. $page_class ) .'" '.$data.'>';

				if ( have_posts() ) : while ( have_posts() ) : the_post();			

					if( !empty( $limit ) ){
						$content = rigel_shorten_text( get_the_excerpt(), $limit );
					}
					else{
						$content = get_the_excerpt(); //content
					}		

					$output .= '<div class="load-element testimonial overflow-no">';

						if ( has_post_thumbnail() ) {    
							$output .= '<div class="testimonial-img">';
								$output .= rigel_featured_thumbnail( 60, 60, 0, 0, 1 );
							$output .= '</div>';
						}				

						$output .= '<div class="testimonial-container">';

							$output .= '<div class="content"><p><span class="para">'. esc_html( $content ) .'</span></p>';

								$output .= '<div class="testimonial-author">';

									$output .= '<p class="pix-author-name">'. esc_html( get_the_title() ) .'</p>';

									//Get testimonial category and set as author job
									$testimonial_cat = get_the_terms( get_the_ID(), 'pix_client_jobs' );

									if( !empty( $testimonial_cat ) ) {
										$output .= '<p class="pix-author-job">'.esc_html( $testimonial_cat[0]->name ).'</p>';
									}

								$output .= '</div>';

							$output .= '</div>';

						$output .= '</div>';
					$output .= '</div>';


				endwhile; 
					
				else:
					$output .= '<div>'.esc_html__('Testimonial posts not Found. Please add atleast one.', 'amz-rigel-plugins').'</div>';
				endif;
		   
				wp_reset_query();

				//Build shortcode values as array for ajax load more
				$values                        = array();
				$values['excerpt_length']      = $limit;
				$values['action']              = 'rigel_load_testimonial';
				$values['style']               = $pagination;
				$values['loadmore_text']       = $loadmore_text;
				$values['allpost_loaded_text'] = $allpost_loaded_text;

				$output .= rigel_pagination( $args, $values ); // args, values

			$output .= '</div>';

		$output .= '</div>';

		return $output;
	}

	add_shortcode( 'testimonial', 'rigel_testimonial' );


	/* =============================================================================
		 Contact Shortcodes
	   ========================================================================== */

	function rigel_contact($atts, $content = null, $code){
		extract(shortcode_atts(array(
			'mailto' => '',
			'animate' => '',
			'transition' => '',
			'duration' => '',
			'delay' => '',
			'button_text' => esc_html__('Send Mail', 'amz-rigel-plugins')
		), $atts));

		$animate_class = "";
		$slideTransition = "";
		$slideDuration = "";
		$slideDelay = "";

		if($animate == "Yes"){

			$animate_class = ' pix-animate-cre';

			$slideTransition = isset($transition) ? ' data-trans="'. esc_attr($transition) .'"' : '';

			$slideDuration = isset($duration) ? ' data-duration="'. esc_attr($duration) .'"' : '';

			$slideDelay = isset($delay) ? ' data-delay="'. esc_attr($delay) .'"' : '';

		}
		
		$output = '';

		$cname = isset($_POST['contactname']) ? $_POST['contactname'] : '';
		$email = isset($_POST['email']) ? $_POST['email'] : '';
		$subject = isset($_POST['subject']) ? $_POST['subject'] : '';
		$message = isset($_POST['message'])? $_POST['message'] : '';

		$nonce = wp_create_nonce("rigel_ajax_form_nonce");
		$actionUrl = admin_url('admin-ajax.php?action=rigel_submit_form&nonce='. $nonce);

		if (isset($_POST['submit'])){
			$actionUrl = admin_url('admin-ajax.php?action=rigel_submit_form&contactname='. esc_attr($cname) .'&email='. esc_attr($email) .'&subject='. esc_attr($subject) .'&message='. esc_attr($message) .'&nonce='. $nonce);
		}

		wp_localize_script( 'rigel-scripts-js', 'rigel', 
			array( 
				'ajaxurl' => admin_url( 'admin-ajax.php' ), 
				'templateurl' => get_template_directory_uri(), 
				'email' => sanitize_email($mailto),
				'nonce' => $nonce
			)
		);
				
	   $output .= '<div class="contactForm'. esc_attr($animate_class) .'"'.$slideTransition.''.$slideDuration.''.$slideDelay.'>	           
					
				   <form method="post" action="'. esc_attr($actionUrl) .'" id="contactform" class="contactform">
				   <div class="response"></div>
				   <div class="row">
					   <p class="col-md-4">
						   <label for="contactname">'. __('Name:', 'amz-rigel-plugins' ).' <span class="color">*</span></label>
						   <input type="text" name="contactname" id="contactname" value="" class="contactname required textfield" role="input" aria-required="true">
					   </p>
		   
					   <p class="col-md-4">
						   <label for="email">'.__('Email:', 'amz-rigel-plugins' ).' <span class="color">*</span></label>
						   <input type="text" name="email" id="email" value="" class="required email textfield" role="input" aria-required="true">
					   </p>
		   
					   <p class="col-md-4">
						   <label for="subject">'.__('Subject:', 'amz-rigel-plugins' ).'  <span class="color">*</span></label>
						   <input type="text" name="subject" id="subject" value="" class="required textfield subject" role="input" aria-required="true">
					   </p>
					</div>
					   <p class="text-area clear">
						   <label for="message">'.__('Message:', 'amz-rigel-plugins' ).'  <span class="color">*</span></label>
						   <textarea rows="8" name="message" id="message" class="required textarea message" role="textbox" aria-required="true"></textarea>
					   </p>      
					   
					   <button type="submit" name="submit" id="submitButton" title="Click here to submit your message!" class="btn btn-solid color">'.esc_html($button_text).'</button>
						
				   </form>
		   </div>';
			
		
		return $output;
	}

	add_shortcode( 'contact', 'rigel_contact' );

	/* =============================================================================
	* Google Map API v3 Shortcodes
	========================================================================== */
	function rigel_googlemap( $atts ) {
		global $gmap_count;
		//JavaScript
		$protocol = is_ssl() ? 'https' : 'http';
		//wp_enqueue_script( 'gmapp', $protocol.'://maps.googleapis.com/maps/api/js?key=&sensor=false');
		wp_enqueue_script( 'gmap' );
		$gmap_count++;
		extract(shortcode_atts(array(
			'width' => '100%',
			'height' => '500',
			'lat' => '-37.81731',
			'lng' => '144.95432',
			'zoom' => '13',
			'pancontrol' => 'true',
			'zoomcontrol'=> 'true',
			'maptypecontrol'=> 'true',
			'scalecontrol'=> 'true',
			'streetviewcontrol'=> 'true',
			'overviewmapcontrol'=> 'true',
			'contact_info' => 'yes',
			'email' => 'email@example.com',
			'address_title' => 'Envato Headquarters',
			'address' => '121 King Street,<br>Melbourne Victoria 3000,<br>Australia',
			'contact_number' => '+61 3 8376 6284'
			), $atts));

		$pancontrol = ( $pancontrol == 'true' ) ? 'true' : 'false';
		$zoomcontrol = ( $zoomcontrol == 'true' ) ? 'true' : 'false';
		$maptypecontrol = ( $maptypecontrol == 'true' ) ? 'true' : 'false';
		$scalecontrol = ( $scalecontrol == 'true' ) ? 'true' : 'false';
		$streetviewcontrol = ( $streetviewcontrol == 'true' ) ? 'true' : 'false';
		$overviewmapcontrol = ( $overviewmapcontrol == 'true' ) ? 'true' : 'false';

		$rand = rand(1,100) * rand(1,100);

		$output = '<div class="pix-map">';  		   			

		$output .= '<div class="map_api" id="map_canvas_'.esc_attr( $rand ).'" style="width:'. esc_attr( $width ) .'; height:'. esc_attr( $height ) .'px"></div>';	   	

			if( $contact_info == 'yes' ){
				$output .= '<div class="map-contact"><div class="contact-wrap">';
					$output .= '<div class="address-wrap">';
				if( !empty( $address_title ) ){
					$output .= '<h2 class="title"><span class="pix-marker pixicon-location"></span>'. esc_html( $address_title ) .'</h2>';
				}
				if( !empty( $address ) ){
					$output .= '<p class="address">'. $address .'</p>';
				}
				if( !empty( $email ) ){
					$output .= '<a href="mailto:'. sanitize_email( $email ) .'" class="link"><span class="pix-mail pixicon-email-mail-streamline"></span>'. esc_html( $email ) .'</a>';
				}
				if( !empty( $contact_number ) ){
					$output .= '<p class="number"><span class="pix-telephone pixicon-phone-4"></span>'. esc_html( $contact_number ) .'</p>';
				}
					$output .= '</div>';
				$output .= '</div></div>';
			}
	   
		$output .= '</div>';
		
		$output .= '<script type="text/javascript">
			function initialize'. esc_attr( $rand ) .'() {
				var myLatlng = new google.maps.LatLng('. esc_attr( $lat ) .','. esc_attr( $lng ) .');
				var styles = [
					{
					  stylers: [
						{ saturation: -100 }
					  ]
					},{
					  featureType: "road",
					  elementType: "geometry",
					  stylers: [
						{ lightness: 100 },
						{ visibility: "simplified" }
					  ]
					},{
					  featureType: "road",
					  elementType: "labels",
					  stylers: [
						{ visibility: "off" }
					  ]
					}
				  ];  
				  
				var mapOptions = {
					center: myLatlng,
					scrollwheel : false,
					zoom: '. esc_attr( $zoom ) .',
					panControl: '. esc_attr( $pancontrol ) .',
					zoomControl: '. esc_attr( $zoomcontrol ) .',
					mapTypeControl: '. esc_attr( $maptypecontrol ) .',
					scaleControl: '. esc_attr( $scalecontrol ) .',
					streetViewControl: '. esc_attr( $streetviewcontrol ) .',
					overviewMapControl: '. esc_attr( $overviewmapcontrol ) .',
					mapTypeId: google.maps.MapTypeId.ROADMAP,
					styles: styles
				};
				var map = new google.maps.Map(document.getElementById("map_canvas_'. esc_attr( $rand ) .'"),
					mapOptions);
				var marker = new google.maps.Marker({
					position: myLatlng
				});

				marker.setMap(map);        
			}

			jQuery(window).load(function(){
				initialize'. esc_attr( $rand ) .'();
			});	
			
		</script>';
		return $output;
	}

	add_shortcode( 'googlemap', 'rigel_googlemap' );

	/* =============================================================================
		Blockquote Shortcodes
	========================================================================== */
	function rigel_blockquote($atts, $content = null){
		extract(shortcode_atts(array(
			'align' => 'left',
			'author_name' => ''
		),$atts));

		$output = '<blockquote class="pull-'. esc_attr( $align ) .'"><p>'. do_shortcode( $content );

		if( !empty( $author_name ) ) {
			$output .='<small class="">'. esc_html( $author_name ) .'</small>';
		}
		
		$output .='</p></blockquote><div class="clear"></div>';
		return $output;
	}

	add_shortcode( 'blockquote', 'rigel_blockquote' );

	/* =============================================================================
		Highlight Shortcodes
	========================================================================== */
	function rigel_highlight($atts, $content = null, $code){   
	   $output = '<span class="highlight">'.trim( esc_html( $content ) ).'</span>';	
	   return $output;
	}

	add_shortcode( 'highlight', 'rigel_highlight' );

	/* =============================================================================
		Tool-tip Shortcodes
	========================================================================== */
	//Tool-tip
	function rigel_tooltip($atts, $content = null){	
		extract(shortcode_atts(array(
			'link'  => '#',
			'tooltip_title' => 'title',
			'tooltip_content' => 'content goes here',
			'align' => ''
		), $atts));
		
		$output  = '<a href="'. esc_url($link) .'" rel="tooltip" data-placement="'. esc_attr( $align ) .'" class="tool-tip" data-original-title="'. esc_attr( $tooltip_content ) .'">'. esc_html( $tooltip_title ) .'</a>';
		return $output;
	}

	add_shortcode( 'tooltip', 'rigel_tooltip' );


	/* =============================================================================
		Youtube and Vimeo Popup Shortcodes
	========================================================================== */
	function rigel_video_popup( $atts, $content = null ){	
		extract( shortcode_atts( array(
			'url'  => '',
			'text' => esc_html__( 'Title', 'rigel' ),
			'text_size' => '',
			'text_letter_spacing' => '',
			'text_padding' => '',
			'text_color' => '',
			'icon_name' => '',
			'icon_size' => '',
			'icon_bg_color' => '',
			'icon_color' => '',
			'icon_border_width' => '',
			'icon_border_style' => '',
			'icon_border_color' => '',
			'icon_width' => '',
			'icon_height' => '',
			'icon_line_height' => '',
			'icon_border_radius' => '',
			'align' => 'center',
			'video_popup_bg' => '',
			'width' => 300,
			'height' => 200
		), $atts ) );

		$text_title = $icon = $video_popup_img = $video_popup_class = $custom_text_style = $custom_icon_style = '';
		if( !empty( $video_popup_bg ) ) {
			if( function_exists( 'rigel_get_image_by_id' ) ) {
				$video_popup_img = rigel_get_image_by_id( (int)$width, (int)$height, $video_popup_bg, false );
				$video_popup_class = ' video_center_image';
			}
		}

		if ( !empty($text_size) || !empty( $text_letter_spacing ) || !empty( $text_padding ) ) {
			$custom_text_style .= ' style="';
			$custom_text_style .= ( !empty( $text_size ) ) ? ' font-size: '. esc_attr( $text_size ) .';': '';
			$custom_text_style .= ( !empty( $text_letter_spacing ) ) ? ' letter-spacing: '. esc_attr( $text_letter_spacing ) .';': '';
			$custom_text_style .= ( !empty( $text_padding ) ) ? ' padding: '. esc_attr( $text_padding ) .';': '';
			$custom_text_style .= ( !empty( $text_color ) ) ? ' color: '. esc_attr( $text_color ) .';': '';
			$custom_text_style .= '"';
		}

		if ( !empty( $icon_size ) || !empty( $icon_bg_color ) || !empty( $icon_color ) || !empty( $icon_border_width ) || !empty( $icon_border_style ) || !empty( $icon_border_color ) || !empty( $icon_width ) || !empty( $icon_height ) || !empty( $icon_line_height ) || !empty( $icon_border_radius ) ) {
			$custom_icon_style .= ' style="';
			$custom_icon_style .= ( !empty( $icon_size ) ) ? ' font-size: '. esc_attr( $icon_size ) .';': '';
			$custom_icon_style .= ( !empty( $icon_bg_color ) ) ? ' background-color: '. esc_attr( $icon_bg_color ) .';': '';
			$custom_icon_style .= ( !empty( $icon_color ) ) ? ' color: '. esc_attr( $icon_color ) .';': '';
			$custom_icon_style .= ( !empty( $icon_border_width ) ) ? ' border-width: '. esc_attr( $icon_border_width ) .';': '';
			$custom_icon_style .= ( !empty( $icon_border_style ) ) ? ' border-style: '. esc_attr( $icon_border_style ) .';': '';
			$custom_icon_style .= ( !empty( $icon_border_color ) ) ? ' border-color: '. esc_attr( $icon_border_color ) .';': '';
			$custom_icon_style .= ( !empty( $icon_width ) ) ? ' width: '. esc_attr( $icon_width ) .';': '';
			$custom_icon_style .= ( !empty( $icon_height ) ) ? ' height: '. esc_attr( $icon_height ) .';': '';
			$custom_icon_style .= ( !empty( $icon_line_height ) ) ? ' line-height: '. esc_attr( $icon_line_height ) .';': '';
			$custom_icon_style .= ( !empty( $icon_border_radius ) ) ? ' border-radius: '. esc_attr( $icon_border_radius ) .';': '';
			$custom_icon_style .= '"';
		}

		if( !empty( $icon_name ) ){
			$icon = '<span class="icon-popup"'. $custom_icon_style .'><i class="video-popup-icon '. esc_attr( $icon_name ) .'"></i></span>';
		}

		if ( !empty( $text ) ) {
			$text_title = '<span class="text-popup"'. $custom_text_style .'>'. esc_html( $text ) .'</span>';
		}
		
		$output  = '<div class="align-'. esc_attr( $align ) .' popup-icon '. esc_attr( $video_popup_class ) .'"><a href="'. esc_url( $url ) .'" class="video-icon popup-video">'. $video_popup_img .'<div class="video-content"><div class="video-content-inner">'. $icon .''. $text_title .'</div></div></a></div>';
		return $output;
	}

	add_shortcode( 'video_popup', 'rigel_video_popup' );


	/* =============================================================================
		Dropcaps Shortcodes
	========================================================================== */
	function rigel_dropcaps($atts, $content = null, $code){
		extract(shortcode_atts(array(
		"style" => 'default',
		), $atts)); 
		return '<span class="dropcaps '. esc_attr( $style ) . '">' . esc_html( $content ) . '</span>';
	}

	add_shortcode( 'dropcaps', 'rigel_dropcaps' );

	/* =============================================================================
		Emphasis Shortcodes
	========================================================================== */
	function rigel_emphasis($atts, $content = null, $code){
		return '<div class="emphasis">'. do_shortcode( $content ) .'</div>';
	}

	add_shortcode( 'emphasis', 'rigel_emphasis' );

	/* =============================================================================
		Spacer Shortcodes
	========================================================================== */

	function rigel_spacer($atts, $content = null){	
		extract(shortcode_atts(array(
			'height'  => '30px'
		), $atts));
		
		$output  = '<div class="spacer" style="height: '. esc_attr( $height ) .'"></div>';
		return $output;
	}

	add_shortcode( 'spacer', 'rigel_spacer' );

	/* =============================================================================
		Animation Block Shortcodes
	========================================================================== */
	function rigel_animation_block($atts, $content= null){
		extract(shortcode_atts(array(
			'transition' => 'fadeIn',
			'duration' => '',
			'delay' => ''
			), $atts));

		$slideTransition = "";
		$slideDuration = "";
		$slideDelay = "";


		$slideTransition = isset( $transition ) ? ' data-trans="'. esc_attr( $transition ) .'"' : '';

		$slideDuration = isset( $duration ) ? ' data-duration="'. esc_attr( $duration ) .'"' : '';

		$slideDelay = isset( $delay) ? ' data-delay="'. esc_attr( $delay ) .'"' : '';


		$output = '<div class="pix-animate-cre"'. $slideTransition .''. $slideDuration .''. $slideDelay .'>'. do_shortcode( trim( $content ) ) .'</div>';

		return $output;
	}

	add_shortcode( 'animation_block', 'rigel_animation_block' );


	/* =============================================================================
		 Social Shortcodes
	   ========================================================================== */

	function rigel_social($atts, $content = null){	
		extract(shortcode_atts(array(
			'style' => '',
			'align' => '',
			'facebook'  => '',
			'twitter' => '',
			'gplus' => '',
			'linkedin' => '',
			'dribble' => '',
			'flickr' => '',
			'pinterest' => '',
			'tumblr' => '',
			'instagram' => '',
			'rss' => '',
			'github' => '',
			'youtube' => ''
		), $atts));

		//social icons

		$social_icons = '<div class="full-width-icon '. esc_attr( $style ) .' '. esc_attr( $align ) .'"><div class="social-icons">';

		if( !empty( $facebook ) ) {
			$social_icons .= '<a href="'.esc_url( $facebook ).'" target="_blank" title="Facebook" class="facebook"><i class="pixicon-facebook"></i></a>';
		}

		if( !empty( $twitter ) ) {
			$social_icons .= '<a href="'.esc_url( $twitter ).'" target="_blank" title="Twitter" class="twitter"><i class="pixicon-twitter"></i></a>';
		}

		if( !empty( $gplus ) ) {
			$social_icons .= '<a href="'. esc_url( $gplus ).'" target="_blank" title="Gplus" class="google-plus"><i class="pixicon-gplus"></i></a>';
		}

		if( !empty( $linkedin ) ) {
			$social_icons .= '<a href="'. esc_url( $linkedin ).'" target="_blank" title="linkedin" class="linkedin"><i class="pixicon-linked-in"></i></a>';
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

		if( !empty( $instagram ) ) {
			$social_icons .= '<a href="'. esc_url( $instagram ).'" target="_blank" title="Instagram" class="instagram"><i class="pixicon-instagram"></i></a>';
		}

		if( !empty( $rss ) ) {
			$social_icons .= '<a href="'. esc_url( $rss ).'" target="_blank" title="RSS" class="rss"><i class="pixicon-rss"></i></a>';
		}

		if( !empty( $github ) ) {
			$social_icons .= '<a href="'. esc_url( $github ).'" target="_blank" title="Github" class="github"><i class="pixicon-github-black"></i></a>';
		}

		if( !empty( $youtube ) ) {
			$social_icons .= '<a href="'. esc_url( $youtube ).'" target="_blank" title="Youtube" class="youtube"><i class="pixicon-youtube"></i></a>';
		}

		$social_icons .= '</div></div>';

		return $social_icons;
	}

	add_shortcode( 'social', 'rigel_social' );

	/* =============================================================================
	 Line Shortcodes
	 ========================================================================== */
	function rigel_line($atts, $content = null){	
		extract(shortcode_atts(array(
			'width'  => '75px',
		'align' => 'left', //left, right, center
		'thickness' => '1px',
		'color'	=> '',
		'line_style' => 'line-style1'
		), $atts));

		$line_border = $style = '';

		if( $width != '50px' || $thickness != '1px' || !empty( $color ) ){

			$style .= 'style="';

			$style .= ( $width != '75px' ) ? 'width:'. esc_attr( $width ) .';' : '';

			$style .= ( $thickness != '1px' ) ? 'height:'. esc_attr( $thickness ) .';' : '';

			$style .= ( !empty($color ) ) ? 'background:'. esc_attr( $color ) .';' : '';

			$style .= '"';

		}

		//Title Backround Line
		if( $line_style =='line-style1' ){
			$line_border .= '<div class="line '. esc_attr( $align ) .'" '. esc_attr( $style ) .'></div>';

		}
		elseif ($line_style =='line-style2' ) {
			$line_border .= '<div class="'. esc_attr( $align ) .'" ><span class="line line-2"></span></div>';

		}
		elseif ( $line_style =='line-style3' ) {
			$line_border .= '<div class="'. esc_attr( $align ) .'"><span class="line line-2 line-3"></span></div>';

		}
		elseif ( $line_style =='line-style4' ) {
			$line_border .= '<div class="'. esc_attr( $align ) .'"><span class="line line-2 line-4"></span></div>';

		}
		elseif ( $line_style =='line-style5' ) {
			$line_border .= '<div class="'. esc_attr( $align ) .'"><div class="line round-sep clearfix">
				<span class="round"></span>
				<span class="round"></span>
				<span class="round"></span>
				<span class="round"></span>
			</div></div>';  

		}

		return $line_border;
	}

	add_shortcode( 'line', 'rigel_line' );


	/* =============================================================================
	Button Shortcodes
    ========================================================================== */

	function rigel_button($atts, $content = null){	
		extract(shortcode_atts(array(
			'el_class' => '',
			'button_link'  => '#',
			'title' => '',
			'animated_button' => 'no',
			'button_style' => 'outline',
			'button_type' => 'rectangle',
			'button_size' => 'md',
			'button_text' => 'Click Me!',
			'button_color' => '',
			'button_align' => '',
			'button_icon' => '',
			'button_icon_align' => 'front',
			'button_icon_hover' => 'no',
			'custom_size' => 'no',
			'font_size' => '',
			'padding_custom' => '',
			'target' => '_self',
			'animate' => '',
			'transition' => '',
			'duration' => '',
			'delay' => ''
		), $atts));
		
		$btn_att = vc_build_link($button_link);
		$btn_att['href'] = (isset($btn_att['url']) && !empty($btn_att['url'])) ? $btn_att['url'] : '#';
		$btn_att['title'] = (isset($btn_att['title'])) ? $btn_att['title'] : '';
		$btn_att['target'] = (isset($btn_att['target'])) ? $btn_att['target'] : '';

		$animate_class = $slideTransition = $slideDuration = $slideDelay = $icon_btn = $font = $font_class = $button_icon_front = $button_icon_back = $button_icon_class = "";

		if($animate == "yes"){

			$animate_class = ' pix-animate-cre';

			$slideTransition = isset( $transition ) ? ' data-trans="'. esc_attr( $transition ) .'"' : '';

			$slideDuration = isset( $duration ) ? ' data-duration="'. esc_attr( $duration ) .'"' : '';

			$slideDelay = isset( $delay ) ? ' data-delay="'. esc_attr( $delay ) .'"' : '';

		}

		if($button_icon != "" && $button_icon_align == 'front'){
			$button_icon_front = '<span class="btn-icon button-front '. esc_attr( $button_icon ) .'"></span> ';
			$button_icon_class = 'btn-front';
		}elseif($button_icon != "" && $button_icon_align == 'back'){
			$button_icon_back = ' <span class="btn-icon '. esc_attr( $button_icon ) .'"></span>';
			$button_icon_class = 'btn-front';
		}

		if($custom_size == "yes"){
			$font_class = " btn-custom";
			$font = 'style=';
			$font .= "font-size:". esc_attr( $font_size ) .";";
			$font .= "padding: ". esc_attr( $padding_custom ) .";'";
		}
		
		if($animated_button == "yes"){
			$font_class = " animated-button";
			$button_text_span = rigel_split_letter( $button_text );
		}

		if($animated_button == "yes"){
			$output = '<div class="pix_button clear '. esc_attr( $button_align ) .'"><a href="'. esc_url($btn_att['href']) .'" title="'. esc_attr( $btn_att['title'] ) .'" '. ((!empty($btn_att['target'])) ? ' target="'. $btn_att['target'] .'"' : '').' class="btn btn-'. esc_attr( $button_style ) .' btn-rectangle '. $button_icon_class .' btn-'. esc_attr( $button_size) .' '. esc_attr( $button_color ).''. esc_attr( $animate_class ) .''. $font_class .' '. esc_attr( $el_class ) .'"'. $slideTransition .''. $slideDuration .''. $slideDelay .''. $font .' data-text="'. esc_attr( $button_text ) .'">'. $button_icon_front .''. $button_text_span .''. $button_icon_back .'</a></div>';
		}
		else{
			$output = '<div class="pix_button clear '. esc_attr( $button_align ) .'"><a href="'. esc_url( $btn_att['href'] ) .'" title="'.$btn_att['title'] .'" '. ( ( !empty( $btn_att['target'] ) ) ? ' target="'. esc_attr( $btn_att['target'] ) .'"' : '').' class="btn btn-'. esc_attr( $button_style ) .' btn-rectangle '. esc_attr( $button_icon_class ) .' btn-'. esc_attr( $button_size ) .' '. esc_attr( $button_color ).''. esc_attr( $animate_class ) .''. $font_class .' '. esc_attr($el_class) .'"'. $slideTransition .''. $slideDuration .''. $slideDelay .''. $font .'>'. $button_icon_front .''. esc_html( $button_text ) .''. $button_icon_back .'</a></div>';
		}

		return $output;
	}

	add_shortcode( 'button', 'rigel_button' );


	/* =============================================================================
		 Call Out Box Shortcodes
	   ========================================================================== */

	function rigel_callout_box($atts, $content = null){
		extract(shortcode_atts(array(
			'el_class' => '',
			'animate' => '',
			'transition' => '',
			'duration' => '',
			'delay' => '',
			'callout_icon' => '',
			'title' => esc_html__('Section Title', 'rigel'),
			'title_tag' => 'h2',
			'display_button' => 'yes',
			'button_text' => esc_html__('Read more', 'rigel'),
			'button_link'  => '',
			'button_style' => 'outline',
			'button_type' => 'oval',
			'button_color' => '',
			'button_size' => 'medium',
			'button_icon' => '',
		), $atts));

		$btn_att = vc_build_link($button_link);
		$btn_att['href'] = (isset($btn_att['url']) && !empty($btn_att['url'])) ? $btn_att['url'] : '#';
		$btn_att['title'] = (isset($btn_att['title'])) ? $btn_att['title'] : '';
		$btn_att['target'] = (isset($btn_att['target'])) ? $btn_att['target'] : '';

		$animate_class = "";
		$slideTransition = "";
		$slideDuration = "";
		$slideDelay = "";

		if($animate == "yes"){

			$animate_class = ' pix-animate-cre';

			$slideTransition = isset( $transition ) ? ' data-trans="'. esc_attr( $transition ) .'"' : '';

			$slideDuration = isset( $duration ) ? ' data-duration="'. esc_attr( $duration ) .'"' : '';

			$slideDelay = isset( $delay ) ? ' data-delay="'. esc_attr( $delay ) .'"' : '';

		}

		$button_icon = !empty( $button_icon ) ? ' <span class="pix-icon '. esc_attr( $button_icon ) .'"></span>' : '';

		$callout_icon = !empty( $callout_icon ) ? ' <span class="callout-icon '. esc_attr( $callout_icon ) .'"></span>' : '';

		$button = "";
		if($display_button == 'yes'){
			$button = '<p class="sepCenter"><a href="'. esc_url( $btn_att['href'] ) .'" title="'. esc_attr($btn_att['title']) .'" '. ( ( !empty( $btn_att['target'] ) ) ? ' target="'. esc_attr( $btn_att['target'] ) .'"' : '').' class="btn btn-'. esc_attr( $button_style ) .' btn-rectangle btn-'. esc_attr( $button_size ) .' '. esc_attr( $button_color ) .'">'. esc_html( $button_text ) .''. $button_icon .'</a></p>';
		}
		
		$output  = '<section class="callOut newSection '. esc_attr( $el_class ) .' '. esc_attr( $animate_class ) .'"'. $slideTransition .''. $slideDuration .''. $slideDelay .'>';
		$output .= '<div class="callout-content">';
		$output .= $callout_icon;
		$output .= '<div class="callout-inner-content">';
		$output .= '<'. rigel_title_tag( $title_tag ) .' class="title">'. esc_html( $title ) .'</'. rigel_title_tag( $title_tag ) .'>';
		$output .= wpb_js_remove_wpautop( $content );
		$output .= '</div>';
		$output .= '</div>';
		$output .= '<div class="buttons clearfix">'. $button .'</div>';
		$output .= '</section>';

		return $output;
	}

	add_shortcode( 'callout_box', 'rigel_callout_box' );


	/* =============================================================================
		 Icon Shortcodes
	   ========================================================================== */

	function rigel_icon($atts, $content= null){
		extract(shortcode_atts(array(
			'animate' => 'no',
			'transition' => '',
			'duration' => '',
			'delay' => '',
			'align' => 'center',
			'icon_name' => '',
			'icon_style' => 'default',
			'icon_type' => 'default',
			'icon_color' => '',
			'icon_size' => '',
			'icon_bg_color' => '',
			'title' => '',
			'title_tag' => 'h2',
			'text_font' => '',
			'text_color' => '',
			'margin' => ''
		), $atts));

		$animate_class = "";
		$slideTransition = "";
		$slideDuration = "";
		$slideDelay = "";

		if($animate == "yes"){

			$animate_class = ' pix-animate-cre';

			$slideTransition = isset( $transition ) ? ' data-trans="'. esc_attr( $transition ) .'"' : '';

			$slideDuration = isset( $duration ) ? ' data-duration="'. esc_attr( $duration ) .'"' : '';

			$slideDelay = isset( $delay ) ? ' data-delay="'. esc_attr( $delay ) .'"' : '';

		}

		$custom_text_style = '';
		if($text_font != '' || $text_color != '' || $margin != '' ){

			$custom_text_style .= ' style="';

			$custom_text_style .= ( $text_font != '' ) ? 'font-size:'. esc_attr( $text_font ) .';' : '';

			$custom_text_style .= ( $text_color != '' ) ? 'color:'. esc_attr( $text_color ) .';' : '';

			$custom_text_style .= ( $margin != '' ) ? 'margin:'. esc_attr( $margin ) .';' : '';

			$custom_text_style .= '"';

		}

		$custom_icon_style = '';
		if($icon_size != '' || $icon_color != '' || $icon_bg_color != '' ){

			$custom_icon_style .= ' style="';

			$custom_icon_style .= ( $icon_size != '' ) ? 'font-size:'. esc_attr( $icon_size ) .';' : '';

			$custom_icon_style .= ( $icon_color != '' ) ? 'color:'. esc_attr( $icon_color ) .';' : '';

			$custom_icon_style .= ( $icon_bg_color != '' ) ? 'background:'. esc_attr( $icon_bg_color ) .';' : '';

			$custom_icon_style .= '"';

		}

		$output = '<div class="pix-icons clearfix '. esc_attr( $align ) .' '. esc_attr( $animate_class ) .'"'. $slideTransition .' '. $slideDuration .' '. $slideDelay .'>';
		$output .= '<span class="icon '. esc_attr( $icon_name ) .' '. esc_attr( $icon_style ) .' '. esc_attr( $icon_type ) .'"'. $custom_icon_style .'></span>';

		if($title != ''){
			$output .= '<'. rigel_title_tag( $title_tag ) .' class="title"'. esc_attr( $custom_text_style ) .'>'. esc_html( $title ) .'</'. rigel_title_tag( $title_tag ) .'>';
		}

		$output .= '</div>';
		
		return $output;
	}

	add_shortcode( 'icon', 'rigel_icon' );


	/* =============================================================================
	 Icon Box Shortcodes
   ========================================================================== */

   function rigel_icon_box($atts, $content= null){
   		extract(shortcode_atts(array(
			'el_class'            => '',
			'animate'             => 'No',
			'transition'          => '',
			'duration'            => '',
			'delay'               => '',
			'align'               => 'text-center',
			'icon_style'          => 'default',
			'icon_name'           => '',
			'custom_icon_size'    => '',
			'icon_color'          => '',
			'icon_bg_color'       => '',
			'icon_border_color'   => '',
			'icon_margin'         => '',
			'icon_width'          => '',
			'icon_height'         => '',
			'icon_line_height'    => '',
			'icon_border_radius'  => '',
			'title'               => 'Title',
			'title_tag'           => 'h2',
			'custom_size'         => '',
			'title_color'         => '',
			'title_bg_color'      => '',
			'title_margin'        => '',
			'title_padding'       => '',
			'title_border_radius' => '',
			'title_display'       => '',
			'title_uppercase'     => 'yes',
			'title_letter_space'  => '',
			'display_button'      => 'yes',
			'button_text'         => 'Read more',
			'button_link'         => '',
			'button_style'        => 'outline',
			'button_size'         => 'small',
			'button_color'        => 'no-color',
			'button_icon'         => '',
			'title_font'	      => "{'family':'none', 'variant':'none', 'size':''}",
			'content_font'	      => "{'family':'none', 'variant':'none', 'size':''}",
   		), $atts));

   		$btn_att = vc_build_link($button_link);
   		$btn_att['href'] = ( isset($btn_att['url'] ) && !empty( $btn_att['url'] ) ) ? $btn_att['url'] : '#';
   		$btn_att['title'] = ( isset($btn_att['title'] ) ) ? $btn_att['title'] : '';
   		$btn_att['target'] = ( isset($btn_att['target'] ) ) ? $btn_att['target'] : '';


   		$animate_class = $slideTransition = $slideDuration = $slideDelay = $icon_image_class = $icon_image_link = $img = $custom_icon_color_style = "";

   		if( $animate == "yes" ){

   			$animate_class = ' pix-animate-cre';

   			$slideTransition = isset( $transition ) ? ' data-trans="'. esc_attr( $transition ) .'"' : '';

   			$slideDuration = isset( $duration ) ? ' data-duration="'. esc_attr( $duration ) .'"' : '';

   			$slideDelay = isset( $delay ) ? ' data-delay="'. esc_attr( $delay ) .'"' : '';

   		}

   		if($display_button == 'yes' && $button_link != ''){
   			$icon_image_link = '<div class="icon-center"><a href="'. esc_url( $btn_att['href'] ) .'" '. ( ( !empty( $btn_att['target'] ) ) ? ' target="'. esc_attr( $btn_att['target'] ) .'"' : '' ).'><i class="pixicon-eleganticons-3"></i></a></div>';
   		}

   		$button = "";
   		if($display_button == 'yes'){
   			$button = '<p class="sepCenter"><a href="'. esc_url( $btn_att['href'] ) .'" title="'. esc_attr( $btn_att['title'] ) .'" '. ( ( !empty( $btn_att['target'] ) ) ? ' target="'. esc_attr( $btn_att['target'] ) .'"' : '' ).' class="btn btn-'. esc_attr( $button_style ) .' btn-rectangle btn-'. esc_attr( $button_size ) .' '. esc_attr( $button_color ) .'">'. esc_html( $button_text ) .' <span class="btn-icon pix-icon '. esc_attr( $button_icon ) .'"></span></a></p>';
   		}

		//Checking Title Style
		if( !empty( $icon_margin ) || !empty( $custom_font_size ) || !empty( $icon_letter_space ) || !empty( $icon_color ) || !empty( $icon_bg_color ) || !empty( $icon_border_color ) || !empty( $icon_width ) || !empty( $icon_height ) || !empty( $icon_line_height ) || !empty( $icon_border_radius ) || !empty( $icon_display ) ) {
		 	$custom_icon_color_style = ' style="';
		 	$custom_icon_color_style .= !empty( $icon_margin ) ? 'margin: '. esc_attr( $icon_margin ) .'; ' : '';
		 	$custom_icon_color_style .= !empty( $custom_icon_size ) ? 'font-size: '. esc_attr( $custom_icon_size ) .'; ' : '';
		 	$custom_icon_color_style .= !empty( $icon_letter_space ) ? 'letter-spacing: '. esc_attr( $icon_letter_space ) .'; ' : '';
		 	$custom_icon_color_style .= !empty( $icon_color ) ? 'color: '. esc_attr( $icon_color ) .'; ' : '';
		 	$custom_icon_color_style .= !empty( $icon_bg_color ) ? 'background-color: '. esc_attr( $icon_bg_color ) .'; ' : '';
		 	$custom_icon_color_style .= !empty( $icon_border_color ) ? 'border-color: '. esc_attr( $icon_border_color ) .'; ' : '';
		 	$custom_icon_color_style .= !empty( $icon_width ) ? 'width: '. esc_attr( $icon_width ) .'; ' : '';
		 	$custom_icon_color_style .= !empty( $icon_height ) ? 'height: '. esc_attr( $icon_height ) .'; ' : '';
		 	$custom_icon_color_style .= !empty( $icon_line_height ) ? 'line-height: '. esc_attr( $icon_line_height ) .'; ' : '';
		 	$custom_icon_color_style .= !empty( $icon_border_radius ) ? 'border-radius: '. esc_attr( $icon_border_radius ) .'; ' : '';
		 	$custom_icon_color_style .= '"';
		 }

   		$output = '<div class="icon-box '. esc_attr( $icon_style ) .' '. esc_attr( $el_class ) .' '. esc_attr( $align ) .' '. esc_attr( $animate_class ) .'"'. $slideTransition .' '. $slideDuration .' '. $slideDelay .'>';

   			if(!empty($icon_name)){
   				$output .= '<span class="icon-wrap"'. $custom_icon_color_style .'><i class="ama-icon '. esc_attr( $icon_name ) .'"></i></span>';
   			}

   			$output .= '<div class="icon-box-content">';

				$title_uppercase_class = ( 'yes' == $title_uppercase ) ? ' uppercase': ''; 

				$css_style = '';		

				//Checking Title Style
				if( $title_font || !empty( $title_margin ) || !empty( $custom_font_size ) || !empty( $title_letter_space ) || !empty( $title_color ) || !empty( $title_bg_color ) || !empty( $title_padding ) || !empty( $title_border_radius ) || !empty( $title_display ) ) {
				 	$css_style = ' style="';				 	
					$css_style .= RH()->amz_get_font_and_color_styles( $title_font, '', '', 0 );
				 	$css_style .= !empty( $title_margin ) ? 'margin: '. esc_attr( $title_margin ) .'; ' : '';
				 	$css_style .= !empty( $custom_size ) ? 'font-size: '. esc_attr( $custom_size ) .'; ' : '';
				 	$css_style .= !empty( $title_letter_space ) ? 'letter-spacing: '. esc_attr( $title_letter_space ) .'; ' : '';
				 	$css_style .= !empty( $title_color ) ? 'color: '. esc_attr( $title_color ) .'; ' : '';
				 	$css_style .= !empty( $title_bg_color ) ? 'background-color: '. esc_attr( $title_bg_color ) .'; ' : '';
				 	$css_style .= !empty( $title_padding ) ? 'padding: '. esc_attr( $title_padding ) .'; ' : '';
				 	$css_style .= !empty( $title_border_radius ) ? 'border-radius: '. esc_attr( $title_border_radius ) .'; ' : '';
				 	$css_style .= !empty( $title_display ) ? 'display: '. esc_attr( $title_display ) .'; ' : '';
				 	$css_style .= '"';
				 }

				$output .= '<'. rigel_title_tag( $title_tag ) .' class="title'. esc_attr( $title_uppercase_class ).'"'. $css_style .'>'. esc_html( $title ) .'</'. rigel_title_tag( $title_tag ) .'>';

				$content_style = ' style="' . RH()->amz_get_font_and_color_styles( $content_font, '', '', 0 ) . '"';

   				$output .= '<div class="content"'. $content_style .'>'. wpb_js_remove_wpautop( $content, true ) .'</div>';
   				$output .= $button;
   			$output .= '</div>';
   		$output .= '</div>';
   		
   		return $output;
   	}

   	add_shortcode( 'icon_box', 'rigel_icon_box' );

   	/* =============================================================================
		 Process Shortcodes
	   ========================================================================== */

	function rigel_process($atts, $content = null){
		extract(shortcode_atts(array(
			'el_class' => '',
			'number_text' => '00',
			'title' => 'title',
			'process_content' => 'No',
			'animate' => '',
			'transition' => '',
			'duration' => '',
			'delay' => ''
		), $atts));

		$animate_class = "";
		$slideTransition = "";
		$slideDuration = "";
		$slideDelay = "";

		if($animate == "yes"){

			$animate_class = ' pix-animate-cre';

			$slideTransition = isset( $transition ) ? ' data-trans="'. esc_attr( $transition ) .'"' : '';

			$slideDuration = isset( $duration ) ? ' data-duration="'. esc_attr( $duration ) .'"' : '';

			$slideDelay = isset( $delay ) ? ' data-delay="'. esc_attr( $delay ) .'"' : '';
		}
		
		$output = '<div class="process '. esc_attr( $el_class ) .' '. esc_attr( $animate_class ) .'"'. $slideTransition .''. $slideDuration .''. $slideDelay .'>';
		if( !empty( $number_text ) ) {
			$output .= '<span class="number-style">'. esc_html( $number_text ) .'</span>';
		}
		if( !empty( $title ) ) {
			$output .= '<p class="title">'. esc_html( $title ) .'</p>';
		}
		if( 'yes' == $process_content ){
			$output .= '<p class="content">'. wpb_js_remove_wpautop( $content ) .'</p>';
		}
		$output .= '</div>';
				
		return $output;
		
	}

	add_shortcode( 'process', 'rigel_process' );


	/* =============================================================================
	 Text Rotator Shortcodes
	 ========================================================================== */

	function rigel_text_rotator($atts, $content = null, $code){
		extract(shortcode_atts(array(
			'el_class'         => '',
			'static_text'      => '',
			'text_rotator'     => esc_html__('These are the default values..., You know what you should do?, Use your own!, Have a great day!', 'rigel'),
			'align'            => 'left',
			'title_uppercase'  => 'yes',
			'custom_font_size' => '',
			'title_margin'     => '',
			'text_color'       => '',
			'font_weight'	   => 'bold',
			'loop'             => 'true',
			'cursor'           => 'true',
			'back_delay'       => '700',
			'type_speed'       => '50',
		), $atts));

		$output = $sub_text = $sub_class = $class = $css_style = "";

		$title_uppercase_class = ( 'yes' == $title_uppercase ) ? ' uppercase': '';

		//Check Alignment
		if( $align == 'right' ){
			$class = ' alignRight';
		}
		elseif ( $align == 'center' ) {
			$class = ' alignCenter';
		}

		if( !empty( $title_margin ) || !empty( $custom_font_size ) || !empty( $text_color ) ){
			$css_style .= 'style="';
		}

			$css_style .= !empty( $title_margin ) ? 'margin: '. esc_attr( $title_margin ) .'; ' : '';
			$css_style .= !empty( $text_color ) ? 'color: '. esc_attr( $text_color ) .'; ' : '';
			$css_style .= !empty( $custom_font_size ) ? 'font-size: '. esc_attr( $custom_font_size ) .'; ' : '';
		
		if( !empty( $title_margin ) || !empty( $custom_font_size ) || !empty( $text_color ) ){
			$css_style .= '"';
		}

		$output .= '<div class="'. esc_attr( $font_weight ) . ' ' . esc_attr( $el_class ) .' typed-wrap main-title '. esc_attr( $title_uppercase_class ) . ' ' . esc_attr( $class ) .'"'. $css_style .'>';
		if ( !empty( $text_rotator ) ) {
			$text_rotator = ' data-strings="'. esc_attr( $text_rotator ) .'" data-loop="'. esc_attr( $loop ) .'" data-cursor="'. esc_attr( $cursor ) .'" data-back-delay="'. esc_attr( $back_delay ) .'" data-type-speed="'. esc_attr( $type_speed ) .'"';
		}
		$output .= esc_html( $static_text ) . '<span class="typed"'. $text_rotator .'></span>';
		$output .= '</div>';

		return $output;
	}

	add_shortcode( 'text_rotator', 'rigel_text_rotator' );

	/* =============================================================================
	 Heading Shortcodes
	 ========================================================================== */

	function rigel_title($atts, $content = null, $code){
		extract(shortcode_atts(array(
			'el_class' => '',
			'title_tag' => 'h2',
			'style' => '',
			'title' => 'Your Heading Text Goes Here...',
			'sub_title'=> 'yes',
			'sub_title_text' =>'',
			'font_size' => '',
			'custom_font_size' => '',
			'align' => 'left',
			'line' => 'yes',
			'line_positions' => 'below-title', // below-sub-title |  below-title
			'title_margin' => '',
			'title_uppercase'  => 'yes',
			'animate' => '',
			'transition' => '',
			'duration' => '',
			'delay' => '',
			'sub_title_margin' => '',
			'title_font' => "{'family':'none', 'variant':'none', 'size':''}",
			'sub_title_font' => "{'family':'none', 'variant':'none', 'size':''}",			
		), $atts));

		$output = $animate_class = $slideTransition = $slideDuration = $slideDelay = $sub_text = $sub_class = "";
		
		$title_uppercase_class = ( 'yes' == $title_uppercase ) ? ' uppercase': '';

		if ( $animate == "yes" ) {

			$animate_class = ' pix-animate-cre';

			$slideTransition = isset( $transition ) ? ' data-trans="'. esc_attr( $transition ) .'"' : '';
			
			$slideDuration = isset( $duration ) ? ' data-duration="'. esc_attr( $duration ) .'"' : '';
			
			$slideDelay = isset( $delay ) ? ' data-delay="'. esc_attr( $delay ) .'"' : '';

		}		

		$class = '';

		//Checking Title Style
		$css_style = 'style="';
		$css_style .= RH()->amz_get_font_and_color_styles( $title_font, '', '', 0 );
		$css_style .= !empty( $title_margin ) ? 'margin: '. esc_attr( $title_margin ) .'; ' : '';
		$css_style .= !empty( $custom_font_size ) ? 'font-size: '. esc_attr( $custom_font_size ) .'; ' : '';
		$css_style .= '"';

		if( $sub_title == "yes" && !empty( $sub_title_text ) ){

			$sub_title_margin = ( !empty( $sub_title_margin ) ) ? 'style="margin-bottom:'. esc_attr( $sub_title_margin ) .';'. RH()->amz_get_font_and_color_styles( $sub_title_font, '', '', 0 ) .'"' : '';

			$sub_title_style = '';

			if( $sub_title_margin || $sub_title_font != "{'family':'none', 'variant':'none', 'size':''}" ) {
				$sub_title_style .= 'style="';
				$sub_title_style .= ( !empty( $sub_title_margin ) ) ? 'margin-bottom:'. esc_attr( $sub_title_margin ) .';"' : '';
				$sub_title_style .= RH()->amz_get_font_and_color_styles( $sub_title_font, '', '', 0 );

				$sub_title_style .= '"';
			}

			$sub_text = '<p class="sub-title" '. $sub_title_style .'>'. esc_html( $sub_title_text ) .'</p>';
			$sub_class = ' sub-title-con';
		}

		/* Font Size */
		if ( $font_size == "size-md" ) {
			$class .= ' size-md';
		} elseif ($font_size == 'size-lg') {
			$class .= ' size-lg';
		}else{
			$class .= ' size-sm';
		}

		//Check Alignment
		if ( $align == 'right' ) {
			$class .= ' align-right';
		} elseif ( $align == 'center' ) {
			$class .= ' align-center';
		}

		$line_border ='';

		//Title Backround Line
		if ( $line == 'yes' ) {
			$line_border = ' <span class="line"></span>';
		} 

		$output .='<div class="'. esc_attr( $class ) .' clearfix'. ( ( $line == 'yes' && $line_positions == 'below-sub-title' ) ? ' below-sub-title' : '' ) .' '. esc_attr( $animate_class ) .'"'. $slideTransition .' '. $slideDuration .' '. $slideDelay .'>';

			$output  .= '<'. rigel_title_tag( $title_tag ) .' class="main-title title'. esc_attr( $title_uppercase_class . $sub_class .' '. $el_class .''. $style ) .'"' .' '. $css_style .'>';

			$output .= esc_html( $title );
			
			$output .= '</'. rigel_title_tag( $title_tag ) .'>';

			if( $line_positions == 'below-title' ){
				$output .= $line_border;
			}

			$output .= $sub_text;

			if( $line_positions == 'below-sub-title' ){
				$output .= $line_border;
			}
		
		$output .='</div>';

		return $output;
	}

	add_shortcode( 'title', 'rigel_title' );

	/* =============================================================================
	 Blog Shortcodes
    ========================================================================== */
	function rigel_blog($atts, $content = null){
		extract(shortcode_atts(array(
			'no_of_items'      => 6,
			'insert_type'      => 'posts', //posts, id, category
			'id'               => '',
			'category'         => '',
			'exclude_id'       => '',
			'exclude_category' => '',
			'title_length'     => 30,
			'excerpt_length'   => 90,
			'order_by'         => 'date', //'none', ID', 'author' , 'title', 'name', 'date', 'modified', 'parent', 'rand'
			'order'            => 'asc', //desc, asc
			'columns'          => 'col3', //col2, col3, col4
			'display_cat'      => 'yes',
			'display_date'     => 'yes',
			'display_author'   => 'yes',
			'slider'           => 'yes',
			'loop'             => 'false',
			'margin'           => '30',
			'center'           => 'false',
			'stage_padding'    => '0',
			'start_position'   => '0',
			'slider_pagination'       => 'true',
			'touch_drag'       => 'true',
			'mouse_drag'       => 'true',
			'stop_on_hover'    => 'true',
			'slide_arrow'      => 'true',
			'arrow_type'       => '',
			'slide_speed'      => '5000',
			'autoplay'         => 'false',
			'animate_out'      => 'false',
			'animate_in'       => 'false',
		), $atts));

		//Build id and category as array
		$post_in = array_filter( explode( ",",$id ) );
		$category = array_filter( explode( ",",$category ) );

		//convert category slug into category id
		$term = $term_id = array();
		if(!empty($category)) {
			foreach ( $category as $key => $cat ) {
				$term[] = get_category_by_slug( $cat );
				$term_id[] = $term[$key]->term_id;
			}
		}

		//Build post__not_in and category__not_in as array
		$id = get_the_ID();
		$post_not_in = array_filter( explode( ",", $exclude_id ) );
		$post_not_in = array_merge( ( array )$id,$post_not_in) ;
		$category_not_in = array_filter( explode( ",", $exclude_category ) );

		//convert exclude category slug into category id
		$exclude_term = $exclude_term_id = array();
		if( !empty( $category_not_in ) ) {
			foreach ( $category_not_in as $key => $exclude_cat ) {
				$exclude_term[] = get_category_by_slug( $exclude_cat );
				$exclude_term_id[] = $exclude_term[$key]->term_id;
			}
		}

		//Query arguement for Insert type: Posts, Category, ID
		if( $insert_type == 'id' && !empty( $post_in ) ){
			$args = array(		
				'post_status' => 'publish',		
				'order' => $order,
				'orderby' => $order_by,
				'posts_per_page' => ( !empty( $no_of_items ) && is_numeric( $no_of_items ) ) ? $no_of_items : 6,
				'post__in' => $post_in,
				'post__not_in' => $post_not_in
			);
		}

		else if( $insert_type == 'category' && !empty( $category ) ){
			$args = array(
				'post_status' => 'publish',
				'orderby' => $order_by,
				'order' => $order,
				'posts_per_page' => ( !empty( $no_of_items ) && is_numeric( $no_of_items ) ) ? $no_of_items : 6,
				'post__not_in' => $post_not_in,
				'category__in' => $term_id,
				'category__not_in'=> $exclude_term_id
			);
		}
		else{
			$args = array(
				'post_status' => 'publish',
				'orderby' => $order_by,
				'order' => $order,
				'posts_per_page' => ( !empty( $no_of_items ) && is_numeric( $no_of_items ) ) ? $no_of_items : 6,
				'post__not_in' => $post_not_in
			);
		}

		//Build taxonomy query for removing quote and link post format posts
		$tax_query = array(
			array(
				'taxonomy' => 'post_format',
				'field' => 'slug',
				'terms' => array( 'post-format-quote', 'post-format-link' ),
				'operator' => 'NOT IN',
			)
		);

		//Combine taxonomy query with main query
		$args = array_merge( $args, array( 'tax_query' => $tax_query ) );

		//Set column class, slider count, width and height
		if ( $columns == 'col3' ) {
			$class = 'col-md-4';				
			$slide_items = 3;
			$width = 377;
			$height = 220;
		} elseif ( $columns == 'col4' ) {
			$class = 'col-md-3';			
			$slide_items = 4;
			$width = 282;
			$height = 220;
		} else {
			$class = 'col-md-6';				
			$slide_items = 2;
			$width = 567;
			$height = 220;
		}
		if($slider == 'yes'){
			$class = '';	
		}

		if( ! empty( $excerpt_length ) && is_numeric( $excerpt_length ) ){
			$shorten_length = absint( $excerpt_length );
		}		

		//Display slider pagination
		if($slider_pagination == 'false'){
			$page_class = ' no-pagi-carousel';
		}
		else {
			$page_class = '';
		}


		//VC_COLUMNS
		if($slider == 'yes'){
			$data = 'data-items="'. esc_attr( $slide_items ) .'" data-loop="'. esc_attr( $loop ) .'" data-margin="'. esc_attr( $margin ) .'" data-center="'. esc_attr( $center ) .'" data-stage-padding="'. esc_attr( $stage_padding ) .'" data-start-position="'. esc_attr( $start_position ) .'" data-dots="'. esc_attr( $slider_pagination ) .'" data-touch-drag="'. esc_attr( $touch_drag ) .'" data-mouse-drag="'. esc_attr( $mouse_drag ) .'" data-autoplay-hover-pause="'. esc_attr( $stop_on_hover ) .'" data-nav="'. esc_attr( $slide_arrow ) .'" data-autoplay-timeout="'. esc_attr( $slide_speed ) .'" data-autoplay="'. esc_attr( $autoplay ) . '" data-animate-in="'. esc_attr( $animate_in ) .'" data-animate-out="'. esc_attr( $animate_out ) .'"';
			$output = '<div class="pix-recent-blog-posts owl-carousel '. esc_attr( $columns ) .' '. esc_attr( $arrow_type ) .''. esc_attr( $page_class ) .'" '. $data .'>';
		}else{
			$output = '<div class="pix-recent-blog-posts row '. $columns .'">';
			$data = '';
		}

		query_posts( $args );

		if( have_posts() ) : while ( have_posts() ) : the_post();
			

			//Display author meta            
            global $post;
            $author_id = $post->post_author;
            $author_name = get_the_author_meta( 'display_name', $author_id );
            $date = get_the_date( get_option( 'date_format' , 'dS F' ) );

            //Display category
            $category = get_the_category();

            if( ( !empty( $author_name ) && 'yes' == $display_author ) || ( !empty( $category ) && 'yes' == $display_cat ) || 'yes' == $display_date ){
                $meta = '<ul class="post-meta">';
	                if( 'yes' == $display_date ){
	                	$meta .= '<li><span>'.esc_html( $date ).'</span> </li>';
	                }
                    if( !empty( $author_name ) && 'yes' == $display_author ){
                        $meta .= '<li class="author">By <span> '. esc_html( $author_name ) .' </span> </li>';
                    }
                    if( !empty( $category ) && 'yes' == $display_cat ){
                        $meta .= '<li class="category"><a href="' . esc_url( get_category_link( $category[0]->term_id ) ) .'">'. esc_html( $category[0]->cat_name ) .'</a></li>';
                    }
                $meta .= '</ul>';                     
            }

			//Shorten Blog Content 
			$post_title = rigel_shorten_text( get_the_title(), $title_length );
			$content = rigel_shorten_text( get_the_excerpt(), $excerpt_length );

			$output .= '<div class="post post-container '. esc_attr( $class ) .'">';

				//Post format
				$post_format = get_post_format();
				$post_format = empty( $post_format ) ? 'standard' : '';

				$output .= '<div class="format-'. esc_attr( $post_format ) .'">';
					$output .= '<a href="'.esc_url( get_permalink() ).'">';
						$output .= rigel_featured_thumbnail( $width, $height, 0, 1, 1 );
					$output .= '</a>';
				$output .= '</div>';

				$output .= '<div class="content">';
					if( !empty( $post_title ) ){
						$output .= '<h3 class="title"><a href="'.esc_url( get_permalink() ).'">'.esc_html( $post_title ).'</a></h3>';
					}
					if( !empty( $content ) ){
						$output .= '<p class="post-desc">'. esc_html( $content ) .'</p>';
					}
					
					$output .= $meta;

				$output .= '</div>';

			$output .= '</div>';

		endwhile; 

		else:
			$output .= '<div class="col-md-12">'. esc_html__('Post Not Found.', 'rigel'). '</div>';
		endif;
	   
		wp_reset_query();

		$output .= '</div>';
		return  $output;
	}

	add_shortcode( 'blog', 'rigel_blog' );


	/* =============================================================================
		 List Style
	   ========================================================================== */

	function rigel_list($atts, $content = null, $code) {
		extract(shortcode_atts(array(
			'style' => ''
		),$atts));
		$output = '<ul class="list">'. wpb_js_remove_wpautop( $content ) .'</ul>';
		return $output;
	}

	function rigel_li($atts, $content = null, $code) {
		extract(shortcode_atts(array(
			'icon_name' => '',
			'icon_color'	=> '',
			'user_icon_color' => '',
		),$atts));

		if($icon_color == 'custom'){
			$user_icon_color = 'style="color:'. esc_attr( $user_icon_color ) .';"';
		}

		if(!empty($icon_name)){
			$output = '<li class="icon-list"><i class="pix-icon '. esc_attr( $icon_name ) .' '. esc_attr( $icon_color ) .'" '. esc_attr( $user_icon_color ) .'></i>'. wpb_js_remove_wpautop( $content ) .'</li>';
		}else{
			$output = '<li>'. wpb_js_remove_wpautop( $content ) .'</li>';
		}
		return $output;
	}

	add_shortcode( 'list', 'rigel_list' );
	add_shortcode( 'li', 'rigel_li' );


	/* =============================================================================
		 Pricing Tables
	   ========================================================================== */

	function rigel_pricing_tables($atts, $content = null){
		extract(shortcode_atts(array(
			'el_class' => '',
			'style' => 'style1',
			'highlight_box' => 'no',
			'animate' => 'no',
			'transition' => '',
			'duration' => '',
			'delay' => '',
			'title_tag' => 'h2',
			'title' => 'Title',
			'currency' => '$',
			'price' => '99.99',
			'period' => 'per month',
			'display_button' => 'yes',
			'button_text' => 'Order Now',
			'button_link'  => '#',
			'button_style' => 'outline',
			'button_type' => 'oval',
			'button_size' => 'md',
			'button_color' => 'no-color',
			'button_icon' => ''
			),$atts));

		$btn_att = vc_build_link( $button_link );		
		$btn_att['href'] = ( isset($btn_att['url'] ) && !empty( $btn_att['url'] ) ) ? $btn_att['url'] : '#';
		$btn_att['title'] = ( isset( $btn_att['title'] ) ) ? $btn_att['title'] : '';
		$btn_att['target'] = ( isset( $btn_att['target'] ) ) ? $btn_att['target'] : '';

		$animate_class = "";
		$slideTransition = "";
		$slideDuration = "";
		$slideDelay = ""; 
		$pricing_table_img = $pricing_table_bg = "";

		if($animate == "Yes"){

			$animate_class = ' pix-animate-cre';

			$slideTransition = isset( $transition ) ? ' data-trans="'. esc_attr( $transition ) .'"' : '';

			$slideDuration = isset( $duration ) ? ' data-duration="'. esc_attr( $duration ) .'"' : '';

			$slideDelay = isset( $delay ) ? ' data-delay="'. esc_attr( $delay ) .'"' : '';

		}

		$button = $line = "";
		if($display_button == 'yes'){
			$button = '<p class="sepCenter"><a href="'. esc_url( $btn_att['href'] ) .'" title="'.esc_attr( $btn_att['title'] ) .'" '. ( ( !empty( $btn_att['target'] ) ) ? ' target="'. esc_attr( $btn_att['target'] ) .'"' : '').' class="btn btn-'. esc_attr( $button_style ) .' btn-'. esc_attr( $button_type ) .' btn-'. esc_attr( $button_size ) .' '. esc_attr( $button_color ) .'">'. esc_html( $button_text ) .' <span class="btn-icon pix-icon '. esc_attr( $button_icon ) .'"></span></a></p>';
		}

		$output = '<div class="pricing-table newSection">';

		if( $highlight_box == 'yes' ){
			$output .= '<div class="price-table bestPlan '. esc_attr( $style ) .''. esc_attr( $animate_class ) .'"'. $slideTransition .''. $slideDuration .''. $slideDelay .'>';
		}
		else{
			$output .= '<div class="price-table '. esc_attr( $style ) .''. esc_attr( $animate_class ) .'"'. $slideTransition .''. $slideDuration .''. $slideDelay .'>';	
		}

		if($style != 'style2'){
			$line = '<span class="line"></span>';
		}

		if($style != 'style7'){
			$output .= '<div class="price-header"><'. rigel_title_tag( $title_tag ) .' class="plan-title">'. esc_html( $title ) .''. $line .'</'. rigel_title_tag( $title_tag ) .'>';
		}

		$price_table_imgbg = wp_get_attachment_image_src( $pricing_table_img, 'full' );
		if( !empty( $price_table_imgbg ) ) {
			$price_table_imgbg2 = aq_resize( $price_table_imgbg[0], 358, 100, true, true ); 			
		}

		$pricing_table_bg .= ' style="';
		$pricing_table_bg .= ( $pricing_table_img != '' ) ? ' background-image: url('. esc_url( $price_table_imgbg2 ) .'); background-position: center center; background-size: cover; background-repeat: no-repeat; -webkit-filter: grayscale(1);' : '';
		$pricing_table_bg .= '"';

		if($style == 'style7'){
			$output .= '<div class="price-header">
			<div '.$pricing_table_bg.' >
			<'. rigel_title_tag( $title_tag ) .' class="plan-title">'. esc_html( $title ) .''. $line .'</'. rigel_title_tag( $title_tag ) .'>
			</div>	';
		}

		$output .= '<p class="value"><span class="vAlign">'.esc_html( $currency ).'</span>'. esc_html( $price ) .'<small>'. esc_html( $period ) .'</small></p>';

			if( $highlight_box == 'yes' && ( $style == 'style3' || $style == 'style5' || $style == 'style7' || $style == 'style8' || $style == 'style9' || $style == 'style10' ) ){
				$output .='<div class="bestplan-icon"></div>';
				$output .='<i class="pixicon-star"></i>';
			}	

			if( $highlight_box == 'yes' && $style == 'style4' ){
				$output .='<p class="bestplan">'. esc_html__( 'BEST VALUE', 'amz-rigel-plugins' ) .'</p>';
			}

		if($style == 'style10'){
			$output .= $button;
		}		
		
			
		$output .= '</div>';
		$output .= wpb_js_remove_wpautop( $content );

		if($style != 'style10'){
			$output .= $button;
		}

		$output .= '</div></div>';
		return $output;
	}

	add_shortcode( 'pricing_tables', 'rigel_pricing_tables' );


	/* =============================================================================
		 Quotes Shortcodes
	   ========================================================================== */

	function rigel_quote($atts, $content = null){
		extract(shortcode_atts(array(
			'author_name' => ''
		), $atts));

		$output = '<div class="quotes">';
			$output .= '<span class="quote"><i class="pixicon-quote"></i></span><p class="author-comment">'. do_shortcode( $content ) .'</p>';
			$output .= '<div class="comment-author-name">'. esc_html( $author_name ) .'</div>';
		$output .= '</div>';
		return $output;
	}

	add_shortcode( 'quote', 'rigel_quote' );


	/* =============================================================================
		 Counters Shortcodes
	   ========================================================================== */
	function rigel_counter( $atts, $content = null ){
		extract(shortcode_atts(array(
			'el_class' => '',
			'number'  => '5000',
			'text' => 'Pizzas ordered',
			'icon' => 'no',
			'icon_name' => '',
			'text_font_size' => '',
			'number_font_size' => ''
		), $atts));

		$number_size = $text_size = $icon_class = '';
		
		if ($number_font_size != '') {
			$number_size = ' style="font-size: '. esc_attr( $number_font_size ) .'";';
		}

		if ( $text_font_size != '' ) {
			$text_size = ' style="font-size: '. esc_attr( $text_font_size ) .'";';
		}
		if( $icon == 'yes' && !empty( $icon_name ) ) {
			$icon_class = ' icon-yes';
		}

		$output ='<div class="counter'. esc_attr( $icon_class ) .' '. esc_attr( $el_class ) .' clearfix">';
		
		if( $icon == 'yes' && !empty( $icon_name ) ){
			$output .='<div class="icon-left"><i class="'. esc_attr( $icon_name ) .'"></i></div>';
		}
			
		$output .= '<div class="counter-box">
					<span class="counter-value"'. esc_attr( $number_size ) .'>'. esc_html( $number ) .'</span>
					<span class="content"'. $text_size .'>'. esc_html( $text ) .'</span>
					</div>	
					</div>';
		return $output;
	}

	add_shortcode( 'counter', 'rigel_counter' );

	/* =============================================================================
		 Clients Shortcodes
	   ========================================================================== */

	function rigel_clients( $atts, $content = null ){
		extract(shortcode_atts(array(
			'link'                => 'yes',
			'custom_links'        => '',
			'custom_links_target' => '_self',
			'title_on_hover'      => 'yes',
			'style'               => '',
			'titles'              => '',
			'images'              => '',
			'items'               => '4',
			'slider'              => 'yes',
			'loop'                => 'false',
			'margin'              => '30',
			'center'              => 'false',
			'stage_padding'       => '0',
			'start_position'      => '0',
			'pagination'          => 'true',
			'touch_drag'          => 'true',
			'mouse_drag'          => 'true',
			'stop_on_hover'       => 'true',
			'slide_arrow'         => 'true',
			'arrow_type'          => '',
			'slide_speed'         => '5000',
			'autoplay'            => 'false',
			'animate_out'         => 'false',
			'animate_in'          => 'false',
		), $atts));

		$class = $data = $client_class = $pagi = $img = $page_class = '';

		if ( $link == 'yes' ) { $custom_links = explode( ',', $custom_links); }
		if ( $title_on_hover == 'yes' ) { $titles = explode( ',', $titles); }
		$images = explode( ',', $images );
		$i = -1;

		if($pagination == 'false'){
			$page_class = ' no-pagi-carousel';
		}
		
		if($slider == 'yes'){
			$client_class = " owl-carousel {$page_class}";
			$data = 'data-items="'. esc_attr( $items ) .'" data-loop="'. esc_attr( $loop ) .'" data-margin="'. esc_attr( $margin ) .'" data-center="'. esc_attr( $center ) .'" data-stage-padding="'. esc_attr( $stage_padding ) .'" data-start-position="'. esc_attr( $start_position ) .'" data-dots="'. esc_attr( $pagination ) .'" data-touch-drag="'. esc_attr( $touch_drag ) .'" data-mouse-drag="'. esc_attr( $mouse_drag ) .'" data-autoplay-hover-pause="'. esc_attr( $stop_on_hover ) .'" data-nav="'. esc_attr( $slide_arrow ) .'" data-autoplay-timeout="'. esc_attr( $slide_speed ) .'" data-autoplay="'. esc_attr( $autoplay ) . '" data-animate-in="'. esc_attr( $animate_in ) .'" data-animate-out="'. esc_attr( $animate_out ) .'"';
		}else{
			$client_class = ' no-clients-carousel';
			}
		if($pagination == "false"){
			$pagi .= " no-pagination";
		}

		if($items == "2"){
			$class = " item-2";
		}elseif($items == "5"){
			$class = " item-5";
		}elseif($items == "6"){
			$class = " item-6";
		}elseif($items == "3"){
			$class = " item-3";
		}else {
			$class = " item-4";
		}

		$output =	'<div class="clients'. esc_attr( $client_class . $pagi . $class .' '. $arrow_type .' '. $style ) .' clearfix" '. $data .'>';

		foreach ($images as $attach_id ) {
			$i++;

			if ($attach_id > 0) {
				$image_thumb_url = wp_get_attachment_image_src( $attach_id, 'full');
				if( !empty( $image_thumb_url ) ){
					$img = aq_resize( $image_thumb_url[0], 280, 140, true, true ); 
				}

				if( !$img ){
					$img = $image_thumb_url[0];
				}

				$output .= '<div class="client">';

					if( $link == 'yes' && !empty( $custom_links[$i] ) ){
						$output .= '<a href="'. esc_url( $custom_links[$i] ) .'" target="_blank">';
					}

						$output .= '<img src="'. esc_url( $img ) .'" alt="">';

						if( $title_on_hover == 'yes' && !empty( $titles[$i] ) ){
							$output .= '<div class="client-title-hover"><span>'. esc_html( $titles[$i] ) .'</span></div>';
						}
					
					if( $link == 'yes' ){
						$output .= '</a>';
					}    		

				$output .= '</div>';

			}
		}
						
		$output .=	'</div>';
		return $output;		
	}

	add_shortcode( 'clients', 'rigel_clients' );

	function rigel_theme_gallery_shortcode($attr) {
		
		wp_enqueue_style('flexslider');
		wp_enqueue_script( 'flexslider-js' );
		wp_enqueue_script( 'gallery-script' );
		
		$post = get_post();

		static $instance = 0;
		$instance++;

		if ( ! empty( $attr['ids'] ) ) {
			// 'ids' is explicitly ordered, unless you specify otherwise.
			if ( empty( $attr['orderby'] ) )
				$attr['orderby'] = 'post__in';
			$attr['include'] = $attr['ids'];
		}

		// Allow plugins/themes to override the default gallery template.
		$output = apply_filters('post_gallery', '', $attr);
		if ( $output != '' )
			return $output;

		// We're trusting author input, so let's at least make sure it looks like a valid orderby statement
		if ( isset( $attr['orderby'] ) ) {
			$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
			if ( !$attr['orderby'] )
				unset( $attr['orderby'] );
		}

		extract(shortcode_atts(array(
			'order'      => 'ASC',
			'orderby'    => 'menu_order ID',
			'id'         => $post->ID,
			'itemtag'    => 'li',
			'columns'    => 3,
			'size'       => 'large',
			'include'    => '',
			'exclude'    => ''
		), $attr));

		$id = intval($id);
		if ( 'RAND' == $order )
			$orderby = 'none';

		if ( !empty($include) ) {
			$_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

			$attachments = array();
			foreach ( $_attachments as $key => $val ) {
				$attachments[$val->ID] = $_attachments[$key];
			}
		} elseif ( !empty($exclude) ) {
			$attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
		} else {
			$attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
		}

		if ( empty($attachments) )
			return '';

		if ( is_feed() ) {
			$output = "\n";
			foreach ( $attachments as $att_id => $attachment )
				$output .= wp_get_attachment_link($att_id, $size, true) . "\n";
			return $output;
		}

		$itemtag = tag_escape($itemtag);
		$columns = intval($columns);
		$itemwidth = $columns > 0 ? floor(100/$columns) : 100;
		$float = is_rtl() ? 'right' : 'left';

		$selector = "gallery-{$instance}";

		$gallery_style = $gallery_div = '';
			
		$size_class = sanitize_html_class( $size );
		$gallery_div = '<section class="gallery-container"><div id="'. $selector .'" class="flexslider gallery-slider"><ul class="slides">';
		$output = apply_filters( 'gallery_style', $gallery_style . "\n\t\t" . $gallery_div );

		$i = 0;
		foreach ( $attachments as $id => $attachment ) {		
			add_filter('wp_get_attachment_image_attributes', 'unset', 10, 2);	
		
			$url = wp_get_attachment_url( $attachment->ID );
			$text = '';
			if ( trim( $text ) == '' )
				$text = $attachment->post_title;
			
			$crop = true; //resize but retain proportions
			$single = true; //return array
				
			if(!empty($url)){
				$url_resize = aq_resize($url, 817, 400, $crop, $single);
				if(!$url_resize){
					$url_resize = $url;
				}
			}
			$link = "$url_resize";

			$output .= "<{$itemtag}>";
			$output .= '<img src="'. esc_url( $link ) .'"  alt="">';
			$output .= "</{$itemtag}>";
			if ( $columns > 0 && ++$i % $columns == 0 )
				$output .= '';
		}
		$output .= '</ul></div>';
		$output .= '<div class="carousel flexslider"><ul class="slides">';
		foreach ( $attachments as $id => $attachment ) {
			add_filter('wp_get_attachment_image_attributes', 'unsets', 10, 2);	
		
			$url = wp_get_attachment_url( $attachment->ID );
			if ( trim( $text ) == '' )
				$text = $attachment->post_title;
			
			$crop = true; //resize but retain proportions
			$single = true; //return array
				
			if( !empty( $url ) ){
				$url_resize = aq_resize( $url, 140, 100, $crop, $single );
				if( !$url_resize ) {
					$url_resize = $url;
				}
			}
			$link = "$url_resize";

			$output .= "<{$itemtag}>";
			$output .= '<img src="'. esc_url( $link ) .'"  alt="">';
			$output .= "</{$itemtag}>";
			if ( $columns > 0 && ++$i % $columns == 0 )
				$output .= '';
		}

		$output .= '</ul></div><div class="sep"></div></section>';

		return $output;
	}

	add_shortcode( 'theme_gallery_shortcode', 'rigel_theme_gallery_shortcode' );

	function rigel_unsets ($attr, $attachment){
		unset( $attr['alt'] ); // Just deleting the alt attr
		return $attr;
	}

	add_shortcode( 'unsets', 'rigel_unsets' );

	// Base shortcodes
	function rigel_blog_link() {
		return '<a href="'. esc_url( home_url( '/' ) ) .'">'. esc_html( get_bloginfo( 'name' ) ) .'</a>';
	}
	add_shortcode('blog-link', 'rigel_blog_link');


