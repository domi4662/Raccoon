<?php

    $prefix = ( isset($_POST['values'] ) ) ? $_POST['values']['prefix'] : rigel_get_prefix();

    //Blog 
    $type = rigel_get_option_value( $prefix.'styles', 'normal' );
    $select_sidebar = rigel_get_option_value( $prefix.'select_sidebar', 'blog-sidebar' );
    $sidebar_position = rigel_get_option_value( $prefix.'sidebar', 'right-sidebar' );

    //Assign blog style column settings
    if( 'full-width' != $sidebar_position && is_active_sidebar( $select_sidebar ) ) {
        $columns = ' col-md-9 ';
    }
    else{
        $columns = ' col-md-12 ';
    }

    $type = rigel_get_option_value( $prefix.'styles', 'normal' );

    $load_class = ( 'masonry' != $type ) ? 'load-container' : '';

    echo '<div id="style-'. esc_attr( $type ) .'" class="blog '. esc_attr( $columns .' '. $sidebar_position .' '. $load_class ) .'">';

        get_template_part( 'blog/loop/blog', 'isotopestart');
?>