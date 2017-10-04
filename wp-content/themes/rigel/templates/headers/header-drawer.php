<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$prefix = rigel_get_prefix();

if( isset( ${$prefix.'_header_layout'} ) && ${$prefix.'_header_layout'} != 'default' ) {
	$header = ${$prefix.'_header_layout'};
}
else {
	$header = rigel_get_option_value( 'header_option', 'header-1' );
}
// Check its not equal to Left or Right Header
if( 'left-header' != $header  || 'right-header' != $header ){
	
	//Check Header Drawer Enabled?
	$header_widget = rigel_get_option_value( 'header_widget', 1 );

	if( $header_widget ){ 

		//Get Header Widget Columns Settings
		$header_widget_col = rigel_get_option_value( 'header_widget_col', 'col3' );

		//Header Widget Sidebar Name
		$sidebar_name = rigel_get_option_value( 'header_select_sidebar', '0' );
		$sidebar_name = ( '0' != $sidebar_name ) ? $sidebar_name : 'header-widgets';

		?>

		<div class="top-header-widget">
			<div id="headerWidgetCon" class="pageFooterCon">
				<div id="headerWidget" class="container  <?php echo esc_attr( $header_widget_col );  ?>">
					<!-- widgets -->
					<div class="row">

						<?php if ( is_active_sidebar( $sidebar_name ) ) : ?>

							<?php dynamic_sidebar( $sidebar_name ); ?>

						<?php else : ?>

							<!-- This content shows up if there are no widgets defined in the backend. -->

							<div>
								<p><?php esc_html_e( 'Please activate some Widgets Or disable it from theme option', 'rigel' );  ?></p>
							</div>

						<?php endif; ?>
					</div><!-- widgets -->
				</div>
				<div class="toggleBtnCon"><a href="#" data-btn="close" class="toggleBtn open"><?php esc_html_e( 'Open', 'rigel' );  ?></a></div>
			</div>
		</div>	

	<?php } // End of Header Drawer Condition

} // End of != Left or Right Header Condition