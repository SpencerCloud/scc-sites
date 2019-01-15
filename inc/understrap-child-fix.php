<?php

/**
 * Fix errors in standard Understrap child theme code wihtout needing to modify it directly
 */

function scc_sites_fix_understrap_child() {

	wp_dequeue_script( 'popper-scripts' ); // Popper doesn't seem to be included in parent anymore

}
add_action( 'wp_enqueue_scripts', 'scc_sites_fix_understrap_child' );