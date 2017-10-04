<?php

    //Woo cart
    if( !function_exists( 'rigel_woo_cart' ) ) {
        function rigel_woo_cart(){
            global $woocommerce; 

            echo '<div class="header-elem">';
                echo '<div class="pix-cart">';

                    echo '<div class="cart-trigger">';
                        echo '<div class="pix-cart-contents-con">';                 
                            echo '<a class="pix-cart-contents" href="'. esc_url( $woocommerce->cart->get_cart_url() ) .'" title="'. esc_html__( 'View your shopping cart', 'rigel' ) .'">';
                                echo '<span class="pixicon-handbag pix-cart-icon"></span><span class="pix-item-icon">'. esc_html( $woocommerce->cart->cart_contents_count ) .'</span>';
                            echo '</a>';
                        echo '</div>';

                        if( !is_cart() && !is_checkout()){
                            //Dropwon widget 
                            echo '<div class="woo-cart-dropdown">';
                                echo '<div class="woo-cart-content">';
                                    woocommerce_mini_cart();
                                echo '</div>';
                            echo '</div>';
                        }

                    echo '</div>';

                echo '</div>';
            echo '</div>';

        }
    }

    add_filter( 'loop_shop_per_page', 'rigel_products_per_page');
    if( !function_exists( 'rigel_products_per_page' ) ) {
        function rigel_products_per_page() {

            $shop_count = rigel_get_option_value( 'shop_count', 8 );
            
            return $shop_count;
        }
    }

    // Disable woocommerce css
    add_filter( 'woocommerce_enqueue_styles', '__return_false' );

    add_filter( 'woocommerce_output_related_products_args', 'rigel_related_products_args' );
    if( !function_exists( 'rigel_related_products_args' ) ) {
        function rigel_related_products_args( $args ) {
            $args['posts_per_page'] = 3; // 4 related products
            $args['columns'] = 3; // arranged in 2 columns
            return $args;
        }
    }

    //Reposition WooCommerce breadcrumb
    if( !function_exists( 'rigel_woocommerce_remove_breadcrumb' ) ) { 
        function rigel_woocommerce_remove_breadcrumb(){
            remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
        }
    }
    add_action('woocommerce_before_main_content', 'rigel_woocommerce_remove_breadcrumb');

    if( !function_exists( 'rigel_woocommerce_custom_breadcrumb' ) ) { 
        function rigel_woocommerce_custom_breadcrumb(){
            woocommerce_breadcrumb();
        }
    }
    add_action( 'woo_custom_breadcrumb', 'rigel_woocommerce_custom_breadcrumb' );

    remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);

    remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);

    remove_action( 'woocommerce_after_single_product', 'woocommerce_template_loop_add_to_cart', 10);
    
    remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );

    remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar',10);

    // Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php)
    add_filter('woocommerce_add_to_cart_fragments', 'rigel_woocommerce_header_add_to_cart_fragment');
    if( !function_exists( 'rigel_woocommerce_header_add_to_cart_fragment' ) ) { 
        function rigel_woocommerce_header_add_to_cart_fragment( $fragments ) {
            global $woocommerce;
            
            ob_start();

            echo '<div class="pix-cart-contents-con">';             
                echo '<a class="pix-cart-contents" href="'. esc_url( $woocommerce->cart->get_cart_url() ) .'" title="'. esc_html__('View your shopping cart', 'rigel' ) .'"><span class="pixicon-cart pix-cart-icon"></span><span class="pix-item-icon">'. esc_html( $woocommerce->cart->cart_contents_count ) .'</span></a>';
            echo '</div>';
            
            $fragments['div.pix-cart-contents-con'] = ob_get_clean();
            
            return $fragments;
            
        }
    }

    add_filter( 'loop_shop_columns', 'rigel_loop_columns' );
    if ( !function_exists( 'rigel_loop_columns' ) ) {
        function rigel_loop_columns() {
            return 4; // 3 products per row
        }
    }


    function rigel_woocommerce_breadcrumbs() {
        return array(
                'delimiter'   => '',
                'wrap_before' => '<nav class="pix-breadcrumbs" itemprop="breadcrumb">',
                'wrap_after'  => '</nav>',
                'before'      => '',
                'after'       => '',
                'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
            );
    }
    add_filter( 'woocommerce_breadcrumb_defaults', 'rigel_woocommerce_breadcrumbs' );