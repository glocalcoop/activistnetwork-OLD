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


/************* FEATURED IMAGE PREVIEW IN ADMIN ********************/

// add_theme_support( 'post-thumbnails' ); // theme should support
function glocal_add_post_thumbnail_column( $cols ) { // add the thumb column
  // output feature thumb in the end
  //$cols['glocal_post_thumb'] = __( 'Featured image', 'glocal-network' );
  //return $cols;
  // output feature thumb in a different column position
  $cols_start = array_slice( $cols, 0, 2, true );
  $cols_end   = array_slice( $cols, 2, null, true );
  $custom_cols = array_merge(
    $cols_start,
    array( 'glocal_post_thumb' => __( 'Featured image', 'glocal-network' ) ),
    $cols_end
  );
  return $custom_cols;
}
add_filter( 'manage_posts_columns', 'glocal_add_post_thumbnail_column', 5 ); // add the thumb column to posts
// add_filter( 'manage_pages_columns', 'glocal_add_post_thumbnail_column', 5 ); // add the thumb column to pages

function glocal_display_post_thumbnail_column( $col, $id ) { // output featured image thumbnail
  switch( $col ){
    case 'glocal_post_thumb':
      if( function_exists( 'the_post_thumbnail' ) ) {
        echo the_post_thumbnail( 'thumbnail' );
      } else {
        echo __( 'Not supported in theme', 'glocal-network' );
      }
      break;
  }
}
add_action( 'manage_posts_custom_column', 'glocal_display_post_thumbnail_column', 5, 2 ); // add the thumb to posts
// add_action( 'manage_pages_custom_column', 'glocal_display_post_thumbnail_column', 5, 2 ); // add the thumb to pages

/************* ADD SLUG TO BODY CLASS *****************/

// Add specific CSS class by filter
add_filter('body_class','glocal_class_names');
function glocal_class_names($classes) {
	// add 'class-name' to the $classes array
	global $post; 
	$post_slug_class = $post->post_name; 
	$classes[] = $post_slug_class . ' page-' . $post_slug_class;
	// return the $classes array
	return $classes;
}

/************* CUSTOM EXCERPT *****************/

function get_excerpt_by_id($post_id, $length='55', $trailer=' ...') {
	$the_post = get_post($post_id); //Gets post ID
	$the_excerpt = $the_post->post_content; //Gets post_content to be used as a basis for the excerpt
	$excerpt_length = $length; //Sets excerpt length by word count
	$the_excerpt = strip_tags(strip_shortcodes($the_excerpt)); //Strips tags and images
	$words = explode(' ', $the_excerpt, $excerpt_length + 1);

	if(count($words) > $excerpt_length) :
		array_pop($words);
		$trailer = '<a href="' . get_permalink($post_id) . '">' . $trailer . '</a>';
		array_push($words, $trailer);
		$the_excerpt = implode(' ', $words);
	endif;
	// $the_excerpt = '<p>' . $the_excerpt . '</p>';
	return $the_excerpt;
}

/************* GET GLOBAL NAVIGATION FROM MAIN SITE (SITE 1) (MULTISITE) *****************/

function glocal_navigation() {

	//store the current blog_id being viewed
	global $blog_id;
	$current_blog_id = $blog_id;

	//switch to the main blog which will have an id of 1
	switch_to_blog(1);

	//output the WordPress navigation menu
	$glocal_nav = bones_main_nav();

	//switch back to the current blog being viewed
	switch_to_blog($current_blog_id);

	return $glocal_nav;
}

/************* GET CUSTOM HEADER IMAGE FROM NETWORK SITES (MULTISITE) *****************/

function glocal_get_site_image($site_id) {
	//store the current blog_id being viewed
	global $blog_id;
	$current_blog_id = $blog_id;

	//switch to the main blog designated in $site_id
	switch_to_blog($site_id);

	$site_image = get_custom_header();

	//switch back to the current blog being viewed
	switch_to_blog($current_blog_id);

	return $site_image->thumbnail_url;
}

/************* HACK TO FIX TITLE ON STATIC HOMEPAGE *****************/

add_filter( 'wp_title', 'glocal_hack_wp_title_for_home' );

function glocal_hack_wp_title_for_home( $title ) {
  if( empty( $title ) && ( is_home() || is_front_page() ) ) {
    return __( 'Home', 'glocal-network' ) . ' | ';
  }
  return $title;
}

/************* REMOVE UNWANTED THEME SUPPORT OPTIONS *****************/
// http://codex.wordpress.org/Function_Reference/add_theme_support
// http://codex.wordpress.org/Function_Reference/remove_theme_support

function glocal_custom_theme_support() {

	// Turn off support for custom background
	remove_theme_support( 'custom-background' );

	// Turn on support for custom header image
	add_theme_support( 'custom-header', array(
		'header-text' => false
	) );

}
add_action( 'after_setup_theme', 'glocal_custom_theme_support', 11 );


/************* CUSTOM IMAGE SIZES *****************/
// http://codex.wordpress.org/Function_Reference/add_image_size

add_image_size( 'glocal-thumb-600', 600, 150, true );
add_image_size( 'glocal-thumb-300', 300, 100, true );
add_image_size( 'glocal-thumb-150', 150, 150, true );


/************* PASS PARAMETERS TO GET_TEMPLATE_PART FUNCTION *****************/
// http://wordpress.stackexchange.com/questions/4462/passing-variables-through-locate-template

// Example Usage:
// $params = array(
//     'numberposts' => '10'
// );

// glocal_get_template_part('content', 'heighlight', $params);

// $params array will be available in template

function glocal_get_template_part($slug = null, $name = null, array $params = array()) {
	// Make WP globals available in template
    global $posts, $post, $wp_did_header, $wp_query, $wp_rewrite, $wpdb, $wp_version, $wp, $id, $comment, $user_ID;

    do_action("get_template_part_{$slug}", $slug, $name);
    $templates = array();
    if (isset($name))
        $templates[] = "{$slug}-{$name}.php";

    $templates[] = "{$slug}.php";

    $_template_file = locate_template($templates, false, false);

    if (is_array($wp_query->query_vars)) {
        extract($wp_query->query_vars, EXTR_SKIP);
    }
    extract($params, EXTR_SKIP);

    require($_template_file);
}


?>