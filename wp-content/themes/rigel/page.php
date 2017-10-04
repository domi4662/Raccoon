<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Rigel
 */

get_header();

$rigel_id = get_the_ID();

$rigel_layout = rigel_get_meta_value( $rigel_id, '_amz_layout', '' );
$rigel_selected_sidebar = rigel_get_meta_value( $rigel_id, '_amz_sidebar', 'primary-sidebar' );

$class = rigel_check_vc_active();

?>

	<div id="primary" class="content-area">
		
		<main id="main" class="site-main container<?php echo esc_attr( $class ); ?>" role="main">

			<?php 
				if ( $rigel_layout == 'right-sidebar' || $rigel_layout == 'left-sidebar' || $rigel_layout == 'right-nav' || $rigel_layout == 'left-nav' ) {
					echo '<div class="row padding-top">';

					if ( $rigel_layout == 'left-sidebar' && is_active_sidebar( $rigel_selected_sidebar ) ) {

						rigel_sidebar( $rigel_selected_sidebar , 'primary-sidebar' );

						echo '<div class="col-md-9">';

					}
					else if ( $rigel_layout == 'right-sidebar' && is_active_sidebar( $rigel_selected_sidebar ) ) {
						echo '<div class="col-md-9">';
					}
					else if ( $rigel_layout == 'left-nav' ) {
						echo '<aside class="col-md-3">';
							if(function_exists('wp_nav_menu')) {                                      
								wp_nav_menu(
									array(
										'theme_location' => 'left-nav',
										'container' => false,
										'menu_class' => 'sub-navigation left',
										'echo' => true,
										'before' => '',
										'after' => '',
										'link_before' => '',
										'link_after' => '',
										'depth' => 1,
										'fallback_cb' => 'rigel_nav_fallback'
										)
									);
							} 
							else {
								rigel_nav_fallback();
							}
							
						echo '</aside>';

						echo '<div class="col-md-9">';
					}
					else if ( $rigel_layout == 'right-nav' ) {
						echo '<div class="col-md-9">';
					}
				}

				while ( have_posts() ) : the_post();

					the_content();

					//Show/Hide comment section
                    comments_template();

                endwhile; // End of the loop.

				if ( $rigel_layout == 'right-sidebar' || $rigel_layout == 'left-sidebar' || $rigel_layout == 'right-nav' || $rigel_layout == 'left-nav') {

					if ( $rigel_layout == 'left-sidebar'  && is_active_sidebar( $rigel_selected_sidebar ) ) {
						echo '</div>'; //col-md-9
						echo '</div>'; //row
					}
					else if ( $rigel_layout == 'right-sidebar' && is_active_sidebar( $rigel_selected_sidebar ) ) {
						echo '</div>'; //col-md-9
						rigel_sidebar( $rigel_selected_sidebar , 'primary-sidebar' );
						echo '</div>'; //row
					}
					elseif ( $rigel_layout == 'right-nav' ) {
						echo '</div>'; //col-md-9
						echo '<aside class="col-md-3">';							
							if(function_exists('wp_nav_menu')) {                                      
								wp_nav_menu(
									array(
										'theme_location' => 'right-nav',
										'container' => false,
										'menu_class' => 'sub-navigation right',
										'echo' => true,
										'before' => '',
										'after' => '',
										'link_before' => '',
										'link_after' => '',
										'depth' => 1,
										'fallback_cb' => 'rigel_nav_fallback'
										)
									);
							} 
							else {
								rigel_nav_fallback();
							}
							 
						echo '</aside>';
						echo '</div>'; //row
					}
					else if ( $rigel_layout == 'left-nav' ) {
						echo '</div>'; //col-md-9
						echo '</div>'; //row
					}
				}
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
	
<?php get_footer(); ?>
