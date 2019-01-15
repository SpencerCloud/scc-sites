<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$includes = array(
	'understrap-child',
	'understrap-child-fix',
	'enqueue',
	'customizer-mods',
	'sticky-sidebars',
);

foreach ( $includes as $include ) {
	require_once locate_template( '/inc/' . $include . '.php' );
}
