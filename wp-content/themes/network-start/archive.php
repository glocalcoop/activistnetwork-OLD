<?php get_template_part( 'partials/header' ); ?>

			<div role="main" id="main" class="main-archive">

				<?php if (is_category()) { ?>
					<h1 class="archive-title h2">
						<span><?php _e( 'Posts Categorized:', 'glocal-network' ); ?></span> <?php single_cat_title(); ?>
					</h1>

				<?php } elseif (is_tag()) { ?>
					<h1 class="archive-title h2">
						<span><?php _e( 'Posts Tagged:', 'glocal-network' ); ?></span> <?php single_tag_title(); ?>
					</h1>

				<?php } elseif (is_author()) {
					global $post;
					$author_id = $post->post_author;
				?>
					<h1 class="archive-title h2">
						<span><?php _e( 'Posts By:', 'glocal-network' ); ?></span> <?php the_author_meta('display_name', $author_id); ?>
					</h1>
					
				<?php } elseif (is_day()) { ?>
					<h1 class="archive-title h2">
						<span><?php _e( 'Daily Archives:', 'glocal-network' ); ?></span> <?php the_time('l, F j, Y'); ?>
					</h1>

				<?php } elseif (is_month()) { ?>
					<h1 class="archive-title h2">
						<span><?php _e( 'Monthly Archives:', 'glocal-network' ); ?></span> <?php the_time('F Y'); ?>
					</h1>

				<?php } elseif (is_year()) { ?>
					<h1 class="archive-title h2">
						<span><?php _e( 'Yearly Archives:', 'glocal-network' ); ?></span> <?php the_time('Y'); ?>
					</h1>
						
				<?php } ?>

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<?php get_template_part( 'partials/content-page' ); ?>

				<?php endwhile; ?>

				<?php else : ?>

					<?php get_template_part( 'partials/content-404' ); ?>

				<?php endif; ?>

			</div>

			<?php get_sidebar(); ?>

<?php get_template_part( 'partials/footer' ); ?>
