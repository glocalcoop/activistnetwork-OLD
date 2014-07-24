<?php get_template_part( 'partials/header' ); ?>

			<div id="intro" role="intro" class="intro-<?php global $post; echo $post->post_name; ?>">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<?php get_template_part( 'partials/content-page' ); ?>

				<?php endwhile; endif; ?>

			</div>

			<?php get_template_part( 'partials/listing-posts' ); ?>
			
<?php get_template_part( 'partials/footer' ); ?>
