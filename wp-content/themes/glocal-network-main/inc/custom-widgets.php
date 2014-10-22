<?php
/*
Author: Pea, Glocal
URL: htp://glocal.coop
*/

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function glocal_network_register_widgets() {
	register_sidebar(array(
		'id' => 'home-modules',
		'name' => __( 'Homepage Modules', 'glocal-network' ),
		'description' => __( 'Modules for the Homepage', 'glocal-network' ),
		'before_widget' => '<article id="%1$s" class="module row events %2$s">',
		'after_widget' => '</article>',
		'before_title' => '<h2 class="module-heading">',
		'after_title' => '</h2>',
	));
	register_sidebar(array(
		'id' => 'footer1',
		'name' => __( 'Footer 1', 'glocal-network' ),
		'description' => __( 'First footer widget area.', 'glocal-network' ),
		'before_widget' => '<div id="%1$s" class="widget footer-widget-1 %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));
	register_sidebar(array(
		'id' => 'footer2',
		'name' => __( 'Footer 2', 'glocal-network' ),
		'description' => __( 'Second footer widget area.', 'glocal-network' ),
		'before_widget' => '<nav id="%1$s" class="widget footer-widget-2 %2$s">',
		'after_widget' => '</nav>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));
	register_sidebar(array(
		'id' => 'footer3',
		'name' => __( 'Footer 3', 'glocal-network' ),
		'description' => __( 'Third footer widget area.', 'glocal-network' ),
		'before_widget' => '<div id="%1$s" class="widget footer-widget-3 %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));
	register_sidebar(array(
		'id' => 'footer4',
		'name' => __( 'Footer 4', 'glocal-network' ),
		'description' => __( 'Fourth footer widget area.', 'glocal-network' ),
		'before_widget' => '<div id="%1$s" class="widget footer-widget-4 %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));
	register_sidebar(array(
		'id' => 'social',
		'name' => __( 'Social Widget', 'glocal-network' ),
		'description' => __( 'Widget area for social links.', 'glocal-network' ),
		'before_widget' => '<div id="%1$s" class="social-links %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));
	/*

	To call the sidebar in your template, you can just copy
	the sidebar.php file and rename it to your sidebar's name.
	So using the above example, it would be:
	sidebar-sidebar2.php

	*/
} // don't remove this bracket!

add_action( 'widgets_init', 'glocal_network_register_widgets' );

?>