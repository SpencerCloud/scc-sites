<?php

/**
 * The following code was an attempt to include Olympus Google Fonts plugin functionality in the theme
 * It was taking too long and not working as I expected, so I'll just use the plugin for now
 * I'm leaving this code in the theme in case I would like to return to it later
 * However, I'm removing the plugin directory from the theme itself
 * If I return, I will need to re-install the plugin directory to the theme
 */

// Add Google Fonts picker using Olympus Google Fonts plugin, absorbed into the theme, similar to the theory of how mitochondria were originally a different organism than single-celled organisms with nuclei, then at one point a cell "ate" a prehistoric mitochondria, but didn't digest it right, but the mitochondria started producing energy for the cell that ATE IT! Then, when it was time for that cell to divide, it also copied and divided the genetic code for the mitochondria, and now all cell have mitochondria in them.

// If plugin is installed, use that instead

// function load_ogf_to_scc_sites() {

	// if ( ! is_plugin_active( 'olympus-google-fonts/olympus-google-fonts.php' ) ) {

	// if ( ! class_exists( 'Olympus_Google_Fonts' ) ) {

	// 	// Redefine constants for plugin path and URI before calling them in olympus-google-fonts.php
	// 	define( 'OGF_DIR_PATH', get_stylesheet_directory() . '/inc/olympus-google-fonts/' );
	// 	define( 'OGF_DIR_URL', get_stylesheet_directory_uri() . '/inc/olympus-google-fonts/olympus-google-fonts.php' );

	// 	require_once locate_template( '/inc/olympus-google-fonts/olympus-google-fonts.php' );
	// }

// }

// add_action( 'after_setup_theme', 'load_ogf_to_scc_sites' );

// unset( 'Olympus_Google_Fonts' );