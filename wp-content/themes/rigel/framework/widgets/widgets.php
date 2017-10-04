<?php
rigel_require_file( RIGEL_WIDGETS . '/recent-post.php' );
rigel_require_file( RIGEL_WIDGETS . '/flickr.php' );
rigel_require_file( RIGEL_WIDGETS . '/google-map.php' );
rigel_require_file( RIGEL_WIDGETS . '/social.php' );
rigel_require_file( RIGEL_WIDGETS . '/fb-likebox.php' );
if( class_exists( 'Rigel_Base_Plugin' ) ) {
	rigel_require_file( RIGEL_WIDGETS . '/recent-tweet.php' );
}
if( class_exists( 'WPCF7_ContactForm' ) ) {
	rigel_require_file( RIGEL_WIDGETS . '/contact-form.php' );
}
