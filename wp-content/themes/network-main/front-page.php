<?php
// Template: Front Page

// This template makes heavy use of the Events Manager and the network-latest-posts plugin.
// Without Events Manager, the events module (module 3) will not appear.
// Without the network-latest-posts function, the network-wide posts (module 1 and module 2) will not appear

?>

<?php get_header(); ?>

<div class="content">

	<div class="wrap">

		<section class="home-start">
		
			<article class="home-intro">
				<!-- Displays any content entered in the page used as the front page -->
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile; endif; ?>
			</article>
			
		</section>

		<section class="home-modules">
			<?php if ( is_multisite() ) { // Check to see if multisite is active. If not, display a recent posts and events module for this site. ?> 
			<?php $sites = wp_get_sites('offset=1'); // Set up variable that holds array of sites ?>

			<?php 
			if(function_exists('glocal_home_category')) {
				$postcategory = glocal_home_category(); // Get the category from theme customization 
				$categoryid = get_option("glocal_options");
			} 

			if(function_exists('glocal_home_header')) {
				$heading = glocal_home_header(); // Get the header text from theme customization 
				if(!empty($heading)) {
					$postheading = $heading;
				} elseif(!empty($postcategory)) {
					$postheading = $postcategory;
				}
				else {
					$postheading = 'Latest'; // Fallback header text. Change to whatever you'd like.
				}
			}
			?>

			<article id="highlights-module" class="module row highlights clearfix">
				<h2 class="module-heading"><?php echo $postheading ?></h2>

			<?php
			if(function_exists( 'network_latest_posts' )) {

				$parameters = array(
				'title'         => '',
				'title_only'    => 'false',
				'auto_excerpt'  => 'true',
				'display_type'     => 'ulist',
				'full_meta'		=> 'true',
				'category'         => $postcategory,          // Widget title
				'number_posts'     => 9,
				'wrapper_list_css' => 'highlights-list',
				'wrapper_block_css'=> 'module row highlights', //The wrapper classe
				'instance'         => 'highlights-module', //The wrapper ID
				);
				// Execute
				$hightlights_posts = network_latest_posts($parameters);
			} else {
				echo 'Please activate the Network Posts plugin to display this content';
			}
			?>

			</article>

			<script type="text/javascript">
			jQuery(document).ready(function(){
				jQuery('.news-list').bxSlider({
					slideWidth: 5000,
					minSlides: 2,
					maxSlides: 2,
					slideMargin: 10,
					pager: false
				});
				var responsive_viewport = jQuery(window).width();
				if (responsive_viewport < 320) {
					jQuery('.news-list').reloadSlider({
					slideWidth: 5000,
					minSlides: 1,
					maxSlides: 1,
					slideMargin: 10,
					pager: false
					});
				} 
			});
			</script>

			<article id="news-module" class="module row news clearfix">
				<h2 class="module-heading">
					<a href="/news/">News</a>
				</h2>

			<?php
			if(function_exists( 'network_latest_posts' )) {

				$parameters = array(
				'title'         => '',
				'title_only'    => 'false',
				'display_type'     => 'ulist',
				'auto_excerpt'  => 'true',
				'full_meta'		=> 'true',
				// 'category'         => 'news',
				'excerpt_length'   => '20',
				'number_posts'     => 2,
				'wrapper_list_css' => 'news-list',
				'wrapper_block_css'=> 'module row news', //The wrapper classe
				'instance'         => 'news-module', //The wrapper ID
				);
				// Execute
				$recent_posts = network_latest_posts($parameters);
			} else {
				echo 'Please activate the Network Posts plugin to display this content';
			}
			?>
			</article>

			<?php // Check to see if Events Manager is active. If not don't display this module.
			if ( is_plugin_active('events-manager/events-manager.php') ) { ?>
			<article id="events-module" class="module row events">
				<h2 class="module-heading"><a href="/events/">Events</a></h2>
				<ul class="events-list">
					<?php
					$events = EM_Events::output(array('limit'=>7, 
						'format'=>'<li>
						<h6 class="event-start">
    				        <time class="event-month" datetime="#M">#M</time>
    				        <time class="event-date" datetime="#j">#j</time>
    				        <time class="event-day" datetime="#D">#D</time>
    					</h6>
						<h3 class="post-title event-title">#_EVENTLINK</h3>
						</li>'));?>
					<?php echo $events; ?>
					<li class="event-promo"><h3 class="promo-title"><a href="/events" title="Calendar">View all events</a></h3></li>
				</ul>
			</article>
			<?php } ?>
			
			
			<article id="sites-module" class="module row sites">
				<h2 class="module-heading"><a href="/directory">Sites</a></h2>
				<ul class="sites-list">

				<?php
				$counter = 0; 

				foreach ($sites as $site) {
					$site_id = $site['blog_id'];
					$site_details = get_blog_details($site_id);

					if(function_exists('glocal_get_site_image')) {
						$header = glocal_get_site_image($site_id);
					} 
					?>
				
					<li id="site-<?php echo $site_id; ?>">
					    <a href="<?php echo $site_details->path; ?>" title="<?php echo $site_details->blogname; ?>" class="item-image <?php if(!$header) { echo 'no-image'; } ?>" style="background-image: url('<?php if($header) { echo $header; } ?>');"></a>
						<h3 class="item-title"><a href="<?php echo $site_details->path; ?>" title="<?php echo $site_details->blogname; ?>"><?php echo $site_details->blogname; ?></a></h3>
						<h6 class="meta item-modified"><span class="modified-title">Last updated</span> <time><?php echo date_i18n(get_option('date_format') ,strtotime($site_details->last_updated));?></time></h6>
					</li>
				
				<?php
                    if (++$counter == 7) break;
                } ?>

					<li class="directory-promo" id="promo-directory">
						<a href="/directory" title="Directory">
    						<h3 class="post-title">Join the Network</h3>
    						<div class="promo-icons"><i class="icon"></i><i class="icon"></i><i class="icon"></i><i class="icon"></i></div>
						</a>
					</li>

				</ul>
			</article>

			<?php } else { // If multisite isn't enabled, show a recent posts module for the site ?>

			<article id="news-module" class="module row news">

				<?php get_template_part( 'partials/error', 'multisite' ); ?>

			</article>
			<?php // Check to see if Events Manager is active. If not don't display this module.
			if ( is_plugin_active('events-manager/events-manager.php') ) { ?>
			<article id="events-module" class="module row events">
				<h2 class="module-heading"><a href="/events/">Events</a></h2>
				<ul class="events-list">
					<?php
					$events = EM_Events::output(array('limit'=>5, 
						'format'=>'<li>
						<h6 class="event-start">
    				        <time class="event-month" datetime="#M">#M</time>
    				        <time class="event-date" datetime="#j">#j</time>
    				        <time class="event-day" datetime="#D">#D</time>
    					</h6>
						<h3 class="post-title event-title">#_EVENTLINK</h3>
						</li>'));?>
					<?php echo $events; ?>
				</ul>
			</article>
			<?php } ?>


			<?php } ?>

			<?php // Widgets

			dynamic_sidebar( 'home-modules' ); ?>

			<?php
			

			// $posts = get_posts('post_type=post');
			// echo "<pre>";
			// var_dump($news);
			// echo "</pre>";

			?>
		</section>

	</div>

</div>

<?php get_footer(); ?>
