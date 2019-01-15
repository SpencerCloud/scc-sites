<?php

/**
 * Add files to edit the customizer, adding sections, settings, and controls
 */

$customizer_extends = array(
	'extend-colors',
	'header',
	'footer',
	'sidebars',
	// 'olympus-google-fonts', // Left out for now - check file for more info
);

foreach ($customizer_extends as $file) {
	require_once locate_template( 'inc/customizer/' . $file . '.php' );
}

/**
 * Compile SCC using SCSSPHP with data from files above
 */

function scc_sites_customizer_save_update_css() {

    include_once ( get_stylesheet_directory() . '/inc/scssphp/scssphp-manager.php' );

}
add_action( 'customize_save_after', 'scc_sites_customizer_save_update_css' );
