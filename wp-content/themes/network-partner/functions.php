<?php
/*
Author: Pea, Glocal
URL: htp://glocal.coop
*/

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

// Custom header support

$args = array(
	'flex-width'    => true,
	'width'         => 250,
	'flex-height'    => true,
	'height'        => 98,
	'header-text'   => false,
);

add_theme_support( 'custom-header', $args );


// Remove theme customization settings for child theme
// Remove menu customization on child themes

function network_partner_remove_theme_customization() {

    unregister_nav_menu( 'main-nav' );
	unregister_nav_menu( 'secondary-nav' );
	unregister_nav_menu( 'utility-nav' );
	unregister_nav_menu( 'footer-links' );
	register_nav_menus(
		array(
			'site-nav' => __( 'The Main Site Menu', 'network-subsite' ),
		)
	);
	remove_action( 'customize_register', 'glocal_customize_register');
}
add_action( 'after_setup_theme', 'network_partner_remove_theme_customization', 20 ); 


?>