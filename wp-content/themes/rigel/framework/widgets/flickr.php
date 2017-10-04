<?php

function flickr_jquery() {
	wp_enqueue_script('jquery');
}
add_action('widgets_init','flickr_jquery');

class Rigel_Flickr extends WP_Widget {

	function  __construct() {
		$widget_ops = array( 'classname' => 'flickr-widget', 'description' => esc_html__( 'Display your Flickr photo gallery', 'rigel' ) );
		parent:: __construct ( 'rigel_flickr_widget', esc_html__( 'Rigel:: Flickr', 'rigel' ), $widget_ops );
	}


	// displays/outputs the widgety goodness...
	function widget( $args, $instance ) {
 		extract($args);
?>
			<div class="widget clearfix">
			<?php
		$title = apply_filters('widget_title', $instance['title']);

		if( empty( $title ) ) {
			$title = 'Flickr Gallery';
		}

		$flickrid = $instance['flickrid'];
		$flickrcount = isset($instance['flickrcount']) ? $instance['flickrcount'] : '9';

		$length = 10;

		$randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);



		if ( $title )
			echo $before_title . esc_html( $title ) . $after_title;

			// let's get into the javascript...

		?>
			<ul class="flickrwidget" id="<?php echo esc_attr( $randomString ); ?>"></ul></div>

			<script type="text/javascript">
				jQuery(document).ready(function($){
					$.getJSON("http://api.flickr.com/services/feeds/photos_public.gne?ids=<?php print esc_attr( $flickrid ); ?>&lang=en-us&format=json&jsoncallback=?", function(data){
						window.a = (data);
				          $.each(data.items, function(index, item){

							  if(index < <?php echo $flickrcount;  ?>){
				                $("<img/>").attr("src", item.media.m).appendTo("<?php echo '#'.$randomString; ?>").wrap("<li><a href='" + item.link + "'></a></li>");
								 
							  }
							  else{
								   return;
								  }
				          });
				        });
				});
			</script>

			<?php

  }

	// handles...updating the widget...
	function update($new_instance, $old_instance) {

		$instance = $old_instance;

		$instance['title'] = strip_tags( $new_instance['title']);
		$instance['flickrid'] = strip_tags( $new_instance['flickrid']);
		$instance['flickrcount'] = $new_instance['flickrcount'];
		return $instance;

	}


	function form( $instance ) {
		?>

		<!-- widget title -->
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>"><?php esc_html_e( 'Title:', 'rigel' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" type="text" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" value="<?php echo isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '' ; ?>" />
		</p>

	 <p>
			<label for="<?php echo esc_attr( $this->get_field_id('flickrid') ); ?>"><?php esc_html_e( 'Your Flickr User ID:', 'rigel' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('flickrid') ); ?>" type="text" name="<?php echo esc_attr( $this->get_field_name('flickrid') ); ?>" value="<?php echo isset( $instance['flickrid'] ) ? esc_attr( $instance['flickrid'] ) : '' ; ?>" />
	 		<small><?php esc_html_e( 'Don\'t know your ID? Head on over to', 'rigel' ); ?><a href="//idgettr.com"><?php esc_html_e( 'idgettr', 'rigel' ); ?></a><?php esc_html_e( ' to find it.', 'rigel' ); ?></small>
	 </p>

        <p><label for="<?php echo esc_attr( $this->get_field_id('flickrCount') ); ?>">
        <?php esc_html_e( 'Flickr Image Count (Max 20):', 'rigel' ); ?>
        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('flickrcount') ); ?>" name="<?php echo esc_attr( $this->get_field_name('flickrcount') ); ?>" value="<?php echo esc_attr( ( isset($instance['flickrcount'] ) && !empty( $instance['flickrcount'] ) ? $instance['flickrcount'] : '9' ) ) ; ?>" type="number" style="width:50px;" min="1" max="20"></label></p>


		<?php

	}

}

function rigel_flickr_widget_init() {
	register_widget( 'Rigel_Flickr' );
}
add_action( 'widgets_init','rigel_flickr_widget_init' );