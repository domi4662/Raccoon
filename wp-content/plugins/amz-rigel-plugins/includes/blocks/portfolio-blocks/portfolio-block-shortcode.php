<?php
    /* =============================================================================
     Portfolio Blocks Shortcodes
     ========================================================================== */

    function composer_portfolio_blocks( $atts, $content = null, $code ){
        extract( shortcode_atts( array(
            'insert_type'         => 'posts',
            'exclude_portfolio'   => '',
            'filter'              => 'yes',
            'order_by'            => 'date', // 'none', ID', 'author' , 'title', 'name', 'date', 'modified', 'parent', 'rand', 'menu_order'
            'order'               => 'desc', //desc, asc
            'portfolio_id'        => '',
            'margin'              => '',
            'title_tag'           => 'h3',
            'pagination'          => 'none', // none, load_more, autoload, number, text
            'loadmore_text'       => esc_html__( 'Loadmore', 'amz-rigel-plugins' )
        ), $atts ) );

        // Empty assignment
        $output = $size = '';

        //Portfolio blocks class Initialised
        $portfolio_blocks = new portfolio_blocks();

        // Get number of items value
        $no_of_items = $portfolio_blocks->get_post_count( $code );

        // Set paged
        if( get_query_var( 'paged' ) ) {
            $paged = get_query_var( 'paged' );
        }
        elseif( get_query_var( 'page' ) ) {
            $paged = get_query_var( 'page' );
        }
        else{
            $paged = 1;
        }

        //Build id as array
        $post_in = array_filter( explode( ",", $portfolio_id ) );

        // Portfolio Arguements
        if( !empty( $exclude_portfolio ) ){
            $exclude_portfolio = explode( ',', $exclude_portfolio );
        }
        else{
            $exclude_portfolio = '';
        }

        //Query arguement for Insert type: Posts, Category, ID
        if( $insert_type == 'id' && !empty( $post_in ) ){
            $args = array( 
                'post_type'           => 'pix_portfolio',             
                'order'               => $order,
                'orderby'             => 'post__in',
                'posts_per_page'      => $no_of_items,
                'post__in'            => $post_in,
                'post__not_in'        => $exclude_portfolio,
                'ignore_sticky_posts' => 1,
                'paged'               => $paged, 
                'post_status'         => 'publish'
            );
        }
        else{
            $args = array(
                'post_type'           => 'pix_portfolio',
                'orderby'             => $order_by,
                'order'               => $order,
                'posts_per_page'      => $no_of_items,
                'post__not_in'        => $exclude_portfolio,
                'ignore_sticky_posts' => 1,
                'paged'               => $paged, 
                'post_status'         => 'publish'
            );
        }

        // Assign and call query
        $query = new WP_Query( $args );
        query_posts( $args );

        // Total Post
        $total_post = $query->post_count;

        // Portfolio Options
        $options = array();
        
        $options['filter']           = $filter;
        $options['title_tag']        = $title_tag;
        $options['margin']           = $margin;

        // Assign Post count
        $post_count = 1;

        if ( have_posts() ) : 

            $output = '<div class="loadmore-wrap no-portfolio-carousel">';

                $output .= $portfolio_blocks->filter( $options['filter'] );

                $output .= '<div class="wpb_row vc_row-fluid portfolio-block-container '. esc_attr( $margin ) .'">';

                    $output .= '<div class="load-container portfolio-contents">';

                        while ( have_posts() ) : the_post();

                            $id = get_the_ID();

                            // Get column class
                            $class = $portfolio_blocks->get_column_class( $code, $post_count );

                            $cat = '';
                            if( !empty( $terms ) ) {
                                foreach( $terms as $term ) {
                                    $cat .= ' ' . esc_attr( strtolower( str_replace( ' ','-', $term->name ) ) ) . ' '; 
                                }
                            }

                            $output .= '<div class="load-element '. esc_attr( $class ) .' '. esc_attr( $cat ) .' pix-portfolio-item">';

                                $output .= '<div class="portfolio-container">';

                                    // Image Size
                                    $thumb = $portfolio_blocks->get_image_thumb( $id, $code, $post_count );

                                     $inline_css = !empty( $thumb ) ? 'style="background-image: url('. esc_url( $thumb ) .');"' : '';

                                    $output .= '<div class="portfolio-img" '. $inline_css .'></div>';

                                    $output .=  '<div class="portfolio-hover">';
                    
                                        $output .= '<div class="portfolio-link">';
                                        
                                            $output .= '<a href="'. esc_url( get_permalink() ) .'" class="portfolio-content">';
                                                
                                                $output .= '<'. rigel_title_tag( $title_tag ) .' class="title">'. esc_html( get_the_title() ) .'</'. rigel_title_tag( $title_tag ) .'>';

                                                //terms
                                                $categories = get_the_term_list( $id, 'pix_categories','',', ' );
                                                $categories = !empty( $categories ) ? strip_tags( $categories ) : '';

                                                $output .= '<p>'. esc_html( $categories ) .'</p>';

                                            $output .= '</a>';

                                        $output .= '</div>'; // .portfolio-link

                                    $output .=  '</div>'; // .portfolio-hover

                                $output .= '</div>'; // portfolio-container

                            $output .= '</div>'; // element

                            $post_count++;
                        endwhile;
        
                    $output .= '</div>'; // portfolio-contents

                $output .= '</div>'; // portfolio-block-container

                // Portfolio Pagination
                if( empty( $offset ) ) {
                    // Values array
                    $values = array();

                    $values['style']         = $pagination;
                    $values['loadmore_text'] = $loadmore_text;
                    $values['action']        = 'portfolio_blocks_loadmore';
                    $values['code']          = $code;
                    $values['options']       = $options;
                    $values['total_post']    = $total_post;

                    $output .= $portfolio_blocks->pagination( $args, $values );
                }

            $output .= '</div>'; // no-portfolio-carousel

        else:
            $output .= '<div>'. esc_html__( 'No Portfolio Items Found.', 'composer' ) .'</div>';
        endif;

        wp_reset_query();
        return  $output;
    }

    add_shortcode( 'portfolio_block1', 'composer_portfolio_blocks' );
    add_shortcode( 'portfolio_block2', 'composer_portfolio_blocks' );
    add_shortcode( 'portfolio_block3', 'composer_portfolio_blocks' );
    add_shortcode( 'portfolio_block4', 'composer_portfolio_blocks' );
    add_shortcode( 'portfolio_block5', 'composer_portfolio_blocks' );
    add_shortcode( 'portfolio_block6', 'composer_portfolio_blocks' );
    add_shortcode( 'portfolio_block7', 'composer_portfolio_blocks' );
    add_shortcode( 'portfolio_block8', 'composer_portfolio_blocks' );
    add_shortcode( 'portfolio_block9', 'composer_portfolio_blocks' );
    add_shortcode( 'portfolio_block10', 'composer_portfolio_blocks' );
    add_shortcode( 'portfolio_block11', 'composer_portfolio_blocks' );
    add_shortcode( 'portfolio_block12', 'composer_portfolio_blocks' );
    add_shortcode( 'portfolio_block13', 'composer_portfolio_blocks' );