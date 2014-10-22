<?php 
if(function_exists('glocal_customation_settings')) {
	$glocal_home_settings = glocal_customation_settings();
	$postcategory = implode(",", $glocal_home_settings['posts']['featured_category']);
} 

$postnumber = 9; // Change to whatever number you'd like
?>

<article id="highlights-module" class="module row highlights clearfix">
	<!-- TODO: Add theme customization to change module link -->
	<h2 class="module-heading"><?php echo $glocal_home_settings['posts']['posts_heading']; ?></h2>

<?php
if(function_exists( 'network_latest_posts' )) {

	$parameters = array(
		// 'title'         => '',
		'title_only'    => 'false',
		'auto_excerpt'  => 'true',
		'display_type'     => 'ulist',
		'full_meta'		=> 'true',
		// TODO: Add theme customization to change number of posts to display
		'number_posts'     => $postnumber,
		'wrapper_list_css' => 'highlights-list',
		'wrapper_block_css'=> 'module row highlights', //The wrapper classe
		'instance'         => 'highlights-module', //The wrapper ID
	);

	// If a category was selected, limit to that category
	if(!empty($postcategory)) {
		$parameters['category'] = $postcategory;
	}

	// Execute
	$hightlights_posts = network_latest_posts($parameters);

} else {

	get_template_part( 'partials/error', 'plugin' );

}
?>

</article>