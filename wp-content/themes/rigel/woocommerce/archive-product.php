<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header( 'shop' ); 

?>
	
	<?php

		/* HEADER */
		global $smof_data;

		$page_layout = isset($smof_data['shop_layout']) ? $smof_data['shop_layout'] : 'default';

		//Sidebar
		$shop_sidebar = isset($smof_data['shop_select_sidebar']) ? $smof_data['shop_select_sidebar'] : '0';

		?>

		<div id="primary" class="content-area">
		
			<main id="main" class="site-main container" role="main">

				<?php 

					do_action( 'woocommerce_before_main_content' );

					if ( $page_layout == 'right-sidebar' || $page_layout == 'left-sidebar' || $page_layout == 'right-nav' || $page_layout == 'left-nav') {
						echo '<div class="row">';

						if ( $page_layout == 'left-sidebar' ) {
							echo '<div class="woo-desc"></div>';
		 					rigel_sidebar($shop_sidebar , 'shop');	
						} elseif ( $page_layout == 'left-nav' ) {
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
						}

						echo '<div class="col-md-9">';
					}
				?>

				<?php if ( have_posts() ) : 
			
					woocommerce_product_loop_start(); 

						echo '<div class="woo-desc">';
							do_action( 'woocommerce_archive_description' );
						echo '</div>';

					/**
					 * woocommerce_before_shop_loop hook
					 *
					 * @hooked woocommerce_result_count - 20
					 * @hooked woocommerce_catalog_ordering - 30
					 */
					do_action( 'woocommerce_before_shop_loop' );
					
					woocommerce_product_subcategories(); ?>

					<div class="woo-wrap clearfix row">

						<?php while ( have_posts() ) : the_post(); ?>

							<?php wc_get_template_part( 'content', 'product' ); ?>

						<?php endwhile; // end of the loop. ?>
					</div>

					<?php
						/**
						 * woocommerce_after_shop_loop hook
						 *
						 * @hooked woocommerce_pagination - 10
						 */
						do_action( 'woocommerce_after_shop_loop' );
					?>

					<?php woocommerce_product_loop_end(); ?>

					<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

					<?php wc_get_template( 'loop/no-products-found.php' ); ?>

				<?php endif; ?>


				<?php 
					if ( $page_layout == 'right-sidebar' || $page_layout == 'left-sidebar' || $page_layout == 'right-nav' || $page_layout == 'left-nav') {

						echo '</div>'; //col-md-9

						if ( $page_layout == 'right-sidebar' ) {
							rigel_sidebar($shop_sidebar , 'shop');
						} elseif ( $page_layout == 'right-nav' ) {
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
						}

						do_action( 'woocommerce_after_main_content' );

						echo '</div>'; //row
					}
				?>

			</main><!-- #main -->
		</div><!-- #primary -->

<?php get_footer( 'shop' ); ?>