<?php
    /* =============================================================================
     Gallery Blocks Shortcodes
     ========================================================================== */

    function composer_gallery_blocks( $atts, $content = null, $code ){
        extract( shortcode_atts( array(
            'margin'        => 'margin-no', // margin-no, margin-yes
            'image_id'      => ''
        ), $atts ) );

        // Empty assignment
        $output = $size = '';

        //Gallery blocks class Initialised
        $gallery_blocks = new gallery_blocks();

        // Portfolio Options
        $options = array();

        $options['margin']      = $margin;
        $options['image_id']    = $image_id;

        $image_id_array = !empty( $image_id ) ? explode( ',', $image_id ) : '';

        // Get number of items value
        $no_of_items = $gallery_blocks->get_post_count( $code );

        // Assign item count
        $post_count = 1; $image_count = 0;

        if( !empty( $image_id_array ) && is_array( $image_id_array ) ) {

            // Get ry items count
            $total_post = count( $image_id_array );

            $output .= '<div class="gallery-block-wrap">';

                $output .= '<div class="wpb_row vc_row-fluid gallery-block-container">';

                    $output .= '<div class="gallery-contents '. esc_attr( $margin ) .'">';

                        foreach ( $image_id_array as $key => $id ) {

                            if( $post_count > $no_of_items ) {
                                $post_count = 1;
                            }

                            // Get column class for items
                            $class = $gallery_blocks->get_column_class( $code, $post_count );

                            // Set current image id
                            $options['current_image_id'] = $id;
                            $options['image_count'] = $image_count;

                            $output .= '<div class="load-element pix-portfolio-item '. esc_attr( $class ) .'">';

                                $output .= '<div class="portfolio-container">';

                                    // Image Size
                                    $thumb = $gallery_blocks->get_image_thumb( $id, $code, $post_count );

                                    $inline_css = !empty( $thumb ) ? 'style="background-image: url('. esc_url( $thumb ) .');"' : '';

                                    $output .= '<div class="portfolio-img" '. $inline_css .'></div>';

                                $output .= '</div>'; // portfolio-container

                            $output .= '</div>'; // element

                            // Increment post count
                            $post_count++; $image_count++;
                        }

                    $output .= '</div>'; // gallery-contents
                $output .= '</div>'; // gallery-block-container

            $output .= '</div>'; // gallery-block-wrap
        }

        return  $output;
    }

    add_shortcode( 'gallery_block1', 'composer_gallery_blocks' );
    add_shortcode( 'gallery_block2', 'composer_gallery_blocks' );
    add_shortcode( 'gallery_block3', 'composer_gallery_blocks' );
    add_shortcode( 'gallery_block4', 'composer_gallery_blocks' );
    add_shortcode( 'gallery_block5', 'composer_gallery_blocks' );
    add_shortcode( 'gallery_block6', 'composer_gallery_blocks' );
    add_shortcode( 'gallery_block7', 'composer_gallery_blocks' );
    add_shortcode( 'gallery_block8', 'composer_gallery_blocks' );
    add_shortcode( 'gallery_block9', 'composer_gallery_blocks' );
    add_shortcode( 'gallery_block10', 'composer_gallery_blocks' );
    add_shortcode( 'gallery_block11', 'composer_gallery_blocks' );
    add_shortcode( 'gallery_block12', 'composer_gallery_blocks' );