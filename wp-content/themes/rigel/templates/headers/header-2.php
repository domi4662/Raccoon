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
			<nav class="main-nav main-nav-left" role="navigation">
				<?php 
				rigel_main_left_nav(); 
				?>
			</nav>

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
					<span class="mobile-menu"><?php esc_html_e( 'Menu', 'rigel' );  ?></span>
				</div>
			</div>

			<nav class="main-nav main-nav-right" role="navigation">
				<?php 
				rigel_main_right_nav(); 
				?>
			</nav>

		</div>
	</div>
</header>