<?php

	//Preloader Animation Style
	$page_transition = array( 
		'default'     => esc_html__( 'Default', 'amz-rigel-plugins' ),
		'fadeIn'      => esc_html__( 'Fade In', 'amz-rigel-plugins' ),
		'fadeInUp'    => esc_html__( 'Fade In Up', 'amz-rigel-plugins' ),
		'fadeInDown'  => esc_html__( 'Fade In Down', 'amz-rigel-plugins' ),
		'fadeInLeft'  => esc_html__( 'Fade In Left', 'amz-rigel-plugins' ),
		'fadeInRight' => esc_html__( 'Fade In Right', 'amz-rigel-plugins' ),
		'zoomIn'      => esc_html__( 'Zoom In', 'amz-rigel-plugins' ),
		'zoomInUp'    => esc_html__( 'Zoom In Up', 'amz-rigel-plugins' ),
		'zoomInDown'  => esc_html__( 'Zoom In Down', 'amz-rigel-plugins' ),
		'zoomInLeft'  => esc_html__( 'Zoom In Left', 'amz-rigel-plugins' ),
		'zoomInRight' => esc_html__( 'Zoom In Right', 'amz-rigel-plugins' )
	);

	//Demo Purpose
	$menus = get_terms( 'nav_menu', array( 'hide_empty' => false ) );
	$menu_list = array();
	$menu_list[] = esc_html__( 'Default', 'amz-rigel-plugins' );
	foreach ( $menus as $key => $slug ) {
		$menu_list[$slug->slug] = $slug->name;
	}	

	$amz_prefix = '_amz_';

	$page_metabox = array(
		'metabox'	=> array( 
			'id'         => 'post',
			'title'      => esc_html__( 'Page Options', 'amz-rigel-plugins' ),
			'post_type'  => 'post',
			'context'    => 'normal',
			'priority'   => 'low',
			'tabs' 		 => true,
		),
		'fields'     => array(

			array(
				'title' => esc_html__( 'Post Format Options', 'amz-rigel-plugins' ),
				'icon'  => 'icon-name',
				'type'  => 'heading'
			),

			array(
				'id'           => $amz_prefix . 'gallery',
				'title'        => esc_html__( 'Gallery', 'amz-rigel-plugins' ),
				'description'  => esc_html__( 'Select images for gallery post format', 'amz-rigel-plugins' ),
				//'desc_tip'   => 'Description tip',
				'option'       => 'image', // image, audio, video
				'multi_select' => true, // true, false
				'class'        => 'format-gallery', // class name for this meta field
				'type'         => 'media_manager'
			),

			array(
				'id'          => $amz_prefix . 'auto_slide',
				'title'       => esc_html__( 'Auto Slide', 'amz-rigel-plugins' ),
				'description' => esc_html__( 'To Enable autoplay or autoslide please type numeric value in milliseconds', 'amz-rigel-plugins' ),
				'desc_tip'    => esc_html__( 'Ex: 2000, also you can enter true to set default duration(5000). Leave it blank or enter false to disable auto slide', 'amz-rigel-plugins' ),
				'placeholder' => 'Eg:2000',
				'class'       => 'format-gallery', // class name for this meta field
				'type'        => 'text'
			),

			array(
				'id'          => $amz_prefix . 'link',
				'title'       => esc_html__( 'Link', 'amz-rigel-plugins' ),
				'description' => esc_html__( 'Type the external link it applies only in link post format', 'amz-rigel-plugins' ),
				'placeholder' => '',
				'class'       => 'format-link', // class name for this meta field
				'type'        => 'text'
			),

			array(
				'id'          => $amz_prefix . 'author',
				'title'       => esc_html__( 'Quote Author', 'amz-rigel-plugins' ),
				'description' => esc_html__( 'Enter the Author Name it applies only in quote post format', 'amz-rigel-plugins' ),
				'placeholder' => '',
				'class'       => 'format-quote', // class name for this meta field
				'type'        => 'text'
			),

			array(
				'id'            => $amz_prefix . 'video_methods',
				'title'         => esc_html__( 'Video Methods', 'amz-rigel-plugins' ),
				'description'   => esc_html__( 'Choose the video methods such as (Direct insert or Iframe)', 'amz-rigel-plugins' ),
				//'desc_tip'    => 'Description tip',
				//'placeholder' => 'Item placeholder here',
				'std'           => 'normal',
				'options'       => array(
					'normal' => esc_html__( 'Normal', 'amz-rigel-plugins' ),
					'iframe' => esc_html__( 'Iframe', 'amz-rigel-plugins' )
				),
				'type'          => 'switch',
				'class'         => 'format-video', // class name for this meta field
				'folds'         => 1
			),

			array(
				'id'           => $amz_prefix . 'video_normal',
				'title'        => esc_html__( 'Select Normal Video', 'amz-rigel-plugins' ),
				'description'  => esc_html__( 'Choose or Upload video from Media Uploader', 'amz-rigel-plugins' ),
				//'desc_tip'   => 'Description tip',
				'option'       => 'video', // image, audio, video
				'multi_select' => false, // true, false
				'type'         => 'media_manager',
				'class'        => 'format-video', // class name for this meta field
				'fold'         => array( $amz_prefix . 'video_methods' => array( 'normal' ) )
			),

			array(
				'id'           => $amz_prefix . 'poster',
				'title'        => esc_html__( 'Poster', 'amz-rigel-plugins' ),
				'description'  => esc_html__( 'Choose or Upload image from Media Uploader for video poster', 'amz-rigel-plugins' ),
				//'desc_tip'   => 'Description tip',
				'option'       => 'image', // image, audio, video
				'multi_select' => false, // true, false
				'type'         => 'media_manager',
				'class'        => 'format-video', // class name for this meta field
				'fold'         => array( $amz_prefix . 'video_methods' => array( 'normal' ) )
			),

			array(
				'id'            => $amz_prefix . 'video_autoplay',
				'title'         => esc_html__( 'Autoplay', 'amz-rigel-plugins' ),
				'description'   => esc_html__( 'If it\'s true, the videos plays automatically when the page loads', 'amz-rigel-plugins' ),
				//'desc_tip'    => 'Description tip',
				//'placeholder' => 'Item placeholder here',
				'std'           => 'no',
				'options'       => array(
					'yes' => esc_html__( 'Yes', 'amz-rigel-plugins' ),
					'no'  => esc_html__( 'No', 'amz-rigel-plugins' )
				),
				'type'          => 'switch',
				'class'         => 'format-video', // class name for this meta field
				'fold'          => array( $amz_prefix . 'video_methods' => array( 'normal' ) )
			),

			array(
				'id'          => $amz_prefix . 'video_iframe',
				'title'       => esc_html__( 'Video Iframe', 'amz-rigel-plugins' ),
				'description' => esc_html__( 'Enter Video iframe (Please enter embed code form YouTube / Vimeo / Blip.tv / Viddler / Kickstarter )', 'amz-rigel-plugins' ),
				//'desc_tip'  => 'Description tip',
				'placeholder' => '',
				'type'        => 'textarea',
				'class'       => 'format-video', // class name for this meta field
				'fold'        => array( 'video_methods' => array( 'iframe' ) )
			),

			array(
				'id'            => $amz_prefix . 'audio_methods',
				'title'         => esc_html__( 'Audio Methods', 'amz-rigel-plugins' ),
				'description'   => esc_html__( 'Choose the audio methods', 'amz-rigel-plugins' ),
				//'desc_tip'    => 'Description tip',
				//'placeholder' => 'Item placeholder here',
				'std'           => 'normal',
				'options'       => array(
					'normal' => esc_html__( 'Normal', 'amz-rigel-plugins' ),
					'iframe' => esc_html__( 'Iframe', 'amz-rigel-plugins' )
				),
				'type'          => 'switch',
				'class'         => 'format-audio', // class name for this meta field
				'folds'         => 1
			),

			array(
				'id'           => $amz_prefix . 'audio_normal',
				'title'        => esc_html__( 'Select Normal Audio', 'amz-rigel-plugins' ),
				'description'  => esc_html__( 'Choose or Upload audio from Media Uploader', 'amz-rigel-plugins' ),
				//'desc_tip'   => 'Description tip',
				'option'       => 'audio', // image, audio, video
				'multi_select' => false, // true, false
				'type'         => 'media_manager',
				'class' => 'format-audio', // class name for this meta field
				'fold'         => array( $amz_prefix . 'audio_methods' => array( 'normal' ) )
			),

			array(
				'id'            => $amz_prefix . 'audio_autoplay',
				'title'         => esc_html__( 'Autoplay', 'amz-rigel-plugins' ),
				'description'   => esc_html__( 'If it\'s true, the audios plays automatically when the page loads', 'amz-rigel-plugins' ),
				//'desc_tip'    => 'Description tip',
				//'placeholder' => 'Item placeholder here',
				'std'           => 'no',
				'options'       => array(
					'yes' => esc_html__( 'Yes', 'amz-rigel-plugins' ),
					'no'  => esc_html__( 'No', 'amz-rigel-plugins' )
				),
				'type'          => 'switch',
				'class'         => 'format-audio', // class name for this meta field
				'fold'          => array( $amz_prefix . 'audio_methods' => array( 'normal' ) )
			),

			array(
				'id'          => $amz_prefix . 'audio_iframe',
				'title'       => esc_html__( 'Audio Iframe', 'amz-rigel-plugins' ),
				'description' => esc_html__( 'Enter audio iframe (Please enter embed code form YouTube / Vimeo / Blip.tv / Viddler / Kickstarter )', 'amz-rigel-plugins' ),
				//'desc_tip'  => 'Description tip',
				'placeholder' => '',
				'type'        => 'textarea',
				'class'       => 'format-audio', // class name for this meta field
				'fold'        => array( $amz_prefix . 'audio_methods' => array( 'iframe' ) )
			),

			array(
				'title' => esc_html__( 'Layout', 'amz-rigel-plugins' ),
				'icon'  => 'icon-name',
				'type'  => 'heading'
			),

			array(
				'id'            => 'layout',
				'title'         => esc_html__( 'Post Layout', 'amz-rigel-plugins' ),
				'description'   => esc_html__( 'Choose page layout', 'amz-rigel-plugins' ),
				'std'           => 'default',
				'options'       => array(
					'default'       => 'full_width.png',
					'left-sidebar'  => 'left_sidebar.png',	
					'right-sidebar' => 'right_sidebar.png'
				),
				'type'          => 'image_select'
			),

			array(
				'id'           => 'sidebar',
				'title'        => esc_html__( 'Select Sidebar', 'amz-rigel-plugins' ),
				'description'  => esc_html__( 'Select Sidebar For this page.', 'amz-rigel-plugins' ),
				'hide_sidebar' => array('blog-sidebar'),
				'type'         => 'select_sidebar',
			),

			array(
				'title' => esc_html__( 'General', 'amz-rigel-plugins' ),
				'icon'  => 'icon-name',
				'type'  => 'heading'
			),

			array(
				'id'          => 'featured_image',
				'title'       => esc_html__( 'Featured Image in single post', 'amz-rigel-plugins' ),
				'description' => esc_html__( 'Show / Hide Featured Image in single post', 'amz-rigel-plugins' ),
				'std'         => 'show',
				'options' 	  => array(
					'show' 	  => esc_html__( 'Show', 'amz-rigel-plugins' ),
					'hide' 	  => esc_html__( 'Hide', 'amz-rigel-plugins' )
				),
				'type' 		  => 'switch'
			),

			array(
				'id'          => $amz_prefix.'body_bgcolor',
				'title'       => esc_html__( 'Body Background Color', 'amz-rigel-plugins' ),
				'description' => esc_html__( 'You can choose body background color here. Leave it empty to apply defaults', 'amz-rigel-plugins' ),
				'std'         => '',
				'type'        => 'colorpicker'
			),

			array(
				'id'          => $amz_prefix.'header_layout',
				'title'       => esc_html__( 'Header Layout', 'amz-rigel-plugins' ),
				'description' => esc_html__( 'Choose header layout', 'amz-rigel-plugins' ),
				'std'         => 'default',
				'options'     => array(
					'default'     => 'default.png',
					'header-1'    => 'header-layout/header-1.png',
					'header-2'    => 'header-layout/header-2.png',
					'header-3'    => 'header-layout/header-3.png',
					'left-header' => 'header-layout/left-header.png'
				),
				'type'        => 'image_select',
				'class'       => 'header', // class name for this meta field
			),

			array(
				'id'          => $amz_prefix.'header_trans',
				'title'       => esc_html__( 'Header Transparency', 'amz-rigel-plugins' ),
				'description' => esc_html__( 'Enable / Disable Header Transparency for this page. Choose Default if you want to apply theme option settings', 'amz-rigel-plugins' ),
				'std'         => 'default',
				'options'     => array(
					'default'  => esc_html__( 'Default', 'amz-rigel-plugins' ),
					'enabled'  => esc_html__( 'Enabled', 'amz-rigel-plugins' ),
					'disabled' => esc_html__( 'Disabled', 'amz-rigel-plugins' )
				),
				'type'        => 'switch'
			),

			array(
				'id'          => $amz_prefix.'header_trans_val',
				'title'       => esc_html__( 'Header Transparency Value', 'amz-rigel-plugins' ),
				'description' => esc_html__( 'Choose a transparency for the header background color (0 = fully transparent, 50 = 50% transparent & 100 = opaque)', 'amz-rigel-plugins' ),
				'placeholder' => '',
				'type'        => 'text'
			),

			array(
				'id'           => $amz_prefix.'header_text_color',
				'title'        => esc_html__( 'Header Text Color', 'amz-rigel-plugins' ),
				'description'  => esc_html__( 'Choose header text color, this affects header menu and icon colors', 'amz-rigel-plugins' ),
				'std'          => 'dark-header',
				'options'      => array(
					'default'      => esc_html__( 'Default', 'amz-rigel-plugins' ),
					'dark-header'  => esc_html__( 'Black', 'amz-rigel-plugins' ),
					'light-header' => esc_html__( 'White', 'amz-rigel-plugins' )
				),
				'type'         => 'switch'
			),

			array(
				'id'          => $amz_prefix.'main_navigation',
				'title'       => esc_html__( 'Main Navigation', 'amz-rigel-plugins' ),
				'description' => esc_html__( 'Select main navigation for this page', 'amz-rigel-plugins' ),
				'std'         => 'default',
				'options'     => $menu_list,
				'type'        => 'select'
			),

			array(
				'id'          => $amz_prefix.'left_navigation',
				'title'       => esc_html__( 'Left Header Menu', 'amz-rigel-plugins' ),
				'description' => esc_html__( 'Select left navigation for this page', 'amz-rigel-plugins' ),
				'std'         => 'default',
				'options' 	  => $menu_list,
				'type' 		  => 'select'
			),

			array(
				'id'          => $amz_prefix.'right_navigation',
				'title'       => esc_html__( 'Right Header Menu', 'amz-rigel-plugins' ),
				'description' => esc_html__( 'Select right navigation for this page', 'amz-rigel-plugins' ),
				'std'         => 'default',
				'options' 	  => $menu_list,
				'type' 		  => 'select'
			),

			array(
				'id'          => $amz_prefix.'transition',
				'title'       => esc_html__( 'Page Transition', 'amz-rigel-plugins' ),
				'description' => esc_html__( 'Select Page transition, this option only work if you enabled preloader in themeoption', 'amz-rigel-plugins' ),
				'std'         => 'default',
				'options' 	  => $page_transition,
				'type' 		  => 'select'
			),

			array(
				'title' => esc_html__( 'Title Bar', 'amz-rigel-plugins' ),
				'icon'  => 'icon-name',
				'type'  => 'heading'
			),

			array(
				'id'          => $amz_prefix.'title_bar',
				'title'       => esc_html__( 'Title bar', 'amz-rigel-plugins' ),
				'description' => esc_html__( 'Show / Hide Title bar in this page', 'amz-rigel-plugins' ),
				'std'         => 'show',
				'options' 	  => array(
					'default' => esc_html__( 'Default', 'amz-rigel-plugins' ),
					'show'    => esc_html__( 'Show', 'amz-rigel-plugins' ),
					'hide'    => esc_html__( 'Hide', 'amz-rigel-plugins' )
				),
				'type' 		  => 'switch'
			),

			array(
				'id'          => $amz_prefix.'breadcrumbs',
				'title'       => esc_html__( 'Breadcrumbs', 'amz-rigel-plugins' ),
				'description' => esc_html__( 'Show / Hide breadcrumbs in Title bar', 'amz-rigel-plugins' ),
				'std'         => 'show',
				'options'     => array(
					'default' => esc_html__( 'Default', 'amz-rigel-plugins' ),
					'show'    => esc_html__( 'Show', 'amz-rigel-plugins' ),
					'hide'    => esc_html__( 'Hide', 'amz-rigel-plugins' )
				),
				'type'        => 'switch'
			),

			array(
				'id'          => $amz_prefix.'title_bar_size',
				'title'       => esc_html__( 'Title bar Size', 'amz-rigel-plugins' ),
				'description' => esc_html__( 'Choose title bar size', 'amz-rigel-plugins' ),
				'std'         => 'small',
				'options' 	  => array(
					'default' => esc_html__( 'Default', 'amz-rigel-plugins' ),
					'small'   => esc_html__( 'Small', 'amz-rigel-plugins' ),
					'medium'  => esc_html__( 'Medium', 'amz-rigel-plugins' ),
					'large'   => esc_html__( 'Large', 'amz-rigel-plugins' )
				),
				'type' 		  => 'switch'
			),

			array(
				'id'          => $amz_prefix.'title_bar_style',
				'title'       => esc_html__( 'Title Bar Style', 'amz-rigel-plugins' ),
				'description' => esc_html__( 'Choose title bar style', 'amz-rigel-plugins' ),
				'std'         => 'default',
				'options' 	  => array(
					'default' => esc_html__( 'Default', 'amz-rigel-plugins' ),
					'custom'  => esc_html__( 'Custom', 'amz-rigel-plugins' )
				),
				'type' 		  => 'switch',
				'folds'		  => 1,
			),

			array(
				'id'          => $amz_prefix.'title_bar_bg_color',
				'title'       => esc_html__( 'Title Bar Background Color', 'amz-rigel-plugins' ),
				'description' => esc_html__( 'Choose Title bar background color. Leave it empty apply default', 'amz-rigel-plugins' ),
				'std'         => '',
				'type'        => 'colorpicker'
			),

			array(
				'id'           => $amz_prefix.'title_bar_bg_image',
				'title'        => esc_html__( 'Title Bar Background Image', 'amz-rigel-plugins' ),
				'description'  => esc_html__( 'Choose Title bar background image. Leave it empty apply default from themeoption', 'amz-rigel-plugins' ),
				'option'       => 'image', // image, audio, video
				'multi_select' => false, // true, false
				'type'         => 'media_manager'
			),

			array(
				'id'          => $amz_prefix.'title_bar_text_color',
				'title'       => esc_html__( 'Title Bar text Color', 'amz-rigel-plugins' ),
				'description' => esc_html__( 'Choose Title bar text color. Leave it empty apply default', 'amz-rigel-plugins' ),
				'std'         => '',
				'type'        => 'colorpicker'
			),

			array(
				'title' => esc_html__( 'Layout', 'amz-rigel-plugins' ),
				'icon'  => 'icon-name',
				'type'  => 'heading'
			),

			array(
				'id' => $amz_prefix.'layout',
				'title' => esc_html__( 'Page Layout', 'amz-rigel-plugins' ),
				'description' => esc_html__( 'Choose page layout', 'amz-rigel-plugins' ),
				'std' => 'default',
				'options' => array(
					'default'       => 'full_width.png',
					'left-sidebar'  => 'left_sidebar.png',	
					'right-sidebar' => 'right_sidebar.png',					
					'left-nav'      => 'left_nav.png',
					'right-nav'     => 'right_nav.png',
				),
				'type' => 'image_select'
			),

			array(
				'id'           => $amz_prefix.'sidebar',
				'title'        => esc_html__( 'Select Sidebar', 'amz-rigel-plugins' ),
				'description'  => esc_html__( 'Select Sidebar For this page.', 'amz-rigel-plugins' ),
				'hide_sidebar' => array( 'footer-widget-1', 'footer-widget-2' ),
				'type'         => 'select_sidebar',
			)

		),
	);

	$page_metabox = new Rigel_Metabox( $page_metabox );