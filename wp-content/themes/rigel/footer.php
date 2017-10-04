<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Rigel
 */

?>

			</div><!-- #content -->
		</div> <!-- End of Wrapper -->
	</div> <!-- End of Main Wrap -->

<?php

	$rigel_id = get_the_ID();

	$rigel_footer_style = rigel_get_option_value( 'footer_style', 1 );
	$rigel_footer_style = ( 0 == $rigel_footer_style ) ? ' footer-light ' : ' footer-dark ';

	$rigel_f_widget = rigel_get_meta_value( get_the_ID(), '_amz_footer_widget', 'default', 'f_widget', 1 );
	$rigel_footer = rigel_get_option_value( 'footer_option', 'col3' );

	$rigel_f_small = rigel_get_meta_value( get_the_ID(), '_amz_footer_copyright', 'default', 'f_small', 1 );

	$rigel_sidebar_name = rigel_get_option_value( 'f_select_sidebar', '0' );
	$rigel_sidebar_name = ( '0' == $rigel_sidebar_name ) ? 'footer-widgets' : $rigel_sidebar_name;

	$rigel_boxed_content = rigel_get_option_value( 'boxed_content', '0' );
	$rigel_header = rigel_get_option_value( 'header_option', 'header1' );

	$rigel_footer_fixed = rigel_get_option_value( 'footer_fixed', 1 );
	$rigel_footer_fixed_class = ( $rigel_footer_fixed ) ? 'footer-fixed ' : '';

	$rigel_page_slug =  get_page_template_slug(); 

	if ( $rigel_page_slug != 'page-template/page-blank.php' ) {

	if( ( 'show' == $rigel_f_widget || 1 == $rigel_f_widget ) || ( 'show' == $rigel_f_small || 1 == $rigel_f_small ) ){ ?>

		<footer class="footer <?php echo esc_attr( $rigel_footer_fixed_class . $rigel_footer_style ); ?>">

		<?php if( ( 'show' == $rigel_f_widget || 1 == $rigel_f_widget ) && is_active_sidebar( $rigel_sidebar_name ) ){ ?>
			<div id="pageFooterCon" class="pageFooterCon <?php echo esc_attr($rigel_footer); ?> clearfix">
				<div id="pageFooter" class="container">
					<?php dynamic_sidebar( $rigel_sidebar_name ); ?> 
				</div>

			</div>
		<?php }
			
			$rigel_copyright_side = rigel_get_option_value( 'copyright_side', 1 );
			
			if( 'show' == $rigel_f_small || 1 == $rigel_f_small ){ ?>
				<!-- Copyright -->
				<div class="footer-bottom">
					<div class="container">
						<div class="copyright row">

							<?php

								$rigel_copyright_sorter = array(
									"left" => array (
										"placebo" => "placebo", //REQUIRED!
										"copyright_text" => "Copyright Text"
									),
									"right" => array (
										"placebo" => "placebo", //REQUIRED!
										"menu"    => "Menu"
									)
								);

								if( $rigel_copyright_side == 1 ) {
									echo '<div class="col-md-6">';

										$rigel_copyright_sorter_left = rigel_get_option_array_value('copyright_sorter','left', $rigel_copyright_sorter['left'] );
										foreach ( $rigel_copyright_sorter_left as $key => $value ) {
											rigel_display_header_elements( $key, 'lang-list-wrap', 'page-top-main' );
										}

									echo '</div>';

									echo '<div class="col-md-6 copyright-right">';

										$rigel_copyright_sorter_right = rigel_get_option_array_value('copyright_sorter','right', $rigel_copyright_sorter['right'] );
										foreach ( $rigel_copyright_sorter_right as $key => $value ) {
											rigel_display_header_elements( $key, 'lang-list-wrap', 'page-top-main' );
										}

									echo '</div>';
								}
								else {
									$rigel_footer_copyright_t = rigel_get_option_value( 'copyright_text', shortcode_exists( 'blog-link' ) ? sprintf( __( '<p>&copy; %s %s, All Rights Reserved.</p>', 'rigel' ), date( 'Y' ), do_shortcode( '[blog-link]' ) ) : sprintf( __( '<p>&copy; %s %s, All Rights Reserved.</p>', 'rigel' ), date( 'Y' ), get_bloginfo( 'name' ) ) );
									echo '<div class="col-md-12">'. do_shortcode( $rigel_footer_copyright_t ) .'</div>';

								}
							?>
						</div>
					</div>
				</div>
			
			<?php } ?>
		</footer>
	<?php }
	} 

	if($rigel_header == 'left-header' || $rigel_header == 'right-header'){ ?>
		</div>
	<?php }

		if ( $rigel_header == 'left-header' || $rigel_header == 'right-header' ){ 
			echo '</div>';
		} 


		if($rigel_boxed_content == 1){
			echo '</div>';
		}
		
		?>

		</div>		
					
	<?php 
		$rigel_tracking_code = rigel_get_option_value( 'tracking_code', '' );
		if( !empty( $rigel_tracking_code ) ) {			
			echo stripslashes( $rigel_tracking_code );			
		}
			
	wp_footer(); ?>

</body>

</html> <!-- end page. what a ride! -->
