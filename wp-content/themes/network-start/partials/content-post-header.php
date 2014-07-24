					<header class="<?php echo get_post_type( get_the_ID() ); ?>-header">
						<h1 class="<?php echo get_post_type( get_the_ID() ); ?>-title" itemprop="headline"><?php the_title(); ?></h1>
						<p class="byline vcard"><?php
							printf( __( 'Posted <time class="updated" datetime="%1$s" pubdate>%2$s</time> by <span class="author">%3$s</span> <span class="amp">&amp;</span> filed under %4$s.', 'glocal-network' ), get_the_time( 'Y-m-j' ), get_the_time( get_option('date_format')), bones_get_the_author_posts_link(), get_the_category_list(', ') );
						?></p>
					</header>

