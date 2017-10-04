<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) ) {
	$woocommerce_loop['loop'] = 0;
}

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) ) {
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );
}

$shop_columns = rigel_get_option_value( 'shop_columns', '4' );

// Ensure visibility
if ( ! $product || ! $product->is_visible() ) {
	return;
}

// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
if( 3 == $shop_columns ) {
	$classes = array( 'col-md-4' );
} else {
	$classes = array( 'col-md-3' );
}
if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] )
	$classes[] = 'first';
if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] )
	$classes[] = 'last';

?>
<div <?php post_class( $classes ); ?>>
	<?php
	/**
	 * woocommerce_before_shop_loop_item hook.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item' ); ?>

		<a href="<?php the_permalink(); ?>">

		<?php
			/**
			 * woocommerce_before_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_show_product_loop_sale_flash - 10
			 * @hooked woocommerce_template_loop_product_thumbnail - 10
			 */
			remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
			
			do_action( 'woocommerce_before_shop_loop_item_title' );

			echo '<div class="woo-product-item">'; //Staff Container
					
				echo '<div class="product-img">';
					woocommerce_show_product_loop_sale_flash();

					$columns           = $shop_columns;
					$post_thumbnail_id = get_post_thumbnail_id( $post->ID );
					$full_size_image   = wp_get_attachment_image_src( $post_thumbnail_id, 'full' );
					$image_title       = get_post_field( 'post_excerpt', $post_thumbnail_id );
					$placeholder       = has_post_thumbnail() ? 'with-images' : 'without-images';
					$wrapper_classes   = apply_filters( 'woocommerce_single_product_image_gallery_classes', array(
						'woocommerce-product-gallery',
						'woocommerce-product-gallery--' . $placeholder,
						'woocommerce-product-gallery--columns-' . absint( $columns ),
						'images',
					) );

					$attributes = array(
						'title'                   => $image_title,
						'data-src'                => $full_size_image[0],
						'data-large_image'        => $full_size_image[0],
						'data-large_image_width'  => $full_size_image[1],
						'data-large_image_height' => $full_size_image[2],
					);

					if ( has_post_thumbnail() ) {
						$html  = '<div data-thumb="' . get_the_post_thumbnail_url( $post->ID, 'shop_thumbnail' ) . '" class="woocommerce-product-gallery__image">';
						$html .= get_the_post_thumbnail( $post->ID, 'shop_catalog', $attributes );
						$html .= '</div>';
					} else {
						$html  = '<div class="woocommerce-product-gallery__image--placeholder">';
						$html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src() ), esc_html__( 'Awaiting product image', 'woocommerce' ) );
						$html .= '</div>';
					}

					echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, get_post_thumbnail_id( $post->ID ) );

				echo '</div>';

				echo '<div class="product-content clearfix">'; //Staff Contentent

					do_action( 'woocommerce_shop_loop_item_title' );

					woocommerce_template_loop_price();

					do_action( 'woocommerce_after_shop_loop_item_title' );

				echo '</div>'; 

				echo '<div class="product-hover">';						
					echo  woocommerce_template_loop_add_to_cart();
				echo '</div>';

			echo '</div>'; //End of Staff Container
			
		?>

	</a>
	<?php

	/**
	 * woocommerce_after_shop_loop_item hook.
	 *
	 * @hooked woocommerce_template_loop_product_link_close - 5
	 * @hooked woocommerce_template_loop_add_to_cart - 10
	 */
	do_action( 'woocommerce_after_shop_loop_item' );
	?>
</div>