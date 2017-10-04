<?php 

/*
 * Social Icon Widget
*/
class Rigel_Social_Widget extends WP_Widget {

	function  __construct() {
		$widget_options = array( 'classname' => 'social-widget', 'description' => esc_html__('Display Social Icons','rigel' ) );
		parent:: __construct( 'rigel_social_widget',esc_html__( 'Rigel:: Social Icons','rigel' ), $widget_options );
	}

	function widget( $args, $instance ) {
		extract($args);
		
		$title = ( $instance['title'] ) ? strip_tags( $instance['title'] ) : esc_html__('Social Icons', 'rigel' );
		$style = isset( $instance['style'] ) ? strip_tags( $instance['style'] ) : '';
		$facebook = isset( $instance['facebook'] ) ? strip_tags( $instance['facebook'] ) : '';
		$twitter = isset( $instance['twitter'] ) ? strip_tags( $instance['twitter'] ) : '';
		$gplus = isset( $instance['gplus'] ) ? strip_tags( $instance['gplus'] ) : '';
		$linkedin = isset( $instance['linkedin'] ) ? strip_tags( $instance['linkedin'] ) : '';
		$dribbble = isset( $instance['dribbble'] ) ? strip_tags( $instance['dribbble'] ) : '';
		$flickr = isset( $instance['flickr'] ) ? strip_tags( $instance['flickr'] ) : '';
		$pinterest = isset( $instance['pinterest'] ) ? strip_tags( $instance['pinterest'] ) : '';
		$tumblr = isset( $instance['tumblr'] ) ? strip_tags( $instance['tumblr'] ) : '';
		$instagram = isset( $instance['instagram'] ) ? strip_tags( $instance['instagram'] ) : '';
		$rss = isset( $instance['rss'] ) ? strip_tags( $instance['rss'] ) : '';
		$github = isset( $instance['github'] ) ? strip_tags( $instance['github'] ) : '';
		$youtube = isset( $instance['youtube'] ) ? strip_tags( $instance['youtube'] ) : '';
		
		
		echo $before_widget;

		if( !empty( $title ) ) {
			echo $before_title . esc_html( $title ) . $after_title;
		}

		if( !empty( $facebook ) || !empty( $twitter ) || !empty( $gplus ) || !empty( $linkedin ) || !empty( $dribbble ) || !empty( $flickr ) || !empty( $pinterest ) ||!empty( $tumblr ) || !empty( $instagram ) || !empty( $rss ) || !empty( $github ) ){

			echo do_shortcode( '[social style="'. esc_attr( $style ) .'" facebook="'. esc_attr( $facebook ) .'" twitter="'. esc_attr( $twitter ) .'" gplus="'. esc_attr( $gplus ) .'" linkedin="'. esc_attr( $linkedin ) .'" dribble="'. esc_attr( $dribbble ) .'" flickr="'. esc_attr( $flickr ) .'" pinterest="'. esc_attr( $pinterest ) .'" tumblr="'. esc_attr( $tumblr ) .'" instagram="'. esc_attr( $instagram ) .'" rss="'. esc_attr( $rss ) .'" github="'. esc_attr( $github ) .'" youtube="'. esc_attr( $youtube ) .'"]' );
			
		}

		else{
			echo '<div>'. esc_html__('Please enter atleast single social network links.', 'rigel'). '</div>';
		}
		
		echo $after_widget;
		
		
	}


	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '' ) );
		$title = isset($instance['title']) ? strip_tags($instance['title']) : '';
		$style = isset($instance['style']) ? strip_tags($instance['style']) : '';
		$facebook = isset($instance['facebook']) ? strip_tags($instance['facebook']) : '';
		$twitter = isset($instance['twitter']) ? strip_tags($instance['twitter']) : '';
		$gplus = isset($instance['gplus']) ? strip_tags($instance['gplus']) : '';
		$linkedin = isset($instance['linkedin']) ? strip_tags($instance['linkedin']) : '';
		$dribbble = isset($instance['dribbble']) ? strip_tags($instance['dribbble']) : '';
		$flickr = isset($instance['flickr']) ? strip_tags($instance['flickr']) : '';
		$pinterest = isset($instance['pinterest']) ? strip_tags($instance['pinterest']) : '';
		$tumblr = isset($instance['tumblr']) ? strip_tags($instance['tumblr']) : '';
		$instagram = isset($instance['instagram']) ? strip_tags($instance['instagram']) : '';
		$rss = isset($instance['rss']) ? strip_tags($instance['rss']) : '';
		$github = isset($instance['github']) ? strip_tags($instance['github']) : '';
		$youtube = isset($instance['youtube']) ? strip_tags($instance['youtube']) : '';
?>

		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title:', 'rigel' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

		<!-- Style -->
		<p><label for="<?php echo $this->get_field_id('style');?>"></label>
        <?php esc_html_e( 'Style:','rigel'  ) ?>
            <select id="<?php echo $this->get_field_id('style');?>" name="<?php echo $this->get_field_name('style');?>">
                <option value="style1" <?php selected( $style, "style1" ); ?>><?php esc_html_e('Style 1', 'rigel' ); ?></option>
                <option value="style2" <?php selected( $style, "style2" ); ?>><?php esc_html_e('Style 2', 'rigel' ); ?></option>
                <option value="style3" <?php selected( $style, "style3" ); ?>><?php esc_html_e('Style 3', 'rigel' ); ?></option>
            </select>
		</p>
		
		<!-- Facebook -->
		<p><label for="<?php echo $this->get_field_id('facebook'); ?>"><?php esc_html_e('Facebook:', 'rigel' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" type="text" value="<?php echo esc_attr($facebook); ?>" /></p>
		
		<!-- Twitter -->
		<p><label for="<?php echo $this->get_field_id('twitter'); ?>"><?php esc_html_e('Twitter:', 'rigel' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" type="text" value="<?php echo esc_attr($twitter); ?>" /></p>

		<!-- Google Plus -->
		<p><label for="<?php echo $this->get_field_id('gplus'); ?>"><?php esc_html_e('Google Plus:', 'rigel' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('gplus'); ?>" name="<?php echo $this->get_field_name('gplus'); ?>" type="text" value="<?php echo esc_attr($gplus); ?>" /></p>

		<!-- Linkedin -->
		<p><label for="<?php echo $this->get_field_id('linkedin'); ?>"><?php esc_html_e('Linkedin:', 'rigel' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('linkedin'); ?>" name="<?php echo $this->get_field_name('linkedin'); ?>" type="text" value="<?php echo esc_attr($linkedin); ?>" /></p>

		<!-- Dribbble -->
		<p><label for="<?php echo $this->get_field_id('dribbble'); ?>"><?php esc_html_e('Dribbble:', 'rigel' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('dribbble'); ?>" name="<?php echo $this->get_field_name('dribbble'); ?>" type="text" value="<?php echo esc_attr($dribbble); ?>" /></p>

		<!-- Flickr -->
		<p><label for="<?php echo $this->get_field_id('flickr'); ?>"><?php esc_html_e('Flickr:', 'rigel' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('flickr'); ?>" name="<?php echo $this->get_field_name('flickr'); ?>" type="text" value="<?php echo esc_attr($flickr); ?>" /></p>

		<!-- Pinterest -->
		<p><label for="<?php echo $this->get_field_id('pinterest'); ?>"><?php esc_html_e('Pinterest:', 'rigel' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('pinterest'); ?>" name="<?php echo $this->get_field_name('pinterest'); ?>" type="text" value="<?php echo esc_attr($pinterest); ?>" /></p>

		<!-- Tumblr -->
		<p><label for="<?php echo $this->get_field_id('tumblr'); ?>"><?php esc_html_e('Tumblr:', 'rigel' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('tumblr'); ?>" name="<?php echo $this->get_field_name('tumblr'); ?>" type="text" value="<?php echo esc_attr($tumblr); ?>" /></p>

		<!-- Instagram -->
		<p><label for="<?php echo $this->get_field_id('instagram'); ?>"><?php esc_html_e('Instagram:', 'rigel' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('instagram'); ?>" name="<?php echo $this->get_field_name('instagram'); ?>" type="text" value="<?php echo esc_attr($instagram); ?>" /></p>

		<!-- Rss -->
		<p><label for="<?php echo $this->get_field_id('rss'); ?>"><?php esc_html_e('Rss:', 'rigel' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('rss'); ?>" name="<?php echo $this->get_field_name('rss'); ?>" type="text" value="<?php echo esc_attr($rss); ?>" /></p>

		<!-- Github -->
		<p><label for="<?php echo $this->get_field_id('github'); ?>"><?php esc_html_e('Github:', 'rigel' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('github'); ?>" name="<?php echo $this->get_field_name('github'); ?>" type="text" value="<?php echo esc_attr($github); ?>" /></p>

		<!-- Youtube -->
		<p><label for="<?php echo $this->get_field_id('youtube'); ?>"><?php esc_html_e('Youtube:', 'rigel' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('youtube'); ?>" name="<?php echo $this->get_field_name('youtube'); ?>" type="text" value="<?php echo esc_attr($youtube); ?>" /></p>

<?php
	}
}

function rigel_social_widget_init(){
	register_widget( 'Rigel_Social_Widget' );	
}
add_action( 'widgets_init','rigel_social_widget_init' );