<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$top_sec = rigel_get_option_value( 'top_sec', 0 );
$top_class = ( $top_sec ) ? ' top-sec-dark' : '';
?>

<div class="pageTopCon<?php echo esc_attr( $top_class ); ?>">
	<div class="container">
		<div class="pageTop">
			<div class="pull-left">
				<div class="header-center">
					<?php

						$grey_header_sorter = array(
							"left" => array (
								"placebo" 		=> "placebo", //REQUIRED!
								"email"		=> "Email",
								"tel"		=> "Telephone",
							),
							"right" => array (
								"placebo" 		=> "placebo", //REQUIRED!
								"sicons"	=> "Social Icons",
							),
						);

						$grey_header_sorter_left = rigel_get_option_array_value( 'grey_header_sorter','left', $grey_header_sorter['left'] );
						foreach ( $grey_header_sorter_left as $key => $value ) {
							rigel_display_header_elements( $key, 'lang-list-wrap', 'page-top-left' );
						}
					 
					?>
				</div>
			</div>
			<div class="pull-right">
				<div class="header-center">
					<?php 
						$grey_header_sorter_right = rigel_get_option_array_value( 'grey_header_sorter','right', $grey_header_sorter['right'] );
						foreach ( $grey_header_sorter_right as $key => $value ) {
							rigel_display_header_elements( $key, 'lang-list-wrap', 'page-top-left' );
						}
					?>
				</div>
			</div>
		</div>
	</div>
</div>