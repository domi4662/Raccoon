<?php

//Ajax loadmore option for portfolio
function rigel_load_portfolio(){

    //Get values from ajax
    $values = isset($_POST['values']) ? $_POST['values'] : '';
    $args = isset($_POST['args']) ? $_POST['args'] : '';

    //Set shortcodes values
    $portfolio_style = $values['portfolio_style'];
    $columns = $values['columns'];
    $title_tag = $values['title_tag'];

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
    else {
        if ( 'col3' == $columns ){
            $width = 640;
        }
        elseif( 'col2' == $columns ){
            $width = 960;
        }
        else {          
            $width = 480;
        }

        $height = NULL;
    }

    // Add next paged number in a query
    $args['paged'] = isset($_POST['paged']) ? $_POST['paged'] : 1;

    query_posts( $args );

    if ( have_posts() ) : 

        echo '<div class="ajax-posts-wrap">';
            echo '<div class="ajax-posts" data-paged="'. esc_attr( $args['paged'] ) .'">';

                while ( have_posts() ) : the_post();            

                    $id = get_the_ID();

                    $terms = get_the_terms( $id,'pix_categories' );

                    //Get Porfolio Image
                    $gallery_json = rigel_get_meta_value( $id, '_amz_gallery' );
                    $gallery = json_decode( $gallery_json, true );
                    $thumb = !empty( $gallery ) ? rigel_get_image_by_id( $width, $height, $gallery[0]['itemId'], 0, 1, 1 ) : '';

                    echo '<div class="load-element '. esc_attr( $class ) .' pix-portfolio-item element ';

                    if( !empty( $terms ) ) {
                        foreach( $terms as $term ) {
                            echo ' ' . esc_attr( strtolower( str_replace(' ','-', $term->name ) ) ) . ' '; 
                        }
                    }

                    echo '">';
                    

                        echo '<div class="portfolio-container">'; //portfolio Container

                            //terms
                            $pix_cats = get_the_term_list( $id, 'pix_categories','',', ' );
                            $pix_cats = !empty( $pix_cats ) ? strip_tags( $pix_cats ) : '';

                            
                            //portfolio Image
                            echo '<div class="portfolio-img">'. $thumb .'</div>';
                                    
                            echo    '<div class="portfolio-hover">';
                            
                                echo '<div class="portfolio-link">';
                                
                                    echo '<a href="'. esc_url( get_permalink() ) .'" class="portfolio-content">';
                                        
                                        echo '<'. rigel_title_tag( $title_tag ) .' class="title">'.esc_html( get_the_title() ).'</'. rigel_title_tag( $title_tag ) .'>';

                                        echo '<p>' . $pix_cats .'</p>';                             

                                    echo '</a>'; // .portfolio-content

                                echo '</div>'; // .portfolio-link

                            echo    '</div>'; // .portfolio-hover

                        echo '</div>'; // .portfolio-container

                    echo '</div>'; // .pix-portfolio-item
                endwhile;

            echo '</div>'; // .ajax-posts

        echo '</div>'; // .ajax-posts-wrap

    endif;
   
    wp_reset_query();

    die();
    
}

// ajax functions
add_action('wp_ajax_rigel_load_portfolio',  'rigel_load_portfolio');
add_action('wp_ajax_nopriv_rigel_load_portfolio', 'rigel_load_portfolio');


function rigel_blog_loadmore(){

    // Get ajax values
    $args = isset($_POST['args']) ? $_POST['args'] : '';
    $values = isset($_POST['values']) ? $_POST['values'] : '';

    // Add next paged number in a query
    $args['paged'] = isset($_POST['paged']) ? $_POST['paged'] : 1;

    query_posts( $args );

    if ( have_posts() ) :

        $post_count = 1;
        echo '<div class="ajax-posts-wrap">';
            echo '<div class="ajax-posts" data-paged="'. esc_attr( $args['paged'] ) .'">';

                while ( have_posts() ) : the_post();

                    get_template_part( 'blog/blog', 'content' );

                endwhile;
            echo '</div>';
        echo '</div>';
    endif;

    wp_reset_query();

    die();
}

// ajax functions
add_action('wp_ajax_rigel_blog_loadmore',  'rigel_blog_loadmore');
add_action('wp_ajax_nopriv_rigel_blog_loadmore', 'rigel_blog_loadmore');

//Ajax loadmore option for testimonial
function rigel_load_testimonial(){

    // Get ajax values
    $args = isset($_POST['args']) ? $_POST['args'] : '';
    $values = isset($_POST['values']) ? $_POST['values'] : '';

    // Save values as separate variables
    $limit = $values['excerpt_length'];

    // Add next paged number in a query
    $args['paged'] = isset($_POST['paged']) ? $_POST['paged'] : 1;

    query_posts( $args );

    if ( have_posts() ) : while ( have_posts() ) : the_post();          

        if( !empty( $limit ) ){
            $content = rigel_shorten_text( get_the_excerpt(), $limit );
        }
        else{
            $content = get_the_excerpt(); //content
        }       

        echo '<div class="load-element testimonial overflow-no">';

            if ( has_post_thumbnail() ) {    
                echo '<div class="testimonial-img">';
                    echo rigel_featured_thumbnail( 60, 60, 0, 0, 1 );
                echo '</div>';
            }               

            echo '<div class="testimonial-container">';

                echo '<div class="content"><p><span class="para">'. esc_html( $content ) .'</span></p>';

                    echo '<div class="testimonial-author">';

                        echo '<p class="pix-author-name">'. esc_html( get_the_title() ) .'</p>';

                        //Get testimonial category and set as author job
                        $testimonial_cat = get_the_terms( get_the_ID(), 'pix_client_jobs' );

                        if( !empty( $testimonial_cat ) ) {
                            echo '<p class="pix-author-job">'.esc_html( $testimonial_cat[0]->name ).'</p>';
                        }

                    echo '</div>';

                echo '</div>';

            echo '</div>';
        echo '</div>';

    endwhile; 

    endif;

    wp_reset_query();

    die();
    
}

// ajax functions
add_action('wp_ajax_rigel_load_testimonial',  'rigel_load_testimonial');
add_action('wp_ajax_nopriv_rigel_load_testimonial', 'rigel_load_testimonial');
