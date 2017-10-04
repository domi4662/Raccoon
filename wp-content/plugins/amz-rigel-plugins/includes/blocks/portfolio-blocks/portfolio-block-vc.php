<?php
    /* =============================================================================
     Portfolio Blocks Extend Vc
     ========================================================================== */

	$block = array(
		'portfolio_block1'  => esc_html__( 'Portfolio Block 1', 'composer' ),
		'portfolio_block2'  => esc_html__( 'Portfolio Block 2', 'composer' ),
		'portfolio_block3'  => esc_html__( 'Portfolio Block 3', 'composer' ),
		'portfolio_block4'  => esc_html__( 'Portfolio Block 4', 'composer' ),
		'portfolio_block5'  => esc_html__( 'Portfolio Block 5', 'composer' ),
		'portfolio_block6'  => esc_html__( 'Portfolio Block 6', 'composer' ),
		'portfolio_block7'  => esc_html__( 'Portfolio Block 7', 'composer' ),
		'portfolio_block8'  => esc_html__( 'Portfolio Block 8', 'composer' ),
		'portfolio_block9'  => esc_html__( 'Portfolio Block 9', 'composer' ),
		'portfolio_block10' => esc_html__( 'Portfolio Block 10', 'composer' ),
		'portfolio_block11' => esc_html__( 'Portfolio Block 11', 'composer' ),
		'portfolio_block12' => esc_html__( 'Portfolio Block 12', 'composer' )
	);
	foreach ( $block as $key => $value ) {

		if( 'portfolio_block1' == $key ) {

			// Icon class for individual vc items
			$icon = 'icon-portfolio-block1';
		}
		elseif( 'portfolio_block2' == $key ) {

			// Icon class for individual vc items
			$icon = 'icon-portfolio-block2';
		}
		elseif( 'portfolio_block3' == $key ) {

			// Icon class for individual vc items
			$icon = 'icon-portfolio-block3';
		}
		elseif( 'portfolio_block4' == $key ) {

			// Icon class for individual vc items
			$icon = 'icon-portfolio-block4';
		}
		elseif( 'portfolio_block5' == $key ) {

			// Icon class for individual vc items
			$icon = 'icon-portfolio-block5';
		}
		elseif( 'portfolio_block6' == $key ) {

			// Icon class for individual vc items
			$icon = 'icon-portfolio-block6';
		}
		elseif( 'portfolio_block7' == $key ) {

			// Icon class for individual vc items
			$icon = 'icon-portfolio-block7';
		}
		elseif( 'portfolio_block8' == $key ) {

			// Icon class for individual vc items
			$icon = 'icon-portfolio-block8';
		}
		elseif( 'portfolio_block9' == $key ) {

			// Icon class for individual vc items
			$icon = 'icon-portfolio-block9';
		}
		elseif( 'portfolio_block10' == $key ) {

			// Icon class for individual vc items
			$icon = 'icon-portfolio-block10';
		}
		elseif( 'portfolio_block11' == $key ) {

			// Icon class for individual vc items
			$icon = 'icon-portfolio-block11';
		}
		elseif( 'portfolio_block12' == $key ) {

			// Icon class for individual vc items
			$icon = 'icon-portfolio-block12';
		}

		// Portfolio Block
		vc_map( array(
			'name' => $value, //Title
			'base' => $key, //Shortcode name
			'class' => 'blocks',
			'icon' => $icon,
			'category' => 'Portfolio Blocks', //category
			'params' => array(

				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Insert Portfolio By', 'composer'),
					'param_name' => 'insert_type',
					'value' => array(
						esc_html__('Posts', 'composer') => 'posts', 
						esc_html__('Id', 'composer') => 'id'
					),
					'description' => ''
				),

				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Show Filter', 'composer'),
					'param_name' => 'filter',
					'value' => array(
						esc_html__( 'Yes', 'composer' ) => 'yes',  
						esc_html__( 'No', 'composer' ) => 'no'
					),
					'description' => esc_html__( 'Do you want to display filter', 'composer' )
				),

				array(
					'type' => 'dropdown',
					'heading' => esc_html__('HTML Tag for portfolio Name', 'composer'),
					'param_name' => 'title_tag',
					'value' => array('h2','h3','h4','h5','h6','h1' ),
					'description' => esc_html__('Choose which html tag you want use for portfolio name.', 'composer')
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__('Id', 'composer'),
					'param_name' => 'portfolio_id',
					'value' => '',
					'description' => esc_html__( 'Enter the portfolio ids seperated by commas (,). Example: 2,54,8', 'composer' ),
					'dependency' => array( 'element' => 'insert_type', 'value' => 'id' ),
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__('Exclude Portfolio', 'composer'),
					'param_name' => 'exclude_portfolio',
					'value' => '',
					'description' => esc_html__('Enter the portfolio id you don\'t want to display. Divide id with comma (,).', 'composer')
				),

				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Order By', 'composer'),
					'param_name' => 'order_by',
					'value' => array(
						esc_html__('Date Modified', 'composer') => 'modified',
						esc_html__('Date', 'composer') => 'date',  
						esc_html__('Rand', 'composer') => 'rand',
						esc_html__('ID', 'composer') => 'ID', 
						esc_html__('Title', 'composer') => 'title', 
						esc_html__('Author', 'composer') => 'author',
						esc_html__('Name', 'composer') => 'name',
						esc_html__('Parent', 'composer') => 'parent',							  
						esc_html__('Menu Order', 'composer') => 'menu_order',
						esc_html__('None', 'composer') => 'none'
					),
					'dependency' => array('element' => 'insert_type', 'value' => 'posts'),
					'description' => esc_html__('Order posts By choosen order', 'composer')
				),

				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Order', 'composer'),
					'param_name' => 'order',
					'value' => array(
						esc_html__( 'Descending order', 'composer') => 'DESC', 
						esc_html__( 'Ascending order', 'composer' ) => 'ASC'
					),
					'dependency' => array( 'element' => 'insert_type', 'value' => 'posts' ),
					'description' => ''
				),

				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Enable Space in columns?', 'composer' ),
					'param_name' => 'margin',
					'value' => array(
						esc_html__( 'No', 'composer' ) => '',  
						esc_html__( 'Yes', 'composer' ) => 'margin-yes'
					),
					'description' => esc_html__( 'Choose Yes to enable Space ( margin inbetween columns ) ', 'composer')
				),

				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Pagination', 'composer'),
					'param_name' => 'pagination',
					'value' => array(
						esc_html__('None', 'composer')      => 'none',
						esc_html__('Load More', 'composer') => 'load_more',
						esc_html__('Autoload', 'composer')  => 'autoload',
						esc_html__('Number', 'composer')    => 'number',
						esc_html__('Text', 'composer')      => 'text'
					),
					'description' => '',
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__('Load More Text', 'composer'),
					'param_name' => 'loadmore_text',
					'value' => esc_html__( 'Load More', 'composer' ),
					'description' => esc_html__('Enter the load more text', 'composer'),
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__('All Post Loaded Text', 'composer'),
					'param_name' => 'allpost_loaded_text',
					'value' => esc_html__( 'All Portfolio Loaded', 'composer' ),
					'description' => esc_html__('Enter the all post loaded text', 'composer'),
				)
			)
		) );
	}
    