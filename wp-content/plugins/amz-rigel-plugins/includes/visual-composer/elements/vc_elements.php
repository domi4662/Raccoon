<?php

/*
 * Add Visual Composer elements here
 */

//Animation
$animation = array('fadeIn','flash','bounce','shake','tada','swing','wobble','pulse','flip','flipInX','flipInY','fadeInUp','fadeInDown','fadeInLeft','fadeInRight','fadeInUpBig','fadeInDownBig','fadeInLeftBig','fadeInRightBig','slideInDown','slideInLeft','slideInRight','zoomIn','zoomInUp','zoomInDown','zoomInLeft','zoomInRight','bounceIn','bounceInUp','bounceInDown','bounceInLeft','bounceInRight','rotateIn','rotateInDownLeft','rotateInDownRight','rotateInUpLeft','rotateInUpRight','lightSpeedIn','hinge','rollIn');

$slider_animation_in = array('None' => 'false','fadeIn'=>'fadeIn','flash'=>'flash','bounce'=>'bounce','shake'=>'shake','tada'=>'tada','swing'=>'swing','wobble'=>'wobble','pulse'=>'pulse','flip'=>'flip','flipInX'=>'flipInX','flipInY'=>'flipInY','fadeInUp'=>'fadeInUp','fadeInDown'=>'fadeInDown','fadeInLeft'=>'fadeInLeft','fadeInRight'=>'fadeInRight','fadeInUpBig'=>'fadeInUpBig','fadeInDownBig'=>'fadeInDownBig','fadeInLeftBig'=>'fadeInLeftBig','fadeInRightBig'=>'fadeInRightBig','slideInDown'=>'slideInDown','slideInLeft'=>'slideInLeft','slideInRight'=>'slideInRight','zoomIn'=>'zoomIn','zoomInUp'=>'zoomInUp','zoomInDown'=>'zoomInDown','zoomInLeft'=>'zoomInLeft','zoomInRight'=>'zoomInRight','bounceIn'=>'bounceIn','bounceInUp'=>'bounceInUp','bounceInDown'=>'bounceInDown','bounceInLeft'=>'bounceInLeft','bounceInRight'=>'rotateIn','rotateIn'=>'rotateIn','rotateInDownLeft'=>'rotateInDownLeft','rotateInDownRight'=>'rotateInDownRight','rotateInUpLeft'=>'rotateInUpLeft','rotateInUpRight'=>'rotateInUpRight','lightSpeedIn'=>'lightSpeedIn','hinge'=>'hinge','rollIn'=>'rollIn');

$slider_animation_out = array('None' => 'false','fadeOut' => 'fadeOut','flipOutX' => 'flipOutX','flipOutY' => 'flipOutY','fadeOutUp' => 'fadeOutUp','fadeOutDown'=>'fadeOutDown','fadeOutLeft'=>'fadeOutLeft','fadeOutRight'=>'fadeOutRight','fadeOutUpBig'=>'fadeOutUpBig','fadeOutDownBig'=>'fadeOutDownBig','fadeOutLeftBig'=>'fadeOutLeftBig','fadeOutRightBig'=>'fadeOutRightBig','slideOutDown'=>'slideOutDown','slideOutLeft'=>'slideOutLeft','slideOutRight'=>'slideOutRight','zoomOut'=>'zoomOut','zoomOutUp'=>'zoomOutUp','zoomOutDown'=>'zoomOutDown','zoomOutLeft'=>'zoomOutLeft','zoomOutRight'=>'zoomOutRight','bounceOut'=>'bounceOut','bounceOutUp'=>'bounceOutUp','bounceOutDown'=>'bounceOutDown','bounceOutLeft'=>'bounceOutLeft','bounceOutRight'=>'bounceOutRight','rotateOut'=>'rotateOut','rotateOutDownLeft'=>'rotateOutDownLeft','rotateOutDownRight'=>'rotateOutDownRight','rotateOutUpLeft'=>'rotateOutUpLeft','rotateOutUpRight'=>'rotateOutUpRight','lightSpeedOut'=>'lightSpeedOut','rollOut'=>'rollOut');

$hover_animation_in = array('fadeIn'=>'fadeIn','flash'=>'flash','bounce'=>'bounce','shake'=>'shake','tada'=>'tada','swing'=>'swing','wobble'=>'wobble','pulse'=>'pulse','flip'=>'flip','flipInX'=>'flipInX','flipInY'=>'flipInY','fadeInUp'=>'fadeInUp','fadeInDown'=>'fadeInDown','fadeInLeft'=>'fadeInLeft','fadeInRight'=>'fadeInRight','fadeInUpBig'=>'fadeInUpBig','fadeInDownBig'=>'fadeInDownBig','fadeInLeftBig'=>'fadeInLeftBig','fadeInRightBig'=>'fadeInRightBig','slideInUp'=>'slideInUp','slideInDown'=>'slideInDown','slideInLeft'=>'slideInLeft','slideInRight'=>'slideInRight','zoomIn'=>'zoomIn','zoomInUp'=>'zoomInUp','zoomInDown'=>'zoomInDown','zoomInLeft'=>'zoomInLeft','zoomInRight'=>'zoomInRight','bounceIn'=>'bounceIn','bounceInUp'=>'bounceInUp','bounceInDown'=>'bounceInDown','bounceInLeft'=>'bounceInLeft','bounceInRight'=>'rotateIn','rotateIn'=>'rotateIn','rotateInDownLeft'=>'rotateInDownLeft','rotateInDownRight'=>'rotateInDownRight','rotateInUpLeft'=>'rotateInUpLeft','rotateInUpRight'=>'rotateInUpRight','lightSpeedIn'=>'lightSpeedIn','hinge'=>'hinge','rollIn'=>'rollIn');

$hover_animation_out = array('fadeOut' => 'fadeOut','flipOutX' => 'flipOutX','flipOutY' => 'flipOutY','fadeOutUp' => 'fadeOutUp','fadeOutDown'=>'fadeOutDown','fadeOutLeft'=>'fadeOutLeft','fadeOutRight'=>'fadeOutRight','fadeOutUpBig'=>'fadeOutUpBig','fadeOutDownBig'=>'fadeOutDownBig','fadeOutLeftBig'=>'fadeOutLeftBig','fadeOutRightBig'=>'fadeOutRightBig','slideOutDown'=>'slideOutDown','slideOutLeft'=>'slideOutLeft','slideOutRight'=>'slideOutRight','zoomOut'=>'zoomOut','zoomOutUp'=>'zoomOutUp','zoomOutDown'=>'zoomOutDown','zoomOutLeft'=>'zoomOutLeft','zoomOutRight'=>'zoomOutRight','bounceOut'=>'bounceOut','bounceOutUp'=>'bounceOutUp','bounceOutDown'=>'bounceOutDown','bounceOutLeft'=>'bounceOutLeft','bounceOutRight'=>'bounceOutRight','rotateOut'=>'rotateOut','rotateOutDownLeft'=>'rotateOutDownLeft','rotateOutDownRight'=>'rotateOutDownRight','rotateOutUpLeft'=>'rotateOutUpLeft','rotateOutUpRight'=>'rotateOutUpRight','lightSpeedOut'=>'lightSpeedOut','rollOut'=>'rollOut');

/* Anything carousel */
vc_map( array(
	"name" => __("Anything Carousel", 'amz-rigel-plugins'),
	"base" => "anything_carousel",
	"icon" => "icon-pixel8es",
	"category" => 'By Rigel', //category
	"as_parent" => array('except' => 'anything_carousel'), 
	"content_element" => true,
	"show_settings_on_create" => true,
	"params" => array(

		array(
			'type' => 'textfield',
			'heading' => __( 'Slides per view', 'amz-rigel-plugins' ),
			'param_name' => 'slides_per_view',
			'value' => 1,
			'description' => __( 'Enter number of slides to display at the same time.', 'amz-rigel-plugins' )
			),

		array(
			'type' => 'textfield',
			'heading' => __( 'Margin', 'amz-rigel-plugins' ),
			'param_name' => 'margin',
			'value' => '30',
			'description' => __( 'Enter margin-right(px) on item ( Example: 30 ).', 'amz-rigel-plugins' ),
			),
		
		array(
			"type" => "dropdown",
			"heading" => __("Loop", 'amz-rigel-plugins'),
			"param_name" => "loop",
			"value" => array( __('No', 'amz-rigel-plugins') => "false",
				__('Yes', 'amz-rigel-plugins') => "true"),
			"description" => 'Inifnity loop. Duplicate last and first items to get loop illusion.',
			),

		array(
			"type" => "dropdown",
			"heading" => __("Center", 'amz-rigel-plugins'),
			"param_name" => "center",
			"value" => array( __('No', 'amz-rigel-plugins') => "false",
				__('Yes', 'amz-rigel-plugins') => "true"),
			"description" => 'Center item. Works well with even an odd number of items.'
			),

		array(
			'type' => 'textfield',
			'heading' => __( 'Padding Left and Right', 'amz-rigel-plugins' ),
			'param_name' => 'stage_padding',
			'value' => '0',
			'description' => __( 'Padding left and right on stage (can see neighbours).', 'amz-rigel-plugins' )
			),

		array(
			'type' => 'textfield',
			'heading' => __( 'Start Position', 'amz-rigel-plugins' ),
			'param_name' => 'start_position',
			'value' => '0',
			'description' => __( 'Start position.', 'amz-rigel-plugins' )
			),

		array(
			"type" => "dropdown",
			"heading" => __("Autoplay", 'amz-rigel-plugins'),
			"param_name" => "autoplay",
			"value" => array( __('No', 'amz-rigel-plugins') => "false", __('Yes', 'amz-rigel-plugins') => "true" ),
			"description" => __("Enable autoplay?", 'amz-rigel-plugins'),
			),

		array(
			"type" => "textfield",
			"heading" => __("Autoplay Interval Timeout", 'amz-rigel-plugins'),
			"param_name" => "slide_speed",
			"value" => "5000",
			"description" => __("Enter Autoplay interval timeout Value in milesecond (Ex: 5000).", 'amz-rigel-plugins'),
			),

		array(
			"type" => "dropdown",
			"heading" => __("Autoplay Hover Pause", 'amz-rigel-plugins'),
			"param_name" => "stop_on_hover",
			"value" => array( __('Yes', 'amz-rigel-plugins') => "true",
				__('No', 'amz-rigel-plugins') => "false"),
			"description" => 'Pause on mouse hover.'
			),

		array(
			"type" => "dropdown",
			"heading" => __("Arrow", 'amz-rigel-plugins'),
			"param_name" => "slide_arrow",
			"value" => array( __('Yes', 'amz-rigel-plugins') => "true",
				__('No', 'amz-rigel-plugins') => "false"),
			"description" => __("Do you like to show arrow navigation to move carousel.", 'amz-rigel-plugins')
			),      

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Arrow Style", 'amz-rigel-plugins'),
			"param_name" => "arrow_type",
			"value" => array( esc_html__('Default', 'amz-rigel-plugins') => "",
				esc_html__('Arrow Top Center', 'amz-rigel-plugins') => "arrow-style2"),
			"description" => esc_html__("Choose arrow postion", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "slide_arrow", 'value' => array('true'))
			),

		array(
			"type" => "dropdown",
			"heading" => __("Bullets", 'amz-rigel-plugins'),
			"param_name" => "pagination",
			"value" => array( __('Yes', 'amz-rigel-plugins') => "true",
				__('No', 'amz-rigel-plugins') => "false"),
			"description" => __("Do you like to show dot navigation to move carousel", 'amz-rigel-plugins'),
			),

		array(
			"type" => "dropdown",
			"heading" => __("Animation In", 'amz-rigel-plugins'),
			"param_name" => "animate_in",
			"value" => $slider_animation_in,
			"description" => __("false = no animation. Animate functions work only with one item and only in browsers that support perspective property.", 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Animation Out", 'amz-rigel-plugins'),
			"param_name" => "animate_out",
			"value" => $slider_animation_out,
			"description" => __("Animate functions work only with one item and only in browsers that support perspective property.", 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Mouse Drag?", 'amz-rigel-plugins'),
			"param_name" => "mouse_drag",
			"value" => array( __('Yes', 'amz-rigel-plugins') => "true",
				__('No', 'amz-rigel-plugins') => "false"),
			"description" => __("Do you like to move carousel by Mouse Drag?", 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Touch Drag", 'amz-rigel-plugins'),
			"param_name" => "touch_drag",
			"value" => array( __('Yes', 'amz-rigel-plugins') => "true",
				__('No', 'amz-rigel-plugins') => "false"),
			"description" => __("Do you like to move carousel Touch Drag?", 'amz-rigel-plugins')
			),

		array(
			'type' => 'css_editor',
			'heading' => __( 'CSS box', 'amz-rigel-plugins' ),
			'param_name' => 'anything_css',
			'group' => __( 'Design Options', 'amz-rigel-plugins' )
			),
		),
"js_view" => 'VcColumnView'
) );

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortCode_anything_carousel extends WPBakeryShortCodesContainer {
	}
}

//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
	"name" => __("Slider", 'amz-rigel-plugins'),
	"base" => "slider",
	"icon" => "icon-pixel8es",
	"category" => 'By Rigel', //category
    "as_parent" => array('only' => 'slide'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    "content_element" => true,
    "show_settings_on_create" => false,
    "params" => array(
        // add params same as with any other content element
		array(
			"type" => "dropdown",
			"heading" => __("Bullets", 'amz-rigel-plugins'),
			"param_name" => "pagination",
			"value" => array( __('Yes', 'amz-rigel-plugins') => "true",
							  __('No', 'amz-rigel-plugins') => "false",
							),
			"description" => __("Do you like to show dot navigation to move carousel", 'amz-rigel-plugins'),
		),
		
		array(
			"type" => "dropdown",
			"heading" => __("Arrow", 'amz-rigel-plugins'),
			"param_name" => "slide_arrow",
			"value" => array( __('No', 'amz-rigel-plugins') => "false",
							  __('Yes', 'amz-rigel-plugins') => "true"),
			"description" => __("Do you like to show arrow navigation to move carousel.", 'amz-rigel-plugins')
		),      

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Arrow Style", 'amz-rigel-plugins'),
			"param_name" => "arrow_type",
			"value" => array( esc_html__('Default', 'amz-rigel-plugins') => "",
				esc_html__('Arrow Top Center', 'amz-rigel-plugins') => "arrow-style2"),
			"description" => esc_html__("Choose arrow postion", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "slide_arrow", 'value' => array('true'))
			),

		array(
			"type" => "dropdown",
			"heading" => __("Autoplay", 'amz-rigel-plugins'),
			"param_name" => "autoplay",
			"value" => array( __('No', 'amz-rigel-plugins') => "false", 
							  __('Yes', 'amz-rigel-plugins') => "true" ),
			"description" => __("Enable autoplay?", 'amz-rigel-plugins'),
		),

		array(
			"type" => "textfield",
			"heading" => __("Autoplay Interval Timeout", 'amz-rigel-plugins'),
			"param_name" => "slide_speed",
			"value" => "5000",
			"description" => __("Enter Autoplay interval timeout Value in milesecond (Ex: 5000).", 'amz-rigel-plugins'),
			"dependency" => array('element' => "autoplay", 'value' => array('true')),
		),

		array(
			"type" => "dropdown",
			"heading" => __("Autoplay Pause on Hover?", 'amz-rigel-plugins'),
			"param_name" => "autoplay_pause",
			"value" => array( __('Yes', 'amz-rigel-plugins') => "true", 
							  __('No', 'amz-rigel-plugins') => "false" ),
			"description" => __("Enable autoplay pause on hover?", 'amz-rigel-plugins'),
		),

		array(
			"type" => "dropdown",
			"heading" => __("Loop", 'amz-rigel-plugins'),
			"param_name" => "loop",
			"value" => array( __('Yes', 'amz-rigel-plugins') => "true", 
							  __('No', 'amz-rigel-plugins') => "false" ),
			"description" => __("Enable loop?", 'amz-rigel-plugins'),
		),

	),
"js_view" => 'VcColumnView'
) );
vc_map( array(
	"name" => __("Slide", 'amz-rigel-plugins'),
	"base" => "slide",
	"icon" => "icon-pixel8es",
	"category" => 'By Rigel', //category
	"content_element" => true,
	"as_child" => array('only' => 'slider'),
	"params" => array(
		array(
			"type" => "textfield",
    		//"holder" => "slide",
			"class" => "",
			"heading" => __("Title", 'amz-rigel-plugins'),
			"param_name" => "title",
			"value" => "",
			"admin_label" => true,
			"description" => __("Enter your slide title text here.", 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => __("Title Font Size", 'amz-rigel-plugins'),
			"param_name" => "title_size",
			"value" => "",
			"description" => __("Enter the title font size in px(Ex: 50px)", 'amz-rigel-plugins'),
			"group"	=> __('Title Style', 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => __("Title Letter Spacing in px", 'amz-rigel-plugins'),
			"param_name" => "title_letter_spacing",
			"value" => "",
			"description" => __("Enter title letter spacing in pixels.( eg: 50px )", 'amz-rigel-plugins'),
			"group"	=> __('Title Style', 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Title Text Transform", 'amz-rigel-plugins'),
			"param_name" => "title_uppercase",
			"value" => array(
				__('Uppercase', 'amz-rigel-plugins') => "uppercase", 
				__('None', 'amz-rigel-plugins') => "none", 
				__('lowercase', 'amz-rigel-plugins') => "lowercase",
				__('Capitalize', 'amz-rigel-plugins') => "capitalize"),
			"description" => '',
			"group"	=> __('Title Style', 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => __("Title Padding", 'amz-rigel-plugins'),
			"param_name" => "title_padding",
			"value" => "",
			"description" => __("Enter the padding (in css format [top right bottom left]) in px(Ex: 50px 50px 50px 50px)", 'amz-rigel-plugins'),
			"group"	=> __('Title Style', 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => __("Title Margin", 'amz-rigel-plugins'),
			"param_name" => "title_margin",
			"value" => "",
			"description" => __("Enter the margin (in css format [top right bottom left]) in px(Ex: 50px 50px 50px 50px)", 'amz-rigel-plugins'),
			"group"	=> __('Title Style', 'amz-rigel-plugins')
			),

		array(
			'type' => 'textfield',
			'heading' => __( 'Title Line Height', 'amz-rigel-plugins' ),
			'param_name' => 'title_line_height',
			'value' => '',
			'description' => __( 'Enter the line-height in (px)  Example: 70px.', 'amz-rigel-plugins' ),
			"group"	=> __('Title Style', 'amz-rigel-plugins')
			),

		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => __("Title Custom Background Color", 'amz-rigel-plugins'),
			"param_name" => "title_bgcolor", 
			"value" => '', 
			"description" => __("Choose Title Background Color (or) Leave it empty to apply theme default", 'amz-rigel-plugins'),
			"group"	=> __('Title Style', 'amz-rigel-plugins')
			),

		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => __("Title Custom Color", 'amz-rigel-plugins'),
			"param_name" => "title_color", 
			"value" => '', 
			"description" => __("Choose Title Color (or) Leave it empty to apply theme default", 'amz-rigel-plugins'),
			"group"	=> __('Title Style', 'amz-rigel-plugins')
			),

		array(
			"type" => "textarea",
			"class" => "",
			"heading" => __("Content", 'amz-rigel-plugins'),
			"param_name" => "content",
			"value" => "",
			"admin_label" => false,
			"description" => __("Enter your slide content.", 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => __("Content Font Size", 'amz-rigel-plugins'),
			"param_name" => "content_size",
			"value" => "",
			"description" => __("Enter the content font size in px(Ex: 50px)", 'amz-rigel-plugins'),
			"group"	=> __('Content Style', 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => __("Content Letter Spacing in px", 'amz-rigel-plugins'),
			"param_name" => "content_letter_spacing",
			"value" => "",
			"description" => __("Enter content letter spacing in pixels.( eg: 50px )", 'amz-rigel-plugins'),
			"group"	=> __('Content Style', 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Content Text Transform", 'amz-rigel-plugins'),
			"param_name" => "content_uppercase",
			"value" => array(__('Uppercase', 'amz-rigel-plugins') => "uppercase", 
				__('None', 'amz-rigel-plugins') => "none", 
				__('lowercase', 'amz-rigel-plugins') => "lowercase",
				__('Capitalize', 'amz-rigel-plugins') => "capitalize"),
			"description" => '',
			"group"	=> __('Content Style', 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => __("Content Padding", 'amz-rigel-plugins'),
			"param_name" => "content_padding",
			"value" => "",
			"description" => __("Enter the padding (in css format [top right bottom left]) in px(Ex: 50px 50px 50px 50px)", 'amz-rigel-plugins'),
			"group"	=> __('Content Style', 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => __("Content Margin", 'amz-rigel-plugins'),
			"param_name" => "content_margin",
			"value" => "",
			"description" => __("Enter the margin (in css format [top right bottom left]) in px(Ex: 50px 50px 50px 50px)", 'amz-rigel-plugins'),
			"group"	=> __('Content Style', 'amz-rigel-plugins')
			),

		array(
			'type' => 'textfield',
			'heading' => __( 'Content Line Height', 'amz-rigel-plugins' ),
			'param_name' => 'content_line_height',
			'value' => '',
			'description' => __( 'Enter the line-height in (px)  Example: 70px.', 'amz-rigel-plugins' ),
			"group"	=> __('Content Style', 'amz-rigel-plugins')
			),

		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => __("Content Custom Background Color", 'amz-rigel-plugins'),
			"param_name" => "content_bgcolor", 
			"value" => '', 
			"description" => __("Choose Content Background Color (or) Leave it empty to apply theme default", 'amz-rigel-plugins'),
			"group"	=> __('Content Style', 'amz-rigel-plugins')
			),

		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => __("Content Custom Color", 'amz-rigel-plugins'),
			"param_name" => "content_color", 
			"value" => '', 
			"description" => __("Choose Content Color (or) Leave it empty to apply theme default", 'amz-rigel-plugins'),
			"group"	=> __('Content Style', 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Align", 'amz-rigel-plugins'),
			"param_name" => "align",
			"value" =>array(
				__('Left', 'amz-rigel-plugins') => "",  
				__('Right', 'amz-rigel-plugins') => "align-right",
				__('Center', 'amz-rigel-plugins') => "align-center"
				),
			"description" => ''
			),

		array(
			"type" => "dropdown",
			"heading" => __("Change Header text color?", 'amz-rigel-plugins'),
			"param_name" => "enable_header_text",
			"value" => array(__('Yes', 'amz-rigel-plugins') => "yes", 
				__('No', 'amz-rigel-plugins') => "no"),
			"description" => __("If you are using this slider below the header and if you enabled transparent Header, this option will help to adjust header text color, depends on your slider background", 'amz-rigel-plugins'),
			"group"	=> __('Header', 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Header Text Color", 'amz-rigel-plugins'),
			"param_name" => "header_text",
			"value" =>array(
				__('Black', 'amz-rigel-plugins') => "",  
				__('White', 'amz-rigel-plugins') => "white"
				),
			"description" => 'If you are using transparent Header, this option will help to adjust header text color, depends on your slider background',    		
			"group"	=> __('Header', 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Display Button?", 'amz-rigel-plugins'),
			"param_name" => "display_button",
			"value" => array(__('Yes', 'amz-rigel-plugins') => "yes", 
				__('No', 'amz-rigel-plugins') => "no"),
			"description" => __("Do you want to display button in icon box?", 'amz-rigel-plugins'),
			"group"	=> __('Button', 'amz-rigel-plugins')
			),

		array(
			"type" => "vc_link",
			"heading" => __("Button URL", 'amz-rigel-plugins'),
			"param_name" => "button_link",
			"value" => "",
			"description" => __("Enter the button link", 'amz-rigel-plugins'),
			"dependency" => array('element' => "display_button", 'value' => array('yes')),
			"group"	=> __('Button', 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Button Style", 'amz-rigel-plugins'),
			"param_name" => "button_style",
			"value" => array(__('Outline', 'amz-rigel-plugins') => "outline", 
				__('Solid', 'amz-rigel-plugins') => "solid", 
				__('Default', 'amz-rigel-plugins') => "simple"),
			"description" => __("Select button style", 'amz-rigel-plugins'),
			"dependency" => array('element' => "display_button", 'value' => array('yes')),
			"group"	=> __('Button', 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Button Hover Style", 'amz-rigel-plugins'),
			"param_name" => "button_hover_style",
			"value" => array(__('Outline', 'amz-rigel-plugins') => "outline", 
				__('Solid', 'amz-rigel-plugins') => "solid"),
			"description" => __("Select button hover style", 'amz-rigel-plugins'),
			"dependency" => array('element' => "display_button", 'value' => array('yes')),
			"group"	=> __('Button', 'amz-rigel-plugins')
			),

		array( 
			"type" => "dropdown",
			"heading" => __("Button Type", 'amz-rigel-plugins'),
			"param_name" => "button_type",
			"value" => array(__('Oval', 'amz-rigel-plugins') =>'oval',
				__('Rectangle', 'amz-rigel-plugins') =>'rectangle'),
			"description" => '',
			"dependency" => array('element' => "display_button", 'value' => array('yes')),
			"group"	=> __('Button', 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Button Color", 'amz-rigel-plugins'),
			"param_name" => "button_color",
			"value" => array(__('Theme default color', 'amz-rigel-plugins') => "color", 
				__('Black', 'amz-rigel-plugins') => "no-color",
				__('White', 'amz-rigel-plugins') => "white",
				__('Custom Color', 'amz-rigel-plugins') => "custom_color"), 
			"description" => __("Please choose button color", 'amz-rigel-plugins'),
			"dependency" => array('element' => "display_button", 'value' => array('yes')),
			"group"	=> __('Button', 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Button Hover Color", 'amz-rigel-plugins'),
			"param_name" => "button_hover_color",
			"value" => array(__('Theme default color', 'amz-rigel-plugins') => "color", 
				__('Black', 'amz-rigel-plugins') => "no-color",
				__('White', 'amz-rigel-plugins') => "white"), 
			"description" => __("Please choose button hover color", 'amz-rigel-plugins'),
			"dependency" => array('element' => "display_button", 'value' => array('yes')),
			"group"	=> __('Button', 'amz-rigel-plugins')
			),

		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => __("Custom Background Color", 'amz-rigel-plugins'),
			"param_name" => "btn_bg_color", 
			"value" => '', 
			"description" => __("Choose Background Color", 'amz-rigel-plugins'),
			"dependency" => array('element' => "button_color", 'value' => array('custom_color')),
			"group"	=> __('Button', 'amz-rigel-plugins')
			),

		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => __("Custom Color", 'amz-rigel-plugins'),
			"param_name" => "btn_text_color", 
			"value" => '', 
			"description" => __("Choose Text Color", 'amz-rigel-plugins'),
			"dependency" => array('element' => "button_color", 'value' => array('custom_color')),
			"group"	=> __('Button', 'amz-rigel-plugins')
			),

		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => __("Custom Border Color", 'amz-rigel-plugins'),
			"param_name" => "btn_border_color", 
			"value" => '', 
			"description" => __("Choose Border Color", 'amz-rigel-plugins'),
			"dependency" => array('element' => "button_color", 'value' => array('custom_color')),
			"group"	=> __('Button', 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Custom Button Size?", 'amz-rigel-plugins'),
			"param_name" => "custom_size",
			"value" => array(__('No', 'amz-rigel-plugins') => "no",
				__('Yes', 'amz-rigel-plugins') => "yes"),
			"description" => __("Do you want to custom button size?", 'amz-rigel-plugins'),
			"dependency" => array('element' => "display_button", 'value' => array('yes')),
			"group"	=> __('Button', 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => __("Font Size", 'amz-rigel-plugins'),
			"param_name" => "font_size",
			"value" => "",
			"description" => __("Enter the font size in px(Ex: 50px)", 'amz-rigel-plugins'),
			"dependency" => array('element' => "custom_size", 'value' => array('yes')),
			"group"	=> __('Button', 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => __("Custom Padding", 'amz-rigel-plugins'),
			"param_name" => "padding_custom",
			"value" => "",
			"description" => __("Enter the padding (in css format [top right bottom left]) in px(Ex: 50px 50px 50px 50px)", 'amz-rigel-plugins'),
			"dependency" => array('element' => "custom_size", 'value' => array('yes')),
			"group"	=> __('Button', 'amz-rigel-plugins')
			),

		array(
			'type' => 'css_editor',
			'heading' => __( 'CSS box', 'amz-rigel-plugins' ),
			'param_name' => 'slide_css',
			'group' => __( 'Design Options', 'amz-rigel-plugins' )
			),

		
		)
) );


//Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortCode_slider extends WPBakeryShortCodesContainer {
	}
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
	class WPBakeryShortCode_slide extends WPBakeryShortCode {
	}
}

//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
	"name" => __("Hover Box", "amz-rigel-plugins"),
	"base" => "hover_box",
	"icon" => "icon-pixel8es",
	"category" => 'By Rigel', //category
    "as_parent" => array('only' => 'hover_elements'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    "content_element" => true,
    "show_settings_on_create" => false,
    "js_view" => 'VcColumnView',
    "params" => array(
    	array(
			"type" => "attach_image",
			"heading" => esc_html__("Front Image", "amz-rigel-plugins"),
			"param_name" => "front_image",
			"value" => "",
		),

		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Image Width', 'amz-rigel-plugins' ),
			'param_name' => 'front_image_width',
			'value' => '',
			'description' => esc_html__( 'Enter the width as integer value  Ex: 200', 'amz-rigel-plugins' )
		),

		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Image Height', 'amz-rigel-plugins' ),
			'param_name' => 'front_image_height',
			'value' => '',
			'description' => esc_html__( 'Enter the height as integer value  Ex: 200', 'amz-rigel-plugins' )
		),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Display Overlay", "amz-rigel-plugins"),
			"param_name" => "overlay",
			"value" => array(
				esc_html__('Yes', "amz-rigel-plugins") => "yes",
				esc_html__('No', "amz-rigel-plugins") => "no",
			),
			"description" => '',
			"group"	=> esc_html__('Overlay', 'amz-rigel-plugins')
		),

    	array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => __("Overlay Color", "amz-rigel-plugins"),
			"param_name" => "hover_color", 
			"value" => '',
			"dependency" => array('element' => "overlay", 'value' => array('yes')),
			"description" => __("Leave it empty to apply default", "amz-rigel-plugins"),
			"group"	=> esc_html__('Overlay', 'amz-rigel-plugins')
		),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Animation In", "amz-rigel-plugins"),
			"param_name" => "animate_in",
			"value" => $hover_animation_in,
			"description" => esc_html__("Choose hove in animation", "amz-rigel-plugins"),
			"dependency" => array('element' => "overlay", 'value' => array('yes')),
			"group"	=> esc_html__('Overlay', 'amz-rigel-plugins')
		),

		array(
			"type" => "textfield",
			"heading" => __("Overlay Animation In Duration", "amz-rigel-plugins"),
			"param_name" => "duration_in",
			"value" => "",
			"description" => __("Enter the Duration (Ex: 500ms or 1s). Leave it empty to apply default which is 0.3s", "amz-rigel-plugins"),
			"dependency" => array('element' => "overlay", 'value' => array('yes')),
			"group"	=> esc_html__('Overlay', 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => __("Animation In Delay", "amz-rigel-plugins"),
			"param_name" => "delay_in",
			"value" => "",
			"description" => __("Enter the Delay (Ex: 100ms or 1s). Leave it empty to apply default which is 0s", "amz-rigel-plugins"),
			"dependency" => array('element' => "overlay", 'value' => array('yes')),
			"group"	=> esc_html__('Overlay', 'amz-rigel-plugins')
		),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Animation Out", "amz-rigel-plugins"),
			"param_name" => "animate_out",
			"value" => $hover_animation_out,
			"description" => esc_html__("Choose hover out animation", "amz-rigel-plugins"),
			"dependency" => array('element' => "overlay", 'value' => array('yes')),
			"group"	=> esc_html__('Overlay', 'amz-rigel-plugins')
		),

		array(
			"type" => "textfield",
			"heading" => __("Animation Out Duration", "amz-rigel-plugins"),
			"param_name" => "duration_out",
			"value" => "",
			"description" => __("Enter the Duration (Ex: 500ms or 1s). Leave it empty to apply default which is 0.3s", "amz-rigel-plugins"),
			"dependency" => array('element' => "overlay", 'value' => array('yes')),
			"group"	=> esc_html__('Overlay', 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => __("Animation Out Delay", "amz-rigel-plugins"),
			"param_name" => "delay_out",
			"value" => "",
			"description" => __("Enter the Delay (Ex: 100ms or 1s). Leave it empty to apply default which is 0s", "amz-rigel-plugins"),
			"dependency" => array('element' => "overlay", 'value' => array('yes')),
			"group"	=> esc_html__('Overlay', 'amz-rigel-plugins')
			),

		array(
			'type' => 'css_editor',
			'heading' => esc_html__( 'CSS box', 'amz-rigel-plugins' ),
			'param_name' => 'overlay_css',
			"dependency" => array('element' => "overlay", 'value' => array('yes')),
			'group' => esc_html__( 'Overlay Design Options', 'amz-rigel-plugins' )
			),

		array(
			'type' => 'css_editor',
			'heading' => esc_html__( 'CSS box', 'amz-rigel-plugins' ),
			'param_name' => 'hover_box_css',
			'group' => esc_html__( 'Design Options', 'amz-rigel-plugins' )
			),
		
    )
) );

vc_map( array(
	"name" => __("Hover Elements", "amz-rigel-plugins"),
	"base" => "hover_elements",
	"icon" => "icon-pixel8es",
	"category" => 'By Rigel', //category
    "as_child" => array('only' => 'hover_box'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    "as_parent" => array('except' => 'hover_elements, hover_box'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    "content_element" => true,
    "show_settings_on_create" => false,
    "js_view" => 'VcColumnView',
    "params" => array(
    	array(
    		"type" => "dropdown",
    		"heading" => esc_html__("Text Color", "amz-rigel-plugins"),
    		"param_name" => "text_color",
    		"value" => array(  
    			esc_html__('White', "amz-rigel-plugins") => "light",
    			esc_html__('Black', "amz-rigel-plugins") => "dark",    			
    			esc_html__('Default', "amz-rigel-plugins") => "default"
    		),
    		"description" => esc_html__("Choose default to apply shortcode default or theme default color", "amz-rigel-plugins"),
    	),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Display", "amz-rigel-plugins"),
			"param_name" => "on_hover",
			"value" => array(
				esc_html__('Display On Hover', "amz-rigel-plugins") => "yes",
				esc_html__('Always Display', "amz-rigel-plugins") => "no",
			),
			"description" => ''
		),

    	array(
    		"type" => "dropdown",
    		"heading" => esc_html__("Vertical Align", "amz-rigel-plugins"),
    		"param_name" => "vertical_align",
    		"value" => array(
    			esc_html__('Top', "amz-rigel-plugins") => "",
    			esc_html__('Middle', "amz-rigel-plugins") => "middle",      			
    			esc_html__('Bottom', "amz-rigel-plugins") => "bottom"
    		),
    		"description" => ''
    	),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Animation In", "amz-rigel-plugins"),
			"param_name" => "animate_in",
			"value" => $hover_animation_in,
			"description" => esc_html__("Choose hove in animation", "amz-rigel-plugins"),
			"group"	=> esc_html__('Animation', 'amz-rigel-plugins')
		),

		array(
			"type" => "textfield",
			"heading" => __("Animation In Duration", "amz-rigel-plugins"),
			"param_name" => "duration_in",
			"value" => "",
			"description" => __("Enter the Duration (Ex: 500ms or 1s). Leave it empty to apply default which is 0.3s", "amz-rigel-plugins"),
			"group"	=> esc_html__('Animation', 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => __("Animation In Delay", "amz-rigel-plugins"),
			"param_name" => "delay_in",
			"value" => "",
			"description" => __("Enter the Delay (Ex: 100ms or 1s). Leave it empty to apply default which is 0s", "amz-rigel-plugins"),
			"group"	=> esc_html__('Animation', 'amz-rigel-plugins')
		),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Animation Out", "amz-rigel-plugins"),
			"param_name" => "animate_out",
			"value" => $hover_animation_out,
			"description" => esc_html__("Choose hover out animation", "amz-rigel-plugins"),
			"group"	=> esc_html__('Animation', 'amz-rigel-plugins')
		),

		array(
			"type" => "textfield",
			"heading" => __("Animation Out Duration", "amz-rigel-plugins"),
			"param_name" => "duration_out",
			"value" => "",
			"description" => __("Enter the Duration (Ex: 500ms or 1s). Leave it empty to apply default which is 0.3s", "amz-rigel-plugins"),
			"group"	=> esc_html__('Animation', 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => __("Animation Out Delay", "amz-rigel-plugins"),
			"param_name" => "delay_out",
			"value" => "",
			"description" => __("Enter the Delay (Ex: 100ms or 1s). Leave it empty to apply default which is 0s", "amz-rigel-plugins"),
			"group"	=> esc_html__('Animation', 'amz-rigel-plugins')
		),

    	array(
			'type' => 'css_editor',
			'heading' => esc_html__( 'CSS box', 'amz-rigel-plugins' ),
			'param_name' => 'hover_box_css',
			'group' => esc_html__( 'Design Options', 'amz-rigel-plugins' )
		)
    )
) );

//Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortCode_hover_box extends WPBakeryShortCodesContainer {}
	class WPBakeryShortCode_hover_elements extends WPBakeryShortCodesContainer {}
}

// Staffs
vc_map( array(
	"name" => esc_html__("Staffs", 'amz-rigel-plugins'), //Title
	"base" => "staffs", //Shortcode name
	"class" => "",
	"icon" => "icon-pixel8es",
	"category" => 'By Rigel', //category
	"params" => array(

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Insert Staffs by", 'amz-rigel-plugins'),
			"param_name" => "insert_type",
			"admin_label" => true,
			"value" => array(esc_html__('Staffs Posts', 'amz-rigel-plugins') => "posts", 
				esc_html__('Staff Id', 'amz-rigel-plugins') => "id"),
			"description" => ''
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("No. of Staffs", 'amz-rigel-plugins'),
			"param_name" => "no_of_staff",
			"value" => '6',
			"dependency" => Array('element' => "insert_type", 'value' => 'posts'),
			"description" => esc_html__("Enter the number of staffs you want to display (only numbers), Enter -1 for all posts", 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Order By", 'amz-rigel-plugins'),
			"param_name" => "order_by",
			"value" => array( esc_html__('Date', 'amz-rigel-plugins') => "date",  
				esc_html__('Rand', 'amz-rigel-plugins') => "rand",
				esc_html__('ID', 'amz-rigel-plugins') => "ID", 
				esc_html__('Title', 'amz-rigel-plugins') => "title", 
				esc_html__('Author', 'amz-rigel-plugins') => "author",
				esc_html__('Name', 'amz-rigel-plugins') => "modified",
				esc_html__('Parent', 'amz-rigel-plugins') => "parent",
				esc_html__('Date Modified', 'amz-rigel-plugins') => "date",
				esc_html__('Menu Order', 'amz-rigel-plugins') => "menu_order",
				esc_html__('None', 'amz-rigel-plugins') => "none"),
			"dependency" => Array('element' => "insert_type", 'value' => 'posts'),
			"description" => ''
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Order By", 'amz-rigel-plugins'),
			"param_name" => "order",
			"value" => array( esc_html__('Ascending order', 'amz-rigel-plugins') => "ASC",  
				esc_html__('descending order', 'amz-rigel-plugins') => "DESC"),
			"dependency" => Array('element' => "insert_type", 'value' => 'posts'),
			"description" => esc_html__('Choose staffs posts Order', 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Staff Id", 'amz-rigel-plugins'),
			"param_name" => "staff_id",
			"value" => "",
			"dependency" => Array('element' => "insert_type", 'value' => 'id'),
			"description" => esc_html__("Enter the staff ids seperated by commas (,). Example: 2,54,8", 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Exclude Staffs", 'amz-rigel-plugins'),
			"param_name" => "exclude_staffs",
			"value" => "",
			"description" => esc_html__("Enter the staff id you don't want to display. Divide id with comma (,).", 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Number of Columns", 'amz-rigel-plugins'),
			"param_name" => "columns",
			"value" => array( esc_html__('3 Columns', 'amz-rigel-plugins') => "col3",
				esc_html__('4 Columns', 'amz-rigel-plugins') => "col4",  							  
				esc_html__('2 Columns', 'amz-rigel-plugins') => "col2"),
			"description" => ''
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("HTML Tag for Staff Name", 'amz-rigel-plugins'),
			"param_name" => "title_tag",
			"value" => array('h3','h2','h4','h5','h6','h1', 'p'),
			"description" => esc_html__("Choose which html tag you want use for staff name.", 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Link to single staff page?", 'amz-rigel-plugins'),
			"param_name" => "single_staff_link",
			"value" => array(esc_html__('Yes', 'amz-rigel-plugins') => "yes",  
				esc_html__('No', 'amz-rigel-plugins') => "no"),
			"description" => ''
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Button Text", 'amz-rigel-plugins'),
			"param_name" => "button_text",
			"value" => "More Info",
			"description" => esc_html__("Enter the Button Text", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "single_staff_link", 'value' => array('yes'))
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Disable Space in columns", 'amz-rigel-plugins'),
			"param_name" => "margin",
			"value" => array(esc_html__('No', 'amz-rigel-plugins') => "",  
				esc_html__('Yes', 'amz-rigel-plugins') => "margin-no"),
			"description" => esc_html__('Choose Yes to disable Space ( no margin inbetween columns )', 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Enable carousel?", 'amz-rigel-plugins'),
			"param_name" => "slider",
			"value" => array(esc_html__('Yes', 'amz-rigel-plugins') => "yes",  
				esc_html__('No', 'amz-rigel-plugins') => "no"),
			"description" => esc_html__("Do you like to display staffs in carousel?", 'amz-rigel-plugins'),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
			),

		array(
			'type' => 'textfield',
			'heading' => __( 'Margin', 'amz-rigel-plugins' ),
			'param_name' => 'slide_margin',
			'value' => '30',
			'description' => __( 'Enter margin-right(px) on item ( Example: 30 ).', 'amz-rigel-plugins' ),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
			),
		
		array(
			"type" => "dropdown",
			"heading" => __("Loop", 'amz-rigel-plugins'),
			"param_name" => "loop",
			"value" => array( __('No', 'amz-rigel-plugins') => "false",
				__('Yes', 'amz-rigel-plugins') => "true"),
			"description" => 'Inifnity loop. Duplicate last and first items to get loop illusion.',
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Center", 'amz-rigel-plugins'),
			"param_name" => "center",
			"value" => array( __('No', 'amz-rigel-plugins') => "false",
				__('Yes', 'amz-rigel-plugins') => "true"),
			"description" => 'Center item. Works well with even an odd number of items.',
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
			),

		array(
			'type' => 'textfield',
			'heading' => __( 'Padding Left and Right', 'amz-rigel-plugins' ),
			'param_name' => 'stage_padding',
			'value' => '0',
			'description' => __( 'Padding left and right on stage (can see neighbours).', 'amz-rigel-plugins' ),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
			),

		array(
			'type' => 'textfield',
			'heading' => __( 'Start Position', 'amz-rigel-plugins' ),
			'param_name' => 'start_position',
			'value' => '0',
			'description' => __( 'Start position.', 'amz-rigel-plugins' ),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Autoplay", 'amz-rigel-plugins'),
			"param_name" => "autoplay",
			"value" => array( __('No', 'amz-rigel-plugins') => "false", __('Yes', 'amz-rigel-plugins') => "true" ),
			"description" => __("Enable autoplay?", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => __("Autoplay Interval Timeout", 'amz-rigel-plugins'),
			"param_name" => "slide_speed",
			"value" => "5000",
			"description" => __("Enter Autoplay interval timeout Value in milesecond (Ex: 5000).", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Autoplay Hover Pause", 'amz-rigel-plugins'),
			"param_name" => "stop_on_hover",
			"value" => array( __('Yes', 'amz-rigel-plugins') => "true",
				__('No', 'amz-rigel-plugins') => "false"),
			"description" => 'Pause on mouse hover.',
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Arrow", 'amz-rigel-plugins'),
			"param_name" => "slide_arrow",
			"value" => array( __('Yes', 'amz-rigel-plugins') => "true",
				__('No', 'amz-rigel-plugins') => "false"),
			"description" => __("Do you like to show arrow navigation to move carousel.", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
			),      

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Arrow Style", 'amz-rigel-plugins'),
			"param_name" => "arrow_type",
			"value" => array( esc_html__('Default', 'amz-rigel-plugins') => "",
				esc_html__('Arrow Top Center', 'amz-rigel-plugins') => "arrow-style2"),
			"description" => esc_html__("Choose arrow postion", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "slide_arrow", 'value' => array('true')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Bullets", 'amz-rigel-plugins'),
			"param_name" => "pagination",
			"value" => array( __('Yes', 'amz-rigel-plugins') => "true",
				__('No', 'amz-rigel-plugins') => "false"),
			"description" => __("Do you like to show dot navigation to move carousel", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Animation In", 'amz-rigel-plugins'),
			"param_name" => "animate_in",
			"value" => $slider_animation_in,
			"description" => __("false = no animation. Animate functions work only with one item and only in browsers that support perspective property.", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Animation Out", 'amz-rigel-plugins'),
			"param_name" => "animate_out",
			"value" => $slider_animation_out,
			"description" => __("Animate functions work only with one item and only in browsers that support perspective property.", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Mouse Drag?", 'amz-rigel-plugins'),
			"param_name" => "mouse_drag",
			"value" => array( __('Yes', 'amz-rigel-plugins') => "true",
				__('No', 'amz-rigel-plugins') => "false"),
			"description" => __("Do you like to move carousel by Mouse Drag?", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Touch Drag", 'amz-rigel-plugins'),
			"param_name" => "touch_drag",
			"value" => array( __('Yes', 'amz-rigel-plugins') => "true",
				__('No', 'amz-rigel-plugins') => "false"),
			"description" => __("Do you like to move carousel Touch Drag?", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
			),

		)
) );

// Portfolio
vc_map( array(
	"name" => esc_html__("Portfolio", 'amz-rigel-plugins'), //Title
	"base" => "portfolio", //Shortcode name
	"class" => "",
	"icon" => "icon-pixel8es",
	"category" => 'By Rigel', //category
	"params" => array(

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Portfolio Style", 'amz-rigel-plugins'),
			"param_name" => "portfolio_style",
			"admin_label" => true,
			"value" => array(esc_html__('Grid', 'amz-rigel-plugins') => "grid", 
				esc_html__('Masonry', 'amz-rigel-plugins') => "masonry"),
			"description" => ''
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Insert Portfolio by", 'amz-rigel-plugins'),
			"param_name" => "insert_type",
			"admin_label" => true,
			"value" => array(esc_html__('Portfolio Posts', 'amz-rigel-plugins') => "posts", 
				esc_html__('portfolio Id', 'amz-rigel-plugins') => "id"),
			"description" => ''
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Filterable", 'amz-rigel-plugins'),
			"param_name" => "pix_filterable",
			"value" => array(esc_html__('Yes', 'amz-rigel-plugins') => "yes",  
				esc_html__('No', 'amz-rigel-plugins') => "no"),
			"description" => esc_html__('Filter only displays if you choose carousel "No"', 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("No. of Portfolio", 'amz-rigel-plugins'),
			"param_name" => "no_of_items",
			"value" => '6',
			"description" => esc_html__("Enter the number of Portfolio you want to display (only numbers), Enter -1 for all portfolio items", 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Order By", 'amz-rigel-plugins'),
			"param_name" => "order_by",
			"value" => array( esc_html__('Date', 'amz-rigel-plugins') => "date",  
				esc_html__('Rand', 'amz-rigel-plugins') => "rand",
				esc_html__('ID', 'amz-rigel-plugins') => "ID", 
				esc_html__('Title', 'amz-rigel-plugins') => "title", 
				esc_html__('Author', 'amz-rigel-plugins') => "author",
				esc_html__('Name', 'amz-rigel-plugins') => "modified",
				esc_html__('Parent', 'amz-rigel-plugins') => "parent",
				esc_html__('Date Modified', 'amz-rigel-plugins') => "date",
				esc_html__('Menu Order', 'amz-rigel-plugins') => "menu_order",
				esc_html__('None', 'amz-rigel-plugins') => "none"),
			"description" => ''
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Order By", 'amz-rigel-plugins'),
			"param_name" => "order",
			"value" => array( esc_html__('Ascending order', 'amz-rigel-plugins') => "ASC",  
				esc_html__('descending order', 'amz-rigel-plugins') => "DESC"),
			"dependency" => Array('element' => "insert_type", 'value' => 'posts'),
			"description" => ''
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("portfolio Id", 'amz-rigel-plugins'),
			"param_name" => "portfolio_id",
			"value" => "",
			"dependency" => Array('element' => "insert_type", 'value' => 'id'),
			"description" => esc_html__("Enter the portfolio ids seperated by commas (,). Example: 2,54,8", 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Exclude Portfolio", 'amz-rigel-plugins'),
			"param_name" => "exclude_portfolio",
			"value" => "",
			"description" => esc_html__("Enter the portfolio id you don't want to display. Divide id with comma (,).", 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Number of Columns", 'amz-rigel-plugins'),
			"param_name" => "columns",
			"value" => array( esc_html__('3 Columns', 'amz-rigel-plugins') => "col3",
				esc_html__('4 Columns', 'amz-rigel-plugins') => "col4",							  
				esc_html__('2 Columns', 'amz-rigel-plugins') => "col2"),
			"description" => ''
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Disable Space in columns", 'amz-rigel-plugins'),
			"param_name" => "margin",
			"value" => array(esc_html__('No', 'amz-rigel-plugins') => "",  
				esc_html__('Yes', 'amz-rigel-plugins') => "margin-no"),
			"description" => esc_html__('Choose Yes to disable Space ( no margin inbetween columns )', 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("HTML Tag for portfolio Name", 'amz-rigel-plugins'),
			"param_name" => "title_tag",
			"value" => array('h3','h2','h4','h5','h6','h1', 'p'),
			"description" => esc_html__("Choose which html tag you want use for portfolio name.", 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Load More Text", 'amz-rigel-plugins'),
			"param_name" => "loadmore_text",
			"value" => "Load More",
			"description" => esc_html__("Type the Load More text here", 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Pagination", 'amz-rigel-plugins'),
			"param_name" => "pagination",
			"value" => array(
				esc_html__( 'None', 'amz-rigel-plugins')     => 'none',
				esc_html__( 'Loadmore', 'amz-rigel-plugins') => 'loadmore',
				esc_html__( 'Autoload', 'amz-rigel-plugins') => 'autoload',
				esc_html__( 'number', 'amz-rigel-plugins')   => 'Number',
				esc_html__( 'text', 'amz-rigel-plugins')     => 'Text'
			)
		),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Enable carousel?", 'amz-rigel-plugins'),
			"param_name" => "slider",
			"value" => array( esc_html__('No', 'amz-rigel-plugins') => "no", esc_html__('Yes', 'amz-rigel-plugins') => "yes" ),
			"description" => esc_html__("Do you like to display Portfolio in carousel?", 'amz-rigel-plugins'),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
			),  

		array(
			'type' => 'textfield',
			'heading' => __( 'Margin', 'amz-rigel-plugins' ),
			'param_name' => 'slide_margin',
			'value' => '30',
			'description' => __( 'Enter margin-right(px) on item ( Example: 30 ).', 'amz-rigel-plugins' ),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
			),
		
		array(
			"type" => "dropdown",
			"heading" => __("Loop", 'amz-rigel-plugins'),
			"param_name" => "loop",
			"value" => array( __('No', 'amz-rigel-plugins') => "false",
				__('Yes', 'amz-rigel-plugins') => "true"),
			"description" => 'Inifnity loop. Duplicate last and first items to get loop illusion.',
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Center", 'amz-rigel-plugins'),
			"param_name" => "center",
			"value" => array( __('No', 'amz-rigel-plugins') => "false",
				__('Yes', 'amz-rigel-plugins') => "true"),
			"description" => 'Center item. Works well with even an odd number of items.',
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
			),

		array(
			'type' => 'textfield',
			'heading' => __( 'Padding Left and Right', 'amz-rigel-plugins' ),
			'param_name' => 'stage_padding',
			'value' => '0',
			'description' => __( 'Padding left and right on stage (can see neighbours).', 'amz-rigel-plugins' ),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
			),

		array(
			'type' => 'textfield',
			'heading' => __( 'Start Position', 'amz-rigel-plugins' ),
			'param_name' => 'start_position',
			'value' => '0',
			'description' => __( 'Start position.', 'amz-rigel-plugins' ),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Autoplay", 'amz-rigel-plugins'),
			"param_name" => "autoplay",
			"value" => array( __('No', 'amz-rigel-plugins') => "false", __('Yes', 'amz-rigel-plugins') => "true" ),
			"description" => __("Enable autoplay?", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => __("Autoplay Interval Timeout", 'amz-rigel-plugins'),
			"param_name" => "slide_speed",
			"value" => "5000",
			"description" => __("Enter Autoplay interval timeout Value in milesecond (Ex: 5000).", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Autoplay Hover Pause", 'amz-rigel-plugins'),
			"param_name" => "stop_on_hover",
			"value" => array( __('Yes', 'amz-rigel-plugins') => "true",
				__('No', 'amz-rigel-plugins') => "false"),
			"description" => 'Pause on mouse hover.',
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Arrow", 'amz-rigel-plugins'),
			"param_name" => "slide_arrow",
			"value" => array( __('Yes', 'amz-rigel-plugins') => "true",
				__('No', 'amz-rigel-plugins') => "false"),
			"description" => __("Do you like to show arrow navigation to move carousel.", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
			),      

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Arrow Style", 'amz-rigel-plugins'),
			"param_name" => "arrow_type",
			"value" => array( esc_html__('Default', 'amz-rigel-plugins') => "",
				esc_html__('Arrow Top Center', 'amz-rigel-plugins') => "arrow-style2"),
			"description" => esc_html__("Choose arrow postion", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "slide_arrow", 'value' => array('true')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Bullets", 'amz-rigel-plugins'),
			"param_name" => "slider_pagination",
			"value" => array( __('Yes', 'amz-rigel-plugins') => "true",
				__('No', 'amz-rigel-plugins') => "false"),
			"description" => __("Do you like to show dot navigation to move carousel", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Animation In", 'amz-rigel-plugins'),
			"param_name" => "animate_in",
			"value" => $slider_animation_in,
			"description" => __("false = no animation. Animate functions work only with one item and only in browsers that support perspective property.", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Animation Out", 'amz-rigel-plugins'),
			"param_name" => "animate_out",
			"value" => $slider_animation_out,
			"description" => __("Animate functions work only with one item and only in browsers that support perspective property.", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Mouse Drag?", 'amz-rigel-plugins'),
			"param_name" => "mouse_drag",
			"value" => array( __('Yes', 'amz-rigel-plugins') => "true",
				__('No', 'amz-rigel-plugins') => "false"),
			"description" => __("Do you like to move carousel by Mouse Drag?", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Touch Drag", 'amz-rigel-plugins'),
			"param_name" => "touch_drag",
			"value" => array( __('Yes', 'amz-rigel-plugins') => "true",
				__('No', 'amz-rigel-plugins') => "false"),
			"description" => __("Do you like to move carousel Touch Drag?", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
			),

		)
) );

// Testimonial
vc_map( array(
	"name" => esc_html__("Testimonials", 'amz-rigel-plugins'), //Title
	"base" => "testimonial", //Shortcode name
	"class" => "",
	"icon" => "icon-pixel8es",
	"category" => 'By Rigel', //category
	"params" => array(

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Insert testimonials by", 'amz-rigel-plugins'),
			"param_name" => "insert_type",
			"value" => array(esc_html__('testimonials Posts', 'amz-rigel-plugins') => "posts", 
				esc_html__('testimonial Id', 'amz-rigel-plugins') => "id"),
			"description" => ''
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("No. of testimonials", 'amz-rigel-plugins'),
			"param_name" => "no_of_testimonial",
			"value" => -1,
			"dependency" => Array('element' => "insert_type", 'value' => 'posts'),
			"description" => esc_html__("Enter the number of testimonials you want to display (only numbers), Enter -1 for all posts", 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Order By", 'amz-rigel-plugins'),
			"param_name" => "order_by",
			"value" => array( esc_html__('Date', 'amz-rigel-plugins') => "date",  
				esc_html__('Rand', 'amz-rigel-plugins') => "rand",
				esc_html__('ID', 'amz-rigel-plugins') => "ID", 
				esc_html__('Title', 'amz-rigel-plugins') => "title", 
				esc_html__('Author', 'amz-rigel-plugins') => "author",
				esc_html__('Name', 'amz-rigel-plugins') => "modified",
				esc_html__('Parent', 'amz-rigel-plugins') => "parent",
				esc_html__('Date Modified', 'amz-rigel-plugins') => "date",
				esc_html__('Menu Order', 'amz-rigel-plugins') => "menu_order",
				esc_html__('None', 'amz-rigel-plugins') => "none"),
			"dependency" => Array('element' => "insert_type", 'value' => 'posts'),
			"description" => ''
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Order By", 'amz-rigel-plugins'),
			"param_name" => "order",
			"value" => array( esc_html__('Ascending order', 'amz-rigel-plugins') => "ASC",  
				esc_html__('descending order', 'amz-rigel-plugins') => "DESC"),
			"dependency" => Array('element' => "insert_type", 'value' => 'posts'),
			"description" => ''
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("testimonial Id", 'amz-rigel-plugins'),
			"param_name" => "testimonial_id",
			"value" => "",
			"dependency" => Array('element' => "insert_type", 'value' => 'id'),
			"description" => esc_html__("Enter the testimonial ids seperated by commas (,). Example: 2,54,8", 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Exclude Testimonials", 'amz-rigel-plugins'),
			"param_name" => "exclude_testimonial",
			"value" => "",
			"description" => esc_html__("Enter the testimonial id you don't want to display. Divide id with comma (,).", 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Number of columns", 'amz-rigel-plugins'),
			"param_name" => "no_of_col",
			"value" => array(esc_html__('One Column', 'amz-rigel-plugins') => 1, 
				esc_html__('Two Columns', 'amz-rigel-plugins') => 2,
				esc_html__('Three Columns', 'amz-rigel-plugins') => 3,
				esc_html__('Four Columns', 'amz-rigel-plugins') => 4),
			"description" => ''
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Pagination", 'amz-rigel-plugins'),
			"param_name" => "pagination",
			"value" => array(
				esc_html__( 'None', 'amz-rigel-plugins')     => 'none',
				esc_html__( 'Loadmore', 'amz-rigel-plugins') => 'load_more',
				esc_html__( 'Autoload', 'amz-rigel-plugins') => 'autoload',
				esc_html__( 'number', 'amz-rigel-plugins')   => 'Number',
				esc_html__( 'text', 'amz-rigel-plugins')     => 'Text'
			)
		),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Load More Text", 'amz-rigel-plugins'),
			"param_name" => "loadmore_text",
			"value" => "Load More",
			"description" => esc_html__("Type the Load More text here", 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Slider", 'amz-rigel-plugins'),
			"param_name" => "slider",
			"value" => array( esc_html__('Yes', 'amz-rigel-plugins') => "yes",
				esc_html__('No', 'amz-rigel-plugins') => "no"),
			"description" => esc_html__("Do you want slider?", 'amz-rigel-plugins'),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
			),

		array(
			'type' => 'textfield',
			'heading' => __( 'Margin', 'amz-rigel-plugins' ),
			'param_name' => 'margin',
			'value' => '30',
			'description' => __( 'Enter margin-right(px) on item ( Example: 30 ).', 'amz-rigel-plugins' ),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
			),
		
		array(
			"type" => "dropdown",
			"heading" => __("Loop", 'amz-rigel-plugins'),
			"param_name" => "loop",
			"value" => array( __('No', 'amz-rigel-plugins') => "false",
				__('Yes', 'amz-rigel-plugins') => "true"),
			"description" => 'Inifnity loop. Duplicate last and first items to get loop illusion.',
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Center", 'amz-rigel-plugins'),
			"param_name" => "center",
			"value" => array( __('No', 'amz-rigel-plugins') => "false",
				__('Yes', 'amz-rigel-plugins') => "true"),
			"description" => 'Center item. Works well with even an odd number of items.',
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
			),

		array(
			'type' => 'textfield',
			'heading' => __( 'Padding Left and Right', 'amz-rigel-plugins' ),
			'param_name' => 'stage_padding',
			'value' => '0',
			'description' => __( 'Padding left and right on stage (can see neighbours).', 'amz-rigel-plugins' ),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
			),

		array(
			'type' => 'textfield',
			'heading' => __( 'Start Position', 'amz-rigel-plugins' ),
			'param_name' => 'start_position',
			'value' => '0',
			'description' => __( 'Start position.', 'amz-rigel-plugins' ),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Autoplay", 'amz-rigel-plugins'),
			"param_name" => "autoplay",
			"value" => array( __('No', 'amz-rigel-plugins') => "false", __('Yes', 'amz-rigel-plugins') => "true" ),
			"description" => __("Enable autoplay?", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => __("Autoplay Interval Timeout", 'amz-rigel-plugins'),
			"param_name" => "slide_speed",
			"value" => "5000",
			"description" => __("Enter Autoplay interval timeout Value in milesecond (Ex: 5000).", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Autoplay Hover Pause", 'amz-rigel-plugins'),
			"param_name" => "stop_on_hover",
			"value" => array( __('Yes', 'amz-rigel-plugins') => "true",
				__('No', 'amz-rigel-plugins') => "false"),
			"description" => 'Pause on mouse hover.',
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Arrow", 'amz-rigel-plugins'),
			"param_name" => "slide_arrow",
			"value" => array( __('Yes', 'amz-rigel-plugins') => "true",
				__('No', 'amz-rigel-plugins') => "false"),
			"description" => __("Do you like to show arrow navigation to move carousel.", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
			),      

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Arrow Style", 'amz-rigel-plugins'),
			"param_name" => "arrow_type",
			"value" => array( esc_html__('Default', 'amz-rigel-plugins') => "",
				esc_html__('Arrow Top Center', 'amz-rigel-plugins') => "arrow-style2"),
			"description" => esc_html__("Choose arrow postion", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "slide_arrow", 'value' => array('true')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Bullets", 'amz-rigel-plugins'),
			"param_name" => "slider_pagination",
			"value" => array( __('Yes', 'amz-rigel-plugins') => "true",
				__('No', 'amz-rigel-plugins') => "false"),
			"description" => __("Do you like to show dot navigation to move carousel", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Animation In", 'amz-rigel-plugins'),
			"param_name" => "animate_in",
			"value" => $slider_animation_in,
			"description" => __("false = no animation. Animate functions work only with one item and only in browsers that support perspective property.", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Animation Out", 'amz-rigel-plugins'),
			"param_name" => "animate_out",
			"value" => $slider_animation_out,
			"description" => __("Animate functions work only with one item and only in browsers that support perspective property.", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Mouse Drag?", 'amz-rigel-plugins'),
			"param_name" => "mouse_drag",
			"value" => array( __('Yes', 'amz-rigel-plugins') => "true",
				__('No', 'amz-rigel-plugins') => "false"),
			"description" => __("Do you like to move carousel by Mouse Drag?", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Touch Drag", 'amz-rigel-plugins'),
			"param_name" => "touch_drag",
			"value" => array( __('Yes', 'amz-rigel-plugins') => "true",
				__('No', 'amz-rigel-plugins') => "false"),
			"description" => __("Do you like to move carousel Touch Drag?", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
			),    

		)
) );


// Spacer
vc_map( array(
	"name" => esc_html__("Spacer", 'amz-rigel-plugins'), //Title
	"base" => "spacer", //Shortcode name
	"class" => "",
	"icon" => "icon-pixel8es",
	"category" => 'By Rigel', //category
	"params" => array(
		array(
			"type" => "textfield",
			"heading" => esc_html__("Spacer", 'amz-rigel-plugins'),
			"param_name" => "height",
			"value" => "30px",
			"description" => esc_html__("Enter the Space in px (Ex: 30px)", 'amz-rigel-plugins')
			),

		)
) );

// Pricing Tables
vc_map( array(
	"name" => esc_html__("Pricing Tables", 'amz-rigel-plugins'), //Title
	"base" => "pricing_tables", //Shortcode name
	"class" => "",
	"icon" => "icon-pixel8es",
	"category" => 'By Rigel', //category
	"params" => array(

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Choose a style", 'amz-rigel-plugins'),
			"param_name" => "style",
			"value" => array( esc_html__('Style 1', 'amz-rigel-plugins') => "style1",  
							  esc_html__('Style 2', 'amz-rigel-plugins') => "style2",
							  esc_html__('Style 3', 'amz-rigel-plugins') => "style3",
							  esc_html__('Style 4', 'amz-rigel-plugins') => "style4",
							  esc_html__('Style 5', 'amz-rigel-plugins') => "style5",
							  esc_html__('Style 6', 'amz-rigel-plugins') => "style6",
							  esc_html__('Style 7', 'amz-rigel-plugins') => "style7",
							  esc_html__('Style 8', 'amz-rigel-plugins') => "style8",
							  esc_html__('Style 9', 'amz-rigel-plugins') => "style9",
							  esc_html__('Style 10', 'amz-rigel-plugins') => "style10"),
			"description" => esc_html__("This theme have 2 pricing tables styles, please choose one", 'amz-rigel-plugins')
			),

		array(
			"type" => "attach_image",
			"heading" => esc_html__("Plan Name Background Image", 'amz-rigel-plugins'),
			"param_name" => "pricing_table_img",
			"value" => "",
			"dependency" => Array('element' => "style", 'value' => array('style7')),
			"description" => esc_html__("Select a image if you want to display image behind plan name.", 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Title Tag", 'amz-rigel-plugins'),
			"param_name" => "title_tag",
			"value" => array('h2','h1','h3','h4','h5','h6'),
			"description" => esc_html__("Select title tag.", 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Title", 'amz-rigel-plugins'),
			"param_name" => "title",
			"admin_label" => true,
			"value" => "Title",
			"description" => esc_html__("Enter the title.", 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Currency Symbol", 'amz-rigel-plugins'),
			"param_name" => "currency",
			"value" => '$',
			"description" => esc_html__("Enter the symbol.", 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("price", 'amz-rigel-plugins'),
			"param_name" => "price",
			"value" => '99.99',
			"description" => esc_html__("Enter the price.", 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("period", 'amz-rigel-plugins'),
			"param_name" => "period",
			"value" => 'per month',
			"description" => esc_html__("Enter the period.", 'amz-rigel-plugins')
			),

		array(
			"type" => "textarea_html",
			"class" => "",
			"heading" => esc_html__("Pricing Content", 'amz-rigel-plugins'),
			"param_name" => "content", //Shortcode_attr name
			"value" => '<ul><li>3 Wordpress</li><li>Single usage</li><li>One User</li><li>5 GB storage</li><li>6 months free Support</li></ul>', //Default Red color
			"description" => esc_html__("Enter the Icon Box Content", 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Highlight", 'amz-rigel-plugins'),
			"param_name" => "highlight_box",
			"value" => array(esc_html__('No', 'amz-rigel-plugins') => "no", 
				esc_html__('Yes', 'amz-rigel-plugins') => "yes"),
			"description" => esc_html__("Do you want to highlight the box?", 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Display Button?", 'amz-rigel-plugins'),
			"param_name" => "display_button",
			"value" => array(esc_html__('Yes', 'amz-rigel-plugins') => "yes", 
				esc_html__('No', 'amz-rigel-plugins') => "no"),
			"description" => esc_html__("Do you want to display button?", 'amz-rigel-plugins'),
			"group"	=> esc_html__('Button', 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Button Text", 'amz-rigel-plugins'),
			"param_name" => "button_text",
			"value" => "Order Now",
			"description" => esc_html__("Enter the Button Text", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "display_button", 'value' => array('yes')),
			"group"	=> esc_html__('Button', 'amz-rigel-plugins')
			),

		array(
			"type" => "vc_link",
			"heading" => esc_html__("Button URL", 'amz-rigel-plugins'),
			"param_name" => "button_link",
			"value" => "#",
			"description" => esc_html__("Enter the button link", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "display_button", 'value' => array('yes')),
			"group"	=> esc_html__('Button', 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Button Style", 'amz-rigel-plugins'),
			"param_name" => "button_style",
			"value" => array(esc_html__('Outline', 'amz-rigel-plugins') => "outline", 
				esc_html__('Solid', 'amz-rigel-plugins') => "solid", 
				esc_html__('Default', 'amz-rigel-plugins') => "simple"),
			"description" => esc_html__("Select button style?", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "display_button", 'value' => array('yes')),
			"group"	=> esc_html__('Button', 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Button Color", 'amz-rigel-plugins'),
			"param_name" => "button_color",
			"value" => array(esc_html__('Black', 'amz-rigel-plugins') => "no-color",
							 esc_html__('White', 'amz-rigel-plugins') => "white",
							 esc_html__('Color', 'amz-rigel-plugins') => "colorbtn"), 
			"description" => esc_html__("Please choose button color", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "display_button", 'value' => array('yes')),
			"group"	=> esc_html__('Button', 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Button Size", 'amz-rigel-plugins'),
			"param_name" => "button_size",
			"value" => array(esc_html__('Medium', 'amz-rigel-plugins') => "md", 
				esc_html__('Small', 'amz-rigel-plugins') => "sm", 
				esc_html__('Large', 'amz-rigel-plugins') => "lg"),
			"description" => esc_html__("Select button size?", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "display_button", 'value' => array('yes')),
			"group"	=> esc_html__('Button', 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Pricing Tables Animation", 'amz-rigel-plugins'),
			"param_name" => "animate",
			"value" => array(esc_html__('No', 'amz-rigel-plugins') => "no", 
				esc_html__('Yes', 'amz-rigel-plugins') => "yes"),
			"description" => esc_html__("Do you like to animate this element", 'amz-rigel-plugins'),
			"group"	=> esc_html__('Animate', 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Animation Transition", 'amz-rigel-plugins'),

			"param_name" => "transition",
			"value" => $animation,
			"description" => esc_html__("Choose Animation Transition.", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "animate", 'value' => array('yes')),
			"group"	=> esc_html__('Animate', 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Animation Duration", 'amz-rigel-plugins'),
			"param_name" => "duration",
			"value" => "",
			"description" => esc_html__("Enter the Duration (Ex: 500ms or 1s)", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "animate", 'value' => array('yes')),
			"group"	=> esc_html__('Animate', 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Animation Delay", 'amz-rigel-plugins'),
			"param_name" => "delay",
			"value" => "",
			"description" => esc_html__("Enter the Delay (Ex: 100ms or 1s)", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "animate", 'value' => array('yes')),
			"group"	=> esc_html__('Animate', 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Extra class name", 'amz-rigel-plugins'),
			"param_name" => "el_class",
			"value" => "",
			"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'amz-rigel-plugins')
			),
		)
) );



// Counters 
vc_map( array(
	"name" => esc_html__("Counters", 'amz-rigel-plugins'), //Title
	"base" => "counter", //Shortcode name
	"class" => "",
	"icon" => "icon-pixel8es",
	"category" => 'By Rigel', //category
	"params" => array(

		array(
			"type" => "textfield",
			"heading" => esc_html__("Counter Number", 'amz-rigel-plugins'),
			"param_name" => "number",
			"admin_label" => true,
			"value" => "5000",
			"description" => esc_html__("Enter the counter number.", 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Counter Number Font Size in px", 'amz-rigel-plugins'),
			"param_name" => "number_font_size",
			"value" => "",
			"description" => esc_html__("Enter Font Size in Pixels(eg: 16px), Leave empty to apply theme default", 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Counter Text", 'amz-rigel-plugins'),
			"param_name" => "text",
			"admin_label" => true,
			"value" => "Title",
			"description" => esc_html__("Enter the counter Text.", 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Counter Text Font Size in px", 'amz-rigel-plugins'),
			"param_name" => "text_font_size",
			"value" => "",
			"description" => esc_html__("Enter Font Size in Pixels(eg: 16px), Leave empty to apply theme default", 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Icon", 'amz-rigel-plugins'),
			"param_name" => "icon",
			"value" => array(esc_html__('No', 'amz-rigel-plugins') => "no", 
							 esc_html__('Yes', 'amz-rigel-plugins') => "yes"), 
			"description" => esc_html__("Do you like to add icon?", 'amz-rigel-plugins')
			),

		array(
			"type" => "icon",
			"heading" => esc_html__("Insert Icon", 'amz-rigel-plugins'),
			"param_name" => "icon_name",
			"value" => '',
			"dependency" => Array('element' => "icon", 'value' => array('yes')),
			"description" => esc_html__("Choose an icon.", 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Extra class name", 'amz-rigel-plugins'),
			"param_name" => "el_class",
			"value" => "",
			"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'amz-rigel-plugins')
			),
		)
) );

// Callout Box
vc_map( array(
	"name" => esc_html__("Callout Box", 'amz-rigel-plugins'), 
	"base" => "callout_box", 
	"class" => "",
	"icon" => "icon-pixel8es",
	"category" => 'By Rigel',
	"params" => array(

		array(
			"type" => "icon",
			"heading" => esc_html__("Callout Box Icon", 'amz-rigel-plugins'),
			"param_name" => "callout_icon",
			"value" => '',
			"description" => esc_html__("Insert Callout icon.", 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Title Tag", 'amz-rigel-plugins'),
			"param_name" => "title_tag",
			"value" => array('h2','h1','h3','h4','h5','h6'),
			"description" => esc_html__("Select title tag.", 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Title", 'amz-rigel-plugins'),
			"param_name" => "title",
			"admin_label" => true,
			"value" => "Title goes here",
			"description" => esc_html__("Enter the title.", 'amz-rigel-plugins')
			),

		array(
			"type" => "textarea_html",
			"class" => "",
			"heading" => esc_html__("Callout Box Content", 'amz-rigel-plugins'),
			"param_name" => "content", 
			"value" => '', 
			"description" => esc_html__("Enter the callout box content", 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Display Button?", 'amz-rigel-plugins'),
			"param_name" => "display_button",
			"value" => array(esc_html__('Yes', 'amz-rigel-plugins') => "yes", 
							 esc_html__('No', 'amz-rigel-plugins') => "no"),
			"description" => esc_html__("Do you want to display button?", 'amz-rigel-plugins'),
			"group"	=> esc_html__('Button', 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Button Text", 'amz-rigel-plugins'),
			"param_name" => "button_text",
			"value" => "Read More",
			"description" => esc_html__("Enter the Button Text", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "display_button", 'value' => array('yes')),
			"group"	=> esc_html__('Button', 'amz-rigel-plugins')
			),

		array(
			"type" => "vc_link",
			"heading" => esc_html__("Button URL", 'amz-rigel-plugins'),
			"param_name" => "button_link",
			"value" => "#",
			"description" => esc_html__("Enter the button link", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "display_button", 'value' => array('yes')),
			"group"	=> esc_html__('Button', 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Button Style", 'amz-rigel-plugins'),
			"param_name" => "button_style",
			"value" => array(esc_html__('Outline', 'amz-rigel-plugins') => "outline", 
							 esc_html__('Solid', 'amz-rigel-plugins') => "solid", 
							 esc_html__('Default', 'amz-rigel-plugins') => "simple"),
			"description" => esc_html__("Select button style?", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "display_button", 'value' => array('yes')),
			"group"	=> esc_html__('Button', 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Button Color", 'amz-rigel-plugins'),
			"param_name" => "button_color",
			"value" => array(esc_html__('Black', 'amz-rigel-plugins') => "no-color",
							 esc_html__('White', 'amz-rigel-plugins') => "white",
							 esc_html__('Color', 'amz-rigel-plugins') => "colorbtn"), 
			"description" => esc_html__("Please choose button color", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "display_button", 'value' => array('yes')),
			"group"	=> esc_html__('Button', 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Button Size", 'amz-rigel-plugins'),
			"param_name" => "button_size",
			"value" => array(esc_html__('Medium', 'amz-rigel-plugins') => "md", 
							 esc_html__('Small', 'amz-rigel-plugins') => "sm", 
							 esc_html__('Large', 'amz-rigel-plugins') => "lg"),
			"description" => esc_html__("Select button size", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "display_button", 'value' => array('yes')),
			"group"	=> esc_html__('Button', 'amz-rigel-plugins')
			),

		array(
			"type" => "icon",
			"heading" => esc_html__("Button Icon", 'amz-rigel-plugins'),
			"param_name" => "button_icon",
			"value" => '',
			"description" => esc_html__("Insert button icon.", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "display_button", 'value' => array('yes')),
			"group"	=> esc_html__('Button', 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Button Icon Align", 'amz-rigel-plugins'),
			"param_name" => "button_icon_align",
			"value" => array(esc_html__('Left', 'amz-rigel-plugins') => "front", 
							 esc_html__('Right', 'amz-rigel-plugins') => "back"), 
			"description" => esc_html__("Where you want to display Icon?", 'amz-rigel-plugins'),
			"group"	=> esc_html__('Button', 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Callout Animation", 'amz-rigel-plugins'),
			"param_name" => "animate",
			"value" => array(esc_html__('No', 'amz-rigel-plugins') => "no", 
				esc_html__('Yes', 'amz-rigel-plugins') => "yes"),
			"description" => esc_html__("Do you like to animate this element", 'amz-rigel-plugins'),
			"group"	=> esc_html__('Animate', 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Animation Transition", 'amz-rigel-plugins'),
			"param_name" => "transition",
			"value" => $animation,
			"description" => esc_html__("Choose Animation Transition.", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "animate", 'value' => array('yes')),
			"group"	=> esc_html__('Animate', 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Animation Duration", 'amz-rigel-plugins'),
			"param_name" => "duration",
			"value" => "",
			"description" => esc_html__("Enter the Duration (Ex: 500ms or 1s)", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "animate", 'value' => array('yes')),
			"group"	=> esc_html__('Animate', 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Animation Delay", 'amz-rigel-plugins'),
			"param_name" => "delay",
			"value" => "",
			"description" => esc_html__("Enter the Delay (Ex: 100ms or 1s)", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "animate", 'value' => array('yes')),
			"group"	=> esc_html__('Animate', 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Extra class name", 'amz-rigel-plugins'),
			"param_name" => "el_class",
			"value" => "",
			"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'amz-rigel-plugins')
			),
		)
) );

// Text Rotator 
vc_map( array(
	"name" => esc_html__("Text Rotator", 'amz-rigel-plugins'), //Title
	"base" => "text_rotator", //Shortcode name
	"class" => "",
	"icon" => "icon-pixel8es",
	"category" => 'By Rigel', //category
	"params" => array(

		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Enter the Static Text", 'amz-rigel-plugins'),
			"param_name" => "static_text", //Shortcode_attr name
			"value" => '', //Default Red color
			"description" => esc_html__("Enter the Static text", 'amz-rigel-plugins'),
			),

		array(
			"type" => "textarea",
			"class" => "",
			"heading" => esc_html__("Enter the Text", 'amz-rigel-plugins'),
			"param_name" => "text_rotator", //Shortcode_attr name
			"value" => 'These are the default values..., You know what you should do?, Use your own!, Have a great day!', //Default Red color
			"description" => esc_html__("Enter the Text ( seperate By Commas ( , ) )", 'amz-rigel-plugins'),
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Loop", 'amz-rigel-plugins'),
			"param_name" => "loop",
			"value" => array( esc_html__('Yes', 'amz-rigel-plugins') => "true",
							  esc_html__('No', 'amz-rigel-plugins') => "false"),
			"description" => esc_html__("Inifnity loop. Duplicate last and first items to get loop illusion.", 'amz-rigel-plugins'),
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Show Cursor?", 'amz-rigel-plugins'),
			"param_name" => "cursor",
			"value" => array( esc_html__('Yes', 'amz-rigel-plugins') => "true",
							  esc_html__('No', 'amz-rigel-plugins') => "false"),
			"description" => esc_html__("Inifnity loop. Duplicate last and first items to get loop illusion.", 'amz-rigel-plugins'),
			), 

		array(
			"type" => "textfield",
			"heading" => esc_html__("Typing Speed", 'amz-rigel-plugins'),
			"param_name" => "type_speed",
			"value" => "50",
			"description" => esc_html__("Enter the typing speed.", 'amz-rigel-plugins'),
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Time before BackSpacing", 'amz-rigel-plugins'),
			"param_name" => "back_delay",
			"value" => "700",
			"description" => esc_html__("Enter the time before backspacing.", 'amz-rigel-plugins'),
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Alignment", 'amz-rigel-plugins'),
			"param_name" => "align",
			"value" => array(esc_html__('Align Left', 'amz-rigel-plugins') => "left", 
							 esc_html__('Align Center', 'amz-rigel-plugins') => "center", 
							 esc_html__('Align Right', 'amz-rigel-plugins') => "right"),
			"description" => esc_html__("Choose alignment.", 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Font Weight ", 'amz-rigel-plugins'),
			"param_name" => "font_weight",
			"value" => array('bold','normal'),
			"description" => esc_html__("Choose which html tag you want use.", 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Display in UPPERCASE", 'amz-rigel-plugins'),
			"param_name" => "title_uppercase",
			"value" => array(esc_html__('Yes', 'amz-rigel-plugins') => "yes", 
							 esc_html__('No', 'amz-rigel-plugins') => "no"),
			"description" => esc_html__("Do you want display in all caps?", 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Text Font Size", 'amz-rigel-plugins'),
			"param_name" => "custom_font_size",
			"value" => "",
			"description" => esc_html__("Enter the Custom title Font Size in px (Ex : 30px). Leave it empty to apply theme default.", 'amz-rigel-plugins')
			),

    	array(
    		"type" => "colorpicker",
    		"class" => "",
    		"heading" => esc_html__("Text color", 'amz-rigel-plugins'),
    		"param_name" => "text_color",
    		"value" => '', 
    		"description" => esc_html__("Choose text color", 'amz-rigel-plugins')
    		),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Margin", 'amz-rigel-plugins'),
			"param_name" => "title_margin",
			"value" => "",
			"description" => esc_html__("Value should be in css format top right bottom left in px (Ex: -10px 20px 30px 40px), Leave it empty to apply theme default.", 'amz-rigel-plugins')
			),
	)
) );

// Process
vc_map( array(
	"name" => esc_html__("Process", 'amz-rigel-plugins'), //Title
	"base" => "process", //Shortcode name
	"class" => "",
	"icon" => "icon-pixel8es",
	"category" => 'By Rigel', //category
	"params" => array(

		array(
			"type" => "textfield",
			"heading" => esc_html__("Process Number", 'amz-rigel-plugins'),
			"param_name" => "number_text",
			"value" => "",
			"description" => esc_html__("Enter Process Number.", 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Process Title", 'amz-rigel-plugins'),
			"param_name" => "title",
			"admin_label" => true,
			"value" => "Title",
			"description" => esc_html__("Enter the Process title.", 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Display Process Description?", 'amz-rigel-plugins'),
			"param_name" => "process_content",
			"value" => array(esc_html__('No', 'amz-rigel-plugins') => 'no', 
							 esc_html__('Yes', 'amz-rigel-plugins') => 'yes'),
			"description" => esc_html__("Do you want to display process description", 'amz-rigel-plugins')
			),

		array(
			"type" => "textarea",
			"class" => "",
			"heading" => esc_html__("Process description", 'amz-rigel-plugins'),
			"param_name" => "content", 
			"value" => '', 
			"description" => esc_html__("Enter the process description", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "process_content", 'value' => array('yes'))
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Process Animation", 'amz-rigel-plugins'),
			"param_name" => "animate",
			"value" => array(esc_html__('No', 'amz-rigel-plugins') => "no", 
							 esc_html__('Yes', 'amz-rigel-plugins') => "yes"),
			"description" => esc_html__("Do you like to animate this element", 'amz-rigel-plugins'),
			"group"	=> esc_html__('Animate', 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Animation Transition", 'amz-rigel-plugins'),
			"param_name" => "transition",
			"value" => $animation,
			"description" => esc_html__("Choose Animation Transition.", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "animate", 'value' => array('yes')),
			"group"	=> esc_html__('Animate', 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Animation Duration", 'amz-rigel-plugins'),
			"param_name" => "duration",
			"value" => "",
			"description" => esc_html__("Enter the Duration (Ex: 500ms or 1s)", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "animate", 'value' => array('yes')),
			"group"	=> esc_html__('Animate', 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Animation Delay", 'amz-rigel-plugins'),
			"param_name" => "delay",
			"value" => "",
			"description" => esc_html__("Enter the Delay (Ex: 100ms or 1s)", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "animate", 'value' => array('yes')),
			"group"	=> esc_html__('Animate', 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Extra class name", 'amz-rigel-plugins'),
			"param_name" => "el_class",
			"value" => "",
			"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'amz-rigel-plugins')
			),
		)
) );



// Icon Box
vc_map( array(
	"name" => esc_html__("Icon Box", 'amz-rigel-plugins'), //Title
	"base" => "icon_box", //Shortcode name
	"class" => "",
	"icon" => "icon-pixel8es",
	"category" => 'By Rigel', //category
	"params" => array(

		array(
			"type" => "icon",
			"heading" => esc_html__("Insert Icon", 'amz-rigel-plugins'),
			"param_name" => "icon_name",
			"value" => '',
			"description" => '',
			"group"	=> esc_html__('Icon', 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Icon Style", 'amz-rigel-plugins'),
			"param_name" => "icon_style",
			"value" => array(esc_html__('Normal', 'amz-rigel-plugins') => "none",
					 esc_html__('Normal with Line', 'amz-rigel-plugins') => "normal-with-line",
					 esc_html__('Circle', 'amz-rigel-plugins') => "circle",
					 esc_html__('Outline Circle', 'amz-rigel-plugins') => "circle outline"),						
			"description" => esc_html__("Select icon style.", 'amz-rigel-plugins'),
			"group"	=> esc_html__('Icon', 'amz-rigel-plugins')
			),

		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => __("Icon Color", "amz-rigel-plugins"),
			"param_name" => "icon_color", 
			"value" => '', 
			"description" => __("Choose custom color on icon", "amz-rigel-plugins"),
			"group"	=> esc_html__('Icon', 'amz-rigel-plugins')
			),

		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => __("Icon Background Color", "amz-rigel-plugins"),
			"param_name" => "icon_bg_color", 
			"value" => '', 
			"description" => __("Choose custom background color on icon", "amz-rigel-plugins"),
			"group"	=> esc_html__('Icon', 'amz-rigel-plugins')
			),

		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => __("Icon Border Color", "amz-rigel-plugins"),
			"param_name" => "icon_border_color", 
			"value" => '', 
			"description" => __("Choose custom border color on icon", "amz-rigel-plugins"),
			"group"	=> esc_html__('Icon', 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Width", 'amz-rigel-plugins'),
			"param_name" => "icon_width",
			"value" => "",
			"description" => esc_html__("Enter the Width. Eg: 100px", 'amz-rigel-plugins'),
			"group"	=> esc_html__('Icon', 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Height", 'amz-rigel-plugins'),
			"param_name" => "icon_height",
			"value" => "",
			"description" => esc_html__("Enter the Height. Eg: 100px", 'amz-rigel-plugins'),
			"group"	=> esc_html__('Icon', 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Line Height", 'amz-rigel-plugins'),
			"param_name" => "icon_line_height",
			"value" => "",
			"description" => esc_html__("Enter the Height. Eg: 100px", 'amz-rigel-plugins'),
			"group"	=> esc_html__('Icon', 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => __("Icon Margin", "amz-rigel-plugins"),
			"param_name" => "icon_margin",
			"value" => "",
			"description" => __("Value should be in css format top right bottom left in px (Ex: -10px 20px 30px 40px), Leave it empty to apply theme default.", "amz-rigel-plugins"),
			"group"	=> esc_html__('Icon', 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => __("Icon Custom Font Size", "amz-rigel-plugins"),
			"param_name" => "custom_icon_size",
			"value" => "",
			"description" => __("Enter the Custom Icon Font Size in px (Ex : 30px). Leave it empty to apply theme default.", "amz-rigel-plugins"),
			"group"	=> esc_html__('Icon', 'amz-rigel-plugins')
			),

		array(
			'type' => 'textfield',
			'heading' => __( 'Icon Border Radius', 'amz-rigel-plugins' ),
			'param_name' => 'icon_border_radius',
			'value' => '',
			'description' => __( 'Enter the icon border radius in (px)  Example: 70px.', 'amz-rigel-plugins' ),
			"group"	=> esc_html__('Icon', 'amz-rigel-plugins')
		),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Title", 'amz-rigel-plugins'),
			"param_name" => "title",
			"admin_label" => true,
			"value" => "Title",
			"description" => esc_html__("Enter the title.", 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Title Tag", 'amz-rigel-plugins'),
			"param_name" => "title_tag",
			"value" => array('h2','h1','h3','h4','h5','h6'),
			"description" => esc_html__("Select title tag.", 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Display Title in UPPERCASE", 'amz-rigel-plugins'),
			"param_name" => "title_uppercase",
			"value" => array(esc_html__('Yes', 'amz-rigel-plugins') => "yes", 
							 esc_html__('No', 'amz-rigel-plugins') => "no"),
			"description" => esc_html__("Do you want to Heading Text in all caps?", 'amz-rigel-plugins')
			),

        array(
			"type" => "textfield",
			"heading" => esc_html__("Title Margin", 'amz-rigel-plugins'),
			"param_name" => "title_margin",
			"value" => "",
			"description" => esc_html__("Value should be in css format top right bottom left in px (Ex: -10px 20px 30px 40px), Leave it empty to apply theme default.", 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => __("Title Padding", 'amz-rigel-plugins'),
			"param_name" => "text_padding",
			"value" => "",
			"description" => __("Enter the padding (in css format [top right bottom left]) in px(Ex: 50px 50px 50px 50px)", 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => __("Title Padding", 'amz-rigel-plugins'),
			"param_name" => "title_padding",
			"value" => "",
			"description" => __("Value should be in css format top right bottom left in px (Ex: -10px 20px 30px 40px), Leave it empty to apply theme default.", 'amz-rigel-plugins')
			),

		array(
			'type' => 'textfield',
			'heading' => __( 'Title Border Radius', 'amz-rigel-plugins' ),
			'param_name' => 'title_border_radius',
			'value' => '',
			'description' => __( 'Enter the title border radius in (px)  Example: 70px.', 'amz-rigel-plugins' )
		),

		array(
			"type" => "dropdown",
			"heading" => __("Title Display", 'amz-rigel-plugins'),
			"param_name" => "title_display",
			"value" => array(__('Default', 'amz-rigel-plugins') => "", 
							 __('Inline Block', 'amz-rigel-plugins') => "inline-block", 
							 __('Inline', 'amz-rigel-plugins') => "inline"),
			"description" => __("Select Title Display.", 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => __("Title Letter Spacing in px", 'amz-rigel-plugins'),
			"param_name" => "text_letter_spacing",
			"value" => "",
			"description" => __("Enter text letter spacing in pixels.( eg: 50px )", 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Custom Title Font Size?", 'amz-rigel-plugins'),
			"param_name" => "custom_size",
			"value" => "",
			"description" => esc_html__("Enter the font size in px(Ex: 50px) or Leave it empty to apply theme default", 'amz-rigel-plugins')
			),

		array(
			"type" => "textarea_html",
			"class" => "",
			"heading" => esc_html__("Icon Box Content", 'amz-rigel-plugins'),
			"param_name" => "content", 
			"value" => '', 
			"description" => esc_html__("Enter the Icon Box Content", 'amz-rigel-plugins')
			),

		array(
			"type" => "amz_gf",
			"heading" => __("Choose Title Font", "amz-rigel-plugins"),
			"param_name" => "title_font",
			//"value" => "{'family':'Raleway', 'variant':'regular', 'size':'14px'}",
			"value" => "{'family':'none', 'variant':'none', 'size':''}", //none means themedefault
			"description" => __("Choose font, font weight and Please enter font size with unit (px, em, rem, vh or vw or any css unit) or Leave it to empty to apply theme default. Example: '21px or 2em or 1.5vh'", "amz-rigel-plugins"),
			"group"	=> __('Typography', 'amz-rigel-plugins')
			),

		array(
			"type" => "amz_gf",
			"heading" => __("Choose Content Font", "amz-rigel-plugins"),
			"param_name" => "content_font",
			//"value" => "{'family':'Raleway', 'variant':'regular', 'size':'14px'}",
			"value" => "{'family':'none', 'variant':'none', 'size':''}", //none means themedefault
			"description" => __("Choose font, font weight and Please enter font size with unit (px, em, rem, vh or vw or any css unit) or Leave it to empty to apply theme default. Example: '21px or 2em or 1.5vh'", "amz-rigel-plugins"),
			"group"	=> __('Typography', 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Display Button?", 'amz-rigel-plugins'),
			"param_name" => "display_button",
			"value" => array(esc_html__('Yes', 'amz-rigel-plugins') => "yes", 
							 esc_html__('No', 'amz-rigel-plugins') => "no"),
			"description" => esc_html__("Do you want to display button in icon box?", 'amz-rigel-plugins'),
			"group"	=> esc_html__('Button', 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Button Text", 'amz-rigel-plugins'),
			"param_name" => "button_text",
			"value" => "Read More",
			"description" => esc_html__("Enter the Button Text", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "display_button", 'value' => array('yes')),
			"group"	=> esc_html__('Button', 'amz-rigel-plugins')
			),

		array(
			"type" => "vc_link",
			"heading" => esc_html__("Button URL", 'amz-rigel-plugins'),
			"param_name" => "button_link",
			"value" => "",
			"description" => esc_html__("Enter the button link", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "display_button", 'value' => array('yes')),
			"group"	=> esc_html__('Button', 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Button Style", 'amz-rigel-plugins'),
			"param_name" => "button_style",
			"value" => array(esc_html__('Outline', 'amz-rigel-plugins') => "outline", 
							 esc_html__('Solid', 'amz-rigel-plugins') => "solid", 
							 esc_html__('Default', 'amz-rigel-plugins') => "simple"),
			"description" => esc_html__("Select button style", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "display_button", 'value' => array('yes')),
			"group"	=> esc_html__('Button', 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Button Color", 'amz-rigel-plugins'),
			"param_name" => "button_color",
			"value" => array(esc_html__('Black', 'amz-rigel-plugins') => "no-color",
							 esc_html__('White', 'amz-rigel-plugins') => "white",
							 esc_html__('Color', 'amz-rigel-plugins') => "colorbtn"), 
			"description" => esc_html__("Please choose button color", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "display_button", 'value' => array('yes')),
			"group"	=> esc_html__('Button', 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Button Size", 'amz-rigel-plugins'),
			"param_name" => "button_size",
			"value" => array(esc_html__('Small', 'amz-rigel-plugins') => "sm",
							 esc_html__('Medium', 'amz-rigel-plugins') => "md", 							  
							 esc_html__('Large', 'amz-rigel-plugins') => "lg"),
			"description" => esc_html__("Select button size", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "display_button", 'value' => array('yes')),
			"group"	=> esc_html__('Button', 'amz-rigel-plugins')
			),

		array(
			"type" => "icon",
			"heading" => esc_html__("Button Icon", 'amz-rigel-plugins'),
			"param_name" => "button_icon",
			"value" => '',
			"description" => esc_html__("Select button icon.", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "display_button", 'value' => array('yes')),
			"group"	=> esc_html__('Button', 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Button Icon Align", 'amz-rigel-plugins'),
			"param_name" => "button_icon_align",
			"value" => array(esc_html__('Left', 'amz-rigel-plugins') => "front", 
							 esc_html__('Right', 'amz-rigel-plugins') => "back"), 
			"description" => esc_html__("Where you want to display Icon?", 'amz-rigel-plugins'),
			"group"	=> esc_html__('Button', 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Alignment", 'amz-rigel-plugins'),
			"param_name" => "align",
			"value" => array(esc_html__('Align Center', 'amz-rigel-plugins') => "text-center", 
							 esc_html__('Align Left', 'amz-rigel-plugins') => "text-left", 
							 esc_html__('Align Right', 'amz-rigel-plugins') => "text-right"),
			"description" => esc_html__("Select icon box alignment.", 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Box Animation", 'amz-rigel-plugins'),
			"param_name" => "animate",
			"value" => array(esc_html__('No', 'amz-rigel-plugins') => "no", 
							 esc_html__('Yes', 'amz-rigel-plugins') => "yes"),
			"description" => esc_html__("Do you like to animate this element", 'amz-rigel-plugins'),
			"group"	=> esc_html__('Animate', 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Animation Transition", 'amz-rigel-plugins'),

			"param_name" => "transition",
			"value" => $animation,
			"description" => esc_html__("Choose Animation Transition.", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "animate", 'value' => array('yes')),
			"group"	=> esc_html__('Animate', 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Animation Duration", 'amz-rigel-plugins'),
			"param_name" => "duration",
			"value" => "",
			"description" => esc_html__("Enter the Duration (Ex: 500ms or 1s)", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "animate", 'value' => array('yes')),
			"group"	=> esc_html__('Animate', 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Animation Delay", 'amz-rigel-plugins'),
			"param_name" => "delay",
			"value" => "",
			"description" => esc_html__("Enter the Delay (Ex: 100ms or 1s)", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "animate", 'value' => array('yes')),
			"group"	=> esc_html__('Animate', 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Extra class name", 'amz-rigel-plugins'),
			"param_name" => "el_class",
			"value" => "",
			"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'amz-rigel-plugins')
			),
		)
) );


// Icon Shortcode
vc_map( array(
	"name" => esc_html__("Icon", 'amz-rigel-plugins'), //Title
	"base" => "icon", //Shortcode name
	"class" => "",
	"icon" => "icon-pixel8es",
	"category" => 'By Rigel', //category
	"params" => array(

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Alignment", 'amz-rigel-plugins'),
			"param_name" => "align",			 
			"value" => array(esc_html__('Align center', 'amz-rigel-plugins') => "center", 
							 esc_html__('Align left', 'amz-rigel-plugins') => "left",
							 esc_html__('Align Right', 'amz-rigel-plugins') => "right"),
			"description" => esc_html__("Select alignment.", 'amz-rigel-plugins')
			),

		array(
			"type" => "icon",
			"heading" => esc_html__("Insert Icon", 'amz-rigel-plugins'),
			"param_name" => "icon_name",
			"admin_label" => true,
			"value" => '',
			"description" => '',
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Icon Style", 'amz-rigel-plugins'),
			"param_name" => "icon_style",
			"value" => array(esc_html__('Default', 'amz-rigel-plugins') => "bg-none",
							 esc_html__('Solid', 'amz-rigel-plugins') => "solid",
							 esc_html__('Outline', 'amz-rigel-plugins') => "outline"),
			"description" => esc_html__("Select icon style.", 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Icon Type", 'amz-rigel-plugins'),
			"param_name" => "icon_type",
			"value" => array(esc_html__('Circle', 'amz-rigel-plugins') => "icon-circle",
							 esc_html__('Square', 'amz-rigel-plugins') => "icon-square"),
			"description" => esc_html__("Select icon apperance.", 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Custom Icon Size?", 'amz-rigel-plugins'),
			"param_name" => "icon_size",
			"value" => "",
			"description" => esc_html__("Enter the font size in px(Ex: 50px) if you want use your own font size or Leave it empty to apply theme default", 'amz-rigel-plugins')
			),

		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => esc_html__("Custom Icon Color", 'amz-rigel-plugins'),
			"param_name" => "icon_color", 
			"value" => '',
			"description" => esc_html__("Choose Icon color (or) Leave it empty to apply theme default", 'amz-rigel-plugins')
			),

		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => esc_html__("Custom Icon Background Color", 'amz-rigel-plugins'),
			"param_name" => "icon_bg_color", 
			"value" => '', 
			"description" => esc_html__("Choose Icon Background Color (or) Leave it empty to apply theme default", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "icon_style", 'value' => array('solid'))
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Title", 'amz-rigel-plugins'),
			"param_name" => "title",
			"value" => "",
			"description" => esc_html__("Enter the title.", 'amz-rigel-plugins'),
			"group"	=> esc_html__('Title', 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Title Tag", 'amz-rigel-plugins'),
			"param_name" => "title_tag",
			"value" => array('h2','h1','h3','h4','h5','h6', 'p'),
			"description" => esc_html__("Select title tag.", 'amz-rigel-plugins'),
			"group"	=> esc_html__('Title', 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Custom Title Font Size?", 'amz-rigel-plugins'),
			"param_name" => "text_font",
			"value" => "",
			"description" => esc_html__("Enter the font size in px (Ex: 50px) if you want custom font size or Leave it empty to apply theme default", 'amz-rigel-plugins'),
			"group"	=> esc_html__('Title', 'amz-rigel-plugins')
			),

		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => esc_html__("Custom Text Color", 'amz-rigel-plugins'),
			"param_name" => "text_color", //Shortcode_attr name
			"value" => '', //Default Red color
			"description" => esc_html__("Choose text color if you want custom color (or) Leave it empty to apply theme default", 'amz-rigel-plugins'),
			"group"	=> esc_html__('Title', 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Content Margin", 'amz-rigel-plugins'),
			"param_name" => "margin",
			"value" => "",
			"description" => esc_html__("Value should be in css format [top right bottom left] in px (Ex: -10px 20px 30px 40px).", 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Box Animation", 'amz-rigel-plugins'),
			"param_name" => "animate",
			"value" => array(esc_html__('No', 'amz-rigel-plugins') => "no", 
							 esc_html__('Yes', 'amz-rigel-plugins') => "yes"),
			"description" => esc_html__("Do you like to animate this element", 'amz-rigel-plugins'),
			"group"	=> esc_html__('Animate', 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Animation Transition", 'amz-rigel-plugins'),
			"param_name" => "transition",
			"value" => $animation,
			"description" => esc_html__("Choose Animation Transition.", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "animate", 'value' => array('yes')),
			"group"	=> esc_html__('Animate', 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Animation Duration", 'amz-rigel-plugins'),
			"param_name" => "duration",
			"value" => "",
			"description" => esc_html__("Enter the Duration (Ex: 500ms or 1s)", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "animate", 'value' => array('yes')),
			"group"	=> esc_html__('Animate', 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Animation Delay", 'amz-rigel-plugins'),
			"param_name" => "delay",
			"value" => "",
			"description" => esc_html__("Enter the Delay (Ex: 100ms or 1s)", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "animate", 'value' => array('yes')),
			"group"	=> esc_html__('Animate', 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Extra class name", 'amz-rigel-plugins'),
			"param_name" => "el_class",
			"value" => "",
			"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'amz-rigel-plugins')
			),
		)
) );

// Contact
vc_map( array(
	"name" => esc_html__("Contact", 'amz-rigel-plugins'), //Title
	"base" => "contact", //Shortcode name
	"class" => "",
	"icon" => "icon-pixel8es",
	"category" => 'By Rigel', //category
	"params" => array(
		array(
			"type" => "textfield",
			"heading" => esc_html__("Email", 'amz-rigel-plugins'),
			"param_name" => "mailto",
			"value" => "",
			"description" => esc_html__("Enter the email where you want receive from contact form", 'amz-rigel-plugins'),
		),
	)
));

// Google Map
vc_map( array(
	"name" => esc_html__("Google Map", 'amz-rigel-plugins'), //Title
	"base" => "googlemap", //Shortcode name
	"class" => "",
	"icon" => "icon-pixel8es",
	"category" => 'By Rigel', //category
	"params" => array(

		array(
			"type" => "textfield",
			"heading" => esc_html__("Width", 'amz-rigel-plugins'),
			"param_name" => "width",
			"value" => "100%",
			"description" => esc_html__("Enter the Width. Eg: 400 (or) 98%", 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Height", 'amz-rigel-plugins'),
			"param_name" => "height",
			"value" => "300",
			"description" => esc_html__("Enter the Height. Eg: 400", 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Latitude", 'amz-rigel-plugins'),
			"param_name" => "lat",
			"value" => "",
			"description" => esc_html__("Enter the latitude value (from http://universimmedia.pagesperso-orange.fr/geo/loc.htm)", 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Longitude", 'amz-rigel-plugins'),
			"param_name" => "lng",
			"value" => "",
			"description" => esc_html__("Enter the longitude value (from http://universimmedia.pagesperso-orange.fr/geo/loc.htm)", 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Zoom", 'amz-rigel-plugins'),
			"param_name" => "zoom",
			"value" => "13",
			"description" => esc_html__("Enter the zoom level of the map(Ex: 9))", 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Zoom Control?", 'amz-rigel-plugins'),
			"param_name" => "zoomcontrol",
			"value" => array( esc_html__('Yes', 'amz-rigel-plugins') => "true",
							  esc_html__('No', 'amz-rigel-plugins') => "false"),
			"description" => esc_html__("Do you want to display Zoom Control?", 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Pan Control", 'amz-rigel-plugins'),
			"param_name" => "pancontrol",
			"value" => array( esc_html__('Yes', 'amz-rigel-plugins') => "true",
							  esc_html__('No', 'amz-rigel-plugins') => "false"),
			"description" => esc_html__("Do you want to display Pancontrol?", 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("MapType Control", 'amz-rigel-plugins'),
			"param_name" => "maptypecontrol",
			"value" => array( esc_html__('Yes', 'amz-rigel-plugins') => "true",
							  esc_html__('No', 'amz-rigel-plugins') => "false"),
			"description" => esc_html__("Do you want to display MapType Control?", 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Scale Control", 'amz-rigel-plugins'),
			"param_name" => "scalecontrol",
			"value" => array( esc_html__('Yes', 'amz-rigel-plugins') => "true",
							  esc_html__('No', 'amz-rigel-plugins') => "false"),
			"description" => esc_html__("Do you want to display Scale Control?", 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Street View Control", 'amz-rigel-plugins'),
			"param_name" => "streetviewcontrol",
			"value" => array( esc_html__('Yes', 'amz-rigel-plugins') => "true",
							  esc_html__('No', 'amz-rigel-plugins') => "false"),
			"description" => esc_html__("Do you want to display Street View Control?", 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Overview Map control", 'amz-rigel-plugins'),
			"param_name" => "overviewmapcontrol",
			"value" => array( esc_html__('Yes', 'amz-rigel-plugins') => "true",
							  esc_html__('No', 'amz-rigel-plugins') => "false"),
			"description" => esc_html__("Do you want to display Overview Map control?", 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Do you want to show info on top of the map?", 'amz-rigel-plugins'),
			"param_name" => "contact_info",
			"value" => array( esc_html__('Yes', 'amz-rigel-plugins') => "yes",
							  esc_html__('No', 'amz-rigel-plugins') => "no"),
			"description" => '',
			"group"	=> esc_html__('Contact Info', 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Email", 'amz-rigel-plugins'),
			"param_name" => "email",
			"value" => "email@example.com",
			"description" => esc_html__("Enter the email address.", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "contact_info", 'value' => array('yes')),
			"group"	=> esc_html__('Contact Info', 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Address Title", 'amz-rigel-plugins'),
			"param_name" => "address_title",
			"value" => "Envato Headquarters",
			"description" => esc_html__("Title which display above address. Leave it empty if you don't want.", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "contact_info", 'value' => array('yes')),
			"group"	=> esc_html__('Contact Info', 'amz-rigel-plugins')
			),

		array(
			"type" => "textarea",
			"class" => "",
			"heading" => esc_html__("Address", 'amz-rigel-plugins'),
			"param_name" => "address", 
			"value" => '121 King Street,<br>Melbourne Victoria 3000,<br>Australia', 
			"description" => esc_html__("Enter the address", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "contact_info", 'value' => array('yes')),
			"group"	=> esc_html__('Contact Info', 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Contact Number", 'amz-rigel-plugins'),
			"param_name" => "contact_number",
			"value" => "+61 3 8376 6284",
			"description" => esc_html__("Enter the contact number.", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "contact_info", 'value' => array('yes')),
			"group"	=> esc_html__('Contact Info', 'amz-rigel-plugins')
			),

		)
) );

// Clients
vc_map( array(
	"name" => esc_html__("Clients", 'amz-rigel-plugins'), //Title
	"base" => "clients", //Shortcode name
	"class" => "",
	"icon" => "icon-pixel8es",
	"category" => 'By Rigel', //category
	"params" => array(

		array(
			"type" => "attach_images",
			"heading" => esc_html__("Images", 'amz-rigel-plugins'),
			"param_name" => "images",
			"value" => "",
			"description" => esc_html__("Select images from media library.", 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Add Link client images?", 'amz-rigel-plugins'),
			"param_name" => "link",
			"value" => array( esc_html__('Yes', 'amz-rigel-plugins') => "yes",
				esc_html__('No', 'amz-rigel-plugins') => "no"),
			"description" => ''
			),

		array(
			"type" => "textarea",
			"class" => "",
			"heading" => esc_html__("Enter links for each client here", 'amz-rigel-plugins'),
			"param_name" => "custom_links", 
			"value" => '', 
			"description" => esc_html__("Enter links for each client here. Divide links with comma (,).", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "link", 'value' => array('yes'))
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Client (company) Names on Hover", 'amz-rigel-plugins'),
			"param_name" => "title_on_hover",
			"value" => array( esc_html__('Yes', 'amz-rigel-plugins') => "yes",
				esc_html__('No', 'amz-rigel-plugins') => "no"),
			"description" => esc_html__("Do you want to display client (company) names on Hover over client image?.", 'amz-rigel-plugins')
			),

		array(
			"type" => "textarea",
			"class" => "",
			"heading" => esc_html__("Enter Company name for each client here", 'amz-rigel-plugins'),
			"param_name" => "titles", 
			"value" => '', 
			"description" => esc_html__("Enter Company name for each client here. Divide links with comma (,).", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "title_on_hover", 'value' => array('yes'))
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Clients Style", 'amz-rigel-plugins'),
			"param_name" => "style",
			"admin_label" => true,
			"value" => array(esc_html__('Style1', 'amz-rigel-plugins') => "", 
							 esc_html__('Style2', 'amz-rigel-plugins') => "style2", 
							 esc_html__('Style3', 'amz-rigel-plugins') => "style3",
							 esc_html__('Style4', 'amz-rigel-plugins') => "style4",
							 esc_html__('Style5', 'amz-rigel-plugins') => "style4 style5"),
			"description" => ''
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("No of Columns", 'amz-rigel-plugins'),
			"param_name" => "items",
			"value" => array(esc_html__('4 Items', 'amz-rigel-plugins') => "4",
					 esc_html__('5 Items', 'amz-rigel-plugins') => "5",
					 esc_html__('6 Items', 'amz-rigel-plugins') => "6",
					 esc_html__('3 Items', 'amz-rigel-plugins') => "3",
					 esc_html__('2 Items', 'amz-rigel-plugins') => "2"),
			"description" => esc_html__("Choose Number of Columns. ( Column5 and Column6 will not work if slider disable )", 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Enable Carousel?", 'amz-rigel-plugins'),
			"param_name" => "slider",
			"value" => array( esc_html__('Yes', 'amz-rigel-plugins') => "yes",
							  esc_html__('No', 'amz-rigel-plugins') => "no"),
			"description" => '',
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
			),

		array(
			'type' => 'textfield',
			'heading' => __( 'Margin', 'amz-rigel-plugins' ),
			'param_name' => 'margin',
			'value' => '30',
			'description' => __( 'Enter margin-right(px) on item ( Example: 30 ).', 'amz-rigel-plugins' ),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
		),
		
		array(
			"type" => "dropdown",
			"heading" => __("Loop", 'amz-rigel-plugins'),
			"param_name" => "loop",
			"value" => array( __('No', 'amz-rigel-plugins') => "false",
							  __('Yes', 'amz-rigel-plugins') => "true"),
			"description" => 'Inifnity loop. Duplicate last and first items to get loop illusion.',
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
		),

		array(
			"type" => "dropdown",
			"heading" => __("Center", 'amz-rigel-plugins'),
			"param_name" => "center",
			"value" => array( __('No', 'amz-rigel-plugins') => "false",
							  __('Yes', 'amz-rigel-plugins') => "true"),
			"description" => 'Center item. Works well with even an odd number of items.',
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
		),

		array(
			'type' => 'textfield',
			'heading' => __( 'Padding Left and Right', 'amz-rigel-plugins' ),
			'param_name' => 'stage_padding',
			'value' => '0',
			'description' => __( 'Padding left and right on stage (can see neighbours).', 'amz-rigel-plugins' ),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
		),

		array(
			'type' => 'textfield',
			'heading' => __( 'Start Position', 'amz-rigel-plugins' ),
			'param_name' => 'start_position',
			'value' => '0',
			'description' => __( 'Start position.', 'amz-rigel-plugins' ),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
		),

		array(
			"type" => "dropdown",
			"heading" => __("Autoplay", 'amz-rigel-plugins'),
			"param_name" => "autoplay",
			"value" => array( __('No', 'amz-rigel-plugins') => "false", __('Yes', 'amz-rigel-plugins') => "true" ),
			"description" => __("Enable autoplay?", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
		),

		array(
			"type" => "textfield",
			"heading" => __("Autoplay Interval Timeout", 'amz-rigel-plugins'),
			"param_name" => "slide_speed",
			"value" => "5000",
			"description" => __("Enter Autoplay interval timeout Value in milesecond (Ex: 5000).", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
		),

		array(
			"type" => "dropdown",
			"heading" => __("Autoplay Hover Pause", 'amz-rigel-plugins'),
			"param_name" => "stop_on_hover",
			"value" => array( __('Yes', 'amz-rigel-plugins') => "true",
							  __('No', 'amz-rigel-plugins') => "false"),
			"description" => 'Pause on mouse hover.',
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
		),

		array(
			"type" => "dropdown",
			"heading" => __("Arrow", 'amz-rigel-plugins'),
			"param_name" => "slide_arrow",
			"value" => array( __('Yes', 'amz-rigel-plugins') => "true",
							  __('No', 'amz-rigel-plugins') => "false"),
			"description" => __("Do you like to show arrow navigation to move carousel.", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
		),      

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Arrow Style", 'amz-rigel-plugins'),
			"param_name" => "arrow_type",
			"value" => array( esc_html__('Default', 'amz-rigel-plugins') => "",
							  esc_html__('Arrow Top Center', 'amz-rigel-plugins') => "arrow-style2"),
			"description" => esc_html__("Choose arrow postion", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "slide_arrow", 'value' => array('true')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Bullets", 'amz-rigel-plugins'),
			"param_name" => "pagination",
			"value" => array( __('Yes', 'amz-rigel-plugins') => "true",
				__('No', 'amz-rigel-plugins') => "false"),
			"description" => __("Do you like to show dot navigation to move carousel", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
		),

		array(
		   "type" => "dropdown",
		   "heading" => __("Animation In", 'amz-rigel-plugins'),
		   "param_name" => "animate_in",
		   "value" => $slider_animation_in,
		   "description" => __("false = no animation. Animate functions work only with one item and only in browsers that support perspective property.", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
		   ),

		array(
		   "type" => "dropdown",
		   "heading" => __("Animation Out", 'amz-rigel-plugins'),
		   "param_name" => "animate_out",
		   "value" => $slider_animation_out,
		   "description" => __("Animate functions work only with one item and only in browsers that support perspective property.", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
		   ),

		array(
			"type" => "dropdown",
			"heading" => __("Mouse Drag?", 'amz-rigel-plugins'),
			"param_name" => "mouse_drag",
			"value" => array( __('Yes', 'amz-rigel-plugins') => "true",
							  __('No', 'amz-rigel-plugins') => "false"),
			"description" => __("Do you like to move carousel by Mouse Drag?", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
		),

		array(
			"type" => "dropdown",
			"heading" => __("Touch Drag", 'amz-rigel-plugins'),
			"param_name" => "touch_drag",
			"value" => array( __('Yes', 'amz-rigel-plugins') => "true",
							  __('No', 'amz-rigel-plugins') => "false"),
			"description" => __("Do you like to move carousel Touch Drag?", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
		),    

		)
) );

//Line shortcode
vc_map( array(
	"name" => esc_html__("seperator Line", 'amz-rigel-plugins'), //Title
	"base" => "line", //Shortcode name
	"class" => "",
	"icon" => "icon-pixel8es",
	"category" => 'By Rigel', //category
	"params" => array(
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Line Style", 'amz-rigel-plugins'),
            "param_name" => "line_style",
			"admin_label" => true,
            "value" => array(esc_html__('Line Style1', 'amz-rigel-plugins') => "line-style1", 
                             esc_html__('Line Style2', 'amz-rigel-plugins') => "line-style2",
                             esc_html__('Line Style3', 'amz-rigel-plugins') => "line-style3",
                             esc_html__('Line Style4', 'amz-rigel-plugins') => "line-style4",
                             esc_html__('Line Style5', 'amz-rigel-plugins') => "line-style5"),
            "description" => esc_html__("Do you like to animate this element", 'amz-rigel-plugins'),
           
            ),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Width in px", 'amz-rigel-plugins'),
			"param_name" => "width",
			"value" => "",
			"description" => esc_html__("Enter Width in Pixels or in percent (eg: 50px or 50%), Leave empty to apply default 75px", 'amz-rigel-plugins'),
             "dependency" => Array('element' => "line_style", 'value' => array('line-style1'))
			),
            
            

		array(
			"type" => "textfield",
			"heading" => esc_html__("Line Thickness in px", 'amz-rigel-plugins'),
			"param_name" => "thickness",
			"value" => "",
			"description" => esc_html__("Enter thickness in Pixels (eg: 4px), Leave empty to apply default 1px", 'amz-rigel-plugins'),
             "dependency" => Array('element' => "line_style", 'value' => array('line-style1'))
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Align", 'amz-rigel-plugins'),
			"param_name" => "align",
			"value" => array(esc_html__('Align left', 'amz-rigel-plugins') => "left alignLeft", esc_html__('Align center', 'amz-rigel-plugins') => "center alignCenter",  esc_html__('Align right', 'amz-rigel-plugins') => "right alignRight"),
			"description" => ''
			),

		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => esc_html__("Line color", 'amz-rigel-plugins'),
			"param_name" => "color", //Shortcode_attr name
			"value" => '', //Default Red color
			"description" => esc_html__("Choose line color if you want custom color, leave empty to apply theme default", 'amz-rigel-plugins'),
            "dependency" => Array('element' => "line_style", 'value' => array('line-style1'))
			)
		)
) );


// Quote
vc_map( array(
	"name" => esc_html__("Quote", 'amz-rigel-plugins'), //Title
	"base" => "quote", //Shortcode name
	"class" => "",
	"icon" => "icon-pixel8es",
	"category" => 'By Rigel', //category
	"params" => array(  

		array(
			"type" => "textarea_html",
			"class" => "",
			"heading" => esc_html__("Author Comment", 'amz-rigel-plugins'),
			"param_name" => "content", 
			"value" => '', 
			"description" => esc_html__("Enter the Author Comment", 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Author Name", 'amz-rigel-plugins'),
			"param_name" => "author_name",
			"value" => '',
			"description" => esc_html__("Enter the Comment Author Name", 'amz-rigel-plugins')
			),


		) 
) ); 

// Blog
vc_map( array(
	"name" => esc_html__("Recent Blog", 'amz-rigel-plugins'), //Title
	"base" => "blog", //Shortcode name
	"class" => "",
	"icon" => "icon-pixel8es",
	"category" => 'By Rigel', //category
	"params" => array(

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Insert Blog Post By", 'amz-rigel-plugins'),
			"param_name" => "insert_type",
			"admin_label" => true,
			"value" => array(esc_html__('Blog Posts', 'amz-rigel-plugins') => "posts", 
				esc_html__('Blog Post Id', 'amz-rigel-plugins') => "id", esc_html__('Blog Post Category', 'amz-rigel-plugins') => "category"),
			"description" => ''
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("No. of Recentblog", 'amz-rigel-plugins'),
			"param_name" => "no_of_items",
			"value" => -1,
			"dependency" => Array('element' => "insert_type", 'value' => array('posts','category')),
			"description" => esc_html__("Enter the number of Posts you want to display (only numbers), Enter -1 for all posts", 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Post Id", 'amz-rigel-plugins'),
			"param_name" => "id",
			"value" => "",
			"dependency" => Array('element' => "insert_type", 'value' => 'id'),
			"description" => esc_html__("Enter the blog post ids seperated by commas (,). Example: 2,54,8", 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Category Name", 'amz-rigel-plugins'),
			"param_name" => "category",
			"value" => "",
			"dependency" => Array('element' => "insert_type", 'value' => 'category'),
			"description" => esc_html__("Enter the blog post category slug seperated by commas (,). Example: design,illustration,print", 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Exclude Post", 'amz-rigel-plugins'),
			"param_name" => "exclude_id",
			"value" => "",
			"dependency" => Array('element' => "insert_type", 'value' => array('posts','category')),
			"description" => esc_html__("Enter the exclude blog post ids seperated by commas (,). Example: 2,54,8", 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Exclude Category", 'amz-rigel-plugins'),
			"param_name" => "exclude_category",
			"value" => "",
			"dependency" => Array('element' => "insert_type", 'value' => array('posts','category')),
			"description" => esc_html__("Enter the exclude blog post category slug seperated by commas (,). Example: 2,54,8", 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Order By", 'amz-rigel-plugins'),
			"param_name" => "order_by",
			"value" => array( esc_html__('Date', 'amz-rigel-plugins') => "date",  
							  esc_html__('Rand', 'amz-rigel-plugins') => "rand",
							  esc_html__('ID', 'amz-rigel-plugins') => "ID", 
							  esc_html__('Title', 'amz-rigel-plugins') => "title", 
							  esc_html__('Author', 'amz-rigel-plugins') => "author",
							  esc_html__('Name', 'amz-rigel-plugins') => "modified",
							  esc_html__('Parent', 'amz-rigel-plugins') => "parent",
							  esc_html__('Date Modified', 'amz-rigel-plugins') => "date",
							  esc_html__('Menu Order', 'amz-rigel-plugins') => "menu_order",
							  esc_html__('None', 'amz-rigel-plugins') => "none"),
			"dependency" => Array('element' => "insert_type", 'value' => 'posts'),
			"description" => esc_html__("Order posts By choosen order", 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Order", 'amz-rigel-plugins'),
			"param_name" => "order",
			"value" => array( esc_html__('Ascending order', 'amz-rigel-plugins') => "ASC",  
							  esc_html__('descending order', 'amz-rigel-plugins') => "DESC"),
			"dependency" => Array('element' => "insert_type", 'value' => 'posts'),
			"description" => esc_html__("In which Order, you want to display posts", 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Title length", 'amz-rigel-plugins'),
			"param_name" => "title_length",
			"value" => "",
			"dependency" => Array('element' => "blog_desc", 'value' => 'yes'),
			"description" => esc_html__("Enter excerpt length. Example: 180 (Leave it empty to apply default)", 'amz-rigel-plugins')
			),		

		array(
			"type" => "textfield",
			"heading" => esc_html__("Content length", 'amz-rigel-plugins'),
			"param_name" => "excerpt_length",
			"value" => "",
			"dependency" => Array('element' => "blog_desc", 'value' => 'yes'),
			"description" => esc_html__("Enter excerpt length. Example: 180 (Leave it empty to apply default)", 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Number of Columns", 'amz-rigel-plugins'),
			"param_name" => "columns",
			"value" => array(esc_html__('2 Columns', 'amz-rigel-plugins') => "col2",
							 esc_html__('3 Columns', 'amz-rigel-plugins') => "col3",
							 esc_html__('4 Columns', 'amz-rigel-plugins') => "col4"),
			"description" => ''
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Display Date", 'amz-rigel-plugins'),
			"param_name" => "display_date",
			"value" => array(esc_html__('Yes', 'amz-rigel-plugins') => "yes",  
							 esc_html__('No', 'amz-rigel-plugins') => "no"),
			"description" => esc_html__('Do you like to display comments number in post', 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Display Author name", 'amz-rigel-plugins'),
			"param_name" => "display_author",
			"value" => array(esc_html__('Yes', 'amz-rigel-plugins') => "yes",  
							 esc_html__('No', 'amz-rigel-plugins') => "no"),
			"description" => esc_html__('Do you like to display catergory', 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Display Catergory", 'amz-rigel-plugins'),
			"param_name" => "display_cat",
			"value" => array(esc_html__('Yes', 'amz-rigel-plugins') => "yes",  
							 esc_html__('No', 'amz-rigel-plugins') => "no"),
			"description" => esc_html__('Do you like to display catergory', 'amz-rigel-plugins')
		),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Slider", 'amz-rigel-plugins'),
			"param_name" => "slider",
			"value" => array( esc_html__('Yes', 'amz-rigel-plugins') => "yes",
							  esc_html__('No', 'amz-rigel-plugins') => "no"),
			"description" => esc_html__("Do you like use this as carousel?", 'amz-rigel-plugins'),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
			),

		array(
			'type' => 'textfield',
			'heading' => __( 'Margin', 'amz-rigel-plugins' ),
			'param_name' => 'margin',
			'value' => '30',
			'description' => __( 'Enter margin-right(px) on item ( Example: 30 ).', 'amz-rigel-plugins' ),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
		),
		
		array(
			"type" => "dropdown",
			"heading" => __("Loop", 'amz-rigel-plugins'),
			"param_name" => "loop",
			"value" => array( __('No', 'amz-rigel-plugins') => "false",
							  __('Yes', 'amz-rigel-plugins') => "true"),
			"description" => 'Inifnity loop. Duplicate last and first items to get loop illusion.',
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
		),

		array(
			"type" => "dropdown",
			"heading" => __("Center", 'amz-rigel-plugins'),
			"param_name" => "center",
			"value" => array( __('No', 'amz-rigel-plugins') => "false",
							  __('Yes', 'amz-rigel-plugins') => "true"),
			"description" => 'Center item. Works well with even an odd number of items.',
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
		),

		array(
			'type' => 'textfield',
			'heading' => __( 'Padding Left and Right', 'amz-rigel-plugins' ),
			'param_name' => 'stage_padding',
			'value' => '0',
			'description' => __( 'Padding left and right on stage (can see neighbours).', 'amz-rigel-plugins' ),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
		),

		array(
			'type' => 'textfield',
			'heading' => __( 'Start Position', 'amz-rigel-plugins' ),
			'param_name' => 'start_position',
			'value' => '0',
			'description' => __( 'Start position.', 'amz-rigel-plugins' ),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
		),

		array(
			"type" => "dropdown",
			"heading" => __("Autoplay", 'amz-rigel-plugins'),
			"param_name" => "autoplay",
			"value" => array( __('No', 'amz-rigel-plugins') => "false", __('Yes', 'amz-rigel-plugins') => "true" ),
			"description" => __("Enable autoplay?", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
		),

		array(
			"type" => "textfield",
			"heading" => __("Autoplay Interval Timeout", 'amz-rigel-plugins'),
			"param_name" => "slide_speed",
			"value" => "5000",
			"description" => __("Enter Autoplay interval timeout Value in milesecond (Ex: 5000).", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
		),

		array(
			"type" => "dropdown",
			"heading" => __("Autoplay Hover Pause", 'amz-rigel-plugins'),
			"param_name" => "stop_on_hover",
			"value" => array( __('Yes', 'amz-rigel-plugins') => "true",
							  __('No', 'amz-rigel-plugins') => "false"),
			"description" => 'Pause on mouse hover.',
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
		),

		array(
			"type" => "dropdown",
			"heading" => __("Arrow", 'amz-rigel-plugins'),
			"param_name" => "slide_arrow",
			"value" => array( __('Yes', 'amz-rigel-plugins') => "true",
							  __('No', 'amz-rigel-plugins') => "false"),
			"description" => __("Do you like to show arrow navigation to move carousel.", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
		),      

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Arrow Style", 'amz-rigel-plugins'),
			"param_name" => "arrow_type",
			"value" => array( esc_html__('Default', 'amz-rigel-plugins') => "",
							  esc_html__('Arrow Top Center', 'amz-rigel-plugins') => "arrow-style2"),
			"description" => esc_html__("Choose arrow postion", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "slide_arrow", 'value' => array('true')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Bullets", 'amz-rigel-plugins'),
			"param_name" => "slider_pagination",
			"value" => array( __('Yes', 'amz-rigel-plugins') => "true",
				__('No', 'amz-rigel-plugins') => "false"),
			"description" => __("Do you like to show dot navigation to move carousel", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
		),

		array(
		   "type" => "dropdown",
		   "heading" => __("Animation In", 'amz-rigel-plugins'),
		   "param_name" => "animate_in",
		   "value" => $slider_animation_in,
		   "description" => __("false = no animation. Animate functions work only with one item and only in browsers that support perspective property.", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
		   ),

		array(
		   "type" => "dropdown",
		   "heading" => __("Animation Out", 'amz-rigel-plugins'),
		   "param_name" => "animate_out",
		   "value" => $slider_animation_out,
		   "description" => __("Animate functions work only with one item and only in browsers that support perspective property.", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
		   ),

		array(
			"type" => "dropdown",
			"heading" => __("Mouse Drag?", 'amz-rigel-plugins'),
			"param_name" => "mouse_drag",
			"value" => array( __('Yes', 'amz-rigel-plugins') => "true",
							  __('No', 'amz-rigel-plugins') => "false"),
			"description" => __("Do you like to move carousel by Mouse Drag?", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
		),

		array(
			"type" => "dropdown",
			"heading" => __("Touch Drag", 'amz-rigel-plugins'),
			"param_name" => "touch_drag",
			"value" => array( __('Yes', 'amz-rigel-plugins') => "true",
							  __('No', 'amz-rigel-plugins') => "false"),
			"description" => __("Do you like to move carousel Touch Drag?", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "slider", 'value' => array('yes')),
			"group"	=> esc_html__('Slider', 'amz-rigel-plugins')
		),    

		) 
) );

// Video Popup
vc_map( array(
	"name" => __("Video Popup", 'amz-rigel-plugins'), //Title
	"base" => "video_popup", //Shortcode name
	"class" => "",
	"icon" => "icon-pixel8es",
	"category" => 'By Rigel', //category
	"params" => array(

		array(
			"type" => "textfield",
			"heading" => __("Enter the Url", 'amz-rigel-plugins'),
			"param_name" => "url",
			"value" => "",
			"description" => __("Please Enter the You-Tube or Vimeo Url.", 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => __("Trigger Text", 'amz-rigel-plugins'),
			"param_name" => "text",
			"value" => "Title",
			"description" => __("Enter the trigger text.", 'amz-rigel-plugins')
			),

		array(
			"type" => "icon",
			"heading" => __("Trigger Icon", 'amz-rigel-plugins'),
			"param_name" => "icon_name",
			"value" => '',
			"description" => __("Select Trigger icon.", 'amz-rigel-plugins')
			),

		array(
			"type" => "attach_image",
			"heading" => __("Video Popup Image", "awed"),
			"param_name" => "video_popup_bg",
			"value" => "",
			"description" => __("Select a image if you want to display image on Video Background.", "awed")
			),

		array(
			'type' => 'textfield',
			'heading' => __( 'Video Popup Image Width', 'amz-rigel-plugins' ),
			'param_name' => 'width',
			'value' => '',
			'description' => __( 'Enter the width ( Example: 300 ).', 'amz-rigel-plugins' ),
			"edit_field_class" => 'vc_col-xs-6'
		),

		array(
			'type' => 'textfield',
			'heading' => __( 'Video Popup Image Height', 'amz-rigel-plugins' ),
			'param_name' => 'height',
			'value' => '',
			'description' => __( 'Enter the height ( Example: 70px ).', 'amz-rigel-plugins' ),
			"edit_field_class" => 'vc_col-xs-6'
		),

		array(
			"type" => "textfield",
			"heading" => __("Text Font Size", 'amz-rigel-plugins'),
			"param_name" => "text_size",
			"value" => "",
			"description" => __("Enter the text font size in px(Ex: 50px)", 'amz-rigel-plugins'),
			"group"	=> __('Custom Style', 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => __("Text Letter Spacing in px", 'amz-rigel-plugins'),
			"param_name" => "text_letter_spacing",
			"value" => "",
			"description" => __("Enter text letter spacing in pixels.( eg: 50px )", 'amz-rigel-plugins'),
			"group"	=> __('Custom Style', 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => __("Text Padding", 'amz-rigel-plugins'),
			"param_name" => "text_padding",
			"value" => "",
			"description" => __("Enter the padding (in css format [top right bottom left]) in px(Ex: 50px 50px 50px 50px)", 'amz-rigel-plugins'),
			"group"	=> __('Custom Style', 'amz-rigel-plugins')
			),

		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => __("Text Color", 'amz-rigel-plugins'),
			"param_name" => "text_color", 
			"value" => '', 
			"description" => __("Choose text color", 'amz-rigel-plugins'),
			"group"	=> __('Custom Style', 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => __("Icon Font Size", 'amz-rigel-plugins'),
			"param_name" => "icon_size",
			"value" => "",
			"description" => __("Enter the text font size in px(Ex: 50px)", 'amz-rigel-plugins'),
			"group"	=> __('Custom Style', 'amz-rigel-plugins')
			),

		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => __("Icon Background Color", 'amz-rigel-plugins'),
			"param_name" => "icon_bg_color", 
			"value" => '', 
			"description" => __("Choose custom background color", 'amz-rigel-plugins'),
			"group"	=> __('Custom Style', 'amz-rigel-plugins')
			),

		array(
			'type' => 'textfield',
			'heading' => __( 'Icon Border width', 'amz-rigel-plugins' ),
			'param_name' => 'icon_border_width',
			'value' => '',
			'description' => __( 'Enter the border width in (px)  Example: 1px.', 'amz-rigel-plugins' ),
			"group"	=> __('Custom Style', 'amz-rigel-plugins'),
			"edit_field_class" => 'vc_col-xs-4'
			),

		array(
			"type" => "dropdown",
			"heading" => __("Icon Border Style", 'amz-rigel-plugins'),
			"param_name" => "icon_border_style",
			"value" => array(__('None', 'amz-rigel-plugins') => "none", 
							 __('Solid', 'amz-rigel-plugins') => "solid", 
							 __('Dotted', 'amz-rigel-plugins') => "dotted", 
							 __('Dashed', 'amz-rigel-plugins') => "dashed", 
							 __('Double', 'amz-rigel-plugins') => "double", 
							 __('Groove', 'amz-rigel-plugins') => "groove", 
							 __('Ridge', 'amz-rigel-plugins') => "ridge", 
							 __('Inset', 'amz-rigel-plugins') => "inset", 
							 __('Outset', 'amz-rigel-plugins') => "outset"),
			"description" => __("Select icon border style?", 'amz-rigel-plugins'),
			"group"	=> __('Custom Style', 'amz-rigel-plugins'),
			"edit_field_class" => 'vc_col-xs-4'
			),

		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => __("Icon Border Color", 'amz-rigel-plugins'),
			"param_name" => "icon_border_color", 
			"value" => '', 
			"description" => __("Choose icon border color", 'amz-rigel-plugins'),
			"group"	=> __('Custom Style', 'amz-rigel-plugins'),
			"edit_field_class" => 'vc_col-xs-4'
			),

		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => __("Icon Color", 'amz-rigel-plugins'),
			"param_name" => "icon_color", 
			"value" => '', 
			"description" => __("Choose icon color", 'amz-rigel-plugins'),
			"group"	=> __('Custom Style', 'amz-rigel-plugins')
			),

		array(
			'type' => 'textfield',
			'heading' => __( 'Icon Width', 'amz-rigel-plugins' ),
			'param_name' => 'icon_width',
			'value' => '',
			'description' => __( 'Enter the width in (px)  Example: 70px.', 'amz-rigel-plugins' ),
			"group"	=> __('Custom Style', 'amz-rigel-plugins'),
			"edit_field_class" => 'vc_col-xs-4'
		),

		array(
			'type' => 'textfield',
			'heading' => __( 'Icon Height', 'amz-rigel-plugins' ),
			'param_name' => 'icon_height',
			'value' => '',
			'description' => __( 'Enter the height in (px)  Example: 70px.', 'amz-rigel-plugins' ),
			"group"	=> __('Custom Style', 'amz-rigel-plugins'),
			"edit_field_class" => 'vc_col-xs-4'
		),

		array(
			'type' => 'textfield',
			'heading' => __( 'Icon Line Height', 'amz-rigel-plugins' ),
			'param_name' => 'icon_line_height',
			'value' => '',
			'description' => __( 'Enter the line-height in (px)  Example: 70px.', 'amz-rigel-plugins' ),
			"group"	=> __('Custom Style', 'amz-rigel-plugins'),
			"edit_field_class" => 'vc_col-xs-4'
			),

		array(
			'type' => 'textfield',
			'heading' => __( 'Icon Border Radius', 'amz-rigel-plugins' ),
			'param_name' => 'icon_border_radius',
			'value' => '',
			'description' => __( 'Enter the border radius in (px)  Example: 70px or 50%.', 'amz-rigel-plugins' ),
			"group"	=> __('Custom Style', 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Alignment", 'amz-rigel-plugins'),
			"param_name" => "align",
			"value" => array(__('Align Center', 'amz-rigel-plugins') => "center", 
							 __('Align Left', 'amz-rigel-plugins') => "left", 
							 __('Align Right', 'amz-rigel-plugins') => "right"),
			"description" => __("Select alignment.", 'amz-rigel-plugins')
			),
		)
) );

// Title 
vc_map( array(
	"name" => esc_html__("Special Heading", 'amz-rigel-plugins'), //Title
	"base" => "title", //Shortcode name
	"class" => "",
	"icon" => "icon-pixel8es",
	"category" => 'By Rigel', //category
	"params" => array(

		array(
			"type" => "textfield",
			"heading" => esc_html__("Heading Text", 'amz-rigel-plugins'),
			"param_name" => "title",
			"admin_label" => true,
			"value" => "Your Heading Text Goes Here...",
			"description" => esc_html__("Enter the Heading Text.", 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Heading Type", 'amz-rigel-plugins'),
			"param_name" => "title_tag",
			"value" => array('h2','h1','h3','h4','h5','h6'),
			"description" => esc_html__("Select which kind of heading you want to display.", 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Heading Alignment", 'amz-rigel-plugins'),
			"param_name" => "align",
			"value" => array(esc_html__('Align Left', 'amz-rigel-plugins') => "", 
							 esc_html__('Align Center', 'amz-rigel-plugins') => "center", 
							 esc_html__('Align Right', 'amz-rigel-plugins') => "right"),
			"description" => esc_html__("How you want to align this Heading", 'amz-rigel-plugins')
			),

		array(
			"type" => "amz_gf",
			"heading" => __("Choose Title Font", "amz-rigel-plugins"),
			"param_name" => "title_font",
			//"value" => "{'family':'Raleway', 'variant':'regular', 'size':'14px'}",
			"value" => "{'family':'none', 'variant':'none', 'size':''}", //none means themedefault
			"description" => __("Choose font, font weight and Please enter font size with unit (px, em, rem, vh or vw or any css unit) or Leave it to empty to apply theme default. Example: '21px or 2em or 1.5vh'", "amz-rigel-plugins"),
			"group"	=> __('Typography', 'amz-rigel-plugins')
			),

		array(
			"type" => "amz_gf",
			"heading" => __("Choose Sub Title Font", "amz-rigel-plugins"),
			"param_name" => "sub_title_font",
			//"value" => "{'family':'Raleway', 'variant':'regular', 'size':'14px'}",
			"value" => "{'family':'none', 'variant':'none', 'size':''}", //none means themedefault
			"description" => __("Choose font, font weight and Please enter font size with unit (px, em, rem, vh or vw or any css unit) or Leave it to empty to apply theme default. Example: '21px or 2em or 1.5vh'", "amz-rigel-plugins"),
			"group"	=> __('Typography', 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Display Heading in UPPERCASE", 'amz-rigel-plugins'),
			"param_name" => "title_uppercase",
			"value" => array(esc_html__('Yes', 'amz-rigel-plugins') => "yes", 
							 esc_html__('No', 'amz-rigel-plugins') => "no"),
			"description" => esc_html__("Do you want to Heading Text in all caps?", 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Font Size", 'amz-rigel-plugins'),
			"param_name" => "font_size",
			"value" => array(esc_html__('small', 'amz-rigel-plugins') => "size-sm", 
							 esc_html__('Medium', 'amz-rigel-plugins') => "size-md", 
							 esc_html__('Large', 'amz-rigel-plugins') => "size-lg",
							 esc_html__('Custom', 'amz-rigel-plugins') => "custom-sz"),
			"description" => esc_html__("Select Font Size.", 'amz-rigel-plugins')
			),
            array(
				"type" => "textfield",
				"heading" => esc_html__("Custom Font Size", 'amz-rigel-plugins'),
				"param_name" => "custom_font_size",
				"value" => "",
				"description" => esc_html__("Enter the Custom title Font Size in px (Ex : 30px). Leave it empty to apply theme default.", 'amz-rigel-plugins'),
				"dependency" => Array('element' => "font_size", 'value' => array('custom-sz'))
			),
            array(
				"type" => "textfield",
				"heading" => esc_html__("Heading Margin", 'amz-rigel-plugins'),
				"param_name" => "title_margin",
				"value" => "",
				"description" => esc_html__("Value should be in css format top right bottom left in px (Ex: -10px 20px 30px 40px), Leave it empty to apply theme default.", 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Sub Heading text", 'amz-rigel-plugins'),
			"param_name" => "sub_title_text",
			"value" => "",
			"description" => esc_html__("Enter the Sub-Heading text which will display below the title ( Leave it empty to hide )", 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Line", 'amz-rigel-plugins'),
			"param_name" => "line",
			"value" => array(esc_html__('Yes', 'amz-rigel-plugins') => "yes", 
							 esc_html__('No', 'amz-rigel-plugins') => "no"), 
			"description" => esc_html__("Display line below title?", 'amz-rigel-plugins')
			),
            
        array(
			"type" => "dropdown",
			"heading" => esc_html__("Line Positions", 'amz-rigel-plugins'),
			"param_name" => "line_positions",
			"value" => array(esc_html__('Below Title', 'amz-rigel-plugins') => "below-title", 
							 esc_html__('Below Sub Title', 'amz-rigel-plugins') => "below-sub-title"), 
			"description" => esc_html__("Display line below title?", 'amz-rigel-plugins'),
             "dependency" => Array('element' => "line", 'value' => array('yes'))
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Title Animation", 'amz-rigel-plugins'),
			"param_name" => "animate",
			"value" => array(esc_html__('No', 'amz-rigel-plugins') => "no", 
							 esc_html__('Yes', 'amz-rigel-plugins') => "yes"),
			"description" => esc_html__("Do you like to animate this element", 'amz-rigel-plugins'),
			"group"	=> esc_html__('Animate', 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Animation Transition", 'amz-rigel-plugins'),
			"param_name" => "transition",
			"value" => $animation,
			"description" => esc_html__("Choose Animation Transition.", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "animate", 'value' => array('yes') ),
			"group"	=> esc_html__('Animate', 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Animation Duration", 'amz-rigel-plugins'),
			"param_name" => "duration",
			"value" => "",
			"description" => esc_html__("Enter the Duration (Ex: 500ms or 1s)", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "animate", 'value' => array('yes')),
			"group"	=> esc_html__('Animate', 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Animation Delay", 'amz-rigel-plugins'),
			"param_name" => "delay",
			"value" => "",
			"description" => esc_html__("Enter the Delay (Ex: 100ms or 1s)", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "animate", 'value' => array('yes')),
			"group"	=> esc_html__('Animate', 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Extra class name", 'amz-rigel-plugins'),
			"param_name" => "el_class",
			"value" => "",
			"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'amz-rigel-plugins')
			),
		)
) );

// Animation Block
vc_map( array(
	"name" => esc_html__("Animation Block", 'amz-rigel-plugins'), //Title
	"base" => "animation_block", //Shortcode name
	"class" => "",
	"icon" => "icon-pixel8es",
	"category" => 'By Rigel', //category 
	"as_parent" => array('except' => 'animation_block'), 
	"content_element" => true,
	"show_settings_on_create" => true,
	"params" => array(

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Animation Transition", 'amz-rigel-plugins'),
			"param_name" => "transition",
			"value" => $animation,
			"description" => esc_html__("Choose Animation Transition.", 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Animation Duration", 'amz-rigel-plugins'),
			"param_name" => "duration",
			"value" => "",
			"description" => esc_html__("Enter the Duration (Ex: 500ms or 1s)", 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Animation Delay", 'amz-rigel-plugins'),
			"param_name" => "delay",
			"value" => "",
			"description" => esc_html__("Enter the Delay (Ex: 100ms or 1s)", 'amz-rigel-plugins')
			),
		),
	"js_view" => 'VcColumnView',
) );

//Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortCode_animation_block extends WPBakeryShortCodesContainer {
	}
}

// Button
vc_map( array(
	"name" => esc_html__("Button", 'amz-rigel-plugins'), //Title
	"base" => "button", //Shortcode name
	"class" => "",
	"icon" => "icon-pixel8es",
	"category" => 'By Rigel', //category
	"params" => array(

		array(
			"type" => "textfield",
			"heading" => esc_html__("Button Text", 'amz-rigel-plugins'),
			"param_name" => "button_text",
			"admin_label" => true,
			"value" => "Click Me!",
			"description" => esc_html__("Enter the Button Text", 'amz-rigel-plugins')
			),

		array(
			"type" => "vc_link",
			"heading" => esc_html__("Button URL", 'amz-rigel-plugins'),
			"param_name" => "button_link",
			"value" => "#",
			"description" => esc_html__("Enter the button link", 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Button Style", 'amz-rigel-plugins'),
			"param_name" => "button_style",
			"value" => array(esc_html__('Outline', 'amz-rigel-plugins') => "outline", 
							 esc_html__('Solid', 'amz-rigel-plugins') => "solid", 
							 esc_html__('Simple (No Bg and No Border)', 'amz-rigel-plugins') => "simple"),
			"description" => esc_html__("Select button style?", 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Button Color", 'amz-rigel-plugins'),
			"param_name" => "button_color",
			"value" => array(esc_html__('Black', 'amz-rigel-plugins') => "no-color",
							 esc_html__('White', 'amz-rigel-plugins') => "white",
							 esc_html__('Color', 'amz-rigel-plugins') => "colorbtn"), 
			"description" => esc_html__("Please choose button color", 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Button Size", 'amz-rigel-plugins'),
			"param_name" => "button_size",
			"value" => array(esc_html__('Medium', 'amz-rigel-plugins') => "md", 
							 esc_html__('Small', 'amz-rigel-plugins') => "sm", 
							 esc_html__('Large', 'amz-rigel-plugins') => "lg"),
			"description" => esc_html__("Select button size?", 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Animated Button?", 'amz-rigel-plugins'),
			"param_name" => "animated_button",
			"value" => array(esc_html__('No', 'amz-rigel-plugins') => "no",
							 esc_html__('Yes', 'amz-rigel-plugins') => "yes"),
			"description" => esc_html__("Do you want to animated button?", 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Custom Font Size?", 'amz-rigel-plugins'),
			"param_name" => "custom_size",
			"value" => array(esc_html__('No', 'amz-rigel-plugins') => "no",
							 esc_html__('Yes', 'amz-rigel-plugins') => "yes"),
			"description" => esc_html__("Do you want to custom font size?", 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Font Size", 'amz-rigel-plugins'),
			"param_name" => "font_size",
			"value" => "",
			"description" => esc_html__("Enter the font size in px(Ex: 50px)", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "custom_size", 'value' => array('yes'))
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Custom Padding", 'amz-rigel-plugins'),
			"param_name" => "padding_custom",
			"value" => "",
			"description" => esc_html__("Enter the padding (in css format [top right bottom left]) in px(Ex: 50px 50px 50px 50px)", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "custom_size", 'value' => array('yes'))
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Button Align", 'amz-rigel-plugins'),
			"param_name" => "button_align",
			"value" => array(esc_html__('Left', 'amz-rigel-plugins') => "", 
							 esc_html__('Center', 'amz-rigel-plugins') => "button-center", 
							 esc_html__('Right', 'amz-rigel-plugins') => "button-right",
							 esc_html__('Full Width', 'amz-rigel-plugins') => "button-full"),
			"description" => esc_html__("Select button Align?", 'amz-rigel-plugins')
			),		

		array(
			"type" => "icon",
			"heading" => esc_html__("Button Icon", 'amz-rigel-plugins'),
			"param_name" => "button_icon",
			"value" => '',
			"description" => esc_html__("choose button icon.", 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Button Icon Align", 'amz-rigel-plugins'),
			"param_name" => "button_icon_align",
			"value" => array(esc_html__('Left', 'amz-rigel-plugins') => "front", 
							 esc_html__('Right', 'amz-rigel-plugins') => "back"), 
			"description" => esc_html__("Where you want to display Icon?", 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Button Icon on Hover ", 'amz-rigel-plugins'),
			"param_name" => "button_icon_hover",
			"value" => array(esc_html__('No', 'amz-rigel-plugins') => "no", 
							 esc_html__('Yes', 'amz-rigel-plugins') => "button-icon-hover"), 
			"description" => esc_html__("Where you want to display Icon?", 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Button Animation", 'amz-rigel-plugins'),
			"param_name" => "animate",
			"value" => array(esc_html__('No', 'amz-rigel-plugins') => "no", 
				esc_html__('Yes', 'amz-rigel-plugins') => "yes"),
			"description" => esc_html__("Do you like to animate this element", 'amz-rigel-plugins'),
			"group"	=> esc_html__('Animate', 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Animation Transition", 'amz-rigel-plugins'),
			"param_name" => "transition",
			"value" => $animation,
			"description" => esc_html__("Choose animation transition.", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "animate", 'value' => array('yes')),
			"group"	=> esc_html__('Animate', 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Animation Duration", 'amz-rigel-plugins'),
			"param_name" => "duration",
			"value" => "",
			"description" => esc_html__("Enter the duration (Ex: 500ms or 1s)", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "animate", 'value' => array('yes')),
			"group"	=> esc_html__('Animate', 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Animation Delay", 'amz-rigel-plugins'),
			"param_name" => "delay",
			"value" => "",
			"description" => esc_html__("Enter the delay (Ex: 100ms or 1s)", 'amz-rigel-plugins'),
			"dependency" => Array('element' => "animate", 'value' => array('yes')),
			"group"	=> esc_html__('Animate', 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Extra class name", 'amz-rigel-plugins'),
			"param_name" => "el_class",
			"value" => "",
			"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'amz-rigel-plugins')
			),
		)
) );

//Social 
vc_map( array(
	"name" => esc_html__("Social Icons", 'amz-rigel-plugins'), //Title
	"base" => "social", //Shortcode name
	"class" => "",
	"icon" => "icon-pixel8es",
	"category" => 'By Rigel', //category
	"params" => array(

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Choose a style", 'amz-rigel-plugins'),
			"param_name" => "style",
			"admin_label" => true,
			"value" => array( esc_html__('style 1', 'amz-rigel-plugins') => "style1",  
				esc_html__('style 2', 'amz-rigel-plugins') => "style2",
				esc_html__('style 3', 'amz-rigel-plugins') => "style3"),
			"description" => esc_html__("This theme have 3 Social Icon styles, please choose one. Leave below fields empty to hide icons ", 'amz-rigel-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Alignment", 'amz-rigel-plugins'),
			"param_name" => "align",
			"value" => array(esc_html__('Align Left', 'amz-rigel-plugins') => "", 
							 esc_html__('Align Center', 'amz-rigel-plugins') => "center", 
							 esc_html__('Align Right', 'amz-rigel-plugins') => "right"),
			"description" => esc_html__("How you want to align this Heading", 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Facebook Url", 'amz-rigel-plugins'),
			"param_name" => "facebook",
			"value" => "",
			"description" => esc_html__("Enter the facebook Url", 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Twitter Url", 'amz-rigel-plugins'),
			"param_name" => "twitter",
			"value" => "",
			"description" => esc_html__("Enter the twitter Url", 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("GooglePlus Url", 'amz-rigel-plugins'),
			"param_name" => "gplus",
			"value" => "",
			"description" => esc_html__("Enter the gplus Url", 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("LinkedIn Url", 'amz-rigel-plugins'),
			"param_name" => "linkedin",
			"value" => "",
			"description" => esc_html__("Enter the linkedin Url", 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Dribbble Url", 'amz-rigel-plugins'),
			"param_name" => "dribble",
			"value" => "",
			"description" => esc_html__("Enter the dribbble Url", 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Flickr Url", 'amz-rigel-plugins'),
			"param_name" => "flickr",
			"value" => "",
			"description" => esc_html__("Enter the flickr Url", 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Pinterest Url", 'amz-rigel-plugins'),
			"param_name" => "pinterest",
			"value" => "",
			"description" => esc_html__("Enter the pinterest Url", 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Tumblr Url", 'amz-rigel-plugins'),
			"param_name" => "tumblr",
			"value" => "",
			"description" => esc_html__("Enter the tumblr Url", 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Instagram Url", 'amz-rigel-plugins'),
			"param_name" => "instagram",
			"value" => "",
			"description" => esc_html__("Enter the instagram Url", 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("RSS Url", 'amz-rigel-plugins'),
			"param_name" => "rss",
			"value" => "",
			"description" => esc_html__("Enter the rss Url", 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Github Url", 'amz-rigel-plugins'),
			"param_name" => "github",
			"value" => "",
			"description" => esc_html__("Enter the github Url", 'amz-rigel-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Youtube Url", 'amz-rigel-plugins'),
			"param_name" => "youtube",
			"value" => "",
			"description" => esc_html__("Enter the youtube Url", 'amz-rigel-plugins')
			),
		)
));


//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
	"name" => esc_html__("Lists", 'amz-rigel-plugins'),
	"base" => "list",
	"icon" => "icon-pixel8es",
	"category" => 'By Rigel', //category
    "as_parent" => array('only' => 'li'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    "content_element" => true,
    "show_settings_on_create" => false,
    "js_view" => 'VcColumnView'
    ) );

vc_map( array(
	"name" => esc_html__("List Item", 'amz-rigel-plugins'),
	"base" => "li",
	"icon" => "icon-pixel8es",
	"category" => 'By Rigel', //category
	"content_element" => true,
    "as_child" => array('only' => 'list'), // Use only|except attributes to limit parent (separate multiple values with comma)
    "params" => array(
        // add params same as with any other content element
    	array(
    		"type" => "icon",
    		"heading" => esc_html__("Insert Icon", 'amz-rigel-plugins'),
    		"param_name" => "icon_name",
    		"value" => '',
    		"description" => esc_html__("Choose icon if you to display icons before list", 'amz-rigel-plugins')
    		),

    	/*content*/
    	array(
    		"type" => "textarea",
    		"holder" => "li",
    		"class" => "",
    		"heading" => esc_html__("Content", 'amz-rigel-plugins'),
    		"param_name" => "content",
    		"value" => "Enter your list item text here",
    		"description" => esc_html__("Enter your list item content.", 'amz-rigel-plugins')
    		),

    	array(
    		"type" => "dropdown",
    		"heading" => esc_html__("Icon Color", 'amz-rigel-plugins'),
    		"param_name" => "icon_color",
    		"value" => array(esc_html__('black', 'amz-rigel-plugins') => "",  
    			esc_html__('Theme Primary Color', 'amz-rigel-plugins') => "color",
    			esc_html__('custom color', 'amz-rigel-plugins') => "custom"),
    		"description" => ''
    		),

    	array(
    		"type" => "colorpicker",
    		"class" => "",
    		"heading" => esc_html__("Text color", 'amz-rigel-plugins'),
    		"param_name" => "user_icon_color",
    		"value" => '', 
    		"description" => esc_html__("Choose text color", 'amz-rigel-plugins'),
    		"dependency" => Array('element' => "icon_color", 'value' => array('custom'))
    		),
    	)
) );
//Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortCode_list extends WPBakeryShortCodesContainer {
	}
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
	class WPBakeryShortCode_li extends WPBakeryShortCode {
	}
}

// Register Form Shortcode
vc_map( array(
	"name" => __("Register Form", 'amz-rigel-plugins'), //Title
	"base" => "register_form", //Shortcode name
	"class" => "",
	"icon" => "icon-pixel8es",
	"category" => 'By Rigel', //category
	"params" => array(

		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Form Title', 'amz-rigel-plugins' ),
			'param_name' => 'form_title',
			'value' => esc_html__( 'Register', 'amz-rigel-plugins' ),
			'description' => __( 'Type the form title', 'amz-rigel-plugins' )
		),

		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Button Text', 'amz-rigel-plugins' ),
			'param_name' => 'btn_txt',
			'value' => esc_html__( 'Submit', 'amz-rigel-plugins' ),
			'description' => __( 'Type the form button text', 'amz-rigel-plugins' )
		),
	)

) );