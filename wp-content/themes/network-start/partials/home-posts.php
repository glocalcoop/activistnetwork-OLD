			<script type="text/javascript">
			jQuery(document).ready(function(){
			  jQuery('.news-list').bxSlider({
                slideWidth: 5000,
			    minSlides: 2,
			    maxSlides: 2,
			    slideMargin: 10,
			    pager: false
			  });
              var responsive_viewport = jQuery(window).width();
              if (responsive_viewport < 320) {
                  jQuery('.news-list').reloadSlider({
				    slideWidth: 5000,
				    minSlides: 1,
				    maxSlides: 1,
				    slideMargin: 10,
				    pager: false
                  });
              } 
			});
			</script>

			<?php 
			// Get the category from theme customization 
			$featuredcategory = get_cat_name(get_option("options_featured_category")); 
			$categoryid = get_option("options_featured_category");
			
			// If a category is selected, get the slug
			if(!empty($featuredcategory)) {
				$categoryslug = get_category( $categoryid );
				$featuredcatslug = '/' . $categoryslug->slug . '/';
			}

			// Get the header text from theme customization 
			$heading = get_option("options_post_heading"); 
			if(!empty($heading)) {
				$postheading = $heading;
			} elseif(!empty($featuredcategory)) {
				$postheading = $featuredcategory;
			}
			else {
				$postheading = 'Latest'; // Fallback header text. Change to whatever you'd like.
			}

			?>

			<?php
			if(function_exists( 'network_latest_posts' )) {

				$parameters = array(
				'title'         => $postheading,
				'title_link'    => '/news/', //Lists to news page. Change to whatever you'd like (or leave empty).
				'title_only'    => 'false',
				'auto_excerpt'  => 'true',
				'full_meta'		=> 'true',
				'category'         => $featuredcategory,
				'number_posts'     => 2,
				'wrapper_list_css' => 'news-list',
				'wrapper_block_css'=> 'module row news', //The wrapper class
				'instance'         => 'news-module', //The wrapper ID
				);
				// Execute
				$recent_posts = network_latest_posts($parameters);
			}
			?>
