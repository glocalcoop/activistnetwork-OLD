<?php
// Template: Front Page

// This template makes heavy use of the Events Manager and Options Framework plugins and the recent-network-posts function (included in with this theme in recent-network-posts.php).
// Without Events Manager, the events module (module 3) will not appear.
// Without the recent-network-posts function, the network-wide posts (module 1 and module 2) will not appear

?>

<?php get_template_part( 'partials/header' ); ?>

		<section class="home-start">
		
			<article class="home-intro">
				<!-- Displays any content entered in the page used as the front page -->
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php get_template_part( 'partials/content-post-body' ); ?>
				<?php endwhile; endif; ?>
			</article>
			
		</section>

		<section class="home-modules">

			<?php if ( is_multisite() ) { // Check to see if multisite is active. If not, display a recent posts and events module for this site. ?> 

			<?php get_template_part( 'partials/home-posts' ); ?>

			<?php dynamic_sidebar( 'home-modules' ); ?>

			<?php get_template_part( 'partials/home-events' ); ?>

			<?php get_template_part( 'partials/home-sites' ); ?>


			<?php } else { // If multisite isn't enabled, show a recent posts module for the site ?>

			<article id="news-module" class="module row news">
				<h2 class="module-heading"><a href="/news/">News</a></h2>
				<ul class="news-list">
					<?php 
					// WP_Query arguments
					$recentargs = array (
						'post_type'              => 'post',
						'ignore_sticky_posts'    => false,
					);

					// The Query
					$recentposts = new WP_Query($recentargs);
					?>
					<?php while ($recentposts->have_posts()) : $recentposts->the_post(); ?>
					<li>
						<h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<p class="post-excerpt"><?php the_excerpt(); ?>
						<span class="meta post-date"><?php the_date(); ?><?php// echo date_i18n(get_option('date_format'),strtotime($date));?></span></p>
					</li>
					<?php endwhile; ?>
				</ul>
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

			<?php
			

			// $posts = get_posts('post_type=post');
			// echo "<pre>";
			// var_dump($news);
			// echo "</pre>";

			?>
		</section>

<?php get_template_part( 'partials/footer' ); ?>
