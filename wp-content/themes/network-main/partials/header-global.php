<header class="header-global">

	<div class="wrap">
		
		<?php  // Get the site info for the main site
		$global_site_details = get_blog_details(1);
		$global_site_header = glocal_get_site_image(1);
		?>

		<a class="domain-logo global-logo logo-NYCP" href="<?php echo $global_site_details->siteurl; ?>"><img src="<?php echo $global_site_header; ?>" alt="<?php echo $global_site_details->blogname; ?>" /></a>

		<nav role="navigation" class="nav-global">
			<ul class="nav-anchors js-anchors">
            	<li><a href="#menu-main-navigation" class="anchor-menu" title="menu"><?php echo $global_site_details->blogname; ?></a></li>
            	<li><a href="#search-global" class="anchor-search" title="search"></a></li>
            </ul>
			<div class="search-form" id="search-global">
			    <?php get_search_form(); ?>
			</div>
			<?php
			// Network-wide navigation
			if(function_exists('glocal_navigation')) {
				$global_nav = glocal_navigation();
				echo $global_nav;
			}
			?>
		</nav>

	</div>

</header>