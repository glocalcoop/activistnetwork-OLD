<?php get_template_part( 'partials/header' ); ?>

			<h1 class="archive-title"><span><?php _e( 'Search Results for:', 'glocal-network' ); ?></span> <?php echo esc_attr(get_search_query()); ?>
			</h1>

			<div id="main" class="first clearfix" role="main">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<?php get_template_part( 'partials/content-search' ); ?>

				<?php endwhile; ?>

				<?php else : ?>

					<?php get_template_part( 'partials/content-404' ); ?>

				<?php endif; ?>

			</div>

			<?php get_sidebar(); ?>
			
<?php get_template_part( 'partials/footer' ); ?>

