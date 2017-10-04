<?php
/*
 *  Post Types Inialization
 */
	
    global $smof_data;

    //Staff Options    
    $slug_staff = isset($smof_data['slug_staff']) ? esc_html(strtolower($smof_data['slug_staff'])) : 'staff';

	$staff_arr = array();
	$staff_tax_arr = array();   

	$staff_arr = array(
		'menu_icon' => 'dashicons-groups',
		'supports' => array('title','editor','thumbnail','page-attributes'),
		'rewrite' 	=> array(
			'slug' => $slug_staff
			),
		);
	$staff_tax_arr = array("Jobs"   => array('singular_name' => 'job','query_var' => 'staff_jobs'));

	$staff = new Amazee_Post_Type('Staffs', 'Staff', $staff_arr);
	$staff->taxonomies('Staffs', $staff_tax_arr);

    //Portfolio Options
    $slug_portfolio = isset($smof_data['slug_portfolio']) ? esc_html(strtolower($smof_data['slug_portfolio'])) : 'portfolio';

	$por_arr = array(
		'menu_icon' =>'dashicons-portfolio',
		'supports' => array('title','editor'),
		'rewrite' 	=> array(
			'slug' => $slug_portfolio
			),
		);
	$por_tax_arr = array("Categories"   => array('singular_name' => 'Category','query_var' => 'portfolio_cat'));

	$portfolio = new Amazee_Post_Type('Portfolio', 'Portfolio', $por_arr);
	$portfolio->taxonomies('Portfolio', $por_tax_arr);

    //Testimonial Options    
    $slug_testimonial = isset($smof_data['slug_testimonial']) ? esc_html(strtolower($smof_data['slug_testimonial'])) : 'testimonial';

	$testimonial_arr = array(
		'menu_icon' => 'dashicons-format-status',
		'supports' => array('title','editor','thumbnail'),
		'rewrite' 	=> array(
			'slug' => $slug_testimonial
			),
		'has_archive' => true
		);

	$testimonial_tax_arr = array("Client Jobs"   => array('singular_name' => 'client_job','query_var' => 'client_jobs'));

	$testimonial = new Amazee_Post_Type('Testimonial', 'testimonial', $testimonial_arr);
	$testimonial->taxonomies('Testimonial', $testimonial_tax_arr);


/*
 *  Manage Custom Post Type Columns
 */

//adding column to portfolio posts type
add_filter( 'manage_edit-pix_portfolio_columns', 'my_edit_pix_portfolio_columns' ) ;

function my_edit_pix_portfolio_columns( $columns ) {
	$columns = array(
		'cb'    => '<input type="checkbox" />',
		'title' => esc_html__( 'All Portfolio', 'amz-rigel-plugins' ),
		'id'    => esc_html__( 'Portfolio Id', 'amz-rigel-plugins' ),
		'thumb' => esc_html__( 'Portfolio Image', 'amz-rigel-plugins' ),
		'date'  => esc_html__( 'Date', 'amz-rigel-plugins' )
	);
	return $columns;
}

//adding column to portfolio posts type
add_action( 'manage_pix_portfolio_posts_custom_column', 'my_manage_portfolio_columns', 10, 2 );
function my_manage_portfolio_columns( $column, $post_id ) {
	global $post;
	switch( $column ) {
		case 'id' :		
			printf( $post_id );
		break;

		case 'thumb' :
			//Get Porfolio Image
			$post_details = get_post_meta($post_id,'portfolio_meta_value');
			if( !empty($post_details)){
				extract($post_details[0]);
			}
			$image = isset($portfolio_gallery) ? json_decode($portfolio_gallery) : '';

			if(!empty($image)){
				$image_thumb_url = wp_get_attachment_image_src( $image[0]->itemId, 'full');
				$img = aq_resize($image_thumb_url[0], 75 , 75, true, true);
				if($img){
					printf( '<img src="'.$img.'">' );
				}
			}
		break;

		default :
		break;
	}
}

//adding column to staffs posts type
add_filter( 'manage_edit-pix_staffs_columns', 'my_edit_pix_staffs_columns' ) ;

function my_edit_pix_staffs_columns( $columns ) {
	$columns = array(
		'cb'    => '<input type="checkbox" />',
		'title' => esc_html__( 'All Saffs', 'amz-rigel-plugins' ),
		'id'    => esc_html__( 'Staff Id', 'amz-rigel-plugins' ),
		'thumb' => esc_html__( 'Staff Image', 'amz-rigel-plugins' ),
		'date'  => esc_html__( 'Date', 'amz-rigel-plugins' )
	);
	return $columns;
}

add_action( 'manage_pix_staffs_posts_custom_column', 'my_manage_staffs_columns', 10, 2 );

function my_manage_staffs_columns( $column, $post_id ) {
	global $post;
	switch( $column ) {
		case 'id' :		
			printf( $post_id );
		break;

		case 'thumb' :
			//Get Staff Image
			if ( has_post_thumbnail() ) {
				$image_id = get_post_thumbnail_id ($post_id); 
				$image_thumb_url = wp_get_attachment_image_src( $image_id, 'full');
				$img = aq_resize($image_thumb_url[0], 75 , 75, true, true);
				if($img){
					printf( '<img src="'.$img.'">' );
				}
			}
		break;

		default :
		break;
	}
}

//adding column to testimonial posts type
add_filter( 'manage_edit-pix_testimonial_columns', 'my_edit_pix_testimonial_columns' ) ;

function my_edit_pix_testimonial_columns( $columns ) {
	$columns = array(
		'cb'    => '<input type="checkbox" />',
		'title' => esc_html__( 'All Testimonial', 'amz-rigel-plugins' ),
		'id'    => esc_html__( 'Testimonial Id', 'amz-rigel-plugins' ),
		'thumb' => esc_html__( 'Client Image', 'amz-rigel-plugins' ),
		'date'  => esc_html__( 'Date', 'amz-rigel-plugins' )
	);
	return $columns;
}

//adding values in th our custom columns
add_action( 'manage_pix_testimonial_posts_custom_column', 'my_manage_testimonial_columns', 10, 2 );
function my_manage_testimonial_columns( $column, $post_id ) {
	global $post;
	switch( $column ) {
		case 'id' :		
			printf( $post_id );
		break;

		case 'thumb' :
			//Get Staff Image
			if ( has_post_thumbnail() ) {
				$image_id = get_post_thumbnail_id ($post_id); 
				$image_thumb_url = wp_get_attachment_image_src( $image_id, 'full');
				$img = aq_resize($image_thumb_url[0], 75 , 75, true, true);
				if($img){
					printf( '<img src="'.$img.'">' );
				}
			}
			break;

		default :
		break;
	}
}