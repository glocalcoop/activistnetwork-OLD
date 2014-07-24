			<script type="text/javascript">
			jQuery(document).ready(function(){
			  jQuery('.events-list').bxSlider({
                slideWidth: 5000,
			    minSlides: 4,
			    maxSlides: 4,
			    slideMargin: 10,
			    pager: false
			  });
              var responsive_viewport = jQuery(window).width();
              if (responsive_viewport < 320) {
                  jQuery('.events-list').reloadSlider({
				    slideWidth: 5000,
				    minSlides: 1,
				    maxSlides: 1,
				    slideMargin: 10,
				    pager: false
                  });
              } 
			});
			</script>

			<?php // Check to see if Events Manager is active. If not don't display this module.
			if ( is_plugin_active('events-manager/events-manager.php') ) { ?>
			<article id="events-module" class="module row events">
				<h2 class="module-heading"><a href="/events/">Events</a></h2>
				<ul class="events-list">
					<?php
					$events = EM_Events::output(array('limit'=>5, 
						'format'=>'<li>
						<h6 class="event-start">
    				        <time class="event-month" datetime="#M">#M</time>
    				        <time class="event-date" datetime="#j">#j</time>
    				        <time class="event-day" datetime="#D">#D</time>
    					</h6>
						<h3 class="post-title event-title">#_EVENTLINK</h3>
						</li>'));?>
					<?php echo $events; ?>
				</ul>
			</article>
			<?php } ?>