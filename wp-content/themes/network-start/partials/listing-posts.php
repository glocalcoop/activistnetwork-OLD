			<div role="main" id="main" class="main-news" >
			<?php
			if(function_exists( 'network_latest_posts' )) {

				$parameters = array(
				'title_only'    => 'false',
				'auto_excerpt'  => 'true',
				'full_meta'		=> 'true',
				'show_categories'    => 'true', 
				'display_type'		=> 'block',
				'thumbnail'        => 'true',
				'thumbnail_wh'	   => 'medium',
				'thumbnail_class'  => 'post-image',
				'wrapper_list_css' => 'post-list',
				'wrapper_block_css'=> 'news-articles', //  wrapper class to add
				'instance'         => 'news-articles', // wrapper ID to add
				'paginate'         => 'true',        // paginate results
		        'posts_per_page'   => 25, 
				);
				// Execute
				$posts = network_latest_posts($parameters);
			}
			?>
			</div>