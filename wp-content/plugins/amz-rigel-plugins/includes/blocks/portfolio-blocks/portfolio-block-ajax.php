<?php

    function portfolio_blocks_loadmore(){

        // Empty assignment
        $output = '';

        // Portfolio blocks class Initialised
        $portfolio_blocks = new portfolio_blocks();

        // Get ajax values
        $args = isset($_POST['args']) ? $_POST['args'] : '';
        $values = isset($_POST['values']) ? $_POST['values'] : '';
        $options = $values['options'];

        // Add next paged number in a query
        $args['paged'] = isset($_POST['paged']) ? $_POST['paged'] : 1;

        var_dump($args);

        //Assign and call query
        $query = new WP_Query( $args );
        query_posts( $args );

        if ( have_posts() ) :
            $post_count = 1;
            echo '<div class="ajax-posts-wrap">';
            echo '<div class="ajax-posts" data-paged="'. esc_attr( $args['paged'] ) .'">';

                while ( have_posts() ) : the_post();

                    $id = get_the_ID();

                    // Get column class
                    $class = $portfolio_blocks->get_column_class( $values['code'], $post_count );

                    $cat = '';
                    if( !empty( $terms ) ) {
                        foreach( $terms as $term ) {
                            $cat .= ' ' . esc_attr( strtolower( str_replace( ' ','-', $term->name ) ) ) . ' '; 
                        }
                    }

                    echo '<div class="load-element '. esc_attr( $class ) .' '. esc_attr( $cat ) .' pix-portfolio-item">';

                        echo '<div class="portfolio-container">';

                            // Image Size
                            $thumb = $portfolio_blocks->get_image_thumb( $id, $values['code'], $post_count );

                             $inline_css = !empty( $thumb ) ? 'style="background-image: url('. esc_url( $thumb ) .');"' : '';

                            echo '<div class="portfolio-img" '. $inline_css .'></div>';

                            echo  '<div class="portfolio-hover">';
            
                                echo '<div class="portfolio-link">';
                                
                                    echo '<a href="'. esc_url( get_permalink() ) .'" class="portfolio-content">';
                                        
                                        echo '<'. rigel_title_tag( $options['title_tag'] ) .' class="title">'. esc_html( get_the_title() ) .'</'. rigel_title_tag( $options['title_tag'] ) .'>';

                                        //terms
                                        $categories = get_the_term_list( $id, 'pix_categories','',', ' );
                                        $categories = !empty( $categories ) ? strip_tags( $categories ) : '';

                                        echo '<p>'. esc_html( $categories ) .'</p>';

                                    echo '</a>';

                                echo '</div>'; // .portfolio-link

                            echo  '</div>'; // .portfolio-hover

                        echo '</div>'; // portfolio-container

                    echo '</div>'; // element

                $post_count++; endwhile;

            echo '</div>';
            echo '</div>';
        else:
            echo '<div>'. esc_html__('Portfolio Not Found.', 'composer'). '</div>';
        endif;

        wp_reset_query();

        die();
    }

    // ajax functions
    add_action('wp_ajax_portfolio_blocks_loadmore',  'portfolio_blocks_loadmore' );
    add_action('wp_ajax_nopriv_portfolio_blocks_loadmore', 'portfolio_blocks_loadmore' );