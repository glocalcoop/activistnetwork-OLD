
					<section class="<?php echo get_post_type( get_the_ID() ); ?>-excerpt">
					<?php the_excerpt( '<span class="read-more">' . __( 'Read more &raquo;', 'glocal-network' ) . '</span>' ); ?>
					</section>