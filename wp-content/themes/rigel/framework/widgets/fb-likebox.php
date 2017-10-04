<?php 

/*
 * Likebox Widget
*/
class Rigel_LikeBox_Widget extends WP_Widget {

	function  __construct() {
		$widget_options = array( 'classname' => 'likebox-widget', 'description' => esc_html__( 'Display Facebook Like Box', 'rigel' ) );
		parent:: __construct( 'rigel_likebox_widget', esc_html__( 'Rigel:: Facebook Like Box', 'rigel' ), $widget_options );
	}

	function widget( $args, $instance ) {

		extract( $args );
		
		$title = ( $instance['title'] ) ? $instance['title'] : '';
		$fb_page_url = isset( $instance['fb_page_url'] ) ? strip_tags( $instance['fb_page_url']) : 'wearepixel8es';
		$height = isset( $instance['height'] ) ? strip_tags( $instance['height'] ) : '300';
		$color_scheme = isset( $instance['color_scheme'] ) ? strip_tags( $instance['color_scheme']) : 'light';
		$show_faces = isset( $instance['show_faces'] ) ? strip_tags( $instance['show_faces'] ) : 'true';
		$show_headers = isset( $instance['show_headers'] ) ? strip_tags( $instance['show_headers']) : 'true';
		$show_posts = isset( $instance['show_posts'] ) ? strip_tags( $instance['show_posts'] ) : 'false';
		$show_borders = isset( $instance['show_borders'] ) ? strip_tags( $instance['show_borders'] ) : 'true';
		
		
			echo $before_widget;

			if( !empty( $title ) ) {
				echo $before_title . esc_html( $title ) . $after_title;
			}
		?>

		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
		
		<?php
		if(!empty($fb_page_url)){
		echo '<div class="fb-like-box" data-href="https://www.facebook.com/'. esc_attr( $fb_page_url ) .'" data-width="100%" data-height="'. esc_attr( $height ) .'px" data-colorscheme="'. esc_attr( $color_scheme ) .'" data-show-faces="'. esc_attr( $show_faces ) .'" data-header="'. esc_attr( $show_headers ) .'" data-stream="'. esc_attr ($show_posts ) .'" data-show-border="'. esc_attr( $show_borders ) .'"></div>';

		}
		else{
			echo '<div>'. esc_html__( 'Please enter the Facebook Page URL', 'rigel' ). '</div>';
		}
		
		echo $after_widget;
	}


	function form( $instance ) {

		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '' ) );
		$title = isset( $instance['title'] ) ? strip_tags( $instance['title'] ) : '';
		$fb_page_url = isset( $instance['fb_page_url'] ) ? strip_tags( $instance['fb_page_url'] ) : 'wearepixel8es';
		$height = isset( $instance['height'] ) ? strip_tags( $instance['height'] ) : '300';
		$color_scheme = isset( $instance['color_scheme'] ) ? strip_tags( $instance['color_scheme'] ) : 'light';
		$show_faces = isset( $instance['show_faces'] ) ? strip_tags( $instance['show_faces'] ) : 'true';
		$show_headers = isset( $instance['show_headers'] ) ? strip_tags( $instance['show_headers']) : 'true';
		$show_posts = isset( $instance['show_posts'] ) ? strip_tags( $instance['show_posts'] ) : 'false';
		$show_borders = isset( $instance['show_borders'] ) ? strip_tags( $instance['show_borders'] ) : 'true';
?>

		<p><label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>"><?php esc_html_e( 'Title:', 'rigel' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /></p>
		
		<p><label for="<?php echo esc_attr( $this->get_field_id('fb_page_url') ); ?>"><?php esc_html_e( 'Facebook Page URL:', 'rigel' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('fb_page_url') ); ?>" name="<?php echo esc_attr( $this->get_field_name('fb_page_url') ); ?>" type="text" value="<?php echo esc_url( $fb_page_url ); ?>" /></p>

		<p><label for="<?php echo esc_attr( $this->get_field_id('height') ); ?>"><?php esc_html_e( 'Height:', 'rigel' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('height') ); ?>" name="<?php echo esc_attr( $this->get_field_name('height') ); ?>" type="text" value="<?php echo esc_attr( $height ); ?>" /></p>

		<p><label for="<?php echo esc_attr( $this->get_field_id('color_scheme') ); ?>"></label>
        <?php esc_html_e( 'Color Scheme:','rigel' ) ?>
            <select id="<?php echo esc_attr( $this->get_field_id('color_scheme') ); ?>" name="<?php echo esc_attr( $this->get_field_name('color_scheme') ); ?>">
                <option value="light" <?php esc_attr( selected( $color_scheme, "light" ) ); ?>><?php esc_html_e( 'Light', 'rigel' ); ?></option>
                <option value="dark" <?php esc_attr( selected( $color_scheme, "dark" ) ); ?>><?php esc_html_e( 'Dark', 'rigel' ); ?></option>
            </select>
		</p>

		<p><label for="<?php echo esc_attr( $this->get_field_id('show_faces') ); ?>"></label>
        <?php esc_html_e( 'Show Friends Faces:','rigel' ) ?>
            <select id="<?php echo esc_attr( $this->get_field_id('show_faces') ); ?>" name="<?php echo esc_attr( $this->get_field_name('show_faces') ); ?>">
                <option value="true" <?php esc_attr( selected( $show_faces, "true" ) ); ?>><?php esc_html_e( 'Yes', 'rigel' ); ?></option>
                <option value="false" <?php esc_attr( selected( $show_faces, "false" ) ); ?>><?php esc_html_e( 'No', 'rigel' ); ?></option>
            </select>
		</p>

		<p><label for="<?php echo esc_attr( $this->get_field_id('show_headers') ); ?>"></label>
        <?php esc_html_e( 'Show Headers:', 'rigel' ) ?>
            <select id="<?php echo esc_attr( $this->get_field_id('show_headers') ); ?>" name="<?php echo esc_attr( $this->get_field_name('show_headers') ); ?>">
                <option value="true" <?php esc_attr( selected( $show_headers, "true" ) ); ?>><?php esc_html_e( 'Yes', 'rigel' ); ?></option>
                <option value="false" <?php esc_attr( selected( $show_headers, "false" ) ); ?>><?php esc_html_e( 'No', 'rigel' ); ?></option>
            </select>
		</p>

		<p><label for="<?php echo esc_attr( $this->get_field_id('show_posts') );?>"></label>
        <?php esc_html_e( 'Show Posts:','rigel' ) ?>
            <select id="<?php echo esc_attr( $this->get_field_id('show_posts') );?>" name="<?php echo esc_attr( $this->get_field_name('show_posts') ); ?>">
                <option value="true" <?php esc_attr( selected( $show_posts, "true" ) ); ?>><?php esc_html_e( 'Yes', 'rigel' ); ?></option>
                <option value="false" <?php esc_attr( selected( $show_posts, "false" ) ); ?>><?php esc_html_e( 'No', 'rigel' ); ?></option>
            </select>
		</p>

		<p><label for="<?php echo esc_attr( $this->get_field_id('show_borders') ); ?>"></label>
        <?php esc_html_e( 'Show Borders:','rigel' ) ?>
            <select id="<?php echo esc_attr( $this->get_field_id('show_borders') ); ?>" name="<?php echo esc_attr( $this->get_field_name('show_borders') ); ?>">
                <option value="true" <?php esc_attr( selected( $show_borders, "true" ) ); ?>><?php esc_html_e( 'Yes', 'rigel' ); ?></option>
                <option value="false" <?php esc_attr( selected( $show_borders, "false" ) ); ?>><?php esc_html_e( 'No', 'rigel' ); ?></option>
            </select>
		</p>

<?php
	}
}

function rigel_likebox_widget_init(){
	register_widget( 'Rigel_LikeBox_Widget' );	
}
add_action( 'widgets_init','rigel_likebox_widget_init' );