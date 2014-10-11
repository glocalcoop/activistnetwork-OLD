<?php

/************* CUSTOM WIDGET FOR DISPLAYING SOCIAL LINKS ***************/


class glocal_social_plugin extends WP_Widget {

	// constructor
	function glocal_social_plugin() {
		parent::WP_Widget(false, $name = __('Social Links Widget', 'glocal-network') );
	}

	// widget form creation
	function form($instance) {

	// Check values
	if( $instance) {
		$title = esc_attr($instance['title']);

		$email = esc_attr($instance['email']);
		$twitter = esc_attr($instance['twitter']);
		$facebook = esc_attr($instance['facebook']);
		$github = esc_attr($instance['github']);
		$reddit = esc_attr($instance['reddit']);
		$rss = esc_attr($instance['rss']);
		$othername = esc_attr($instance['othername']);
		$otherlink = esc_attr($instance['otherlink']);
	} else {
		$title = '';

		$email = '';
		$twitter = '';
		$facebook = '';
		$reddit = '';
		$rss = '';
		$othername = '';
		$otherlink = '';
	}
	?>

	<p>
	<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Title', 'glocal-social-widget'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
	</p>

	<!-- Social Links -->
	<p>
	<label for="<?php echo $this->get_field_id('email'); ?>"><?php _e('Email:', 'glocal-social-widget'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" placeholder="user@email.com" type="text" value="<?php echo $email; ?>" />
	</p>
	<p>
	<label for="<?php echo $this->get_field_id('twitter'); ?>"><?php _e('Twitter:', 'glocal-social-widget'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" placeholder="http://twitter.com/YOURTWITTERNAME" type="text" value="<?php echo $twiter; ?>" />
	</p>
	<p>
	<label for="<?php echo $this->get_field_id('facebook'); ?>"><?php _e('Facebook:', 'glocal-social-widget'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" placeholder="http://facebook.com/FACEBOOKNAME" type="text" value="<?php echo $facebook; ?>" />
	</p>
	<p>
	<label for="<?php echo $this->get_field_id('github'); ?>"><?php _e('Github:', 'glocal-social-widget'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('github'); ?>" name="<?php echo $this->get_field_name('github'); ?>" placeholder="https://github.com/GITHUBNAME" type="text" value="<?php echo $github; ?>" />
	</p>
	<label for="<?php echo $this->get_field_id('reddit'); ?>"><?php _e('Reddit:', 'glocal-social-widget'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('reddit'); ?>" name="<?php echo $this->get_field_name('reddit'); ?>" placeholder="http://www.reddit.com/user/REDDITNAME/.rss" type="text" value="<?php echo $reddit; ?>" />
	</p>
	<label for="<?php echo $this->get_field_id('rss'); ?>"><?php _e('RSS:', 'glocal-social-widget'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('rss'); ?>" name="<?php echo $this->get_field_name('rss'); ?>" placeholder="<?php bloginfo('rss2_url'); ?>" type="text" value="<?php echo $rss; ?>" />
	</p>
	<label for="<?php echo $this->get_field_id('othername'); ?>"><?php _e('Other:', 'glocal-social-widget'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('othername'); ?>" name="<?php echo $this->get_field_name('othername'); ?>" placeholder="Social Network Name" type="text" value="<?php echo $othername; ?>" />
		<input class="widefat" id="<?php echo $this->get_field_id('otherlink'); ?>" name="<?php echo $this->get_field_name('otherlink'); ?>" placeholder="http://socialnetwork.com/USERNAME" type="text" value="<?php echo $otherlink; ?>" />
	</p>
	<?php
	}

	// update widget
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		// Fields
		$instance['title'] = strip_tags($new_instance['title']);

		$instance['email'] = strip_tags($new_instance['email']);
		$instance['twitter'] = strip_tags($new_instance['twitter']);
		$instance['facebook'] = strip_tags($new_instance['facebook']);
		$instance['github'] = strip_tags($new_instance['github']);
		$instance['reddit'] = strip_tags($new_instance['reddit']);
		$instance['rss'] = strip_tags($new_instance['rss']);
		$instance['othername'] = strip_tags($new_instance['othername']);
		$instance['otherlink'] = strip_tags($new_instance['otherlink']);
	return $instance;
	}

	// display widget
	function widget($args, $instance) {
		extract( $args );
		// these are the widget options
		$title = apply_filters('widget_title', $instance['title']);

		$email = esc_attr($instance['email']);
		$twitter = esc_attr($instance['twitter']);
		$facebook = esc_attr($instance['facebook']);
		$github = esc_attr($instance['github']);
		$reddit = esc_attr($instance['reddit']);
		$rss = esc_attr($instance['rss']);
		$othername = esc_attr($instance['othername']);
		$otherlink = esc_attr($instance['otherlink']);

	   echo $before_widget;
	   // Display the widget
	   echo '<ul class="nav-social" id="social-group">';

		// Check if title is set
		if ( $title ) {
			echo $before_title . $title . $after_title;
		}

		// Check if email is set
		if( $email ) {
			echo '<li class="email"><a href="mailto:' . $email . '" name="email"></a></li>';
		}
		// Check if github is set
		if( $github) {
			echo '<li class="github"><a href="' . $github . '" name="github" target="_blank"></a></li>';
		}
		// Check if twitter is set
		if( $twitter ) {
			echo '<li class="twitter"><a href="' . $twitter . '" name="twitter" target="_blank"></a></li>';
		}
		// Check if facebook is set
		if( $facebook ) {
			echo '<li class="facebook"><a href="' . $facebook . '" name="facebook" target="_blank"></a></li>';
		}
		// Check if other is set
		if( $otherlink ) {
			echo '<li class="network"><a href="' . $otherlink . '" name="' . $othername . '" target="_blank"></a></li>';
		}
		// Check if rss is set
		if( $rss ) {
			echo '<li class="rss"><a href="' . $rss . '" name="rss" target="_blank"></a></li>';
		} else {
			echo '<li class="rss"><a href="';
			bloginfo('rss2_url');
			echo '" name="rss"></a></li>';
		}

		echo '</ul>';
		echo $after_widget;
	}
}

// register widget
add_action('widgets_init', create_function('', 'return register_widget("glocal_social_plugin");'));


?>