<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$logo = rigel_get_option_value( 'custom_logo', get_bloginfo('name') );
$logo_light = rigel_get_option_value( 'custom_logo_light', get_bloginfo('name') );
$logo2x = rigel_get_option_value( 'retina_logo', '' );
$logo_light2x = rigel_get_option_value( 'retina_logo_light', '' );
 
?>

<header class="header" role="banner" itemscope itemtype="http://schema.org/WPHeader">

	<div class="container">

		<div id="inner-header" class="wrap col3 clearfix">

			<div class="col-md-4 col-sm-4 left-side">
				<div class="left-side-inner clearfix">					
					<?php
						$main_sorter = array(
							"left" => array (
								"placebo" => "placebo", //REQUIRED!
								"email"   => "Email",	
								"tel"     => "Telephone"
							),
							"right" => array (
								"placebo"     => "placebo", //REQUIRED!
								"lang"        => "WMPL Language Selector",	
								"search_icon" => "Search Icon",
								"cart"        => "Woocommerce cart"
							)
						);
						$main_sorter_left = rigel_get_option_array_value( 'main_sorter','left', $main_sorter['left'] );
						foreach ( $main_sorter_left as $key => $value ) {
							rigel_display_header_elements( $key, 'lang-list-wrap', 'page-top-main' );
						}
					?>
				</div>
			</div>

			<div class="col-md-4 col-sm-4">
				<div id="logo" itemscope itemtype="http://schema.org/Organization">
					<a href="<?php echo esc_url(home_url( '/' )); ?>" rel="nofollow">

						<?php if ( $logo != get_bloginfo('name') ) { ?>
							<img src="<?php echo esc_url( $logo ); ?>" data-at2x="<?php echo esc_attr( $logo2x ); ?>" alt="" class="dark-logo">
							<img src="<?php echo esc_url( $logo_light ); ?>" data-at2x="<?php echo esc_attr( $logo_light2x ); ?>" alt="" class="light-logo">
						<?php } else { echo $logo; } ?>

					</a>
				</div>

				<div class="pix-menu">
					<div class="pix-menu-trigger">
						<span class="mobile-menu"><?php esc_html_e('Menu', 'rigel');  ?></span>
					</div>
				</div>
			</div>

			<div class="col-md-4 col-sm-4 right-side">
				<div class="right-side-inner clearfix">
					<?php
						$main_sorter_right = rigel_get_option_array_value( 'main_sorter','right', $main_sorter['right'] );
						foreach ( $main_sorter_right as $key => $value ) {
							rigel_display_header_elements( $key, 'lang-list-wrap', 'page-top-main' );
						}
					?>
				</div>

			</div>
			
			<div class="menu-responsive">
			</div>

		</div>

	</div>

</header>


<div class="menu-wrap">

	<div class="container">
		<div class="widget-right">
		
			<?php
				$main_sorter_left = rigel_get_option_array_value( 'main_sorter','left', $main_sorter['left'] );
				foreach ( $main_sorter_left as $key => $value ) {
					rigel_display_header_elements( $key, 'lang-list-wrap', 'page-top-main' );
				}
			?>
		</div>
		<nav class="main-nav" role="navigation">
			<?php rigel_main_nav(); ?>
		</nav>
	</div>

</div>