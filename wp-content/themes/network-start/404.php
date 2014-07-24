<?php get_template_part( 'partials/header' ); ?>

					<div id="main" class="clearfix" role="main">

						<article id="post-not-found" class="hentry clearfix">

							<header class="article-header">

								<h1><?php _e( 'Epic 404 - Article Not Found', 'glocal-network' ); ?></h1>

							</header>

							<section class="entry-content">

								<p><?php _e( 'The article you were looking for was not found, but maybe try looking again!', 'glocal-network' ); ?></p>

							</section>

							<section class="search">

									<p><?php get_search_form(); ?></p>

							</section>

							<footer class="article-footer">

									<p><?php _e( 'This is the 404.php template.', 'glocal-network' ); ?></p>

							</footer>

						</article>

					</div>

<?php get_template_part( 'partials/footer' ); ?>
