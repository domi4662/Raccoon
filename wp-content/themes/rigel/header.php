<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Rigel
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php rigel_head(); ?>

	<?php wp_head(); ?>
</head>

<?php

	$rigel_id = get_the_ID();

	$rigel_prefix = rigel_get_prefix();

	if( is_home() || is_search() || is_archive() || is_404() || rigel_is_shop() ) {

		${$rigel_prefix.'_header_layout'}        = rigel_get_option_value( 'header_option', 'header-1' );
		${$rigel_prefix.'_header_trans'}         = rigel_get_option_value( $rigel_prefix.'header_trans', 'default' );
		${$rigel_prefix.'_header_trans_val'}     = rigel_get_option_value( $rigel_prefix.'header_trans_val', '0' );
		${$rigel_prefix.'_header_text_color'}    = rigel_get_option_value( $rigel_prefix.'header_text_color', 'dark-header' );
		${$rigel_prefix.'_title_bar_style'}      = rigel_get_option_value( $rigel_prefix.'title_bar_style', 'default' );
		${$rigel_prefix.'_title_bar'}            = rigel_get_option_value( $rigel_prefix.'title_bar', 'show' );
		${$rigel_prefix.'_title_bar_bg_color'}   = rigel_get_option_value( $rigel_prefix.'title_bar_bg_color', '' );
		${$rigel_prefix.'_title_bar_text_color'} = rigel_get_option_value( $rigel_prefix.'title_bar_text_color', '' );
		${$rigel_prefix.'_breadcrumbs'}          = rigel_get_option_value( $rigel_prefix.'breadcrumbs', 'show' );
		${$rigel_prefix.'_layout'}               = rigel_get_option_value( $rigel_prefix.'layout', 'left-sidebar' );
		${$rigel_prefix.'_title_bar_size'}       = rigel_get_option_value( $rigel_prefix.'title_bar_size', 'medium' );
		${$rigel_prefix.'_body_bgcolor'}         = rigel_get_option_value( $rigel_prefix.'body_bgcolor', '#f6f6f6' );
		${$rigel_prefix.'_title_bar_bg_image'}   = rigel_get_option_value( $rigel_prefix.'title_bar_bg_image', '' );
		${$rigel_prefix.'_transition'}           = rigel_get_option_value( 'preloadtrans', 'fadeInUp' );
	}
	else {
		${$rigel_prefix.'_header_layout'}        = rigel_get_meta_value( $rigel_id, '_amz_header_layout', 'default', 'header_option', 'header-1' );
		${$rigel_prefix.'_header_trans'}         = rigel_get_meta_value( $rigel_id, '_amz_header_trans', 'default', 'header_trans', 'disabled' );
		${$rigel_prefix.'_header_trans_val'}     = rigel_get_meta_value( $rigel_id, '_amz_header_trans_val', '0', 'header_trans_val', '0' );
		${$rigel_prefix.'_header_text_color'}    = rigel_get_meta_value( $rigel_id, '_amz_header_text_color', 'default', 'header_text_color', 'dark-header' );
		${$rigel_prefix.'_transition'}           = rigel_get_meta_value( $rigel_id, '_amz_transition', 'default', 'preloadtrans', 'fadeInUp' );
		${$rigel_prefix.'_title_bar'}            = rigel_get_meta_value( $rigel_id, '_amz_title_bar', 'default', 'title_bar', 'show' );
		${$rigel_prefix.'_breadcrumbs'}          = rigel_get_meta_value( $rigel_id, '_amz_breadcrumbs', 'default', 'breadcrumbs', 'show' );
		${$rigel_prefix.'_title_bar_style'}      = rigel_get_meta_value( $rigel_id, '_amz_title_bar_style', 'default', 'title_bar_style', 'default' );
		${$rigel_prefix.'_title_bar_bg_color'}   = rigel_get_meta_value( $rigel_id, '_amz_title_bar_bg_color', '', 'title_bar_bg_color', '' );
		${$rigel_prefix.'_title_bar_text_color'} = rigel_get_meta_value( $rigel_id, '_amz_title_bar_text_color', '', 'title_bar_text_color', '' );
		${$rigel_prefix.'_title_bar_size'}       = rigel_get_meta_value( $rigel_id, '_amz_title_bar_size', 'default', 'title_bar_size', 'medium' );
		${$rigel_prefix.'_title_bar_bg_image'}   = rigel_get_meta_value( $rigel_id, '_amz_title_bar_bg_image', '', 'title_bar_bg_image', '' );
		${$rigel_prefix.'_body_bgcolor'}         = rigel_get_meta_value( $rigel_id, '_amz_body_bgcolor', '#fff', 'body_bgcolor', '#fff' );
		${$rigel_prefix.'_slider_shortcode'}     = rigel_get_meta_value( $rigel_id, '_amz_slider_shortcode', '' );
		${$rigel_prefix.'_layout'}               = rigel_get_meta_value( $rigel_id, '_amz_layout', 'left-sidebar' );
	}

	//Page Title
	${$rigel_prefix.'_page_title'} = rigel_get_page_title();

	// PreLoader with animation
	$rigel_preloader = rigel_get_option_value( 'rigel_preloader', 0 );
	$rigel_transition = rigel_get_option_value( 'preloadtrans', 'fadeInUp' );
	$rigel_preloadtrans = ( 'default' != ${$rigel_prefix.'_transition'} ) ? ${$rigel_prefix.'_transition'} : $rigel_transition;
?>

<body <?php body_class(); ?>>

	<?php if( $rigel_preloader && !isset( $_GET['vc_editable'] ) ) { ?>
		
		<div id="preloader-con">
			<div class="loader">
				<span></span>
				<span></span>
				<span></span>
				<span></span>
				<span></span>
			</div>
		</div>
	
	<?php } // Preloader

	/* Mobile Menu Enable or Disable Dropdown function */
	$rigel_mobile_menu_dropdown =  rigel_get_option_value( 'mobile_menu_dropdown', 1 );
	$rigel_mobile_menu_dropdown = ( !$rigel_mobile_menu_dropdown ) ? 'mobile-menu-dropdown' : '';

	?>


	<div class="mobile-menu-nav"><div class="mobile-menu-inner" <?php echo esc_attr( $rigel_mobile_menu_dropdown ); ?>></div></div>

	<div id="content-pusher">

	<?php 

	$rigel_header_con_class = '';

	$rigel_top_header = rigel_get_option_value( 'top_header', 0 );
	$rigel_top_header_position = rigel_get_option_value( 'top_header_position', 0 );

	$rigel_header_sticky = rigel_get_option_value( 'header_sticky', 1 );
	$rigel_header_trans = rigel_get_option_value( 'header_trans', 'enabled' );

	$rigel_header = ${$rigel_prefix.'_header_layout'};
	/* If content Boxed enabled in themeoption insert this div */
	$boxed_content = rigel_get_option_value( 'boxed_content', 0 );
	if ( $boxed_content ) {
		echo '<div class="pix-boxed-content">';
	}
	
	/* Go to Top Button */
	$go_to_top = rigel_get_option_value( 'go_to_top', 1 );
	$pagetop_class = ( $rigel_header == 'right-header' ) ? 'right-header-top' : '';

	if ( $go_to_top ) {	
		echo '<p id="back-top" class="" '. esc_attr( $pagetop_class ) .'><a href="#top"><span class="pixicon-arrow-angle-up"></span></a></p>';
	}

	if($rigel_header_sticky == 1 && $rigel_header != 'left-header' && $rigel_header != 'right-header'){
		$rigel_header_con_class .= ' pix-sticky-header';
	}

	$title_bar_class = ( $rigel_header_trans && ${$rigel_prefix.'_title_bar'} == 'hide' ) ? ' no-title-bar' : '';

	if( $rigel_header != 'left-header' && $rigel_header != 'right-header' ){

		//Header transparency			
		if ( ${$rigel_prefix.'_header_trans'} == 'enabled' ) {

			$rigel_header_trans = 'enabled';
			
			echo '<div class="transparent-header opacity-'. ${$rigel_prefix.'_header_trans_val'} .' '. ${$rigel_prefix.'_header_text_color'} .'">';

		}
		elseif ( ${$rigel_prefix.'_header_trans'} == 'default' ) {				

			if( 'enabled' == $rigel_header_trans ){
				$rigel_header_trans_val = rigel_get_option_value( 'header_trans_val', '0' );
				echo '<div class="transparent-header opacity-'. $rigel_header_trans_val .' '. ${$rigel_prefix.'_header_text_color'} .'">';
			}
		}

		$rigel_header_show = rigel_get_option_value( 'header_show', 0 );
		$rigel_header_hide = ( !$rigel_header_show ) ? ' hide-header' : '';

		/* Sub Menu Class - Dropdown menu light or dark */
		$rigel_sub_menu = rigel_get_option_value( 'sub_menu', 0 );
		$rigel_sub_class = ( $rigel_sub_menu ) ? ' sub-menu-dark' : '';

		?>
		
		<div class="header-wrap <?php echo esc_attr( $rigel_header . $rigel_sub_class ); ?>">

			<div class="header-con <?php echo esc_attr( $rigel_header_con_class . $rigel_header_hide ); ?>">

				<?php 

					if ( $rigel_top_header == 1 && $rigel_top_header_position == 0 ){
						get_template_part ( 'templates/headers/header-info' );
					}					
					
					get_template_part ( 'templates/headers/'. $rigel_header );

					if (  $rigel_top_header == 1 && $rigel_top_header_position == 1 ){
						get_template_part ( 'templates/headers/header-info' );
					}

				?>

			</div>

		</div>

		<?php

		if( 'enabled' == $rigel_header_trans ){
			echo '</div>';
		}
	
	}

	if( $rigel_header == 'left-header' || $rigel_header == 'right-header' ) {
		if( $rigel_header == 'left-header' ) { 
			echo '<div class="main-side-left">';
		} 
		if( $rigel_header == 'right-header' ){ 
			echo '<div class="main-side-left main-side-right">';
		} ?>
		<div class="left-main-menu">
			<div class="menu-container">

				<?php
					$rigel_logo = rigel_get_option_value( 'custom_logo', get_bloginfo('name') );
					$rigel_logo2x = rigel_get_option_value( 'retina_logo', '' );
				?>

				<div class="m-sticky">
					<div class="container">
						<div id="mobile-logo">	
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="nofollow">
								<?php if ( $rigel_logo != get_bloginfo( 'name' ) ) { ?>
									<img src="<?php echo esc_url( $rigel_logo ); ?>" data-at2x="<?php echo esc_attr( $rigel_logo2x ); ?>" alt="">
								<?php } else {
									$allowed_logo_html = array(
									    'img' => array(
									        'src' => array(),
									        'alt' => array()
									    )
									);
									echo wp_kses( $rigel_logo, $allowed_logo_html );
								} ?>
							</a>
						</div>
						<div class="menu-responsive pix-menu-trigger">
							<span class="mobile-menu"></span>
						</div>
					</div>
				</div>

				<div id="logo">				
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="nofollow">
						<?php if ( $rigel_logo != get_bloginfo( 'name' ) ) { ?>
							<img src="<?php echo esc_url( $rigel_logo ); ?>" data-at2x="<?php echo esc_attr( $rigel_logo2x ); ?>" alt="">
						<?php } else { 
							$allowed_logo_html = array(
							    'img' => array(
							        'src' => array(),
							        'alt' => array()
							    )
							);
							echo wp_kses( $rigel_logo, $allowed_logo_html );
						} ?>
					</a>
				</div>

				<div class="pix-menu">
					<div class="pix-menu-trigger">
						<span class="mobile-menu"><?php esc_html__( 'Menu', 'rigel' ); ?></span>
					</div>
				</div>
				<nav class="main-nav main-nav-left" role="navigation">
					<?php rigel_main_nav(); ?>
				</nav>

				<div class="side-header-widget">
					<?php
						$rigel_side_sorter = array( 
							"left" => array (
								"placebo" => "placebo", //REQUIRED!
								"sicons"      => "Social Icons",	
								"copyright_text" => "Copyright Text"
							)
						);
						$rigel_side_sorter_left = rigel_get_option_array_value('side_sorter','left', $rigel_side_sorter['left'] );
						foreach ( $rigel_side_sorter_left as $key => $value ) {
							rigel_display_header_elements( $key, 'lang-list-wrap', 'page-top-main' );
						} 
					?>
				</div>
				
			</div>
		</div>
	<?php } ?>

	<div id="main-wrapper" class="clearfix <?php echo esc_attr( $rigel_header . $title_bar_class ); ?>" <?php echo ' style="background-color:'. ${$rigel_prefix.'_body_bgcolor'} .'"'; ?>>
		<?php 

		if ( ! is_front_page() ) :
			if ( ${$rigel_prefix.'_title_bar'}  == 'show' ) {

				//Title Bar
				$rigel_header_bg_image = '';
				
				if ( is_home() || is_archive() || is_search() || is_404() ) {
					$rigel_header_bg_image = ${$rigel_prefix.'_title_bar_bg_image'};
				}
				else {
					if( ${$rigel_prefix.'_title_bar_style'} == 'custom' && !empty(${$rigel_prefix.'_title_bar_bg_image'}) ){
						$rigel_header_bg_image = htmlspecialchars_decode( ${$rigel_prefix.'_title_bar_bg_image'} );
						$rigel_header_bg_image = json_decode( $rigel_header_bg_image, true );
						if( is_array( $rigel_header_bg_image ) && !empty( $rigel_header_bg_image ) ) {
							$rigel_header_bg_image = $rigel_header_bg_image[0]['full'];
						}
					}
				}

				rigel_sub_banner( ${$rigel_prefix.'_page_title'}, ${$rigel_prefix.'_title_bar_size'}, ${$rigel_prefix.'_title_bar_style'}, $rigel_header_bg_image, ${$rigel_prefix.'_title_bar_bg_color'}, ${$rigel_prefix.'_title_bar_text_color'}, ${$rigel_prefix.'_breadcrumbs'}, $rigel_header, $rigel_header_trans );

			}

		endif;

		?>
		<div id="wrapper" data-preloadtrans="<?php echo esc_attr( $rigel_preloadtrans ); ?>">			
			<div id="content" class="site-content">
				<?php 
					if ( isset ( ${$rigel_prefix.'_slider_shortcode'} ) && ! empty ( ${$rigel_prefix.'_slider_shortcode'} ) ) {
						echo do_shortcode ( ${$rigel_prefix.'_slider_shortcode'} );
					}
