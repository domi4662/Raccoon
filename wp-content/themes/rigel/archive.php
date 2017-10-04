<?php 

get_header();

$rigel_prefix = rigel_get_prefix();

get_template_part( 'blog/loop/blog', 'containerstart' );

    //Get themeoption values
    $rigel_type = rigel_get_option_value( $rigel_prefix.'styles', 'masonry' ); // masonry, grid, normal
    $rigel_select_sidebar = rigel_get_option_value( $rigel_prefix.'select_sidebar', 'blog-sidebar' );
    $rigel_sidebar_position = rigel_get_option_value( $rigel_prefix.'sidebar', 'left-sidebar' ); // left-sidebar, right-sidebar, full-width

    //If the sidebar position is left sidebar, it ll apply
    if( $rigel_sidebar_position == 'left-sidebar' && is_active_sidebar( $rigel_select_sidebar ) ) {
        rigel_sidebar( $rigel_select_sidebar, 'blog-sidebar' );
    }

    if ( have_posts() ) :

        get_template_part( 'blog/loop/blog', 'loopstart' );

            while ( have_posts() ) : the_post();

                get_template_part( 'blog/blog', 'content' );

            endwhile;

        get_template_part( 'blog/loop/blog', 'loopend' );

    else :
        get_template_part( 'blog/not', 'found' );

    endif;

    //If the sidebar position is right sidebar, it ll apply
    if( $rigel_sidebar_position == 'right-sidebar' && is_active_sidebar( $rigel_select_sidebar ) ) {
        rigel_sidebar( $rigel_select_sidebar, 'blog-sidebar' );
    }

get_template_part( 'blog/loop/blog', 'containerend' );

get_footer();