<?php

    $prefix = ( isset($_POST['values'] ) ) ? $_POST['values']['prefix'] : rigel_get_prefix();

    $type = rigel_get_option_value( $prefix.'styles', 'normal' );

    //Shorten Blog Title
    $title_limit = rigel_get_option_value( $prefix.'title_limit', '80' );
    $post_title = rigel_shorten_text( get_the_title(), $title_limit );

    //Blog Page Meta
    $date = rigel_get_option_value( $prefix.'date', 1 );
    $author = rigel_get_option_value( $prefix.'author', 1 );
    $category = rigel_get_option_value( $prefix.'category', 1 );
?>

<?php
    /*
     * If you want add any blog style, Check condition here
     */
?>

<!-- For: Grid & Masonry Style -->

<?php if( $type == 'grid' || $type == 'masonry' ){ ?>

    <div class="entry-content cf content">
        <?php
        
            echo '<h3 class="title"><a href="'. esc_url( get_permalink() ) .'">'. esc_html( $post_title ) .'</a></h3>';
        
            the_excerpt();

            rigel_blog_meta( $date, $author, $category );
        ?> 
        
    </div>

<?php } ?>

<!-- For: Normal Style -->

<?php if( $type == 'normal' ){ ?>

    <div class="entry-content cf content">
        <?php     
        
            echo '<h3 class="title"><a href="'. esc_url( get_permalink() ) .'">'. esc_html( $post_title ) .'</a></h3>';

            the_excerpt();
            
            rigel_blog_meta( $date, $author, $category );

        ?> 
        
    </div>
<?php } 
