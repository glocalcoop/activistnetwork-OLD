<?php
/*
Author: Pea, Glocal
URL: htp://glocal.coop
*/

include_once( 'library/metaboxes/metabox-functions.php' );

$args = array(
	'flex-width'    => true,
	'width'         => 960,
	'flex-height'    => true,
	'height'        => 300,
	'header-text'   => false,
);
add_theme_support( 'custom-header', $args );


// function be_sample_metaboxes( $meta_boxes ) {
//     $prefix = '_cmb_'; // Prefix for all fields
//     $meta_boxes['test_metabox'] = array(
//         'id' => 'test_metabox',
//         'title' => 'Test Metabox',
//         'pages' => array('post'), // post type
//         'context' => 'normal',
//         'priority' => 'high',
//         'show_names' => true, // Show field names on the left
//         'fields' => array(
//             array(
//                 'name' => 'Test Text',
//                 'desc' => 'field description (optional)',
//                 'id' => $prefix . 'test_text',
//                 'type' => 'text'
//             ),
//         ),
//     );

//     return $meta_boxes;
// }
// add_filter( 'cmb_meta_boxes', 'be_sample_metaboxes' );

// add_action( 'init', 'be_initialize_cmb_meta_boxes', 9999 );
// function be_initialize_cmb_meta_boxes() {
//     if ( !class_exists( 'cmb_Meta_Box' ) ) {
//         require_once( 'library/metaboxes/init.php' );
//     }
// }


?>