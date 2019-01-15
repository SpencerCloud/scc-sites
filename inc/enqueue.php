<?php

/**
 * Enqueue styles and scripts not set by Understrap for the child theme
 */

function scc_sites_enqueue_scripts() {

	wp_enqueue_style( 'fontawesome-5.6.3', 'https://use.fontawesome.com/releases/v5.6.3/css/all.css' );
	wp_enqueue_style( 'fontawesome-5-shims', 'https://use.fontawesome.com/releases/v5.6.3/css/v4-shims.css' );

}
add_action( 'wp_enqueue_scripts', 'scc_sites_enqueue_scripts' );