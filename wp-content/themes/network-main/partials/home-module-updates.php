<?php 
if(function_exists('glocal_customation_settings')) {
	$glocal_home_settings = glocal_customation_settings();
	$updatecategory = implode(",", $glocal_home_settings['updates']['featured_category']);
	$updatenumber = $glocal_home_settings['updates']['number_updates'];
} 
?>

<article id="highlights-module" class="module row highlights clearfix">
	<h2 class="module-heading">
	<?php if(!empty($glocal_home_settings['updates']['updates_heading_link'])) { ?>
		<a href="<?php echo $glocal_home_settings['updates']['updates_heading_link']; ?>">
			<?php echo $glocal_home_settings['updates']['updates_heading']; ?>
		</a>
	<?php } else { ?>
		<?php echo $glocal_home_settings['updates']['updates_heading']; ?>
	<?php } ?>	
	</h2>


<?php
if(function_exists( 'network_latest_posts' )) {

	$parameters = array(
		// 'title'         => '',
		'title_only'    => 'false',
		// TODO: Add exclude site customization	
		'ignore_blog' => '1',
		'auto_excerpt'  => 'true',
		'display_type'	=> 'ulist',
		'full_meta'		=> 'true',
		'sort_by_date'	=> 'true',
		'use_pub_date'	=> 'true',
		// 'sorting_order'	=> 'desc',
		// BUG: Not respecting number of updates specified
		'number_posts'     => $updatenumber,
		'wrapper_list_css' => 'highlights-list',
		'wrapper_block_css'=> 'module row highlights', //The wrapper classe
		'instance'         => 'highlights-module', //The wrapper ID
	);

	// If a category was selected, limit to that category
	if(!empty($updatecategory)) {
		$parameters['category'] = $updatecategory;
	}

	// If number of updates is specified, limit to that number of updates
	if(!empty($updatecategory)) {
		$parameters['number_updates'] = $updatenumber;
	}

	// Execute
	$hightlights_updates = network_latest_posts($parameters);

} else {

	get_template_part( 'partials/error', 'plugin' );

}
?>

</article>