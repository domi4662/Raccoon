<?php
/**
 * The template for displaying all single posts.
 *
 * @package Rigel
 */

get_header();

$rigel_prefix = rigel_get_prefix();

$rigel_layout = rigel_get_option_value( $rigel_prefix.'layout', 'right-sidebar' );
$rigel_select_sidebar = rigel_get_option_value( $rigel_prefix.'select_sidebar', 'blog-sidebar' );

?>

<div id="primary" class="content-area">
	
	<main id="main" class="site-main container" role="main">

		<?php
			$rigel_layout_class = ( $rigel_layout == 'full-width' || !is_active_sidebar( $rigel_select_sidebar ) ) ? ' class="single-full-width"' : ' class="single-sidebar"';
		?>

		<div<?php echo $rigel_layout_class; ?>>

			<?php 
				//Width and height for images
				$rigel_width = 800;
			    $rigel_height = 350;

				if ( $rigel_layout == 'left-sidebar' || $rigel_layout == 'right-sidebar' && is_active_sidebar( $rigel_select_sidebar ) ) {

					//Width and height for images
			        $rigel_width = 848;
			        $rigel_height = 350;

					echo '<div class="row">';

					if ( $rigel_layout == 'left-sidebar' ) {
						rigel_sidebar( $rigel_select_sidebar, 'blog-sidebar' );
					}

					echo '<div class="col-md-9">';
				}
			?>

			<?php 

				while ( have_posts() ) : the_post();

					$rigel_id = get_the_ID();

			        //Get post format
					$rigel_format = get_post_format();
					
					//Featured section for standard and image post format
			        $rigel_show_featured_image = isset($rigel_posts_featured_image) ? $rigel_posts_featured_image : 'show';

					if( ( $rigel_format == '' || $rigel_format == 'image' ) && ( $rigel_show_featured_image == 'show' ) && ( has_post_thumbnail() ) ) {
							
		                	echo '<div class="post-format post-image image">';
		                		echo rigel_featured_thumbnail( $rigel_width, $rigel_height, 0, 0, 1 );
		                	echo '</div>';
					}

					//Featured section for gallery post format
					else if( $rigel_format == 'gallery' ) {

						//Get gallery meta values
			            $rigel_gallery = rigel_get_meta_value( $rigel_id, '_amz_gallery', '' );
					    $rigel_gallery = !empty( $rigel_gallery ) ? json_decode( $rigel_gallery ) : '';
					    $rigel_gallery_auto_slide = rigel_get_meta_value( $rigel_id, '_amz_auto_slide', 'true' );

			            //Set auto slide value
			            if( 'true' == $rigel_gallery_auto_slide || is_numeric( $rigel_gallery_auto_slide ) ) {
			            	$rigel_autoslide = 'data-auto-play="'. esc_attr( $rigel_gallery_auto_slide ) .'"';
			            }
			            elseif( 'false' == $rigel_gallery_auto_slide ){
			            	$rigel_autoslide = '';
			            }
			            else{
			            	$rigel_autoslide = 'data-auto-play= "5000"';
			            }

			            if( !empty( $rigel_gallery ) ) {
			            	echo '<div class="post-format arrow-style2 arrow-style3 owl-carousel post-gallery gallery" data-nav="true" data-items="1" data-auto-height="false" data-dots="false" '. $rigel_autoslide .' data-transition-style="fade">';
				                foreach( $rigel_gallery as $rigel_src ){
				                    $rigel_full_src = rigel_get_image_by_id( $rigel_width, $rigel_height, $rigel_src->itemId, 1, 1, 1 );
			                        
			                        echo '<div><img src="' .  esc_url( $rigel_full_src ) . '" alt=""></div>';
				                }
				            echo '</div>'; // owl-carousel
			            }
			            else if ( has_post_thumbnail() ) {

			            	$rigel_full_src = rigel_featured_thumbnail( $rigel_width, $rigel_height, 1, 0, 1 );

			                echo '<img src="' .  esc_url( $rigel_full_src ) . '" alt="">';
			            }
					}

					//Featured section for video post format
					else if( $rigel_format == 'video' ) {

						//Get video meta values
						$rigel_video_methods = rigel_get_meta_value( $rigel_id, '_amz_video_methods', 'normal' );
					    $rigel_video_normal = rigel_get_meta_value( $rigel_id, '_amz_video_normal', '' );
					    $rigel_poster = rigel_get_meta_value( $rigel_id, '_amz_poster', '' );
					    $rigel_video_autoplay = rigel_get_meta_value( $rigel_id, '_amz_video_autoplay', 'no' );
					    $rigel_video_iframe = rigel_get_meta_value( $rigel_id, '_amz_video_iframe', '' );

			            if( !empty( $rigel_video_normal ) || !empty( $rigel_video_iframe ) ){

			            	//Feature section video player content
				            echo '<div class="post-format post-video">';

				                //Video Normal Section
				                if( $rigel_video_methods == 'normal' ) {

				                    if( !empty( $rigel_video_normal ) ) {
				                        $rigel_video_normal = htmlspecialchars_decode( $rigel_video_normal );
				                        $rigel_vid_arr = json_decode( $rigel_video_normal, true );

				                        $rigel_poster = isset( $rigel_poster[0]->full ) ? $rigel_poster[0]->full : '';

				                        $rigel_vid_sc = '';
				                        $rigel_vid_sc .= '[video ';
				                        foreach( $rigel_vid_arr as $rigel_vid ){
				                            $rigel_vid_sc .= $rigel_vid['format'] . '="' . esc_url( $rigel_vid['url'] ) . '" ';
				                        }

				                        $rigel_vid_sc .= 'poster = "' . esc_attr( $rigel_poster ) . '" ';
				                        if( $rigel_video_autoplay == 'yes' ){
				                            $rigel_vid_sc .= 'autoplay = "autoplay" ';
				                        }
				                        $rigel_vid_sc .= ']';

				                        echo '<div class="post-video-normal video">'.do_shortcode( $rigel_vid_sc ).'</div>';
				                    }
				                }

				                //Video Iframe Section
				                if( $rigel_video_methods == 'iframe' ) {
				                    if( !empty( $rigel_video_iframe ) ) {
				                        echo '<div class="post-video-iframe video">'. $rigel_video_iframe .'</div>';
				                    }
				                }

				            echo '</div>';
				        }
					}

					//Featured section for audio post format
					else if( $rigel_format == 'audio' ) {

					    //Get audio meta values
			            $rigel_audio_methods = rigel_get_meta_value( $rigel_id, '_amz_audio_methods', 'normal' );
					    $rigel_audio_normal = rigel_get_meta_value( $rigel_id, '_amz_audio_normal', '' );
					    $rigel_audio_autoplay = rigel_get_meta_value( $rigel_id, '_amz_audio_autoplay', 'no' );
					    $rigel_audio_iframe = rigel_get_meta_value( $rigel_id, '_amz_audio_iframe', '' );

			            if( !empty( $rigel_audio_normal ) || !empty( $rigel_audio_iframe ) ) {

						    //Feature section audio player content
						    echo '<div class="post-audio post-format">';

						        //Audio Normal Section
						        if( $rigel_audio_methods == 'normal' ) {

						            if( !empty( $rigel_audio_normal ) ) {

						                $rigel_audio_normal = htmlspecialchars_decode( $rigel_audio_normal );
						                $rigel_audio_arr = json_decode( $rigel_audio_normal, true );

						                $rigel_aud_sc = '';
						                $rigel_aud_sc .= '[audio ';
						                foreach( $rigel_audio_arr as $rigel_aud ){
						                    $rigel_ext = substr( strrchr( $rigel_aud['url'],'.' ), 1 );
						                    $rigel_aud_sc .= $rigel_ext . '="' . esc_url( $rigel_aud['url'] ) . '" ';
						                }
						                if( $rigel_audio_autoplay == 'y' ){
						                    $rigel_aud_sc .= 'autoplay = "autoplay" ';
						                }
						                $rigel_aud_sc .= ']';

						                echo '<div class="post-audio-normal audio">'.do_shortcode( $rigel_aud_sc ).'</div>';

						            }
						        }

						        //Audio Iframe Section
						        if( $rigel_audio_methods == 'iframe' ){
						            if( !empty( $rigel_audio_iframe ) ){
						                echo '<div class="post-audio-iframe audio">'. do_shortcode( $rigel_audio_iframe ) .'</div>';
						            }
						        }
						    echo '</div>';
						}
					}

					the_content();

					wp_link_pages('before=<p class="page-links">Pages: &after=</p>');

					//Get related post values from theme options
	                $rigel_show_author_box = rigel_get_option_value( $rigel_prefix.'show_author_box', 1 );
	                $rigel_author_box_title = rigel_get_option_value( $rigel_prefix.'author_box_title', esc_html__('About the Author', 'rigel' ) );

					//Author Box
		            if( $rigel_show_author_box && !empty( get_the_author_meta( 'user_description' ) ) ) {
		            	//Get author id and assign author name as variable
		            	global $post;
			            $rigel_author_id = $post->post_author;
			            $rigel_author_name = get_the_author_meta( 'display_name', $rigel_author_id );

						echo '<aside class="authorDetails clearfix">';
	                      	echo '<h3 class="title">'. esc_html( $rigel_author_box_title ) .'</h3>';
	                        echo '<div class="author-details-content clearfix">';
	                        	echo '<div class="authorImage">'.get_avatar( get_the_author_meta('email'), 80 ).'</div>';
	                            echo '<div class="details">';
	                                echo '<h4 class="authorName">'. esc_html( $rigel_author_name ) .'</h4>';
	                                echo '<p>'. esc_html( get_the_author_meta( 'user_description' ) ) .'</p>';
	                            echo '</div>';
	                        echo '</div>';   
	                    echo '</aside>';
	                }

					//Get related post values from theme options
	                $rigel_show_related_post = rigel_get_option_value( $rigel_prefix.'show_related_post', 1 );
	                $rigel_related_title = rigel_get_option_value( $rigel_prefix.'related_title', esc_html__('Related Posts', 'rigel' ) );
	                $rigel_related_post_no = rigel_get_option_value( $rigel_prefix.'related_post_no', 2 );
	                $rigel_orderby = rigel_get_option_value( $rigel_prefix.'related_post_orderby', 'random' );
	                $rigel_order = rigel_get_option_value( $rigel_prefix.'related_post_order', 'asc' );

					//Related Post
	                if( shortcode_exists( 'blog' ) && $rigel_show_related_post ){

	                	//Empty assignment
	                	$rigel_slug = '';

	                	$rigel_related_category = get_the_category();

	                	if( !empty($rigel_related_category ) ) {
	                		foreach ( $rigel_related_category as $rigel_key => $rigel_related_cat ) {
	                			$rigel_slug[] = $rigel_related_cat->slug;
	                		}
	                		$rigel_slug = implode(', ', $rigel_slug);
	                	}                   	

	                	if( !empty( $rigel_slug ) ) {
	                		echo '<div class="related-post">';
			                    echo '<div class="clearfix">';
			                        echo '<h3 class="title">'.esc_html( $rigel_related_title ).'</h3>';
			                    echo '</div>';

			                    echo do_shortcode('[blog slider="no" no_of_items="'. esc_attr( $rigel_related_post_no ) .'" insert_type ="category" category="'. esc_attr( $rigel_slug ) .'" order_by = "'. esc_attr( $rigel_orderby ) .'" order = "'. esc_attr( $rigel_order ) .'"]');
			                echo '</div>';
	                	}
	                }

					//Show/Hide comment section
	                comments_template();

				endwhile; // End of the loop.
			?>


			<?php 
				if ( $rigel_layout == 'left-sidebar' || $rigel_layout == 'right-sidebar' && is_active_sidebar( $rigel_select_sidebar ) ) {

					echo '</div>'; //col-md-9

					if ( $rigel_layout == 'right-sidebar' ) {
						rigel_sidebar($rigel_select_sidebar, 'blog-sidebar');
					}

					echo '</div>'; //row
				}
			?>

		</div> <!-- $rigel_layout -->

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
