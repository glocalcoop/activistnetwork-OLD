<?php get_header(); ?>

<div class="content">

	<div class="wrap">

		<main role="main">

			<?php 
			// Get current path
			$path = $_SERVER['REQUEST_URI'];

			// Get slug from path
			$category_slug = basename($path);
			?>

			<?php
			if(function_exists( 'network_latest_posts' )) {

				$parameters = array(
				'category'         => $category_slug,
				'title_only'    => 'false',
				'auto_excerpt'  => 'true',
				'full_meta'		=> 'true',
				'show_categories'    => 'true', 
				'display_type'		=> 'block',
				'thumbnail'        => 'true',
				'thumbnail_wh'	   => 'medium',
				'thumbnail_class'  => 'post-image',
				'wrapper_list_css' => 'post-list',
				'wrapper_block_css'=> '', //  wrapper class to add
				'instance'         => '', // wrapper ID to add
				);
				// Execute
				$posts = network_latest_posts($parameters);

			} else {

				get_template_part( 'partials/error', 'plugin' );

			}
			?>

		</main>

		<?php get_sidebar(); ?>

	</div>

</div>

<?php get_footer(); ?>
