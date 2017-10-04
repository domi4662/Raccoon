<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$custom_fonts = isset($data['custom_fonts']) && !empty($data['custom_fonts']) ? $data['custom_fonts'] : array();

if( !empty( $custom_fonts ) ) {
	$user_fonts = '';

	foreach ( $custom_fonts as $font ) {

		if( $font['font_title'] && ( $font['woff'] || $font['ttf'] || $font['eot'] || $font['svg'] ) ) {

			$user_fonts .= '@font-face {';
				$user_fonts .= 'font-family: "' . $font['font_title'] . '";';

				if( !empty( $font['eot'] ) ) {
					$user_fonts .= 'src: url("' . $font['eot'] . '");';
					$user_fonts .= 'src: url("' . $font['eot'] . '?#iefix") format("embedded-opentype"),';
				} else {
					$user_fonts .= 'src:';
				}
				
				$user_fonts .= ( !empty( $font['woff'] ) ) ? 'url("' . $font['woff'] . '") format("woff"),' : '';
				$user_fonts .= ( !empty( $font['ttf'] ) ) ? 'url("' . $font['ttf'] . '") format("truetype"),' : '';
				$user_fonts .= ( !empty( $font['svg'] ) ) ? 'url("' . $font['svg'] . '") format("svg"),' : '';

				$user_fonts = preg_replace('/\,$/', '', $user_fonts);

				$user_fonts .= ';';

			$user_fonts .= '}';

		}

	}

	echo $user_fonts;
}

global $pix_theme_pri_color;


$body_font = isset($data['custom_font_body']) && !empty($data['custom_font_body']) ? $data['custom_font_body'] : array('size'  => '14px', 'g_face' => 'Lato', 'face'  => 'Arial, sans-serif', 'style' => 'regular' );
	
$body_gf = $body_font['g_face']; //Choosen Google webfont
$body_fv = $body_font['style'];  //Google web font variant (eg; 300italic)
$body_fsize = $body_font['size']; //Font size
$body_ff = $body_font['face']; // Fallback font

$body_fvs = rigel_font_variant($body_fv); //Seperated font variation

/* Heading/Primary Custom Fonts */
$heading_font = isset($data['custom_font_primary']) && !empty($data['custom_font_primary']) ? $data['custom_font_primary'] : array('g_face' => 'Inconsolata', 'face'  => 'Arial, sans-serif', 'style' => '700' );

$heading_gf = $heading_font['g_face'];
$heading_fv = $heading_font['style'];
$heading_ff = $heading_font['face'];

$heading_fvs = rigel_font_variant($heading_fv);

/* Content Custom Fonts */
$con_font = isset($data['custom_font_content']) && !empty($data['custom_font_content']) ? $data['custom_font_content'] : array('g_face' => 'Lato', 'face'  => 'Arial, sans-serif' );
$con_gf = $con_font['g_face'];
$con_ff = $con_font['face'];

$afs = isset($data['ad_font_settings']) ? $data['ad_font_settings'] : '0';


$custom_styles = isset($data['custom_styles']) ? $data['custom_styles'] : '0';
$custom_header_styles = isset($data['custom_header_styles']) ? $data['custom_header_styles'] : '0';

/* Custom Body Styles */
$customize_body_bg = isset($data['customize_body_bg'])? $data['customize_body_bg'] : 0; 
$custom_body_bg_color = isset($data['body_background'])? $data['body_background'] : '';
$custom_body_bg = isset($data['custom_body_bg'])? $data['custom_body_bg'] : '';
$custom_body_bg_pattern = isset($data['custom_body_bg_pattern'])? $data['custom_body_bg_pattern'] : '';
$custom_body_bg_attachment = isset($data['custom_body_bg_attachment'])? $data['custom_body_bg_attachment'] : '';
$custom_body_bg_size = isset($data['custom_body_bg_size'])? $data['custom_body_bg_size'] : '';
$custom_body_bg_repeat = isset($data['custom_body_bg_repeat'])? $data['custom_body_bg_repeat'] : '';

if($custom_body_bg != '' && $custom_body_bg != 'none'){
	$custom_body_bg = str_replace('[site_url]', site_url(), $custom_body_bg);
}
?>

<?php
	$cf_h1 = $cf_h2 = $cf_h3 = $cf_h4 = $cf_h5 = $cf_h6 = '';
	if ($afs == '1'):

		/* H1 Custom Fonts */
		$cf_h1_font = $data['cf_h1'];
		
		$cf_h1_gf = $cf_h1_font['g_face']; //Choosen Google webfont
		$cf_h1_fv = $cf_h1_font['style'];  //Google web font variant (eg; 300italic)
		$cf_h1_fsize = $cf_h1_font['size']; //Font size
		$cf_h1_ff = $cf_h1_font['face']; // Fallback font

		$cf_h1_fv = rigel_font_variant($cf_h1_fv); //Seperated font variation
	?>
	h1{
		font-family: '<?php echo $cf_h1_gf; ?>', <?php echo $cf_h1_ff; ?>;
		font-size:   <?php echo  $cf_h1_fsize; ?>;
		font-style:  <?php echo $cf_h1_fv[0]; ?>;
		font-weight: <?php echo $cf_h1_fv[1]; ?>;
	}

	<?php 
		/* H2 Custom Fonts */
		$cf_h2_font = $data['cf_h2'];
		
		$cf_h2_gf = $cf_h2_font['g_face']; //Choosen Google webfont
		$cf_h2_fv = $cf_h2_font['style'];  //Google web font variant (eg; 300italic)
		$cf_h2_fsize = $cf_h2_font['size']; //Font size
		$cf_h2_ff = $cf_h2_font['face']; // Fallback font

		$cf_h2_fv = rigel_font_variant($cf_h2_fv); //Seperated font variation
	?>
	h2{
		font-family: '<?php echo $cf_h2_gf; ?>', <?php echo $cf_h2_ff; ?>;
		font-size:   <?php echo  $cf_h2_fsize; ?>;
		font-style:  <?php echo $cf_h2_fv[0]; ?>;
		font-weight: <?php echo $cf_h2_fv[1]; ?>;
	}

	<?php 
		/* H3 Custom Fonts */
		$cf_h3_font = $data['cf_h3'];
		
		$cf_h3_gf = $cf_h3_font['g_face']; //Choosen Google webfont
		$cf_h3_fv = $cf_h3_font['style'];  //Google web font variant (eg; 300italic)
		$cf_h3_fsize = $cf_h3_font['size']; //Font size
		$cf_h3_ff = $cf_h3_font['face']; // Fallback font

		$cf_h3_fv = rigel_font_variant($cf_h3_fv); //Seperated font variation
	?>
	h3{
		font-family: '<?php echo $cf_h3_gf; ?>', <?php echo $cf_h3_ff; ?>;   
		font-size:   <?php echo  $cf_h3_fsize; ?>;
		font-style:  <?php echo $cf_h3_fv[0]; ?>;
		font-weight: <?php echo $cf_h3_fv[1]; ?>;
	}

	<?php 
		/* H4 Custom Fonts */
		$cf_h4_font = $data['cf_h4'];
		
		$cf_h4_gf = $cf_h4_font['g_face']; //Choosen Google webfont
		$cf_h4_fv = $cf_h4_font['style'];  //Google web font variant (eg; 300italic)
		$cf_h4_fsize = $cf_h4_font['size']; //Font size
		$cf_h4_ff = $cf_h4_font['face']; // Fallback font

		$cf_h4_fv = rigel_font_variant($cf_h4_fv); //Seperated font variation
	?>
	h4{
		font-family: '<?php echo $cf_h4_gf; ?>', <?php echo $cf_h4_ff; ?>;
		font-size:   <?php echo  $cf_h4_fsize; ?>;          
		font-style:  <?php echo $cf_h4_fv[0]; ?>;
		font-weight: <?php echo $cf_h4_fv[1]; ?>;
	}

	<?php 
		/* H5 Custom Fonts */
		$cf_h5_font = $data['cf_h5'];
		
		$cf_h5_gf = $cf_h5_font['g_face']; //Choosen Google webfont
		$cf_h5_fv = $cf_h5_font['style'];  //Google web font variant (eg; 300italic)
		$cf_h5_fsize = $cf_h5_font['size']; //Font size
		$cf_h5_ff = $cf_h5_font['face']; // Fallback font

		$cf_h5_fv = rigel_font_variant($cf_h5_fv); //Seperated font variation
	?>
	h5{
		font-family: '<?php echo $cf_h5_gf; ?>', <?php echo $cf_h5_ff; ?>;
		font-size:   <?php echo  $cf_h5_fsize; ?>;          
		font-style:  <?php echo $cf_h5_fv[0]; ?>;
		font-weight: <?php echo $cf_h5_fv[1]; ?>;
	}

	<?php 
		/* H6 Custom Fonts */
		$cf_h6_font = $data['cf_h6'];
		
		$cf_h6_gf = $cf_h6_font['g_face']; //Choosen Google webfont
		$cf_h6_fv = $cf_h6_font['style'];  //Google web font variant (eg; 300italic)
		$cf_h6_fsize = $cf_h6_font['size']; //Font size
		$cf_h6_ff = $cf_h6_font['face']; // Fallback font

		$cf_h6_fv = rigel_font_variant($cf_h6_fv); //Seperated font variation
	?>
	h6{
		font-family: '<?php echo $cf_h6_gf; ?>', <?php echo $cf_h6_ff; ?>; 
		font-size:   <?php echo  $cf_h6_fsize; ?>;       
		font-style:  <?php echo $cf_h6_fv[0]; ?>;
		font-weight: <?php echo $cf_h6_fv[1]; ?>;
	}

	<?php 
	   /* List Item */
		$cf_list = $data['cf_list'];
		
		$cf_list_gf = $cf_list['g_face']; //Choosen Google webfont
		$cf_list_fv = $cf_list['style'];  //Google web font variant (eg; 300italic)
		$cf_list_fsize = $cf_list['size']; //Font size
		$cf_list_ff = $cf_list['face']; // Fallback font

		$cf_list_fv = rigel_font_variant($cf_list_fv); //Seperated font variation
	?>    
	li, li a {
		font-family: '<?php echo $cf_list_gf; ?>', <?php echo $cf_list_ff; ?>; 
		font-size:   <?php echo  $cf_list_fsize; ?>;       
		font-style:  <?php echo $cf_list_fv[0]; ?>;
		font-weight: <?php echo $cf_list_fv[1]; ?>;
	}

	
	<?php 
	   /* Link */
		$cf_link = $data['cf_link'];
		
		$cf_link_gf = $cf_link['g_face']; //Choosen Google webfont
		$cf_link_fv = $cf_link['style'];  //Google web font variant (eg; 300italic)
		$cf_link_fsize = $cf_link['size']; //Font size
		$cf_link_ff = $cf_link['face']; // Fallback font

		$cf_link_fv = rigel_font_variant($cf_link_fv); //Seperated font variation
	?>   
	a{
		font-family: '<?php echo $cf_link_gf; ?>', <?php echo $cf_link_ff; ?>; 
		font-size:   <?php echo  $cf_link_fsize; ?>;       
		font-style:  <?php echo $cf_link_fv[0]; ?>;
		font-weight: <?php echo $cf_link_fv[1]; ?>;
	}

	
	<?php 
	   /* Logo */
		$cf_logo = $data['cf_logo'];
		
		$cf_logo_gf = $cf_logo['g_face']; //Choosen Google webfont
		$cf_logo_fv = $cf_logo['style'];  //Google web font variant (eg; 300italic)
		$cf_logo_fsize = $cf_logo['size']; //Font size
		$cf_logo_ff = $cf_logo['face']; // Fallback font

		$cf_logo_fv = rigel_font_variant($cf_logo_fv); //Seperated font variation
	?>   
	#logo{
		font-family: '<?php echo $cf_logo_gf; ?>', <?php echo $cf_logo_ff; ?>; 
		font-size:   <?php echo  $cf_logo_fsize; ?>;       
		font-style:  <?php echo $cf_logo_fv[0]; ?>;
		font-weight: <?php echo $cf_logo_fv[1]; ?>;
	}
	
   
	<?php 
		/* blockquote */
		$cf_blockquote = $data['cf_blockquote'];
		
		$cf_blockquote_gf = $cf_blockquote['g_face']; //Choosen Google webfont
		$cf_blockquote_fv = $cf_blockquote['style'];  //Google web font variant (eg; 300italic)
		$cf_blockquote_fsize = $cf_blockquote['size']; //Font size
		$cf_blockquote_ff = $cf_blockquote['face']; // Fallback font

		$cf_blockquote_fv = rigel_font_variant($cf_blockquote_fv); //Seperated font variation
	?>  
	blockquote {
		font-family: '<?php echo $cf_blockquote_gf; ?>', <?php echo $cf_blockquote_ff; ?>; 
		font-size:   <?php echo $cf_blockquote_fsize; ?>;       
		font-style:  <?php echo $cf_blockquote_fv[0]; ?>;
		font-weight: <?php echo $cf_blockquote_fv[1]; ?>;
	}
	
	
	<?php 
	   /* Main Menu */
		$cf_menu = $data['cf_menu'];
		
		$cf_menu_gf = $cf_menu['g_face']; //Choosen Google webfont
		$cf_menu_fv = $cf_menu['style'];  //Google web font variant (eg; 300italic)
		$cf_menu_fsize = $cf_menu['size']; //Font size
		$cf_menu_ff = $cf_menu['face']; // Fallback font

		$cf_menu_fv = rigel_font_variant($cf_menu_fv); //Seperated font variation
	?> 
	.main-nav .menu li, .main-nav .menu li a{
		font-family: '<?php echo $cf_menu_gf; ?>', <?php echo $cf_menu_ff; ?>; 
		font-size:   <?php echo $cf_menu_fsize; ?>;       
		font-style:  <?php echo $cf_menu_fv[0]; ?>;
		font-weight: <?php echo $cf_menu_fv[1]; ?>;
	}

	
	<?php 
	   /* Sub Menu */
		$cf_sub_menu = $data['cf_sub_menu'];
		
		$cf_sub_menu_gf = $cf_sub_menu['g_face']; //Choosen Google webfont
		$cf_sub_menu_fv = $cf_sub_menu['style'];  //Google web font variant (eg; 300italic)
		$cf_sub_menu_fsize = $cf_sub_menu['size']; //Font size
		$cf_sub_menu_ff = $cf_sub_menu['face']; // Fallback font

		$cf_sub_menu_fv = rigel_font_variant($cf_sub_menu_fv); //Seperated font variation
	?> 
	.main-nav .sub-menu, .main-nav .menu .sub-menu li a, .main-nav li.pix-megamenu > ul.sub-menu > li > ul li a{
		font-family: '<?php echo $cf_sub_menu_gf; ?>', <?php echo $cf_sub_menu_ff; ?>; 
		font-size:   <?php echo $cf_sub_menu_fsize; ?>;       
		font-style:  <?php echo $cf_sub_menu_fv[0]; ?>;
		font-weight: <?php echo $cf_sub_menu_fv[1]; ?>;
	}

	
	<?php 
	   /* Mega Menu Title*/
		$cf_mega_menu = $data['cf_mega_menu'];
		
		$cf_mega_menu_gf = $cf_mega_menu['g_face']; //Choosen Google webfont
		$cf_mega_menu_fv = $cf_mega_menu['style'];  //Google web font variant (eg; 300italic)
		$cf_mega_menu_fsize = $cf_mega_menu['size']; //Font size
		$cf_mega_menu_ff = $cf_mega_menu['face']; // Fallback font

		$cf_mega_menu_fv = rigel_font_variant($cf_mega_menu_fv); //Seperated font variation
	?>
	.main-nav li.pix-megamenu > ul.sub-menu > li > a, .main-nav li.pix-megamenu > ul.sub-menu > li > a:hover, .main-nav li.pix-megamenu > ul.sub-menu > li:hover > a{
		font-family: '<?php echo $cf_mega_menu_gf; ?>', <?php echo $cf_mega_menu_ff; ?>; 
		font-size:   <?php echo $cf_mega_menu_fsize; ?>;       
		font-style:  <?php echo $cf_mega_menu_fv[0]; ?>;
		font-weight: <?php echo $cf_mega_menu_fv[1]; ?>;
	}

	
	<?php 
	   /* TITLE Shortcode Default */
		$cf_main_title = $data['cf_main_title'];
		
		$cf_main_title_gf = $cf_main_title['g_face']; //Choosen Google webfont
		$cf_main_title_fv = $cf_main_title['style'];  //Google web font variant (eg; 300italic)
		$cf_main_title_fsize = $cf_main_title['size']; //Font size
		$cf_main_title_ff = $cf_main_title['face']; // Fallback font

		$cf_main_title_fv = rigel_font_variant($cf_main_title_fv); //Seperated font variation
	?>
	.title, .title a {
		font-family: '<?php echo $cf_main_title_gf; ?>', <?php echo $cf_main_title_ff; ?>; 
		font-size:   <?php echo $cf_main_title_fsize; ?>;       
		font-style:  <?php echo $cf_main_title_fv[0]; ?>;
		font-weight: <?php echo $cf_main_title_fv[1]; ?>;
	}

	
	<?php 
	   /* Button Default */
		$cf_btn = $data['cf_btn'];
		
		$cf_btn_gf = $cf_btn['g_face']; //Choosen Google webfont
		$cf_btn_fv = $cf_btn['style'];  //Google web font variant (eg; 300italic)
		$cf_btn_fsize = $cf_btn['size']; //Font size
		$cf_btn_ff = $cf_btn['face']; // Fallback font

		$cf_btn_fv = rigel_font_variant($cf_btn_fv); //Seperated font variation
	?>
	.btn{   
		font-family: '<?php echo $cf_btn_gf; ?>', <?php echo $cf_btn_ff; ?>; 
		font-size:   <?php echo $cf_btn_fsize; ?>;       
		font-style:  <?php echo $cf_btn_fv[0]; ?>;
		font-weight: <?php echo $cf_btn_fv[1]; ?>;
	}

	
	<?php 
	   /* Button Small */
		$cf_btn_small = $data['cf_btn_small'];
	?>
	.btn.btn-sm{
		font-size: <?php echo $cf_btn_small; ?>;
	}

	
	<?php 
	/* Button Large */
	$cf_btn_large = $data['cf_btn_lg'];
	?>
	.btn-lg{
		font-size: <?php echo $cf_btn_large; ?>;
	}

	
	<?php 
	   /* Process Title */
		$cf_process_title = $data['cf_process_title'];
		
		$cf_process_title_gf = $cf_process_title['g_face']; //Choosen Google webfont
		$cf_process_title_fv = $cf_process_title['style'];  //Google web font variant (eg; 300italic)
		$cf_process_title_fsize = $cf_process_title['size']; //Font size
		$cf_process_title_ff = $cf_process_title['face']; // Fallback font

		$cf_process_title_fv = rigel_font_variant($cf_process_title_fv); //Seperated font variation
	?>
	.process .title {
		font-family: '<?php echo $cf_process_title_gf; ?>', <?php echo $cf_process_title_ff; ?>; 
		font-size:   <?php echo $cf_process_title_fsize; ?>;       
		font-style:  <?php echo $cf_process_title_fv[0]; ?>;
		font-weight: <?php echo $cf_process_title_fv[1]; ?>;
	}

	
	<?php 
	   /* Process Content */
		$cf_process_content = $data['cf_process_content'];
		
		$cf_process_content_gf = $cf_process_content['g_face']; //Choosen Google webfont
		$cf_process_content_fv = $cf_process_content['style'];  //Google web font variant (eg; 300italic)
		$cf_process_content_fsize = $cf_process_content['size']; //Font size
		$cf_process_content_ff = $cf_process_content['face']; // Fallback font

		$cf_process_content_fv = rigel_font_variant($cf_process_content_fv); //Seperated font variation
	?>
	.process .text {        
		font-family: '<?php echo $cf_process_content_gf; ?>', <?php echo $cf_process_content_ff; ?>; 
		font-size:   <?php echo $cf_process_content_fsize; ?>;       
		font-style:  <?php echo $cf_process_content_fv[0]; ?>;
		font-weight: <?php echo $cf_process_content_fv[1]; ?>;
	}

	
	<?php 
	   /* Pie chart */
		$cf_percent_text = $data['cf_percent_text'];
		
		$cf_percent_text_gf = $cf_percent_text['g_face']; //Choosen Google webfont
		$cf_percent_text_fv = $cf_percent_text['style'];  //Google web font variant (eg; 300italic)
		$cf_percent_text_fsize = $cf_percent_text['size']; //Font size
		$cf_percent_text_ff = $cf_percent_text['face']; // Fallback font

		$cf_percent_text_fv = rigel_font_variant($cf_percent_text_fv); //Seperated font variation
	?>
	.percent-text{
		font-family: '<?php echo $cf_percent_text_gf; ?>', <?php echo $cf_percent_text_ff; ?>; 
		font-size: <?php echo $cf_percent_text_fsize; ?>;
		font-weight: <?php echo $cf_percent_text_fv[1]; ?>;
	}

	<?php 
	   /* process outside text */
		$cf_percent_outside = $data['cf_percent_outside'];
		
		$cf_percent_outside_gf = $cf_percent_outside['g_face']; //Choosen Google webfont
		$cf_percent_outside_fv = $cf_percent_outside['style'];  //Google web font variant (eg; 300italic)
		$cf_percent_outside_fsize = $cf_percent_outside['size']; //Font size
		$cf_percent_outside_ff = $cf_percent_outside['face']; // Fallback font

		$cf_percent_outside_fv = rigel_font_variant($cf_percent_outside_fv); //Seperated font variation
	?>
	.percent, .outside-text{
		font-family: '<?php echo $cf_percent_outside_gf; ?>', <?php echo $cf_percent_outside_ff; ?>; 
		font-size:   <?php echo $cf_percent_outside_fsize; ?>;       
		font-style:  <?php echo $cf_percent_outside_fv[0]; ?>;
		font-weight: <?php echo $cf_percent_outside_fv[1]; ?>;
	}

	
	<?php 
	   /* Form input */
		$cf_txtfield = $data['cf_txtfield'];
		
		$cf_txtfield_gf = $cf_txtfield['g_face']; //Choosen Google webfont
		$cf_txtfield_fv = $cf_txtfield['style'];  //Google web font variant (eg; 300italic)
		$cf_txtfield_fsize = $cf_txtfield['size']; //Font size
		$cf_txtfield_ff = $cf_txtfield['face']; // Fallback font

		$cf_txtfield_fv = rigel_font_variant($cf_txtfield_fv); //Seperated font variation
	?>
	.textfield{
		font-family: '<?php echo $cf_txtfield_gf; ?>', <?php echo $cf_txtfield_ff; ?>; 
		font-size:   <?php echo $cf_txtfield_fsize; ?>;       
		font-style:  <?php echo $cf_txtfield_fv[0]; ?>;
		font-weight: <?php echo $cf_txtfield_fv[1]; ?>;
	}
	
	
	<?php 
	   /* Staff Title */
		$cf_staff_title = $data['cf_staff_title'];
		
		$cf_staff_title_gf = $cf_staff_title['g_face']; //Choosen Google webfont
		$cf_staff_title_fv = $cf_staff_title['style'];  //Google web font variant (eg; 300italic)
		$cf_staff_title_fsize = $cf_staff_title['size']; //Font size
		$cf_staff_title_ff = $cf_staff_title['face']; // Fallback font

		$cf_staff_title_fv = rigel_font_variant($cf_staff_title_fv); //Seperated font variation
	?>
	.staff-content .title {
		font-family: '<?php echo $cf_staff_title_gf; ?>', <?php echo $cf_staff_title_ff; ?>; 
		font-size:   <?php echo $cf_staff_title_fsize; ?>;       
		font-style:  <?php echo $cf_staff_title_fv[0]; ?>;
		font-weight: <?php echo $cf_staff_title_fv[1]; ?>;
	}
	
	
	<?php 
	   /* Portfolio Filter */
		$cf_filter_normal = $data['cf_filter_normal'];
		
		$cf_filter_normal_gf = $cf_filter_normal['g_face']; //Choosen Google webfont
		$cf_filter_normal_fv = $cf_filter_normal['style'];  //Google web font variant (eg; 300italic)
		$cf_filter_normal_ff = $cf_filter_normal['face']; // Fallback font

		$cf_filter_normal_fv = rigel_font_variant($cf_filter_normal_fv); //Seperated font variation
	?>
	#filters.normal li a{   
		font-family: '<?php echo $cf_filter_normal_gf; ?>', <?php echo $cf_filter_normal_ff; ?>;      
		font-style:  <?php echo $cf_filter_normal_fv[0]; ?>;
		font-weight: <?php echo $cf_filter_normal_fv[1]; ?>;
	}

	
	<?php 
	   /* Pricing Table Title */
		$cf_plan_title = $data['cf_plan_title'];
		
		$cf_plan_title_gf = $cf_plan_title['g_face']; //Choosen Google webfont
		$cf_plan_title_fv = $cf_plan_title['style'];  //Google web font variant (eg; 300italic)
		$cf_plan_title_fsize = $cf_plan_title['size']; //Font size
		$cf_plan_title_ff = $cf_plan_title['face']; // Fallback font

		$cf_plan_title_fv = rigel_font_variant($cf_plan_title_fv); //Seperated font variation
	?>
	.price-table .plan-title {
		font-family: '<?php echo $cf_plan_title_gf; ?>', <?php echo $cf_plan_title_ff; ?>; 
		font-size:   <?php echo $cf_plan_title_fsize; ?>;       
		font-style:  <?php echo $cf_plan_title_fv[0]; ?>;
		font-weight: <?php echo $cf_plan_title_fv[1]; ?>;
	}

	<?php 
	   /* Price */
		$cf_plan_value = $data['cf_plan_value'];
		
		$cf_plan_value_gf = $cf_plan_value['g_face']; //Choosen Google webfont
		$cf_plan_value_fv = $cf_plan_value['style'];  //Google web font variant (eg; 300italic)
		$cf_plan_value_fsize = $cf_plan_value['size']; //Font size
		$cf_plan_value_ff = $cf_plan_value['face']; // Fallback font

		$cf_plan_value_fv = rigel_font_variant($cf_plan_value_fv); //Seperated font variation
	?>
	.price-table .value {
		font-family: '<?php echo $cf_plan_value_gf; ?>', <?php echo $cf_plan_value_ff; ?>; 
		font-size:   <?php echo $cf_plan_value_fsize; ?>;       
		font-style:  <?php echo $cf_plan_value_fv[0]; ?>;
		font-weight: <?php echo $cf_plan_value_fv[1]; ?>;
	}

	<?php 
	   /* Currency */
		$cf_plan_valign = $data['cf_plan_valign'];
		
		$cf_plan_valign_gf = $cf_plan_valign['g_face']; //Choosen Google webfont
		$cf_plan_valign_fv = $cf_plan_valign['style'];  //Google web font variant (eg; 300italic)
		$cf_plan_valign_fsize = $cf_plan_valign['size']; //Font size
		$cf_plan_valign_ff = $cf_plan_valign['face']; // Fallback font

		$cf_plan_valign_fv = rigel_font_variant($cf_plan_valign_fv); //Seperated font variation
	?>
	.price-table .value .vAlign {
		font-family: '<?php echo $cf_plan_valign_gf; ?>', <?php echo $cf_plan_valign_ff; ?>; 
		font-size: <?php echo $cf_plan_valign_fsize; ?>;       
		font-style: <?php echo $cf_plan_valign_fv[0]; ?>;
		font-weight: <?php echo $cf_plan_valign_fv[1]; ?>;
	}

	<?php 
	   /* Price Period */
		$cf_plan_month = $data['cf_plan_month'];
		
		$cf_plan_month_gf = $cf_plan_month['g_face']; //Choosen Google webfont
		$cf_plan_month_fv = $cf_plan_month['style'];  //Google web font variant (eg; 300italic)
		$cf_plan_month_fsize = $cf_plan_month['size']; //Font size
		$cf_plan_month_ff = $cf_plan_month['face']; // Fallback font

		$cf_plan_month_fv = rigel_font_variant($cf_plan_month_fv); //Seperated font variation
	?>
	.price-table .value small {
		font-family: '<?php echo $cf_plan_month_gf; ?>', <?php echo $cf_plan_month_ff; ?>; 
		font-size: <?php echo $cf_plan_month_fsize; ?>;       
		font-style: <?php echo $cf_plan_month_fv[0]; ?>;
		font-weight: <?php echo $cf_plan_month_fv[1]; ?>;
	}

	<?php 
	   /* Testimonial Content */
		$cf_testimonial_content = $data['cf_testimonial_content'];
		
		$cf_testimonial_content_gf = $cf_testimonial_content['g_face']; //Choosen Google webfont
		$cf_testimonial_content_fv = $cf_testimonial_content['style'];  //Google web font variant (eg; 300italic)
		$cf_testimonial_content_fsize = $cf_testimonial_content['size']; //Font size
		$cf_testimonial_content_ff = $cf_testimonial_content['face']; // Fallback font

		$cf_testimonial_content_fv = rigel_font_variant($cf_testimonial_content_fv); //Seperated font variation
	?>    
	.testimonial .content p{
		font-family: '<?php echo $cf_testimonial_content_gf; ?>', <?php echo $cf_testimonial_content_ff; ?>; 
		font-size: <?php echo $cf_testimonial_content_fsize; ?>;       
		font-style: <?php echo $cf_testimonial_content_fv[0]; ?>;
		font-weight: <?php echo $cf_testimonial_content_fv[1]; ?>;
	}
	
	
	<?php 
	   /* Widget Title */
		$cf_widget_title = $data['cf_widget_title'];
		
		$cf_widget_title_gf = $cf_widget_title['g_face']; //Choosen Google webfont
		$cf_widget_title_fv = $cf_widget_title['style'];  //Google web font variant (eg; 300italic)
		$cf_widget_title_fsize = $cf_widget_title['size']; //Font size
		$cf_widget_title_ff = $cf_widget_title['face']; // Fallback font

		$cf_widget_title_fv = rigel_font_variant($cf_widget_title_fv); //Seperated font variation
	?>
	.widget .widgettitle{
		font-family: '<?php echo $cf_widget_title_gf; ?>', <?php echo $cf_widget_title_ff; ?>; 
		font-size: <?php echo $cf_widget_title_fsize; ?>;       
		font-style: <?php echo $cf_widget_title_fv[0]; ?>;
		font-weight: <?php echo $cf_widget_title_fv[1]; ?>;
	}

	
	<?php 
	   /* Recent Tweets */
		$cf_twitter = $data['cf_twitter'];
		
		$cf_twitter_gf = $cf_twitter['g_face']; //Choosen Google webfont
		$cf_twitter_fv = $cf_twitter['style'];  //Google web font variant (eg; 300italic)
		$cf_twitter_fsize = $cf_twitter['size']; //Font size
		$cf_twitter_ff = $cf_twitter['face']; // Fallback font

		$cf_twitter_fv = rigel_font_variant($cf_twitter_fv); //Seperated font variation
	?>
	.tweets .twitter{
		font-family: '<?php echo $cf_twitter_gf; ?>', <?php echo $cf_twitter_ff; ?>; 
		font-size: <?php echo $cf_twitter_fsize; ?>;       
		font-style: <?php echo $cf_twitter_fv[0]; ?>;
		font-weight: <?php echo $cf_twitter_fv[1]; ?>;
	}
<?php endif; ?>

<?php if($custom_header_styles == 1) { ?>

	<?php if (!empty($data['top_header_background_color']) || !empty($data['top_header_color'])):?>
		.pageTopCon{
		<?php if(!empty($data['top_header_background_color'])){ ?>
			background: <?php echo $data['top_header_background_color']; ?>;
		<?php
		}
		if(!empty($data['top_header_color'])){ ?>
			color: <?php echo $data['top_header_color']; ?>;
		<?php } ?>

		}
	<?php endif;?>

	<?php if (!empty($data['top_header_link_color'])):?>
		.header-wrap .pageTopCon a, .header .pageTopCon .top-details a, .pageTop .pix-cart-icon{
			color: <?php echo $data['top_header_link_color']; ?>;
		}
		.pageTop .searchsubmit{
			background-color: <?php echo $data['top_header_link_color']; ?>;
		}
	<?php endif;?>

	<?php if (!empty($data['top_header_link_hover_color'])):?>
		.header-wrap .pageTopCon a:hover, .header .pageTopCon .top-details a:hover{
			color: <?php echo $data['top_header_link_hover_color']; ?>;
		}
		.pageTop .searchsubmit:hover, .pageTop .pix-item-icon{
			background-color: <?php echo $data['top_header_link_hover_color']; ?>;
		}
	<?php endif;?>

	<?php if (!empty($data['main_header_background_color'])):?>
		.header-wrap, .dark .header, .header-wrap .header-con.stuck, .main-side-left .left-main-menu{
			background: <?php echo $data['main_header_background_color']; ?>;
		}
	<?php endif;?>

	<?php if (!empty($data['main_header_color'])):?>
		.header-wrap{
			color: <?php echo $data['main_header_color']; ?>;
		}
	<?php endif;?>

	<?php if (!empty($data['main_header_link_color'])):?>
		.header-wrap a, .header .top-details a{
			color: <?php echo $data['main_header_link_color']; ?>;
		}
		.searchsubmit, .header .pix-cart-icon{
			background-color: <?php echo $data['main_header_link_color']; ?>;
		}
	<?php endif;?>

	<?php if (!empty($data['main_header_link_hover_color'])):?>
		.header-wrap a:hover, .header .top-details a:hover{
			color: <?php echo $data['main_header_link_hover_color']; ?>;
		}
		.searchsubmit:hover{
			background-color: <?php echo $data['main_header_link_hover_color']; ?>;
		}
	<?php endif;?>

	<?php if (!empty($data['menu_background_color'])):?>
		.menu-wrap, .menu-light .menu-wrap, .dark .menu-wrap, .dark .menu-light .menu-wrap{
			background: <?php echo $data['menu_background_color']; ?>;
		}
	<?php endif;?>

	<?php if (!empty($data['menu_link_color'])):?>
		.header-con:not(.stuck) .main-nav li a, .header-con:not(.stuck) .dark .main-nav li a, .header-con:not(.stuck) .menu-wrap .main-nav li a, .header-con:not(.stuck) .menu-light .menu-wrap .main-nav li a, .header-con:not(.stuck) .main-side-left .main-nav-left.main-nav li a, .header-con:not(.stuck) .main-nav .current-menu-ancestor > a, .header-con:not(.stuck) .dark .main-nav .current-menu-ancestor > a{
			color: <?php echo $data['menu_link_color']; ?>;
		}
	<?php endif;?>

	<?php if (!empty($data['menu_link_hover_color'])):?>
		.header-con:not(.stuck) .main-nav li a:hover, .header-con:not(.stuck) .main-nav .sub-menu li a:hover, .header-con:not(.stuck) .menu-wrap .main-nav li a:hover, .header-con:not(.stuck) .main-side-left .main-nav li a:hover, .header-con:not(.stuck) .main-side-left .main-nav-left.main-nav li a:hover .main-side-left .main-nav-left.main-nav .menu li.menu-item-has-children a:hover:after, .header-con:not(.stuck) .main-nav .current-menu-item > a, .header-con:not(.stuck) .main-nav .menu > li.current-menu-item > a, .header-con:not(.stuck) .main-nav .menu > li.current-menu-ancestor > a, .header-con:not(.stuck) .main-nav li:hover > a, .header-con:not(.stuck) .dark .main-nav li:hover > a, .header-con:not(.stuck) .main-nav .sub-menu .current-menu-item > a, .header-con:not(.stuck) .main-nav li.pix-megamenu > ul.sub-menu > li > ul li.current-menu-item > a, .header-con:not(.stuck) .pix-megamenu .sub-menu li .sub-menu li a:hover, .header-con:not(.stuck) .pix-submenu .sub-menu li:hover > a, .header-con:not(.stuck) .dark .main-nav li:hover > a, .header-con:not(.stuck) .dark .main-nav .sub-menu li:hover > a{
			color: <?php echo $data['menu_link_hover_color']; ?>;
		}
		.header-con:not(.stuck) .nav-border .main-nav ul.menu > li > a:after, .header-con:not(.stuck) .nav-double-border .main-nav > ul.menu > li > a:before, .header-con:not(.stuck) .nav-double-border .main-nav > ul.menu > li > a:after, .header-con:not(.stuck) .background-nav .main-nav .menu > li.current-menu-ancestor > a, .header-con:not(.stuck) .background-nav.background-nav-round .main-nav .menu > li.current-menu-ancestor > a, .header-con:not(.stuck) .background-nav .main-nav .menu > li.current-menu-item > a, .header-con:not(.stuck) .background-nav.background-nav-round .main-nav .menu > li.current-menu-item > a, .header-con:not(.stuck) .solid-color-bg .main-nav .menu > li.current-menu-item, .header-con:not(.stuck) .solid-color-bg .main-nav .menu > li.current-menu-parent, .header-con:not(.stuck) .solid-color-bg .main-nav .menu > li.current-menu-ancestor, .header-con:not(.stuck) .main-nav > .menu > li.current-menu-item > a .inner-menu:after, .header-con:not(.stuck) .main-nav > .menu > li.current-menu-parent > a .inner-menu:after, .header-con:not(.stuck) .main-nav > .menu > li > a .inner-menu:after {
			background-color: <?php echo $data['menu_link_hover_color']; ?>;
		}
		.header-con:not(.stuck) .drive-nav .main-nav .menu > li.current-menu-ancestor:before, .header-con:not(.stuck) .drive-nav .main-nav .menu > li.current-menu-item:before{
			border-top-color: <?php echo $data['menu_link_hover_color']; ?>;
		}
	<?php endif;?>

	<?php if (!empty($data['sticky_menu_link_color'])):?>
		.header-con.stuck .main-nav li a, .header-con.stuck .dark .main-nav li a, .header-con.stuck .menu-wrap .main-nav li a, .header-con.stuck .menu-light .menu-wrap .main-nav li a, .header-con.stuck .main-side-left .main-nav-left.main-nav li a, .header-con.stuck .main-nav .current-menu-ancestor > a, .header-con.stuck .dark .main-nav .current-menu-ancestor > a{
			color: <?php echo $data['menu_link_color']; ?>;
		}
	<?php endif;?>

	<?php if (!empty($data['sticky_menu_link_hover_color'])):?>
		.header-con.stuck .main-nav li a:hover, .header-con.stuck .main-nav .sub-menu li a:hover, .header-con.stuck .menu-wrap .main-nav li a:hover, .header-con.stuck .main-side-left .main-nav li a:hover, .header-con.stuck .main-side-left .main-nav-left.main-nav li a:hover .main-side-left .main-nav-left.main-nav .menu li.menu-item-has-children a:hover:after, .header-con.stuck .header-con:not(.stuck) .main-nav .current-menu-item > a, .header-con.stuck .header-con:not(.stuck) .main-nav .menu > li.current-menu-item > a, .header-con.stuck .main-nav .menu > li.current-menu-ancestor > a, .header-con.stuck .main-nav li:hover > a, .header-con.stuck .dark .main-nav li:hover > a, .header-con.stuck .main-nav .sub-menu .current-menu-item > a, .header-con.stuck .main-nav li.pix-megamenu > ul.sub-menu > li > ul li.current-menu-item > a, .header-con.stuck .pix-megamenu .sub-menu li .sub-menu li a:hover, .header-con.stuck .pix-submenu .sub-menu li:hover > a, .header-con.stuck .dark .main-nav li:hover > a, .header-con.stuck .dark .main-nav .sub-menu li:hover > a{
			color: <?php echo $data['sticky_menu_link_hover_color']; ?>;
		}
		.header-con.stuck .nav-border .main-nav ul.menu > li > a:after, .header-con.stuck .nav-double-border .main-nav > ul.menu > li > a:before, .header-con.stuck .nav-double-border .main-nav > ul.menu > li > a:after, .header-con.stuck .background-nav .main-nav .menu > li.current-menu-ancestor > a, .header-con.stuck .background-nav.background-nav-round .main-nav .menu > li.current-menu-ancestor > a, .header-con.stuck .background-nav .main-nav .menu > li.current-menu-item > a, .header-con.stuck .background-nav.background-nav-round .main-nav .menu > li.current-menu-item > a, .header-con.stuck .solid-color-bg .main-nav .menu > li.current-menu-item, .header-con.stuck .solid-color-bg .main-nav .menu > li.current-menu-parent, .header-con.stuck .solid-color-bg .main-nav .menu > li.current-menu-ancestor, .header-con.stuck .header-con:not(.stuck) .main-nav > .menu > li.current-menu-item > a .inner-menu:after, .header-con.stuck .header-con:not(.stuck) .main-nav > .menu > li.current-menu-parent > a .inner-menu:after, .header-con.stuck .main-nav > .menu > li > a .inner-menu:after {
			background-color: <?php echo $data['sticky_menu_link_hover_color']; ?>;
		}
		.header-con.stuck .drive-nav .main-nav .menu > li.current-menu-ancestor:before, .header-con.stuck .drive-nav .main-nav .menu > li.current-menu-item:before{
			border-top-color: <?php echo $data['sticky_menu_link_hover_color']; ?>;
		}
	<?php endif;?>

	<?php if (!empty($data['sub_menu_background_color']) || !empty($data['sub_menu_border_color'])):?>
		.main-nav .sub-menu{
		<?php if(!empty($data['sub_menu_background_color'])){ ?>
			background: <?php echo $data['sub_menu_background_color']; ?>;
			box-shadow: none;
		<?php
		}
		if(!empty($data['sub_menu_border_color'])){ ?>
			border: 1px solid <?php echo $data['sub_menu_border_color']; ?>;
		<?php } ?>
		}
		.main-nav li.pix-megamenu > ul.sub-menu:before{
		<?php if(!empty($data['sub_menu_border_color'])){ ?>
			border: 1px solid <?php echo $data['sub_menu_border_color']; ?>;
		<?php } ?>
		}
		.main-side-left .main-nav-left.main-nav .menu li.menu-item-has-children a:hover:after, .main-side-left .main-nav-left.main-nav .menu li.menu-item-has-children > a.current:after{
		<?php if(!empty($data['sub_menu_background_color'])){ ?>
			background: <?php echo $data['sub_menu_background_color']; ?>;
			box-shadow: none;
			<?php } ?>
		}
	<?php endif;?>

	<?php if (!empty($data['mega_menu_title_color'])):?>
		.main-nav li.pix-megamenu > ul.sub-menu > li > a, .main-nav li.pix-megamenu > ul.sub-menu > li > a:hover {
			color: <?php echo $data['mega_menu_title_color']; ?>;
		}
	<?php endif;?>

	<?php if (!empty($data['sub_menu_link_color'])):?>
		.main-nav .sub-menu li > a, .header-wrap .pix-submenu .sub-menu li a, .menu-wrap .main-nav .sub-menu li a, .main-nav li.pix-megamenu > ul.sub-menu > li > ul li a, .main-side-left .main-nav-left.main-nav li ul li a{
			color: <?php echo $data['sub_menu_link_color']; ?>;
		}
	<?php endif;?>

	<?php if (!empty($data['sub_menu_link_hover_color'])):?>
		.main-nav .sub-menu li > a:hover, .header-wrap .pix-submenu .sub-menu li a:hover, .menu-wrap .main-nav .sub-menu li a:hover, .main-nav li.pix-megamenu > ul.sub-menu > li > ul li a:hover, .main-nav .pix-submenu:hover > ul li:hover > a.current, .main-nav .pix-submenu li a.current, .main-side-left .main-nav-left.main-nav li li a:hover, .main-side-left .main-nav-left.main-nav li li a.current, .main-side-left .main-nav-left.main-nav .menu li.menu-item-has-children a:hover:after, .main-side-left .main-nav-left.main-nav .menu li.menu-item-has-children > a.current:after, .main-side-left.sub-menu-dark .main-nav .sub-menu .menu-item a.current, .main-side-left.dark.sub-menu-dark .main-nav .sub-menu .menu-item a.current {
			color: <?php echo $data['sub_menu_link_hover_color']; ?>;
		}
	<?php endif;?>

<?php } ?>

<?php if($custom_styles): ?>

	<?php if($customize_body_bg): ?>

		<?php if($custom_body_bg_color != '' && $custom_body_bg == '' && $custom_body_bg_pattern == ''): ?>

			body #main-wrapper {
				background-color: <?php echo $custom_body_bg_color; ?>;        
			}

		<?php endif; ?>

		<?php if($custom_body_bg_color != '' && $custom_body_bg_pattern != '' && $custom_body_bg == '' ): ?>

			body #main-wrapper {
				background: <?php echo $custom_body_bg_color; if( $custom_body_bg_pattern != 'none') { ?> url(<?php echo get_template_directory_uri().'/_img/'.$custom_body_bg_pattern.'.png'; ?>) repeat <?php } ?>;
			}

		<?php endif; ?>

		<?php if($custom_body_bg != '' ): ?>

			body #main-wrapper {
				background-image: url(<?php echo $custom_body_bg; ?>);
				background-attachment: <?php echo $custom_body_bg_attachment; ?>;
				background-repeat: <?php echo $custom_body_bg_repeat; ?>;
				background-size: <?php echo $custom_body_bg_size; ?>;
			}

		<?php endif; ?>

	<?php endif; ?>

<?php endif; ?>


<?php if (!empty($data['pri_color'])):?>

a:hover, .main-nav li:hover > a, .main-nav .sub-menu li:hover > a, #filters li a:hover, #filters li a.selected, .btn.btn-solid:hover, #pageFooterCon .widget a:hover, .btn.btn-solid.colorbtn:hover, .btn.btn-outline.colorbtn, .main-nav > .menu > li.current-menu-item > a, .main-nav > .menu > .current-menu-parent > a, .light-header .main-nav .menu > li > a:hover, .light-header .main-nav > .menu > li.current-menu-item > a, .staff-container .title a:hover, .post-container .title a:hover, .post-container .post-meta li a:hover, .pagination li .current, .pagination li a:hover, .owl-theme .owl-controls .owl-buttons div:hover, .animated-button.btn-simple.colorbtn > span, .btn-solid.animated-button.colorbtn > span, .main-nav .sub-menu li:hover > a, .main-nav li.pix-megamenu .sub-menu li:hover > a {
	color: <?php echo $data['pri_color']; ?>;
}

.btn.btn-outline:hover, .btn.btn-solid.colorbtn, .btn.btn-outline.colorbtn:hover, .main-nav li a .inner-menu:after, .main-nav > .menu > li > a .inner-menu:after, .icon-box.circle .icon-wrap {
	background-color: <?php echo $data['pri_color']; ?>;
}

#filters li a:hover, #filters li a.selected, .btn.btn-solid:hover, .btn.btn-outline:hover, .btn.btn-solid.colorbtn, .btn.btn-solid.colorbtn:hover, .btn.btn-outline.colorbtn, .pagination li .current, .pagination li a:hover {
	border-color: <?php echo $data['pri_color']; ?>;
}

.main-nav > .menu > li.menu-item-has-children > a .inner-menu span:after {
	border-top-color: <?php echo $data['pri_color']; ?>;
}

<?php endif;

/* Selection Color */
if (!empty($data['selection_bg_color']) || !empty($data['selection_text_color'])){ ?>

::-moz-selection {
<?php echo (!empty ( $data['selection_bg_color'])? 'background:' . $data['selection_bg_color'] : '');?>;
<?php echo (!empty ( $data['selection_text_color'])? 'color:' . $data['selection_text_color'] : '');?>;
}
::selection {
<?php echo (!empty ( $data['selection_bg_color'])? 'background:' . $data['selection_bg_color'] : '');?>;
<?php echo (!empty ( $data['selection_text_color'])? 'color:' . $data['selection_text_color'] : '');?>;
}

<?php } 

/* Footer Custom Styles */
$f_customization = isset($data['f_customization'])? $data['f_customization'] : '';
$custom_f_bg_pattern = isset($data['custom_f_bg_pattern'])? $data['custom_f_bg_pattern'] : '';
$custom_f_bg_color = isset($data['custom_f_bg_color'])? $data['custom_f_bg_color'] : '';
$custom_f_bg = isset($data['custom_f_bg'])? $data['custom_f_bg'] : '';
$custom_f_bg_attachment = isset($data['custom_f_bg_attachment'])? $data['custom_f_bg_attachment'] : '';
$custom_f_bg_size = isset($data['custom_f_bg_size'])? $data['custom_f_bg_size'] : '';
$custom_f_bg_repeat = isset($data['custom_f_bg_repeat'])? $data['custom_f_bg_repeat'] : '';

$custom_f_title_color = isset($data['custom_f_title_color'])? $data['custom_f_title_color'] : '';
$custom_f_txt_color = isset($data['custom_f_txt_color'])? $data['custom_f_txt_color'] : '';
$custom_f_link_color = isset($data['custom_f_link_color'])? $data['custom_f_link_color'] : '';
$custom_f_link_hover_color = isset($data['custom_f_link_hover_color'])? $data['custom_f_link_hover_color'] : '';
$custom_fc_bg_color = isset($data['custom_fc_bg_color'])? $data['custom_fc_bg_color'] : '';
$custom_fc_txt_color = isset($data['custom_fc_txt_color'])? $data['custom_fc_txt_color'] : '';
$custom_fc_link_color = isset($data['custom_fc_link_color'])? $data['custom_fc_link_color'] : '';
$custom_fc_link_hover_color = isset($data['custom_fc_link_hover_color'])? $data['custom_fc_link_hover_color'] : '';

//Change Background URL

if($custom_f_bg){
	$custom_f_bg = str_replace('[site_url]', site_url(), $custom_f_bg);
}

?>

<?php //Footer Customization ?>

<?php if($f_customization): ?>

	<?php if($custom_f_bg_color != '' && $custom_f_bg == '' && $custom_f_bg_pattern == ''): ?>

		#pageFooterCon {
			background-color: <?php echo $custom_f_bg_color; ?>;        
		}

	<?php endif; ?>

	<?php if($custom_f_bg_color != '' && $custom_f_bg_pattern != ''  && $custom_f_bg == '' ): ?>

		#pageFooterCon, .footer-light #pageFooterCon {
			background: <?php echo $custom_f_bg_color; if( $custom_f_bg_pattern != 'none') { ?> url(<?php echo get_template_directory_uri().'/_img/'.$custom_f_bg_pattern.'.png'; ?>) repeat <?php } ?>;
		}

	<?php endif; ?>

	<?php if($custom_f_bg != '' ): ?>

		.pageFooterCon , .footer-bottom{
				background: none;
		}

		footer{
			background-image: url(<?php echo $custom_f_bg; ?>);
			background-attachment: <?php echo $custom_f_bg_attachment; ?>;
			background-repeat: <?php echo $custom_f_bg_repeat; ?>;
			background-size: <?php echo $custom_f_bg_size; ?>;
		}

	<?php endif; ?>



	<?php if($custom_f_title_color != '' ): ?>

		#pageFooterCon .widget .widgettitle, #pageFooterCon .widget .widgettitle, #pageFooterCon #wp-calendar caption {        
			color: <?php echo $custom_f_title_color ?>;
		}

	<?php endif; ?>


	<?php if($custom_f_txt_color != '' ): ?>

		.pageFooterCon, .footer-light #pageFooterCon, #pageFooterCon .textwidget,#pageFooterCon thead{        
			color: <?php echo $custom_f_txt_color ?>;
		}

	<?php endif; ?>


	<?php if($custom_f_link_color != '' ): ?>

		#pageFooterCon .widget li a, .pageFooterCon #wp-calendar a, .footer-light #pageFooterCon .widget a {        
			color: <?php echo $custom_f_link_color ?>;
		}
		.widget.widget_rss a {
			border-bottom-color: <?php echo $custom_f_link_color ?>;
		}
		.searchsubmit,#wp-calendar #today {
			  background-color: <?php echo $custom_f_link_color ?>;
		}

	<?php endif; ?>

	<?php if($custom_f_link_hover_color != '' ): ?>

		#pageFooterCon .widget li a:hover, .pageFooterCon #wp-calendar td a:hover{        
			color: <?php echo $custom_f_link_hover_color ?>;
		}        
		.widget.widget_rss a:hover{
			border-bottom-color: <?php echo $custom_f_link_hover_color ?>;
		}

	<?php endif; ?>

	<?php if($custom_fc_bg_color != '' ): ?>

		.footer-bottom, .footer-light .footer-bottom {        
		   background-color: <?php echo $custom_fc_bg_color ?>;
		   border: none;
		}

	<?php endif; ?>

	<?php if($custom_fc_txt_color != '' ): ?>

		.copyright {        
			color: <?php echo $custom_fc_txt_color ?>;
		}

	<?php endif; ?>

	<?php if($custom_fc_link_color != '' ): ?>

		.footer-bottom .copyright a {        
			color: <?php echo $custom_fc_link_color ?>;
		}

	<?php endif; ?>

	<?php if($custom_fc_link_hover_color != '' ): ?>

		.footer-bottom .copyright a:hover {        
			color: <?php echo $custom_fc_link_hover_color ?>;
		}

	<?php endif; ?>

<?php endif; ?>



body {
	font-family: '<?php echo $body_gf; ?>', <?php echo $body_ff; ?>;
	font-size:   <?php echo  $body_fsize; ?>;
	font-style:  <?php echo $body_fvs[0]; ?>;
	font-weight: <?php echo $body_fvs[1]; ?>;
}

.main-title, .typed-wrap {   
    font-family: '<?php echo $heading_gf; ?>', <?php echo $heading_ff; ?>;        
	font-style:  <?php echo $heading_fvs[0]; ?>;
	font-weight: <?php echo $heading_fvs[1]; ?>;
}

.sub-title, .pix-portfolio-item .portfolio-content p, .testimonial-container .para, .quotes .author-comment, .staff-container p, .pix-author-job {
    font-family: '<?php echo $con_gf; ?>', <?php echo $con_ff; ?>;
}
