<?php get_template_part( 'partials/header' ); ?>


					<div id="main" class="clearfix" role="main">

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<?php get_template_part( 'partials/content-post' ); ?>

						<?php endwhile; ?>

						<?php else : ?>

							<?php get_template_part( 'partials/content-404' ); ?>

						<?php endif; ?>

					</div>

					<?php get_sidebar(); ?>


<?php get_template_part( 'partials/footer '); ?>
