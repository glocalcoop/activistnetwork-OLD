<?php get_header(); ?>

<div class="content">

	<div class="wrap">

		<main class="main-archive">

			<?php if (is_category()) { ?>
				<h1 class="archive-title h2">
					<span><?php _e( 'Posts Categorized:', 'glocal-theme' ); ?></span> <?php single_cat_title(); ?>
				</h1>

			<?php } elseif (is_tag()) { ?>
				<h1 class="archive-title h2">
					<span><?php _e( 'Posts Tagged:', 'glocal-theme' ); ?></span> <?php single_tag_title(); ?>
				</h1>

			<?php } elseif (is_author()) {
				global $post;
				$author_id = $post->post_author;
			?>
				<h1 class="archive-title h2">
					<span><?php _e( 'Posts By:', 'glocal-theme' ); ?></span> <?php the_author_meta('display_name', $author_id); ?>
				</h1>
				
			<?php } elseif (is_day()) { ?>
				<h1 class="archive-title h2">
					<span><?php _e( 'Daily Archives:', 'glocal-theme' ); ?></span> <?php the_time('l, F j, Y'); ?>
				</h1>

			<?php } elseif (is_month()) { ?>
				<h1 class="archive-title h2">
					<span><?php _e( 'Monthly Archives:', 'glocal-theme' ); ?></span> <?php the_time('F Y'); ?>
				</h1>

			<?php } elseif (is_year()) { ?>
				<h1 class="archive-title h2">
					<span><?php _e( 'Yearly Archives:', 'glocal-theme' ); ?></span> <?php the_time('Y'); ?>
				</h1>
					
			<?php } ?>




			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<article role="article" id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?>>

				<header class="article-header">

					<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
					<p class="byline vcard"><?php
						printf(__( 'Posted <time class="updated" datetime="%1$s" pubdate>%2$s</time> by <span class="author">%3$s</span> <span class="amp">&</span> filed under %4$s.', 'glocal-theme' ), get_the_time('Y-m-j'), get_the_time(__( 'F jS, Y', 'glocal-theme' )), bones_get_the_author_posts_link(), get_the_category_list(', '));
					?></p>

				</header>

				<section class="entry-content">

					<?php the_post_thumbnail( 'bones-thumb-300' ); ?>

					<?php the_excerpt(); ?>

				</section>

				<footer class="article-footer">

				</footer>

			</article>

			<?php endwhile; ?>

					<?php if ( function_exists( 'bones_page_navi' ) ) { ?>
						<?php bones_page_navi(); ?>
					<?php } else { ?>
						<nav class="wp-prev-next">
							<ul class="clearfix">
								<li class="prev-link"><?php next_posts_link( __( '&laquo; Older Entries', 'glocal-theme' )) ?></li>
								<li class="next-link"><?php previous_posts_link( __( 'Newer Entries &raquo;', 'glocal-theme' )) ?></li>
							</ul>
						</nav>
					<?php } ?>

			<?php else : ?>

					<article id="post-not-found" class="hentry">
						<header class="article-header">
							<h1><?php _e( 'Oops, Post Not Found!', 'glocal-theme' ); ?></h1>
						</header>
						<section class="entry-content">
							<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'glocal-theme' ); ?></p>
						</section>
						<footer class="article-footer">
								<p><?php _e( 'This is the error message in the archive.php template.', 'glocal-theme' ); ?></p>
						</footer>
					</article>

			<?php endif; ?>

		</main>

		<?php get_sidebar(); ?>

    </div>

</div>

<?php get_footer(); ?>