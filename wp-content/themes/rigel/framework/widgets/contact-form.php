<?php 

/*
 * Contact Form Widget
*/
class Rigel_Contact_Widget extends WP_Widget {

	function  __construct() {
		$widget_options = array( 'classname' => 'contact-form-widget', 'description' => esc_html__( 'Display Contact Form','rigel' ) );
		parent:: __construct( 'rigel_contact_form', esc_html__( 'Rigel:: Contact Form','rigel' ), $widget_options );
	}

	function widget( $args, $instance ) {
		extract( $args );
		
		$title = ( $instance['title'] ) ? $instance['title'] : esc_html__( 'Contact','rigel' );
		$id = isset( $instance['id'] ) ? strip_tags( $instance['id'] ) : '';
		
		if(!empty($id)){
			echo $before_widget;

			echo $before_title . esc_html( $title ) . $after_title;

			echo do_shortcode( '[contact-form-7 id="'. esc_attr( $id ) .'" title="'. esc_attr( $title ) .'"]' );

			echo $after_widget;
		}
		
	}


	function form( $instance ) {
		$instance = wp_parse_args( ( array ) $instance, array( 'title' => '', 'text' => '' ) );
		$title = strip_tags( $instance['title'] );
		$id = isset( $instance['id'] ) ? strip_tags( $instance['id'] ) : '';
?>
		<p><label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>"><?php esc_html_e( 'Title:', 'rigel' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /></p>

		<p><label for="<?php echo esc_attr( $this->get_field_id('id') ); ?>"><?php esc_html_e('Contact Form ID:', 'rigel' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('id') ); ?>" name="<?php echo esc_attr( $this->get_field_name('id') ); ?>" type="text" value="<?php echo esc_attr( $id ); ?>" /></p>


<?php
	}
}

function rigel_contact_widget_init(){
	register_widget( 'Rigel_Contact_Widget' );	
}
add_action( 'widgets_init','rigel_contact_widget_init' );