<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Glocal Network
 */

get_header(); ?>

	<?php

	$glocal_home_settings = glocal_customation_settings();

	echo '<pre>';
	var_dump($glocal_home_settings);
	echo '</pre>';

 ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->

		<section id="home-modules">

			<?php if (! is_multisite() ) { // Check to see if multisite is active. If not, display a recent posts and events module for this site. ?> 

				<?php get_template_part( 'partials/error', 'multisite' ); ?>

			<?php } else { ?>

				<?php
				if (in_array("posts", $glocal_home_settings['modules'])) {
					
					// Get network-wide posts
					get_template_part( 'modules/network', 'posts' );
				}
				?>

				<?php
				if (in_array("events", $glocal_home_settings['modules'])) {
					
					// Get network-wide events
					get_template_part( 'modules/network', 'events' );
				}
				?>

				<?php
				if (in_array("sites", $glocal_home_settings['modules'])) {

					// Get network-wide sites
					get_template_part( 'modules/network', 'sites' );
				}
				?>

			<?php } ?>

			<?php
			// Get widgets
			dynamic_sidebar( 'home-modules' ); ?>


		</section>


	</div><!-- #primary -->

<?php get_footer(); ?>
