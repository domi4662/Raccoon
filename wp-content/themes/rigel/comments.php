<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package rigel
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
	
$rigel_comment_title = rigel_get_option_value( 'single_comment_title', esc_html__('Comments', 'rigel' ) );
$rigel_comment_form_title = rigel_get_option_value( 'single_comment_form_title', esc_html__('Leave a Comment', 'rigel' ) );
$rigel_comment_form_btn_text = rigel_get_option_value( 'single_comment_form_btn_text', esc_html__('Add Comment', 'rigel' ) );
	
if ( have_comments() ) : ?>
	<div class="clearfix comments">

		<h3 id="comments-title" class="title">
			<?php
				printf( // WPCS: XSS OK.
					esc_html( _nx( 'One comment', '%1$s %2$s', get_comments_number(), 'comments title', 'rigel' ) ),
					number_format_i18n( get_comments_number() ),
					'<span>' . $rigel_comment_title . '</span>'
				);
			?>
		</h3><!-- .comments-title -->
		
		<ul class="comment-list">
			<?php wp_list_comments('callback=rigel_comments'); ?>
		</ul>

		<div class="pagination">
		    <?php paginate_comments_links(); ?> 
		</div>

	</div>
  
	<?php else : // this is displayed if there are no comments so far ?>

		<?php if ( comments_open() ) : ?>
	    	<!-- If comments are open, but there are no comments. -->

		<?php else : // comments are closed ?>
	
		<!-- If comments are closed. -->
		<!--p class="nocomments"><?php esc_html_e("Comments are closed.", 'rigel' ); ?></p-->

		<?php endif; ?>

<?php endif; ?>


<?php if ( comments_open() ) : ?>

<div class="clear">	
	<?php 

	$rigel_commenter = wp_get_current_commenter();
	$rigel_req = get_option( 'require_name_email' );
	$rigel_aria_req = ( $rigel_req ? " aria-required='true'" : '' );

	$rigel_comments_args = array(
	  'id_form'           => 'commentform',
	  'id_submit'         => 'submit',
	  'title_reply'       => $rigel_comment_form_title,
	  'title_reply_to'    => esc_html__( 'Leave a Reply to %s', 'rigel' ),
	  'cancel_reply_link' => esc_html__( 'Cancel Reply', 'rigel' ),
	  'label_submit'      => $rigel_comment_form_btn_text,
	 

	  'comment_field' =>  '<p class="comment-form-comment  clear col-md-12"><label for="comment">Comment<span class="color">*</span>'.
	    '</label><textarea id="comment" class="textArea" name="comment"  cols="45" rows="8" placeholder="'. esc_attr__( 'Your Comment here...', 'rigel' ) .'" aria-required="true">' .
	    '</textarea></p>',

	  'comment_notes_before' => '',  

	  'comment_notes_after' => '',

	  'fields' => apply_filters( 'comment_form_default_fields', array(
      
	    'author' =>
	      '<p class="comment-form-author col-md-6">' .
	     
	      '<input id="author" name="author"  class="textArea" type="text" value="" size="30" placeholder="'. esc_attr__( 'Your Name', 'rigel' ) .'"' . $rigel_aria_req . ' /></p>',

	    'email' =>
	      '<p class="comment-form-email col-md-6">' .
	      '<input id="email" name="email"  class="textArea" type="text" value="" size="30" placeholder="'. esc_attr__( 'Your E-Mail', 'rigel' ) .'"' . $rigel_aria_req . ' /></p>',

	    'url' =>
	      '<p class="comment-form-url col-md-12">' .
	      '<input id="url" name="url" type="text"   class="textArea" value="" size="30" placeholder="'. esc_attr__( 'Got a website?', 'rigel' ) .'" /></p>'
	    )
    
	  ),
	);

	comment_form( $rigel_comments_args );

	do_action( 'comment_form', $post->ID ); 
	?>

</div>

<?php endif; // if you delete this the sky will fall on your head ?>
