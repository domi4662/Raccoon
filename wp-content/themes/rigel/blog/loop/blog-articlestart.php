<?php

    $prefix = ( isset($_POST['values'] ) ) ? $_POST['values']['prefix'] : rigel_get_prefix();

    $type = rigel_get_option_value( $prefix.'styles', 'normal' );
    $rigel_select_sidebar = rigel_get_option_value( $prefix.'select_sidebar', 'blog-sidebar' );
    $sidebar_position = rigel_get_option_value( $prefix.'sidebar', 'right-sidebar' );

	//Add isotope and column classes
    if( $type == 'masonry' || $type == 'grid' ){
        $isotope_col = ' col-md-3 ';
        $isotope_element = ' element ';

        if( 'full-width' == $sidebar_position || !is_active_sidebar( $rigel_select_sidebar ) ) {
            $isotope_col = ' col-md-3 ';
        }
        else {
            $isotope_col = ' col-md-4 ';
        }
    }

    if( $type != 'masonry' && $type != 'grid' ){
        echo '<div class="load-element">';
    }

        if( $type == 'masonry' || $type == 'grid' ){

            echo '<div class="load-element '. esc_attr( $isotope_col . $isotope_element ).'">';
        }

            get_template_part('blog/loop/blog' , 'animationstart');

                echo '<article id="post-'. esc_attr( get_the_ID() ).'" class="' . implode(' ',get_post_class( 'post post-container clearfix', get_the_ID() ) ) .'">';
?>