					<article id="<?php echo get_post_type( get_the_ID() ); ?>-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">

						<header class="<?php echo get_post_type( get_the_ID() ); ?>-header">

							<h3 class="search-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
							<?php get_template_part( 'partials/byline' ); ?>

						</header>

						<?php get_template_part( 'partials/content-post-excerpt' ); ?>

					</article>