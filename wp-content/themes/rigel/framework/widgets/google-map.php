<?php 

/*
 * Map Widget
*/
class Rigel_Map_Widget extends WP_Widget {

	function  __construct() {
		$widget_options = array('classname' => 'map-widget', 'description' => esc_html__( 'Display Google Map','rigel' ) );
		parent:: __construct( 'rigel_map_widget', esc_html__( 'Rigel:: Google Map','rigel' ), $widget_options );
	}

	function widget( $args, $instance ) {
		extract($args);
		
		$title = ( $instance['title'] ) ? $instance['title'] : '';
		$height = isset( $instance['height'] ) ? strip_tags( $instance['height'] ) : '250';
		$contact_info = isset( $instance['contact_info'] ) ? strip_tags( $instance['contact_info'] ) : 'yes';
		$lat = isset( $instance['lat'] ) ? strip_tags( $instance['lat'] ) : '-37.81731';
		$lng = isset( $instance['lng'] ) ? strip_tags( $instance['lng'] ) : '144.95432';
		$zoom = isset( $instance['zoom'] ) ? strip_tags( $instance['zoom'] ) : '13';
		$zoom_control = isset( $instance['zoom_control'] ) ? strip_tags( $instance['zoom_control'] ) : 'true';
		$pan_control = isset( $instance['pan_control'] ) ? strip_tags( $instance['pan_control'] ) : 'true';
		$map_type_control = isset( $instance['map_type_control'] ) ? strip_tags( $instance['map_type_control'] ) : 'true';
		$scale_control = isset( $instance['scale_control'] ) ? strip_tags( $instance['scale_control'] ) : 'true';
		$street_view_control = isset( $instance['street_view_control'] ) ? strip_tags( $instance['street_view_control'] ) : 'true';
		$overview_control = isset( $instance['overview_control'] ) ? strip_tags( $instance['overview_control'] ) : 'true';
		
		
			echo $before_widget;

			if(!empty($title)){
				echo $before_title . esc_html( $title ) . $after_title;
			}

			if(!empty($lat)&&!empty($lng)){
				echo do_shortcode( '[googlemap width="100%" height="'. esc_attr( $height ) .'" contact_info="'. esc_attr( $contact_info ) .'" lat="'. esc_attr( $lat ) .'" lng="'. esc_attr( $lng ) .'" zoom="'. esc_attr( $zoom ) .'" zoomcontrol="'. esc_attr( $zoom_control ) .'" pancontrol="'. esc_attr( $pan_control ) .'" maptypecontrol="'. esc_attr( $map_type_control ) .'" scalecontrol="'. esc_attr( $scale_control ) .'" streetviewcontrol="'. esc_attr( $street_view_control ) .'" overviewmapcontrol="'. esc_attr( $overview_control ) .'"]' );
			}
			else{
				echo '<div>'. esc_html__('Please enter the Latitude and Longitude Value', 'rigel'). '</div>';
			}
			

			echo $after_widget;
		
		
	}


	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '' ) );
		$title = isset( $instance['title'] ) ? strip_tags( $instance['title'] ) : '';
		$contact_info = isset( $instance['contact_info'] ) ? strip_tags( $instance['contact_info'] ) : 'yes';
		$height = isset( $instance['height'] ) ? strip_tags( $instance['height'] ) : '250';
		$lat = isset( $instance['lat'] ) ? strip_tags( $instance['lat'] ) : '-37.81731';
		$lng = isset( $instance['lng'] ) ? strip_tags( $instance['lng'] ) : '144.95432';
		$zoom = isset( $instance['zoom'] ) ? strip_tags( $instance['zoom'] ) : '13';
		$zoom_control = isset( $instance['zoom_control'] ) ? strip_tags( $instance['zoom_control'] ) : 'true';
		$pan_control = isset( $instance['pan_control'] ) ? strip_tags( $instance['pan_control'] ) : 'true';
		$map_type_control = isset( $instance['map_type_control'] ) ? strip_tags( $instance['map_type_control'] ) : 'true';
		$scale_control = isset( $instance['scale_control'] ) ? strip_tags( $instance['scale_control'] ) : 'true';
		$street_view_control = isset( $instance['street_view_control'] ) ? strip_tags( $instance['street_view_control'] ) : 'true';
		$overview_control = isset( $instance['overview_control'] ) ? strip_tags( $instance['overview_control'] ) : 'true';
?>

		<p><label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>"><?php esc_html_e( 'Title:', 'rigel' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /></p>
		
		<p><label for="<?php echo esc_attr( $this->get_field_id('height') ); ?>"><?php esc_html_e( 'Height:', 'rigel' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('height') ); ?>" name="<?php echo esc_attr( $this->get_field_name('height') ); ?>" type="text" value="<?php echo esc_attr( $height ); ?>" /></p>

		<p><label for="<?php echo esc_attr( $this->get_field_id('contact_info') ); ?>"></label>
        <?php esc_html_e( 'Contact Info:','rigel' ) ?>
            <select id="<?php echo esc_attr( $this->get_field_id('contact_info') ); ?>" name="<?php echo esc_attr( $this->get_field_name('contact_info') ); ?>">
                <option value="yes" <?php esc_attr( selected( $contact_info, "yes" ) ); ?>><?php esc_html_e( 'Yes', 'rigel' ); ?></option>
                <option value="no" <?php esc_attr( selected( $contact_info, "no" ) ); ?>><?php esc_html_e( 'No', 'rigel' ); ?></option>
            </select>
		</p>

		<p><label for="<?php echo esc_attr( $this->get_field_id('lat') ); ?>"><?php esc_html_e( 'Latitude:', 'rigel' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('lat') ); ?>" name="<?php echo esc_attr( $this->get_field_name('lat') ); ?>" type="text" value="<?php echo esc_attr( $lat ); ?>" /></p>

		<p><label for="<?php echo esc_attr( $this->get_field_id('lng') ); ?>"><?php esc_html_e( 'Longitude:', 'rigel' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('lng') ); ?>" name="<?php echo esc_attr( $this->get_field_name('lng') ); ?>" type="text" value="<?php echo esc_attr( $lng ); ?>" /></p>

		<p><label for="<?php echo esc_attr( $this->get_field_id('zoom') ); ?>"><?php esc_html_e( 'Zoom:', 'rigel' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('zoom') ); ?>" name="<?php echo esc_attr( $this->get_field_name('zoom') ); ?>" type="text" value="<?php echo esc_attr( $zoom ); ?>" /></p>
		
		<p><label for="<?php echo esc_attr( $this->get_field_id('zoom_control') ); ?>"></label>
        <?php esc_html_e( 'Zoom Control:','rigel' ) ?>
            <select id="<?php echo esc_attr( $this->get_field_id('zoom_control') ); ?>" name="<?php echo esc_attr( $this->get_field_name('zoom_control') ); ?>">
                <option value="true" <?php esc_attr( selected( $zoom_control, "true" ) ); ?>><?php esc_html_e( 'Yes', 'rigel' ); ?></option>
                <option value="false" <?php esc_attr( selected( $zoom_control, "false" ) ); ?>><?php esc_html_e( 'No', 'rigel' ); ?></option>
            </select>
		</p>

		<p><label for="<?php echo esc_attr( $this->get_field_id('pan_control') ); ?>"></label>
        <?php esc_html_e( 'Pan Control:','rigel' ) ?>
            <select id="<?php echo esc_attr( $this->get_field_id('pan_control') ); ?>" name="<?php echo esc_attr( $this->get_field_name('pan_control') ); ?>">
                <option value="true" <?php esc_attr( selected( $pan_control, "true" ) ); ?>><?php esc_html_e( 'Yes', 'rigel' ); ?></option>
                <option value="false" <?php esc_attr( selected( $pan_control, "false" ) ); ?>><?php esc_html_e( 'No', 'rigel' ); ?></option>
            </select>
		</p>

		<p><label for="<?php echo esc_attr( $this->get_field_id('map_type_control') ); ?>"></label>
        <?php esc_html_e( 'Map Type Control:','rigel' ) ?>
            <select id="<?php echo esc_attr( $this->get_field_id('map_type_control') ); ?>" name="<?php echo esc_attr( $this->get_field_name('map_type_control') ); ?>">
                <option value="true" <?php esc_attr( selected( $map_type_control, "true" ) ); ?>><?php esc_html_e( 'Yes', 'rigel' ); ?></option>
                <option value="false" <?php esc_attr( selected( $map_type_control, "false" ) ); ?>><?php esc_html_e( 'No', 'rigel' ); ?></option>
            </select>
		</p>

		<p><label for="<?php echo esc_attr( $this->get_field_id('scale_control') ); ?>"></label>
        <?php esc_html_e( 'Scale Control:','rigel' ) ?>
            <select id="<?php echo esc_attr( $this->get_field_id('scale_control') ); ?>" name="<?php echo esc_attr( $this->get_field_name('scale_control') ); ?>">
                <option value="true" <?php esc_attr( selected( $scale_control, "true" ) ); ?>><?php esc_html_e( 'Yes', 'rigel' ); ?></option>
                <option value="false" <?php esc_attr( selected( $scale_control, "false" ) ); ?>><?php esc_html_e( 'No', 'rigel' ); ?></option>
            </select>
		</p>

		<p><label for="<?php echo esc_attr( $this->get_field_id('street_view_control') ); ?>"></label>
        <?php esc_html_e( 'Street View Control:', 'rigel' ) ?>
            <select id="<?php echo esc_attr( $this->get_field_id('street_view_control') ); ?>" name="<?php echo esc_attr( $this->get_field_name('street_view_control') ); ?>">
                <option value="true" <?php esc_attr( selected( $street_view_control, "true" ) ); ?>><?php esc_html_e( 'Yes', 'rigel' ); ?></option>
                <option value="false" <?php esc_attr( selected( $street_view_control, "false" ) ); ?>><?php esc_html_e( 'No', 'rigel' ); ?></option>
            </select>
		</p>

		<p><label for="<?php echo esc_attr( $this->get_field_id('overview_control') ); ?>"></label>
        <?php esc_html_e( 'Overview Control:', 'rigel' ) ?>
            <select id="<?php echo esc_attr( $this->get_field_id('overview_control') ); ?>" name="<?php echo esc_attr( $this->get_field_name('overview_control') ); ?>">
                <option value="true" <?php esc_attr( selected( $overview_control, "true" ) ); ?>><?php esc_html_e( 'Yes', 'rigel' ); ?></option>
                <option value="false" <?php esc_attr( selected( $overview_control, "false" ) ); ?>><?php esc_html_e( 'No', 'rigel' ); ?></option>
            </select>
		</p>

<?php
	}
}

function rigel_map_widget_init(){
	register_widget( 'Rigel_Map_Widget' );	
}
add_action( 'widgets_init','rigel_map_widget_init' );