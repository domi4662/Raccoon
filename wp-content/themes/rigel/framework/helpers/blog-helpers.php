<?php

// Search Form
function rigel_wpsearch( $form ) {

    $search_text = rigel_get_option_value( 'search_text', esc_html__( 'Search', 'rigel' ) );

    $form = '<form role="search" method="get" class="searchform" action="' . esc_url( home_url( '/' ) ) . '" >
        <input type="text" value="' . esc_attr( get_search_query() ) . '" name="s" class="s" placeholder="' . esc_attr( $search_text ) . '" />
        <button type="submit" class="searchsubmit">'. esc_html( $search_text ) .'</button>
    </form>';

    return $form;
}

if( !function_exists( 'rigel_blog_meta' ) ){

    function rigel_blog_meta( $show_date, $show_author_name, $show_category ){

        //Display author meta        
        global $post;
        $author_id = $post->post_author;
        $author_name = get_the_author_meta('display_name', $author_id);

        //Display post Date
        $date = get_the_date( get_option( 'date_format' , 'dS F' ) );

        //Display category
        $category = get_the_category();

        if( $show_date || $show_author_name || $show_category ){
            echo '<ul class="post-meta">';
                if( $show_date ){
                    echo '<li><span>'.esc_html( $date ).'</span> </li>';
                }
                if($show_author_name){
                    echo '<li class="author">' . esc_html__( 'By', 'rigel' ). '<span> '. esc_html( $author_name ) .' </span> </li>';
                }
                if( $show_category && !empty( $category ) ) {
                    echo '<li class="category"><a href="' . esc_url( get_category_link( $category[0]->term_id ) ).'">'. esc_html( $category[0]->cat_name ) .'</a></li>';
                }
            echo '</ul>';                     
        }
    }
}

//Comment Layout
function rigel_comments( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment; ?>
    <li id="comment-<?php comment_ID(); ?>" <?php comment_class('cf'); ?>>
        <article  class="cf">
            <div class="comment-img">
                <?php 
                    $comment_author_email = get_comment_author_email();
                    echo get_avatar( $comment_author_email, 65 );
                ?>
            </div>
            <div class="comment-content">
                <header class="comment-author">
                    <?php printf(__( '<cite class="fn">%1$s</cite> %2$s', 'rigel' ), get_comment_author_link(), edit_comment_link(esc_html__( '(Edit)', 'rigel' ),'  ','') ) ?>

                    <time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(esc_html__( 'F jS, Y', 'rigel' )); ?> </a>   <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></time>

                </header>

                <?php if ($comment->comment_approved == '0') : ?>
                    <div class="alert alert-info">
                        <p><?php esc_html_e( 'Your comment is awaiting moderation.', 'rigel' ) ?></p>
                    </div>
                <?php endif; ?>

                <section class="comment_content cf">
                    <?php comment_text() ?>      
                </section>
            </div>
        </article>
    <?php // </li> is added by WordPress automatically ?>
<?php
} // don't remove this bracket!







function rigel_excerpt_more($more) {
        return '...';
    }
add_filter('excerpt_more', 'rigel_excerpt_more');

//New Excerpt
function rigel_excerpt_length( $length ) {  

    $prefix = ( isset($_POST['values'] ) ) ? $_POST['values']['prefix'] : rigel_get_prefix();

    //Shorten Blog Content
    $content_limit = rigel_get_option_value( $prefix.'content_limit', '40' );
    
    return $content_limit;
}
add_filter( 'excerpt_length', 'rigel_excerpt_length', 999 );

function rigel_search_filter( $query ) {

    //Search Exclude
    $search_exclude = rigel_get_option_value( 'search_exclude', '' );

    if( !empty( $search_exclude ) ){
        $array = array();

        foreach ( $search_exclude as $key => $value ) {
            if( $value == 0 ){
                $array [] = $key;
            }
        }

        $arr = array_unique( $array );

        if ( !is_admin() && $query->is_main_query() ) {
            if ( $query->is_search ) {
                $query->set('post_type', $arr );
            }
        }
    }
    
}

add_action('pre_get_posts','rigel_search_filter');
