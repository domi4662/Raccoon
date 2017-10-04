<?php 

/*
 * Recent Post Widget
*/
class Rigel_Recent_Post_Widget extends WP_Widget {

	function  __construct() {
		$widget_options = array( 'classname' => 'recentpost', 'description' => esc_html__( 'Display Recent Posts','rigel' ) );
		parent:: __construct( 'rigel_recent_post',esc_html__( 'Rigel:: Recent Post','rigel' ), $widget_options );
	}

	function widget( $args, $instance ) {


		if ( ! isset( $args['widget_id'] ) )
			$args['widget_id'] = $this->id;

		ob_start();
		extract($args);

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : esc_html__( 'Recent Posts', 'rigel' );
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		$show_image = isset( $instance['show_image'] ) ?  $instance['show_image'] : false;
		if ( ! $number )
 			$number = 10;
		$show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;

		//Build taxonomy query for removing quote and link post format posts
		$tax_query = array(
			array(
				'taxonomy' => 'post_format',
				'field' => 'slug',
				'terms' => array( 'post-format-quote', 'post-format-link' ),
				'operator' => 'NOT IN',
			)
		);		
		
		$r = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true, 'tax_query' => $tax_query ) ) );
		if ($r->have_posts()) : ?>
			<?php echo $before_widget; ?>
				<?php if ( $title ) echo $before_title . esc_html( $title ) . $after_title; ?>
				<ul>
					<?php while ( $r->have_posts() ) : $r->the_post(); 
	   					$img = '';
			
						if( has_post_thumbnail() ) { // checks if post has a featured image and then outputs it.     
							$image_id = get_post_thumbnail_id ();  
							$image_thumb_url = wp_get_attachment_image_src( $image_id, 'full' ); 

							if(!empty($image_thumb_url)){					
								$img = aq_resize( $image_thumb_url[0], 70, 70, true );  
							}
						 
			       		}
			 
	   					?>
						<li>
							<?php if ( $show_image ) { ?>
								<?php if( !empty( $img ) ) { ?>
									<div class="postImg">
										<a href="<?php esc_url( the_permalink() ); ?>">
											<img src="<?php echo esc_url( $img ); ?>" alt="">
										</a>
									</div>
								<?php } ?>
							<?php } ?>
							
							<div class="content">
								<p><a href="<?php esc_url( the_permalink() ); ?>"><?php get_the_title() ? esc_html( the_title() ) : esc_html( the_ID() ); ?></a></p>
								<?php if ( $show_date ) : ?><span class="meta"><?php echo esc_html( get_the_date() ); ?></span>
								<?php endif; ?>
							</div>
						</li>
	    
					<?php endwhile; ?>
				</ul>
			<?php echo $after_widget; ?>
		<?php wp_reset_postdata(); endif; // Reset the global $the_post as this query will have stomped on it ?>

	<?php
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['number'] = (int) $new_instance['number'];
		$instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
		$instance['show_image'] = isset( $new_instance['show_image'] ) ? (bool) $new_instance['show_image'] : false;

		return $instance;
	}

	function form( $instance ) {
		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : esc_html__( 'Recent Posts', 'rigel' );
		$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
		$show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : true;
		$show_image = isset( $instance['show_image'] ) ? (bool) $instance['show_image'] : true;
?>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'rigel' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /></p>

		<p><label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of posts to show:', 'rigel' ); ?></label>
		<input id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" size="3" /></p>

		<p><input class="checkbox" type="checkbox" <?php esc_attr( checked( $show_date ) ); ?> id="<?php echo esc_attr( $this->get_field_id( 'show_date' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_date' ) ); ?>" />
		<label for="<?php echo esc_attr( $this->get_field_id( 'show_date' ) ); ?>"><?php esc_html_e( 'Display post date?', 'rigel' ); ?></label></p>
        
        <p><input class="checkbox" type="checkbox" <?php esc_attr( checked( $show_image ) ); ?> id="<?php echo esc_attr( $this->get_field_id( 'show_image' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_image' ) ); ?>" />
		<label for="<?php echo esc_attr( $this->get_field_id( 'show_image' ) ); ?>"><?php esc_html_e( 'Display post image?', 'rigel' ); ?></label></p>


<?php
	}
}

function rigel_recent_post_widget_init(){
	register_widget( 'Rigel_Recent_Post_Widget' );	
}
add_action( 'widgets_init','rigel_recent_post_widget_init' );