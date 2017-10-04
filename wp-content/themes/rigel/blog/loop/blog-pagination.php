<?php    
	
    $prefix = ( isset($_POST['values'] ) ) ? $_POST['values']['prefix'] : rigel_get_prefix();

    //Pagination
    $pagination = rigel_get_option_value($prefix.'pagination', 'load_more'); // load_more, autoload, number, text
    $loadmore_text = rigel_get_option_value( $prefix.'loadmore_text', esc_html__( 'Load More', 'rigel' ) );
    $allpost_loaded_text = rigel_get_option_value( $prefix.'allpost_loaded_text', esc_html__( 'All Posts Loaded', 'rigel' ) );


    // Values array
    $values = array();

    $values['style']               = $pagination;    
    $values['loadmore_text']       = $loadmore_text;
    $values['allpost_loaded_text'] = $allpost_loaded_text;
    $values['action']              = 'rigel_blog_loadmore';

    // Default
    $args = array(
        'posts_per_page'      => get_option( 'posts_per_page' ),
        'ignore_sticky_posts' => 1
    );

    // Archive Category
    if ( is_category() ) {
        $category_arr = get_the_category();
        $slug = $category_arr[0]->slug;
        $category = array(
            'category_name'       => $slug
        );
        $args = array_merge( $args, $category );
    }
    // Archive Author
    elseif ( is_author() ) {
        global $post;
        $author_id = $post->post_author;
        $author = array(
            'author'              => $author_id
        );
        $args = array_merge( $args, $author );
    }
    // Archive Tag
    elseif ( is_tag() ) {        
        $posttags = get_the_tags();
        $slug = $posttags[0]->slug;
        $tag = array(
            'tag'                 => $slug
        );
        $args = array_merge( $args, $tag );
    }
    // Archive Day
    elseif ( is_day() ) {
        $day = array(
            'day'                 => get_the_time('j'),
            'month'               => get_the_time('n'),
            'year'                => get_the_time('Y')
        );
        $args = array_merge( $args, $day );
    }
    // Archive Month
    elseif ( is_month() ) { 
        $month = array(
            'month'               => get_the_time('n'),
            'year'                => get_the_time('Y')
        );
        $args = array_merge( $args, $month );
    }
    // Archive Year
    elseif ( is_year() ) { 
        $year = array(
            'year'                => get_the_time('Y')
        );
        $args = array_merge( $args, $year );
    }
    // Archive Search
    elseif ( is_search() ) { 
        $search = array(
            's'                   => get_search_query()
        );
        $args = array_merge( $args, $search );        
    }


    echo rigel_pagination( $args, $values ); // args, values

?>