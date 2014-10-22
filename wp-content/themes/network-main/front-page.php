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


			<?php

				$glocal_home_settings = glocal_customation_settings();

				// echo '<pre>';
				// var_dump($glocal_home_settings);
				// echo '</pre>';

			 ?>

			 <?php if (! is_multisite() ) { // Check to see if multisite is active. If not, display a recent posts and events module for this site. ?> 

				<?php get_template_part( 'partials/error', 'multisite' ); ?>

			<?php } else { ?>

				<?php
				if (in_array("posts", $glocal_home_settings['modules'])) {
					
					// Get network-wide posts
					get_template_part( 'partials/home-module', 'posts' );
				}
				?>

				<?php
				if (in_array("events", $glocal_home_settings['modules'])) {
					
					// Get network-wide events
					get_template_part( 'partials/home-module', 'events' );
				}
				?>

				<?php
				if (in_array("sites", $glocal_home_settings['modules'])) {

					// Get network-wide sites
					get_template_part( 'partials/home-module', 'sites' );
				}
				?>

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
