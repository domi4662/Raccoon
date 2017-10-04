<?php 

get_header();

$rigel_prefix = rigel_get_prefix();

?>

<div id="primary" class="content-area single-portfolio">
        
    <main id="main" class="site-main container" role="main">

        <?php
            if ( have_posts() ) : while ( have_posts() ) : the_post();

                $rigel_id = get_the_ID();

                $rigel_auto_slide = rigel_get_meta_value( $rigel_id, '_amz_auto_slide', 'false' );

                //Set image width and height
                $rigel_width = 635;
                $rigel_height = 475;

                //Set post details as variables
                $rigel_post_title = get_the_title();
                $rigel_post_url = get_permalink();               
       
                echo '<div class="portfolio-container row">';

                    //Post image values
                    $rigel_single_portfolio_style = rigel_get_meta_value( $rigel_id, '_amz_single_portfolio_style', 'gallery' );

                    $rigel_gallery = rigel_get_meta_value( $rigel_id, '_amz_gallery' );
                    $rigel_gallery = !empty( $rigel_gallery ) ? json_decode( $rigel_gallery ) : '';

                    $rigel_video = rigel_get_meta_value( $rigel_id, '_amz_video' );

                    echo '<div class="portfolio-image col-md-7">';

                        if( 'gallery' == $rigel_single_portfolio_style ) {
                            if( !empty( $rigel_gallery ) ) {

                                $class = count( $rigel_gallery ) > 1 ? 'owl-carousel' : '';

                                echo '<div class="'. esc_attr( $class ) .' arrow-style2" data-items="1" data-auto-play="'. esc_attr( $rigel_auto_slide ) .'" data-nav="true" data-dots="false">';
                                    foreach ( $rigel_gallery as $key => $image ) {
                                        echo '<div>';
                                            echo rigel_get_image_by_id( $rigel_width, $rigel_height, $image->itemId, 0, 0, 1 );
                                        echo '</div>';
                                    }

                                echo '</div>';   
                            }
                            else {
                                $rigel_protocol = is_ssl() ? 'https' : 'http';
                                echo '<div>';
                                    echo '<img src="'.$rigel_protocol.'://placehold.it/'.$rigel_width.'x'.$rigel_height.'" alt="">';
                                echo '</div>';
                            }
                        }
                        else if( 'video' == $rigel_single_portfolio_style ) {
                            if( !empty( $rigel_video ) ) {
                                $rigel_video = htmlspecialchars_decode( $rigel_video );
                                $rigel_vid_arr = json_decode( $rigel_video, true );

                                $rigel_vid_sc = '';
                                $rigel_vid_sc .= '[video ';
                                foreach( $rigel_vid_arr as $rigel_vid ){
                                    $rigel_vid_sc .= $rigel_vid['format'] . '="' . esc_url( $rigel_vid['url'] ) . '" ';
                                }
                                $rigel_vid_sc .= ']';

                                echo '<div class="post-video-normal video">'.do_shortcode( $rigel_vid_sc ).'</div>';
                            }
                        }
                        
                    echo '</div>'; // portfolio-image

                    echo '<div class="portfolio-details col-md-5">';
                        echo '<h2 class="main-title uppercase">'. esc_html( $rigel_post_title) .'</h2>';

                        $rigel_terms = get_the_term_list( get_the_id(), 'pix_categories',' ','&ensp;/&ensp;' );
                        if( !empty( $rigel_terms ) ) { 
                            echo '<p class="sub-title pix-port-cats">' . esc_html( strip_tags( $rigel_terms ) ) . '</p>';
                        }
                        echo '<span class="line"></span>';
                        echo '<div class="portfolio-content">';
                        the_content();
                        echo '</div>';
                        echo '<span class="line sz-sm"></span>';

                        //Get portfolio meta title from Theme Options
                        $rigel_client_title = rigel_get_option_value( $rigel_prefix.'client_title', esc_html__('Client:', 'rigel') );

                        $rigel_task_title = rigel_get_option_value( $rigel_prefix.'task_title', esc_html__('Tasks:', 'rigel') );
                        $rigel_date = rigel_get_option_value( $rigel_prefix.'date', 1 );
                        $rigel_date_title = rigel_get_option_value( $rigel_prefix.'date_title', esc_html__('Date:', 'rigel') );

                        echo '<div class="meta row">';

                            $rigel_client_name = rigel_get_meta_value( $rigel_id, '_amz_client_name', '' );
                            if( !empty( $rigel_client_name ) ) {
                                echo '<div class="col-md-4 border-right">';
                                    echo '<p class="meta-title">'. esc_html( $rigel_client_title ) .'</p>';
                                    echo '<p class="meta-value">'. esc_html( $rigel_client_name ) .'</p>';
                                echo '</div>';
                            }

                            $rigel_tasks = rigel_get_meta_value( $rigel_id, '_amz_tasks', '' );
                            if( !empty( $rigel_tasks ) ) {
                                echo '<div class="col-md-4 border-right">';
                                    echo '<p class="meta-title">'. esc_html( $rigel_task_title ) .'</p>';
                                    echo '<p class="meta-value">'. esc_html( $rigel_tasks ) .'</p>';
                                echo '</div>';
                            }
                            if( $rigel_date ) {
                                echo '<div class="col-md-4">';
                                    echo '<p class="meta-title">'. esc_html( $rigel_date_title ) .'</p>';
                                    echo '<p class="meta-value">'. esc_html( get_the_time( get_option( 'date_format' ) ) ).'</p>';
                                echo '</div>';
                            }
                            
                        echo '</div>'; // meta

                        if( !empty( $rigel_client_name) || !empty( $portfolio_tasks ) || $rigel_date ) {
                            echo '<span class="line sz-sm"></span>';
                        }

                        //Get portfolio share settings from Theme Options
                        $rigel_share = rigel_get_option_value( $rigel_prefix.'share', 1 );
                        $rigel_share_title = rigel_get_option_value( $rigel_prefix.'share_title', esc_html__( 'Share', 'rigel' ) );
                        $rigel_facebook = rigel_get_option_value( $rigel_prefix.'share_facebook', 1 );
                        $rigel_twitter = rigel_get_option_value( $rigel_prefix.'share_twitter', 1 );
                        $rigel_gplus = rigel_get_option_value( $rigel_prefix.'share_gplus', 1 );
                        $rigel_pinterest = rigel_get_option_value( $rigel_prefix.'share_pinterest', 1 );
                        $rigel_tumblr = rigel_get_option_value( $rigel_prefix.'share_tumblr', 1 );
                        $rigel_linkedin = rigel_get_option_value( $rigel_prefix.'share_linkedin', 1 );

                        if( $rigel_share && ( $rigel_facebook || $rigel_twitter || $rigel_gplus || $rigel_pinterest || $rigel_tumblr || $rigel_linkedin ) ) {
                            echo '<div class="share">';

                                echo '<p>'. esc_html( $rigel_share_title ).'</p>';

                                if( $rigel_facebook ) {
                                    echo '<a class="pixicon-facebook" href="http://www.facebook.com/sharer.php?u='. esc_url( $rigel_post_url ) .'" target="_blank" alt="'. esc_attr( $rigel_post_title ) .'"></a>';
                                }
                                if( $rigel_twitter ) {
                                    echo '<a class="pixicon-twitter" href="http://twitter.com/share?url='. esc_url( $rigel_post_url ) .'&amp;text=Check out this Project '. esc_url( $rigel_post_url ) .'" target="_blank" alt="'.esc_attr( $rigel_post_title ).'"></a>';
                                }
                                if( $rigel_gplus ) {
                                    echo '<a class="pixicon-gplus" href="https://plus.google.com/share?url='. esc_url( $rigel_post_url ) .'" target="_blank" alt="'. esc_attr( $rigel_post_title ) .'"></a>';
                                }

                                if( $rigel_pinterest ) {
                                    
                                    echo '<a class="pixicon-pinterest" href="http://pinterest.com/pin/create/button/?url='. esc_url( $rigel_post_url ) .'" alt="'.esc_attr( $rigel_post_title ).'"></a>';
                                }

                                if( $rigel_tumblr) {
                                    echo '<a class="pixicon-tumblr" href="http://www.tumblr.com/share?v=3&u='.esc_url($rigel_post_url).'&t='.esc_attr($rigel_post_title).'" alt="'.esc_attr($rigel_post_title).'"></a>';
                                }

                                if( $rigel_linkedin ) {
                                    echo '<a class="pixicon-linked-in" href="http://www.linkedin.com/shareArticle?mini=true&url='.esc_url( $rigel_post_url ).'&title='.esc_attr( $rigel_post_title ).'" alt=""></a>';
                                }
                                
                            echo '</div>'; //share
                        }                        

                        //Launch Button
                        $rigel_btn = rigel_get_option_value( $rigel_prefix.'btn', 1 );
                        $rigel_btn_text = rigel_get_option_value( $rigel_prefix.'btn_text', esc_html__('Launch', 'rigel' ) );
                        $rigel_target = rigel_get_option_value( $rigel_prefix.'target', '_blank' );

                        $rigel_project_url = rigel_get_meta_value( $rigel_id, '_amz_project_url', '' );
                        if( !empty( $rigel_project_url) && $rigel_btn ) {
                            echo '<div class="portfolio-button">';
                                echo '<a class="btn btn-md btn-outline" href="'.esc_url( $rigel_project_url ).'" alt="'. esc_attr( get_the_title() ) .'" target="'. esc_attr( $rigel_target ) .'">'. esc_html( $rigel_btn_text ) .'</a>';
                            echo '</div>'; //launch-button
                        }

                    echo '</div>'; //portfolio-details

                    //Get portfolio parent url from theme option
                    $rigel_parent_url = rigel_get_option_value( $rigel_prefix.'parent_url', '' );
                    $rigel_pagination = rigel_get_option_value( $rigel_prefix.'pagination', 1 );

                    if( !empty( $rigel_parent_url ) || $rigel_pagination ) {
                        
                        echo '<div class="portfolio-links">';
                            if( $rigel_pagination ) {
                                echo '<div class="prev">'. get_previous_post_link( '%link', wp_kses(__( '<i class="pixicon-arrow-left"></i> Prev', 'rigel' ), array('i' => array('class' => array() ) ) ) ) .'</div>';
                            }

                            if( !empty( $rigel_parent_url ) ) {
                                echo '<div class="port-parent-page"><a href="'.esc_url( $rigel_parent_url ).'" alt="portfolio"><i class="pixicon-square-list"></i></a></div>';
                            }

                            if( $rigel_pagination ) {
                                echo '<div class="next">'.get_next_post_link( '%link', wp_kses(__('Next <i class="pixicon-arrow-right"></i>', 'rigel' ), array('i' => array('class' => array() ) ) ) ).'</div>';                        
                            }
                        echo '</div>'; // page-links  
                    }

                echo '</div>'; // portfolio-container

            endwhile;
            endif;

            wp_reset_query();

            // Related Portfolio

            //Show/hide related portfolio option theme option
            $rigel_show_related_portfolio = rigel_get_option_value( $rigel_prefix.'show_related_portfolio', 1 );

            if( $rigel_show_related_portfolio ) {

                //Portfolio Category
                $rigel_portfolio_categories = get_the_terms( get_the_ID(), 'pix_categories' );
                $rigel_cat_id = array();

                //Build category ID as array values
                if(!empty($rigel_portfolio_categories )){
                    foreach ($rigel_portfolio_categories as $key => $value) {
                        $rigel_cat_id[] = $value->term_id;
                    }
                }

                //Build taxonomy query
                $rigel_tax_query = array();
                $rigel_tax_query['relation'] = 'AND';

                if(!empty($rigel_cat_id)){
                    $rigel_tax_query[] =  array(
                        'taxonomy' => 'pix_categories',
                        'field'    => 'term_id',
                        'terms'    => $rigel_cat_id,
                        'operator' => 'IN'
                    );
                }

                //Get related portfolio count from theme option
                $rigel_post_count = rigel_get_option_value( $rigel_prefix.'post_count', 6 );
                        
                //Build query arguement
                $related_args = array(
                    'post_type' => 'pix_portfolio',
                    'post_status' => 'publish',
                    'posts_per_page' => $rigel_post_count,
                    'tax_query' => $rigel_tax_query,
                    'post__not_in' => array( get_the_ID() )
                );

                query_posts( $related_args );
                $q = new WP_Query( $related_args );
                $rigel_post_count = $q->found_posts;

                //Get related portfolio title from theme option
                $rigel_related_main_title = rigel_get_option_value( $rigel_prefix.'related_main_title', esc_html__('YOU MAY ALSO LIKE', 'rigel' ) );
                $rigel_related_sub_title = rigel_get_option_value( $rigel_prefix.'related_sub_title', esc_html__('Related Projects', 'rigel' ) );

                if ( have_posts() ) :
                    echo '<div class="related-portfolio">';
                        echo '<div class=" size-md align-center clearfix">
                                <h3 class="main-title title uppercase sub-title-con">'. esc_html( $rigel_related_main_title ) .'</h3> 
                                <span class="line"></span>
                                <p class="sub-title">'. esc_html( $rigel_related_sub_title ) .'</p>
                              </div>';


                        if ( $rigel_post_count > 4 ) {
                            $rigel_slider_data = ' data-items="4" data-auto-height="false" data-dots="false" data-nav="true" data-auto-play="false"  data-items-desktop="[1199,4]" data-items-desktop-small="[991,2]" data-items-tablet="[768,1]"';
                            $rigel_slider_class = ' owl-carousel';
                        }
                        else {
                            $rigel_slider_class = ' no-carousel';
                            $rigel_slider_data  = '';
                        }                    
        
                        echo '<div class="arrow-style2'. esc_attr( $rigel_slider_class ) .'"'. $rigel_slider_data .'>';
                            while ( have_posts() ) : the_post();

                                $rigel_related_id = get_the_ID();

                                echo '<div class="pix-portfolio-item">';
                                    echo '<div class="portfolio-container"><a href="'. esc_url( get_permalink() ) .'" class="portfolio-link">';

                                       //Post image values
                                        $rigel_gallery = rigel_get_meta_value( $rigel_related_id, '_amz_gallery' );
                                        $rigel_gallery = !empty( $rigel_gallery ) ? json_decode( $rigel_gallery ) : '';

                                        echo '<div class="portfolio-img">';
                                            echo rigel_get_image_by_id( 340, 340, $rigel_gallery[0]->itemId, 0, 1, 1 );
                                        echo '</div>'; // portfolio-img

                                        echo '<div class="portfolio-hover">
                                            <div class="portfolio-link">
                                                <div class="portfolio-content">';
                                                    echo '<h3 class="title">'. esc_html( get_the_title() ) .'</h3>';

                                                    //Build categories list
                                                    $rigel_related_post_cat = get_the_terms( get_the_ID(), 'pix_categories' );

                                                    if( !empty( $rigel_related_post_cat ) ) {
                                                        echo '<p>';
                                                            $i = 1;
                                                            foreach ( $rigel_related_post_cat as $key => $related_cat ) {
                                                                echo esc_html( $related_cat->name );
                                                                if( count( $rigel_related_post_cat ) > $i ) {
                                                                    echo ',';
                                                                }
                                                                $i++;
                                                            }
                                                        echo '</p>';
                                                    }                                        

                                                echo '</div>
                                            </div>
                                        </div>';

                                    echo '</a></div>';
                                echo '</div>'; // portfolio-item
                            endwhile;
                        echo '</div>'; // owl-carousel
                    echo '</div>'; //related-portfolio
                endif;
            }
        ?>

    </main>
    
</div>

<?php get_footer(); ?>