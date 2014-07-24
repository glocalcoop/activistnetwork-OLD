<?php get_template_part( 'partials/header' ); ?>

		<div id="main">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<?php get_template_part( 'partials/listing-sites' ); ?>

			<?php endwhile; else : ?>

					<?php get_template_part( 'partials/content-404' ); ?>

			<?php endif; ?>

		</div>

<script>
$(document).ready(function() {

  var $container = $('#isotope');
  
  // init Isotope
  $container.isotope({
    itemSelector: '.isomote',
    layoutMode: 'masonry',
    masonry: {
        columnWidth: 285, 
        gutter: 20
    },
    getSortData: {
        id: '[data-id]', 
        slug: '[data-slug]', 
        posts: '[data-posts]'
    },
    sortAscending: {
        id: false,
        slug: true,
        posts: false
    },
    sortBy: 'id'
  });

  // filter
  $('.filter').on( 'click', 'li', function() {
    var filterValue = $(this).attr('data-filter');
    $container.isotope({ filter: filterValue });
  });

  // sort
  $('.sort').on( 'click', 'li', function() {
    var sortValue = $(this).attr('data-sort');
    $container.isotope({ 
        sortBy: sortValue
    });
  });
  

  // change view
  $('.toggle').on('click', 'li', function() {
    if ($(this).hasClass('view-grid')) {
        $('#isotope').removeClass('view-list').addClass('view-grid');
    }
    else if($(this).hasClass('view-list')) {
        $('#isotope').removeClass('view-grid').addClass('view-list');
    }
    var viewValue = $(this).attr('data-view');
    $container.isotope({ layoutMode: viewValue });
  });

  // change is-on class
  $('.js-menu').each(function(i, focus) {
    var $focus = $(focus);
    $focus.on('click', 'li', function() {
      $focus.find('.is-on').removeClass('is-on');
      $(this).addClass('is-on');
    });
  });


});

</script>

<?php get_template_part( 'partials/footer' ); ?>
