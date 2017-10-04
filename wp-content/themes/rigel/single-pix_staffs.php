<?php

get_header();

$rigel_prefix = rigel_get_prefix();

$rigel_show_image = rigel_get_option_value( $rigel_prefix.'image', 1 );
$rigel_width = rigel_get_option_value( $rigel_prefix.'image_width', 300 );
$rigel_height = rigel_get_option_value( $rigel_prefix.'image_height', 400 );
$rigel_show_job = rigel_get_option_value( $rigel_prefix.'job', 1 );
$rigel_show_social = rigel_get_option_value( $rigel_prefix.'social', 1 );
$rigel_show_email = rigel_get_option_value( $rigel_prefix.'email', 1 );

if ( have_posts() ) : while ( have_posts() ) : the_post();

	$rigel_id = get_the_ID();

	$rigel_jobs = get_the_term_list($rigel_id , 'pix_jobs','',', ');
	$rigel_jobs = !empty($rigel_jobs) ? strip_tags( $rigel_jobs ) : '';
		
?>

	<div role="main" id="mainContent" class="container">
			
		<section itemprop="articleBody">
			<?php 

				if( $rigel_show_image ) {
					$rigel_thumb = rigel_featured_thumbnail( $rigel_width, $rigel_height, 0, 1, 1 );
					echo '<aside class="single-staff-img"><div class="singleStaff">'. $rigel_thumb .'</div></aside>';
				}
			?>
				
			<div class="single-staff">
				<div class="staff-title-wrap">
					<h3 class="title"><?php echo esc_html( get_the_title() ); ?></h3>
					<?php 
						if( $rigel_show_job ){
							echo '<small>'.esc_html($rigel_jobs).'</small>';
						}
					?>
				</div>
				<?php 
					the_content();

					$rigel_social_icons 	 = '';

					$rigel_facebook = rigel_get_meta_value( $rigel_id, '_amz_facebook', '' );
					$rigel_twitter = rigel_get_meta_value( $rigel_id, '_amz_twitter', '' );
					$rigel_gplus = rigel_get_meta_value( $rigel_id, '_amz_gplus', '' );
					$rigel_dribbble = rigel_get_meta_value( $rigel_id, '_amz_dribbble', '' );
					$rigel_linkedin = rigel_get_meta_value( $rigel_id, '_amz_linkedin', '' );
					$rigel_flickr = rigel_get_meta_value( $rigel_id, '_amz_flickr', '' );
					$rigel_instagram = rigel_get_meta_value( $rigel_id, '_amz_instagram', '' );
					$rigel_email = rigel_get_meta_value( $rigel_id, '_amz_email', '' );

					$rigel_social_icons 	 .= !empty( $rigel_facebook ) ? '<a href="'. esc_url( $rigel_facebook ) .'" class="facebook"><i class="pixicon-facebook"></i></a> ' : '';
					$rigel_social_icons 	.= !empty($rigel_twitter) ? '<a href="'. esc_url($rigel_twitter)  .'" class="twitter"><i class="pixicon-twitter"></i></a> ' : '';
					$rigel_social_icons	.= !empty( $rigel_gplus ) ? '<a href="'. esc_url( $rigel_gplus ) 	 .'" class="gplus"><i class="pixicon-gplus"></i></a> ' : '';
					$rigel_social_icons	.= !empty( $rigel_linkedin )? '<a href="'. esc_url( $rigel_linkedin ) .'" class="linkedin"><i class="pixicon-linked-in"></i></a> ' : '';
					$rigel_social_icons 	.= !empty( $rigel_dribbble ) ? '<a href="'. esc_url( $rigel_dribbble )  .'" class="dribbble"><i class="pixicon-dribbble"></i></a> ' : '';
					$rigel_social_icons	.= !empty( $rigel_flickr ) ? '<a href="'. esc_url( $rigel_flickr )   .'" class="flickr"><i class="pixicon-flickr"></i></a> ' : '';
					$rigel_social_icons	.= !empty( $rigel_instagram ) ? '<a href="'. esc_url( $rigel_instagram )   .'" class="instagram"><i class="pixicon-instagram"></i></a> ' : '';

					$rigel_staff_email	= !empty( $rigel_email ) ? '<p><i class="pixicon-mail"></i>'. esc_html__( 'Send Email to', 'rigel' ) .'<a href="mailto:'. sanitize_email( $rigel_email ).'" class="staff_email">'. esc_html( get_the_title() ).'</a></p>' : '';

					if( $rigel_show_social || $rigel_staff_email ){
						echo '<div class="staff-social">';
							if( $rigel_show_social ){
								echo $rigel_social_icons;
							}
							if( $rigel_staff_email ){
								echo $rigel_staff_email;
							}
						echo '</div>';
					}
				?>					
				
			</div>
		</section> <!-- end article section -->		
		
	</div> <!-- end #content -->
	<?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>