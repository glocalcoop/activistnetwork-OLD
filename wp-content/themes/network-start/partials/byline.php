<p class="byline vcard"><?php
	printf( __( 'Posted <time class="updated" datetime="%1$s" pubdate>%2$s</time> by <span class="author">%3$s</span> <span class="amp">&</span> filed under %4$s.', 'glocal-network' ), get_the_time( 'Y-m-j' ), get_the_time( __( 'F jS, Y', 'glocal-network' ) ), bones_get_the_author_posts_link(), get_the_category_list(', ') );
?></p><?php the_tags( '<h6 class="tags">' . __( 'Tags:', 'glocal-network' ) . '</h6> ', ', ', '' ); ?>