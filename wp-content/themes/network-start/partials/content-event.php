							<article role="article" class="<?php echo get_post_type( get_the_ID() ); ?>" id="<?php echo get_post_type( get_the_ID() ); ?>-<?php the_ID(); ?>" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header">

    								<section class="event-image"><?php echo $EM_Event->output('#_EVENTIMAGE'); ?></section>
    								
									<h1 class="entry-title single-title event-title" itemprop="headline"><?php echo $EM_Event->output('#_EVENTNAME'); ?></h1>
									<p class="byline vcard"><?php
										printf( __( 'Posted <time class="updated" datetime="%1$s" pubdate>%2$s</time> by <span class="author">%3$s</span> <span class="amp">&amp;</span> filed under %4$s.', 'glocal-network' ), get_the_time( 'Y-m-j' ), get_the_time( get_option('date_format')), bones_get_the_author_posts_link(), get_the_category_list(', ') );
									?></p>

								</header>

								<section class="event-details">
									<h4 class="date-time">
										<span class="event-day"><?php echo $EM_Event->output('#l'); ?></span>
										<span class="event-date"><?php echo $EM_Event->output('#F #j, #Y'); ?></span>
										<span class="event-time"><?php echo $EM_Event->output('#g:#i#a'); ?> - <?php echo $EM_Event->output('#@g:#@i#@a'); ?></span>
									</h4>

									<?php if($EM_Event->location_id) { ?>
									<h4 class="location">
										<span class="location-name"><?php echo $EM_Event->output('#_LOCATIONLINK'); ?></span>
										<span class="location-address"><?php echo $EM_Event->output('#_LOCATIONTOWN #_LOCATIONSTATE'); ?></span>
									</h4>
									<?php } ?>

									<div class="tools"><a href="<?php echo $EM_Event->output('#_EVENTICALURL'); ?>" class="add-to-calendar button">Add to Calendar</a></div>
								</section>

								<section class="event-description">
								
								    <?php echo $EM_Event->output('#_EVENTNOTES'); ?>
								
    								<?php if($EM_Event->location_id) { ?>
    								<div class="event-map"><?php echo $EM_Event->output('#_MAP'); ?></div>
    								<?php } ?>

								</section>

								<footer class="event-footer">
									<div class="meta categories"><?php echo $EM_Event->output('#_EVENTCATEGORIES'); ?></div>
									<div class="share"></div>
								</footer>

								<?php
								echo "<pre>";
								var_dump($EM_Event);
								echo "</pre>";
								?>

								<?php comments_template(); ?>

							</article>