<?php 

class Rigel_RecentTweet extends WP_Widget {
	
	function  __construct(){
		$widget_options = array( 'classname' => 'recentTweets', 'description' => esc_html__('Display Recent Tweets', 'rigel' ));
		parent:: __construct( 'pix_recent_tweets',esc_html__( 'Rigel:: Recent Tweets','rigel' ),$widget_options);
	}
	
	function widget($args, $instance){
		extract($args);
		$title = ($instance['title']) ? $instance['title'] : esc_html__('Recent Tweets', 'rigel' );
		$twtUsr = ($instance['twtUsr']) ? $instance['twtUsr'] : 'envato';
		$twtCount = ($instance['twtCount']) ? $instance['twtCount'] : '3';
		$slider = ($instance['slider']) ? $instance['slider'] : 'yes';
		$follow = $instance['displayFollowMeLink'];
		$class = $slider_data = $output = '';
		?>
		<?php echo $before_widget; ?>
		<?php echo $before_title . esc_html($title) . $after_title ; ?>
		<?php if (!empty($twtUsr)){

			if($slider == 'yes'){
				// $class = ' owl-carousel';
$class = '';
				$slider_data = ' data-items="1" data-autoheight="true" data-dots="true" data-touch-drag="true" data-mouse-drag="false" data-stop-on-hover="true" data-nav="false" data-slide-speed="5000" data-autoplay="true"';
			}else{
				$class = ' no-slider';
			}
			echo '<div class="tweets'. esc_attr($class) .'"'. $slider_data .'>';
			$tweets = getTweets(20, $twtUsr);

			$i = 1;

			if( is_array($tweets) && ! empty($tweets) ) {  
				foreach($tweets as $tweet){ 								
	
				    if( isset( $tweet['text'] ) && $tweet['text'] ){
				    	echo '<div class="tweet">
							<span class="tweet-icon pixicon-twitter"></span><div class="tweet-content-wrap">';
							$the_tweet = $tweet['text'];
							/*
					        Twitter Developer Display Requirements
					        https://dev.twitter.com/terms/display-requirements
	
					        2.b. Tweet Entities within the Tweet text must be properly linked to their appropriate home on Twitter. For example:
					          i. User_mentions must link to the mentioned user's profile.
					         ii. Hashtags must link to a twitter.com search with the hashtag as the query.
					        iii. Links in Tweet text must be displayed using the display_url
					             field in the URL entities API response, and link to the original t.co url field.
					        */
	
					        // i. User_mentions must link to the mentioned user's profile.
							if(is_array($tweet['entities']['user_mentions'])){
					            foreach($tweet['entities']['user_mentions'] as $key => $user_mention){
					                $the_tweet = preg_replace(
					                    '/@'.$user_mention['screen_name'].'/i',
					                    '<a href="http://www.twitter.com/'.$user_mention['screen_name'].'" target="_blank">@'.$user_mention['screen_name'].'</a>',
					                    $the_tweet);
					            }
					        }
	
					        // ii. Hashtags must link to a twitter.com search with the hashtag as the query.
					        if(is_array($tweet['entities']['hashtags'])){
					            foreach($tweet['entities']['hashtags'] as $key => $hashtag){
					                $the_tweet = preg_replace(
					                    '/#'.$hashtag['text'].'/i',
					                    '<a href="https://twitter.com/search?q=%23'.$hashtag['text'].'&src=hash" target="_blank">#'.$hashtag['text'].'</a>',
					                    $the_tweet);
					            }
					        }
	
					        // iii. Links in Tweet text must be displayed using the display_url
					        //      field in the URL entities API response, and link to the original t.co url field.
					        if(is_array($tweet['entities']['urls'])){
					            foreach($tweet['entities']['urls'] as $key => $link){
					                $the_tweet = preg_replace(
					                    '`'.$link['url'].'`',
					                    '<a href="'.$link['url'].'" target="_blank">'.$link['url'].'</a>',
					                    $the_tweet);
					            }
					        }
	
					        echo '<div class="tweet-content">'. $the_tweet .'</div>';
	
	
					        // 3. Tweet Actions
					        //    Reply, Retweet, and Favorite action icons must always be visible for the user to interact with the Tweet. These actions must be implemented using Web Intents or with the authenticated Twitter API.
					        //    No other social or 3rd party actions similar to Follow, Reply, Retweet and Favorite may be attached to a Tweet.
					        // get the sprite or images from twitter's developers resource and update your stylesheet
					        echo '
					        <div class="twitter_intents">
					            <p><a class="reply" href="https://twitter.com/intent/tweet?in_reply_to='.$tweet['id_str'].'" target="_blank"><i class="pixicon-reply"></i><span class="tweet-hover"><span>Reply</span></span></a></p>
					            <p><a class="retweet" href="https://twitter.com/intent/retweet?tweet_id='.$tweet['id_str'].'" target="_blank"><i class="pixicon-retweet"></i><span class="tweet-hover"><span>Retweet</span></span></a></p>
					            <p><a class="favorite" href="https://twitter.com/intent/favorite?tweet_id='.$tweet['id_str'].'" target="_blank"><i class="pixicon-heart-3"></i><span class="like-count">'. $tweet['favorite_count'] .'</span><span class="tweet-hover"><span>Like</span></span></a></p>
					        </div>';
	
	
					        // 4. Tweet Timestamp
					        //    The Tweet timestamp must always be visible and include the time and date. e.g., “3:00 PM - 31 May 12”.
					        // 5. Tweet Permalink
					        //    The Tweet timestamp must always be linked to the Tweet permalink.
					        // echo '
					        // <p class="timestamp">
					        //     <a href="https://twitter.com/'. $twtUsr .'/status/'.$tweet['id_str'].'" target="_blank">
					        //         '.date('h:i A M d',strtotime($tweet['created_at']. '- 8 hours')).'
					        //     </a>
					        // </p>';// -8 GMT for Pacific Standard Time
	
					    echo '</div></div>';
	
					    if($i == $twtCount){ break; }								
						$i++;
	
				    } else {
				    	echo '<div>' . $tweets['error'] .'</div>';
				        echo '
				        <br /><br />
				        <a href="http://twitter.com/'. $twtUsr .'" target="_blank">Click here to read '. $twtUsr .'\'S Twitter feed</a>';
				    }
				}
	
				echo '</div>';
			}
		}
		if ($follow == "yes"){
			echo '<p>Follow <a href="https://twitter.com/'. esc_attr($twtUsr) .'">@'. esc_html($twtUsr) .'</a></p>';	
		}
		
		?>
		
		<?php echo $after_widget; ?>
		<?php		
	}

	function form($instance){
		?>
		
		<p><label for="<?php echo $this->get_field_id('title');?>">
		<?php esc_html_e('Title:', 'rigel' ) ?>
		<input class="widefat" id="<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('title');?>" value="<?php echo esc_attr(isset($instance['title']) ? $instance['title'] : ''); ?>" type="text"></label></p>
		
		<p><label for="<?php echo $this->get_field_id('twtUsr');?>">
		<?php esc_html_e('Twitter Username (without @ eg:"envato"):', 'rigel' ) ?>
		<input class="widefat" id="<?php echo $this->get_field_id('twtUsr');?>" name="<?php echo $this->get_field_name('twtUsr');?>" value="<?php echo esc_attr(isset($instance['twtUsr']) ? $instance['twtUsr'] : ''); ?>" type="text"></label></p>
		
		<p><label for="<?php echo $this->get_field_id('twtCount');?>">
		<?php esc_html_e('Tweet Count (Max 20):', 'rigel' ) ?>
		<input class="widefat" id="<?php echo $this->get_field_id('twtCount');?>" name="<?php echo $this->get_field_name('twtCount');?>" value="<?php echo esc_attr((isset($instance['title']) || !empty($instance['twtCount']) ? $instance['twtCount'] : '3' )) ; ?>" type="number" style="width:40px;" min="1" max="10"></label></p>

		<p><label for="<?php echo $this->get_field_id('slider');?>">
			<?php esc_html_e('Display as slider:', 'rigel' ) ?>
			<select id="<?php echo $this->get_field_id('slider');?>" name="<?php echo $this->get_field_name('slider');?>">
				<?php $slider = isset($instance['slider']) ? $instance['slider'] : 'yes';?>
				<option value="yes" <?php selected( $slider, "yes" ); ?>>Yes</option>
				<option value="no" <?php selected( $slider, "no" ); ?>>No</option>
			</select>
		</p>
		
		<p>
			<label><?php esc_html_e('Display "Follow Me" Link?', 'rigel' ) ?></label> 
			<select id="<?php echo $this->get_field_id('displayFollowMeLink');?>" name="<?php echo $this->get_field_name('displayFollowMeLink');?>">
				<?php $displayFollowMeLink = isset($instance['displayFollowMeLink']) ? $instance['displayFollowMeLink'] : 'no';?>
				<option value="yes" <?php selected( $displayFollowMeLink, "yes" ); ?>>Yes</option>
				<option value="no" <?php selected( $displayFollowMeLink, "no" ); ?>>No</option>
			</select>
		</p>
		
		<?php
	}
	
}

function rigel_recent_tweet_widget_init(){
	register_widget( 'Rigel_RecentTweet' );	
}
add_action( 'widgets_init','rigel_recent_tweet_widget_init' );