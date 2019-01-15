<?php

/**
 * Optional sticky sidebar enqueueing
 * Scripts don't load unless options are selected in the customizer
 */

if (
	get_theme_mod( 'scc_sites_sticky_sidebar_left' )  ||
	get_theme_mod( 'scc_sites_sticky_sidebar_right' )
) {

	function scc_sites_enqueue_sticky_sidebars() {

		/**
		 * Official The IA Sticky Sidebar minified JS file
		 */
		wp_enqueue_script( 'sticky-sidebars', get_stylesheet_directory_uri() . '/js/theia-sticky-sidebar.min.js', array( 'jquery' ), '', true );

		/**
		 * Integrate The IA Sticky Sidebar into theme with settings
		 */
		wp_enqueue_script( 'sticky-sidebars-settings', get_stylesheet_directory_uri() . '/js/sticky-sidebar-settings.js', array( 'jquery' ), '', true );

		/**
		 * Include left/right options from theme_mods in script
		 */
		$sticky_sidebar_opts = array();

		if ( get_theme_mod( 'scc_sites_sticky_sidebar_left' ) ) {
			$sticky_sidebar_opts['left_sidebar'] = true;
		}

		if ( get_theme_mod( 'scc_sites_sticky_sidebar_right' ) ) {
			$sticky_sidebar_opts['right_sidebar'] = true;
		}

		wp_localize_script( 'sticky-sidebars', 'stickySidebarOpts', $sticky_sidebar_opts );

	}
	add_action( 'wp_enqueue_scripts', 'scc_sites_enqueue_sticky_sidebars' );

}