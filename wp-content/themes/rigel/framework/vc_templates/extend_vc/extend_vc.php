<?php 
//Animation
$animation = array( 'fadeIn','flash','bounce','shake','tada','swing','wobble','pulse','flip','flipInX','flipInY','fadeInUp','fadeInDown','fadeInLeft','fadeInRight','fadeInUpBig','fadeInDownBig','fadeInLeftBig','fadeInRightBig','slideInDown','slideInLeft','slideInRight','zoomIn','zoomInUp','zoomInDown','zoomInLeft','zoomInRight','bounceIn','bounceInUp','bounceInDown','bounceInLeft','bounceInRight','rotateIn','rotateInDownLeft','rotateInDownRight','rotateInUpLeft','rotateInUpRight','lightSpeedIn','hinge','rollIn' );

$slider_animation_in = array(
	esc_html__( 'None', 'rigel' )              =>    'false',
	esc_html__( 'fadeIn', 'rigel' )            =>   'fadeIn',
	esc_html__( 'flash', 'rigel' )             =>   'flash',
	esc_html__( 'bounce', 'rigel' )            =>   'bounce',
	esc_html__( 'shake', 'rigel' )             =>   'shake',
	esc_html__( 'tada', 'rigel' )              =>   'tada',
	esc_html__( 'swing', 'rigel' )             =>   'swing',
	esc_html__( 'wobble', 'rigel' )            =>   'wobble',
	esc_html__( 'pulse', 'rigel' )             =>   'pulse',
	esc_html__( 'flip', 'rigel' )              =>   'flip',
	esc_html__( 'flipInX', 'rigel' )           =>   'flipInX',
	esc_html__( 'flipInY', 'rigel' )           =>   'flipInY',
	esc_html__( 'fadeInUp', 'rigel' )          =>   'fadeInUp',
	esc_html__( 'fadeInDown', 'rigel' )        =>   'fadeInDown',
	esc_html__( 'fadeInLeft', 'rigel' )        =>   'fadeInLeft',
	esc_html__( 'fadeInRight', 'rigel' )       =>   'fadeInRight',
	esc_html__( 'fadeInUpBig', 'rigel' )       =>   'fadeInUpBig',
	esc_html__( 'fadeInDownBig', 'rigel' )     =>   'fadeInDownBig',
	esc_html__( 'fadeInLeftBig', 'rigel' )     =>   'fadeInLeftBig',
	esc_html__( 'fadeInRightBig', 'rigel' )    =>   'fadeInRightBig',
	esc_html__( 'slideInDown', 'rigel' )       =>   'slideInDown',
	esc_html__( 'slideInLeft', 'rigel' )       =>   'slideInLeft',
	esc_html__( 'slideInRight', 'rigel' )      =>   'slideInRight',
	esc_html__( 'zoomIn', 'rigel' )            =>   'zoomIn',
	esc_html__( 'zoomInUp', 'rigel' )          =>   'zoomInUp',
	esc_html__( 'zoomInDown', 'rigel' )        =>   'zoomInDown',
	esc_html__( 'zoomInLeft', 'rigel' )        =>   'zoomInLeft',
	esc_html__( 'zoomInRight', 'rigel' )       =>   'zoomInRight',
	esc_html__( 'bounceIn', 'rigel' )          =>   'bounceIn',
	esc_html__( 'bounceInUp', 'rigel' )        =>   'bounceInUp',
	esc_html__( 'bounceInDown', 'rigel' )      =>   'bounceInDown',
	esc_html__( 'bounceInLeft', 'rigel' )      =>   'bounceInLeft',
	esc_html__( 'bounceInRight', 'rigel' )     =>   'rotateIn',
	esc_html__( 'rotateIn', 'rigel' )          =>   'rotateIn',
	esc_html__( 'rotateInDownLeft', 'rigel' )  =>   'rotateInDownLeft',
	esc_html__( 'rotateInDownRight', 'rigel' ) =>   'rotateInDownRight',
	esc_html__( 'rotateInUpLeft', 'rigel' )    =>   'rotateInUpLeft',
	esc_html__( 'rotateInUpRight', 'rigel' )   =>   'rotateInUpRight',
	esc_html__( 'lightSpeedIn', 'rigel' )      =>   'lightSpeedIn',
	esc_html__( 'hinge', 'rigel' )             =>   'hinge',
	esc_html__( 'rollIn', 'rigel' )            =>   'rollIn'
);

$slider_animation_out = array(
	esc_html__( 'None', 'rigel' )               =>    'false',
	esc_html__( 'fadeOut', 'rigel' )            =>    'fadeOut',
	esc_html__( 'flipOutX', 'rigel' )           =>    'flipOutX',
	esc_html__( 'flipOutY', 'rigel' )           =>    'flipOutY',
	esc_html__( 'fadeOutUp', 'rigel' )          =>    'fadeOutUp',
	esc_html__( 'fadeOutDown', 'rigel' )        =>   'fadeOutDown',
	esc_html__( 'fadeOutLeft', 'rigel' )        =>   'fadeOutLeft',
	esc_html__( 'fadeOutRight', 'rigel' )       =>   'fadeOutRight',
	esc_html__( 'fadeOutUpBig', 'rigel' )       =>   'fadeOutUpBig',
	esc_html__( 'fadeOutDownBig', 'rigel' )     =>   'fadeOutDownBig',
	esc_html__( 'fadeOutLeftBig', 'rigel' )     =>   'fadeOutLeftBig',
	esc_html__( 'fadeOutRightBig', 'rigel' )    =>   'fadeOutRightBig',
	esc_html__( 'slideOutDown', 'rigel' )       =>   'slideOutDown',
	esc_html__( 'slideOutLeft', 'rigel' )       =>   'slideOutLeft',
	esc_html__( 'slideOutRight', 'rigel' )      =>   'slideOutRight',
	esc_html__( 'zoomOut', 'rigel' )            =>   'zoomOut',
	esc_html__( 'zoomOutUp', 'rigel' )          =>   'zoomOutUp',
	esc_html__( 'zoomOutDown', 'rigel' )        =>   'zoomOutDown',
	esc_html__( 'zoomOutLeft', 'rigel' )        =>   'zoomOutLeft',
	esc_html__( 'zoomOutRight', 'rigel' )       =>   'zoomOutRight',
	esc_html__( 'bounceOut', 'rigel' )          =>   'bounceOut',
	esc_html__( 'bounceOutUp', 'rigel' )        =>   'bounceOutUp',
	esc_html__( 'bounceOutDown', 'rigel' )      =>   'bounceOutDown',
	esc_html__( 'bounceOutLeft', 'rigel' )      =>   'bounceOutLeft',
	esc_html__( 'bounceOutRight', 'rigel' )     =>   'bounceOutRight',
	esc_html__( 'rotateOut', 'rigel' )          =>   'rotateOut',
	esc_html__( 'rotateOutDownLeft', 'rigel' )  =>   'rotateOutDownLeft',
	esc_html__( 'rotateOutDownRight', 'rigel' ) =>   'rotateOutDownRight',
	esc_html__( 'rotateOutUpLeft', 'rigel' )    =>   'rotateOutUpLeft',
	esc_html__( 'rotateOutUpRight', 'rigel' )   =>   'rotateOutUpRight',
	esc_html__( 'lightSpeedOut', 'rigel' )      =>   'lightSpeedOut',
	esc_html__( 'rollOut', 'rigel' )            =>   'rollOut'
);

$theme_default = '#00a9d1';

// VC Row
vc_add_param( 'vc_row', array(
	"type" => 'dropdown',
	"class" => '',
	"heading" => esc_html__( 'Text Color', 'rigel' ),
	"param_name" => 'color_style',
	"value" => array(
		esc_html__( 'Default', 'rigel' ) => '',
		esc_html__( 'White', 'rigel' ) => 'light'
	),
	"description" => esc_html__( 'Choose the font color you want to apply. <br> Alternatively you can choose your own color at the top of this section', 'rigel' ),
));

// VC Columns
vc_add_param( 'vc_column', array(
	'type' => 'checkbox',
	'heading' => esc_html__( 'Set Column height row', 'rigel' ),
	'param_name' => 'set_column_height',
	'description' => esc_html__( 'If checked column you can set column height.', 'rigel' ),
	'value' => array( esc_html__( 'Yes', 'rigel' ) => 'yes' )
));

vc_add_param( 'vc_column', array(
	"type" => 'textfield',
	"heading" => esc_html__( 'Column Height', 'rigel' ),
	"param_name" => 'column_height',
	"value" => '',
	"description" => esc_html__( 'Enter the column height in px ( EX: 600px ).', 'rigel' ),
	"dependency" => array( 'element' => 'set_column_height', 'not_empty' => true )
));

vc_add_param( 'vc_column', array(
	"type" => 'dropdown',
	"class" => '',
	"heading" => esc_html__( 'Text Color', 'rigel' ),
	"param_name" => 'color_style',
	"value" => array(
		esc_html__( 'Default', 'rigel' ) => '',
		esc_html__( 'White', 'rigel' ) => 'light'
	),
	"description" => esc_html__('Choose the font color you want to apply.', 'rigel'),
	'weight' => 1
));

vc_add_param( 'vc_column', array(
	'type' => 'dropdown',
	'heading' => esc_html__( 'Content position', 'rigel' ),
	'param_name' => 'content_placement',
	'value' => array(
		esc_html__( 'Middle', 'rigel' ) => 'middle',
		esc_html__( 'Top', 'rigel' ) => 'top',
	),
	'description' => esc_html__( 'Select content position within row.', 'rigel' ),
	'dependency' => array(
		'element' => 'set_column_height',
		'not_empty' => true,
	),
));

vc_add_param( 'vc_column', array(
	"type"                       => 'dropdown',
	"heading"                    => esc_html__( 'Box Animation', 'rigel' ),
	"param_name"                 => 'animate',
	"value"                      => array(
		esc_html__( 'No', 'rigel' )  => 'no', 
		esc_html__( 'Yes', 'rigel' ) => 'yes'
	),
	"description"                => esc_html__( 'Do you like to animate this Column', 'rigel' ),
	"group"                      => esc_html__( 'Animate', 'rigel' )
));

vc_add_param( 'vc_column', array(
	"type"        => 'dropdown',
	"heading"     => esc_html__( 'Animation Transition', 'rigel' ),
	"param_name"  => 'transition',
	"value"       => $animation,
	"description" => esc_html__( 'Choose Animation Transition.', 'rigel' ),
	"dependency"  => array( 'element' => 'animate', 'value' => array( 'yes' ) ),
	"group"       => esc_html__( 'Animate', 'rigel' )
));

vc_add_param( 'vc_column', array(
   "type" => 'textfield',
   "heading" => esc_html__( 'Animation Duration', 'rigel' ),
   "param_name" => 'duration',
   "value" => '',
   "description" => esc_html__( 'Enter the Duration (Ex: 500ms or 1s). Leave it empty to apply default', 'rigel' ),
   "dependency" => array( 'element' => 'animate', 'value' => array( 'yes' ) ),
   "group"        => esc_html__( 'Animate', 'rigel' )
));

vc_add_param( 'vc_column', array(
	"type"        => 'textfield',
	"heading"     => esc_html__( 'Animation Delay', 'rigel' ),
	"param_name"  => 'delay',
	"value"       => '',
	"description" => esc_html__( 'Enter the Delay (Ex: 100ms or 1s). Leave it empty to apply default', 'rigel' ),
	"dependency"  => array( 'element' => 'animate', 'value' => array( 'yes' ) ),
	"group"       => esc_html__( 'Animate', 'rigel' )
));

// VC Accordion
vc_add_param( 'vc_accordion', array(
	"type"       => 'dropdown',
	"class"      => '',
	"heading"    => esc_html__( 'Accordion Style', 'rigel' ),
	"param_name" => 'style',
	"value"      => array(
		esc_html__( 'Default', 'rigel' ) => 'default border',
		esc_html__( 'Style 2', 'rigel' ) => 'default border border-background',
		esc_html__( 'Style 3', 'rigel' ) => 'default',
		esc_html__( 'Style 4', 'rigel' ) => 'default background'
	),
	"description" => ''
));

// VC Tabs
vc_add_param( 'vc_tabs', array(
	"type"       => 'dropdown',
	"class"      => '',
	"heading"    => esc_html__( 'Tabs Style', 'rigel' ),
	"param_name" => 'style',
	"value"      => array(
		esc_html__( 'Default', 'rigel' )            => 'default',
		esc_html__( 'Default Background', 'rigel' ) => 'default style2',
		esc_html__( 'Background Color', 'rigel' )   => 'default style3',
		esc_html__( 'Color Highlight', 'rigel' )    => 'default style3 style4'
	),
	"description" => ''
));

vc_add_param( 'vc_tabs', array(
	"type"       => 'dropdown',
	"class"      => '',
	"heading"    => esc_html__( 'Tabs Alignment', 'rigel' ),
	"param_name" => 'align',
	"value"      => array(
		esc_html__( 'Left', 'rigel' )   => 'default',
		esc_html__( 'Right', 'rigel' )  => 'right-align',
		esc_html__( 'Center', 'rigel' ) => 'center-align'
	),
	"description" => '',
));

vc_add_param( 'vc_tabs', array(
	"type"       => 'dropdown',
	"class"      => '',
	"heading"    => esc_html__( 'Tabs Nav View', 'rigel' ),
	"param_name" => 'side',
	"value"      => array(
		esc_html__( 'Top', 'rigel' )    => 'default',
		esc_html__( 'Left', 'rigel' )   => 'tabs-left',
		esc_html__('Right', 'rigel' )   => 'tabs-left tabs-right',
		esc_html__( 'Bottom', 'rigel' ) => 'tabs-bottom'
	),
	"description" => '',
));

vc_add_param( 'vc_tab', array(
	"type"        => 'icon',
	"class"       => '',
	"heading"     => esc_html__( 'Insert Icon', 'rigel' ),
	"param_name"  => 'icon_name',
	"value"       => '',
	"description" => esc_html__( 'Insert an icon for tab.', 'rigel' )
));
