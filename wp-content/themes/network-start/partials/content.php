				<article role="article" class="<?php echo get_post_type( get_the_ID() ); ?>" id="<?php echo get_post_type( get_the_ID() ); ?>-<?php the_ID(); ?>" itemscope itemtype="http://schema.org/BlogPosting">

					<?php get_template_part( 'partials/content-post-header' ); ?>

					<?php get_template_part( 'partials/content-post-body' ); ?>

				</article>