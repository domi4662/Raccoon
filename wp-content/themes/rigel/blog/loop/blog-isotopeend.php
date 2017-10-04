<?php

	$prefix = ( isset($_POST['values'] ) ) ? $_POST['values']['prefix'] : rigel_get_prefix();

    $type = rigel_get_option_value( $prefix.'styles', 'normal' );

    if( $type == 'masonry' ){
        echo '</div>';
    }
?>